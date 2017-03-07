<?php
namespace App\Http\Controllers;

use App\Management;
use App\Companyraj;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ManagementController extends Controller
{
    public function getIndex()
    {
        return view('management.index');
    }

    public function getList()
    {
        Session::put('management_search', Input::has('ok') ? Input::get('search') : (Session::has('management_search') ? Session::get('management_search') : ''));
        Session::put('management_field', Input::has('field') ? Input::get('field') : (Session::has('management_field') ? Session::get('management_field') : 'manager_id'));
        Session::put('management_sort', Input::has('sort') ? Input::get('sort') : (Session::has('management_sort') ? Session::get('management_sort') : 'asc'));
        /*$managements = Management::where('manager_id', 'like', '%' . Session::get('management_search') . '%')
            ->where('company_id', Auth::user()->company_id)
            ->orderBy(Session::get('management_field'), Session::get('management_sort'))->paginate(8);*/

        if(Auth::user()->company_id == 'admin'){
            //$managements = User::paginate(8);
            $managements = Management::where('company_id','!=', '0')->paginate(8);
        }else{
            //$val = 
            /*$managements = Companyraj::select('*')
            ->where('users.company_id', Auth::user()->company_id)
            -> join('users', 'companyrajs.company_id', '=','users.company_id')->paginate(8);*/
            
            $managements = Management::where('manager_id', Auth::user()->manager_id)
            ->paginate(8);
        }
        return view('management.list', ['managements' => $managements]/*, ['CompanyName' => $CompanyName]*/);
    }

    public function getUpdate($id)
    {
        $company_info = Companyraj::lists('company_name', 'id');
        return view('management.update', ['management' => Management::find($id)])->with('company_info', $company_info);
    }

    public function postUpdate($id)
    {
        $management = Management::find($id);
        $management->manager_name = Input::get('manager_name');
        $management->company_id = Input::get('company_id');
        $management->manager_id = Input::get('manager_id');   
        $management->emailaddress = Input::get('emailaddress');  
        $management->password = Input::get('password');  
        if(Input::get('password') == Input::get('confirm_password')){
            $management->password = md5(Input::get('password'));
         }
        else{
            echo "error";
        }
        $file = Input::file('manager_photo');
        $destinationPath = 'uploads/';
        $filename = $file->getClientOriginalName();
        Input::file('manager_photo')->move($destinationPath, $filename);
        $management->manager_photo =$filename;
        $management->save();
        return ['url' => 'management/list'];
    }

    public function getCreate()
    {
        $company_info = Companyraj::lists('company_name', 'id');
        return view('management.create')->with('company_info', $company_info);
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "name" => "required|unique:managements",
            "ManagementCode" => "required|unique:managements",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $management = new Management();
        $management->manager_name = Input::get('manager_name');
        $management->company_id = Input::get('company_id');
        $management->manager_id = Input::get('manager_id');   
        $management->emailaddress = Input::get('emailaddress');  
        $management->password = Input::get('password');  
        if(Input::get('password') == Input::get('confirm_password')){
            $management->password = md5(Input::get('password'));
         }
        else{
            echo "error";
        }
        $file = Input::file('manager_photo');
        $destinationPath = 'uploads/';
        $filename = $file->getClientOriginalName();
        Input::file('manager_photo')->move($destinationPath, $filename);
        $management->manager_photo =$filename;
        $management->save();
        return ['url' => 'management/list'];
            // $management12 = new User();
            // $management12->name = Input::get('user_id');
            // $management12->company_id = Input::get('company_id');
            // $management12->manager_id = Input::get('manager_id');
            // $management12->counter_id = '0';
            // $management12->email = Input::get('emailaddress');
            // $management12->password = bcrypt(Input::get('password12'));
            // $management12->type = 'manager';
            // $management12->manager_photo = $filename;
            //$management12->remember_token = Input::get('remember_token');
            //$management12->rememberToken();
            // $management12->save();
       
        //$management->save();
        
    }

    public function getDelete($id)
    {
        Management::destroy($id);
        return Redirect('management/list');
    }

}