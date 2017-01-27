<?php
namespace App\Http\Controllers;

use App\Upazilla;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UpazillaController extends Controller
{
    public function getIndex()
    {
        return view('upazilla.index');
    }

    public function getList()
    {
        Session::put('upazilla_search', Input::has('ok') ? Input::get('search') : (Session::has('upazilla_search') ? Session::get('upazilla_search') : ''));
        Session::put('upazilla_field', Input::has('field') ? Input::get('field') : (Session::has('upazilla_field') ? Session::get('upazilla_field') : 'name'));
        Session::put('upazilla_sort', Input::has('sort') ? Input::get('sort') : (Session::has('upazilla_sort') ? Session::get('upazilla_sort') : 'asc'));
        $upazillas = Upazilla::where('name', 'like', '%' . Session::get('upazilla_search') . '%')
            ->orderBy(Session::get('upazilla_field'), Session::get('upazilla_sort'))->paginate(8);
        return view('upazilla.list', ['upazillas' => $upazillas]);
    }

    public function getUpdate($id)
    {
        return view('upazilla.update', ['upazilla' => Upazilla::find($id)]);
    }

    public function postUpdate($id)
    {
        $upazilla = Upazilla::find($id);
        $rules = ["unitprice" => "required|numeric"];
        if ($upazilla->name != Input::get('name'))
            $rules += ['name' => 'required|unique:upazillas'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $upazilla->name = Input::get('name');
        $upazilla->UpazillaCode = Input::get('UpazillaCode');
        $upazilla->unitprice = Input::get('unitprice');
        $upazilla->company_id = Input::get('company_id');
        $upazilla->company_name = Input::get('company_name');
        $upazilla->company_email = Input::get('company_email');
        $upazilla->company_address = Input::get('company_address');
        $upazilla->company_license = Input::get('company_license');
        $upazilla->company_logo = Input::get('company_logo');
        
        $upazilla->save();
        return ['url' => 'upazilla/list'];
    }

    public function getCreate()
    {
        return view('upazilla.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "name" => "required|unique:upazillas",
            "UpazillaCode" => "required|unique:upazillas",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $upazilla = new Upazilla();
        $upazilla->name = Input::get('name');
        $upazilla->UpazillaCode = Input::get('UpazillaCode');
        $upazilla->unitprice = Input::get('unitprice');
        $upazilla->company_id = Input::get('company_id');
        $upazilla->company_name = Input::get('company_name');
        $upazilla->company_email = Input::get('company_email');
        $upazilla->company_address = Input::get('company_address');
        $upazilla->company_license = Input::get('company_license');
        $upazilla->company_logo = Input::get('company_logo');
        $upazilla->save();
        return ['url' => 'upazilla/list'];
    }

    public function getDelete($id)
    {
        Upazilla::destroy($id);
        return Redirect('upazilla/list');
    }

}