<?php
namespace App\Http\Controllers;

use App\Companyraj;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CompanyrajController extends Controller
{
    public function getIndex()
    {
        return view('companyraj.index');
    }

    public function getList()
    {
        Session::put('companyraj_search', Input::has('ok') ? Input::get('search') : (Session::has('companyraj_search') ? Session::get('companyraj_search') : ''));
        Session::put('companyraj_field', Input::has('field') ? Input::get('field') : (Session::has('companyraj_field') ? Session::get('companyraj_field') : 'id'));
        Session::put('companyraj_sort', Input::has('sort') ? Input::get('sort') : (Session::has('companyraj_sort') ? Session::get('companyraj_sort') : 'asc'));
        //$tempval = {{Auth::user()->company_id}};
        //$value = Auth::user()->company_id;
        if(Auth::user()->company_id == 'admin'){
            //$val = 
            $companyrajs = User::where('id', 'like', '%' . Session::get('companyraj_search') . '%')
            //->where('company_id', Auth::user()->company_id)
            ->orderBy(Session::get('companyraj_field'), Session::get('companyraj_sort'))->paginate(8);
        }else{
            //$val = 
            $companyrajs = User::where('id', 'like', '%' . Session::get('companyraj_search') . '%')
            ->where('company_id', Auth::user()->company_id)
            ->orderBy(Session::get('companyraj_field'), Sxession::get('companyraj_sort'))->paginate(8);
        }
        return view('companyraj.list', ['companyrajs' => $companyrajs]);
    }

    public function getUpdate($id)
    {
        return view('companyraj.update', ['companyraj' => Companyraj::find($id)]);
    }

    public function postUpdate($id)
    {
        $companyraj = Companyraj::find($id);
        /*$rules = ["unitprice" => "required|numeric"];
        if ($companyraj->name != Input::get('name'))
            $rules += ['name' => 'required|unique:companyrajs'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $companyraj->company_id = Input::get('company_id');
        $companyraj->company_name = Input::get('company_name');
        $companyraj->company_email = Input::get('company_email');
        $companyraj->company_address = Input::get('company_address');
        $companyraj->company_license = Input::get('company_license');
        $companyraj->company_logo = Input::get('company_logo');
        
        $companyraj->save();
        return ['url' => 'companyraj/list'];
    }

    public function getCreate()
    {
        return view('companyraj.create');
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "name" => "required|unique:companyrajs",
            "CompanyrajCode" => "required|unique:companyrajs",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $companyraj = new Companyraj();
        $companyraj->company_id = Input::get('company_id');
        $companyraj->company_name = Input::get('company_name');
        $companyraj->company_email = Input::get('company_email');
        $companyraj->company_address = Input::get('company_address');
        $companyraj->company_license = Input::get('company_license');

        $file = Input::file('company_logo');
        $destinationPath = 'uploads/';
        $filename = $file->getClientOriginalName();
        Input::file('company_logo')->move($destinationPath, $filename);
        $companyraj->company_logo =$filename;


        //$companyraj->company_logo = Input::get('company_logo');
        $companyraj->save();

        $companyraj12 = new User();
        $companyraj12->name = Input::get('user_id');
        $companyraj12->company_id = Input::get('company_id');
        $companyraj12->manager_id = '0';
        $companyraj12->counter_id = '0';
        $companyraj12->email = Input::get('company_email');
        $companyraj12->password = bcrypt(Input::get('password12'));
        $companyraj12->type = 'company';
        $companyraj12->company_photo = $filename;
        //$management12->remember_token = Input::get('remember_token');
        //$management12->rememberToken();
        $companyraj12->save();    

        return ['url' => 'companyraj/list'];
    }

    public function getDelete($id)
    {
        Companyraj::destroy($id);
        return Redirect('companyraj/list');
    }

}