<?php
namespace App\Http\Controllers;

use App\Companyraj;
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
        Session::put('companyraj_field', Input::has('field') ? Input::get('field') : (Session::has('companyraj_field') ? Session::get('companyraj_field') : 'name'));
        Session::put('companyraj_sort', Input::has('sort') ? Input::get('sort') : (Session::has('companyraj_sort') ? Session::get('companyraj_sort') : 'asc'));
        $companyrajs = Companyraj::where('name', 'like', '%' . Session::get('companyraj_search') . '%')
            ->orderBy(Session::get('companyraj_field'), Session::get('companyraj_sort'))->paginate(8);
        return view('companyraj.list', ['companyrajs' => $companyrajs]);
    }

    public function getUpdate($id)
    {
        return view('companyraj.update', ['companyraj' => Companyraj::find($id)]);
    }

    public function postUpdate($id)
    {
        $companyraj = Companyraj::find($id);
        $rules = ["unitprice" => "required|numeric"];
        if ($companyraj->name != Input::get('name'))
            $rules += ['name' => 'required|unique:companyrajs'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $companyraj->name = Input::get('name');
        $companyraj->CompanyrajCode = Input::get('CompanyrajCode');
        $companyraj->unitprice = Input::get('unitprice');
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
        $validator = Validator::make(Input::all(), [
            "name" => "required|unique:companyrajs",
            "CompanyrajCode" => "required|unique:companyrajs",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $companyraj = new Companyraj();
        $companyraj->name = Input::get('name');
        $companyraj->CompanyrajCode = Input::get('CompanyrajCode');
        $companyraj->unitprice = Input::get('unitprice');
        $companyraj->company_id = Input::get('company_id');
        $companyraj->company_name = Input::get('company_name');
        $companyraj->company_email = Input::get('company_email');
        $companyraj->company_address = Input::get('company_address');
        $companyraj->company_license = Input::get('company_license');
        $companyraj->company_logo = Input::get('company_logo');
        $companyraj->save();
        return ['url' => 'companyraj/list'];
    }

    public function getDelete($id)
    {
        Companyraj::destroy($id);
        return Redirect('companyraj/list');
    }

}