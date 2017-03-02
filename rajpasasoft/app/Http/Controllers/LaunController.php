<?php
namespace App\Http\Controllers;

use App\Laun;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LaunController extends Controller
{
    public function getIndex()
    {
        return view('laun.index');
    }

    public function getList()
    {
        Session::put('laun_search', Input::has('ok') ? Input::get('search') : (Session::has('laun_search') ? Session::get('laun_search') : ''));
        Session::put('laun_field', Input::has('field') ? Input::get('field') : (Session::has('laun_field') ? Session::get('laun_field') : 'name'));
        Session::put('laun_sort', Input::has('sort') ? Input::get('sort') : (Session::has('laun_sort') ? Session::get('laun_sort') : 'asc'));
        $launs = Laun::where('name', 'like', '%' . Session::get('laun_search') . '%')
            ->orderBy(Session::get('laun_field'), Session::get('laun_sort'))->paginate(8);
        return view('laun.list', ['launs' => $launs]);
    }

    public function getUpdate($id)
    {
        return view('laun.update', ['laun' => Laun::find($id)]);
    }

    public function postUpdate($id)
    {
        $laun = Laun::find($id);
        /*$rules = ["unitprice" => "required|numeric"];
        if ($laun->name != Input::get('name'))
            $rules += ['name' => 'required|unique:launs'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $laun->name = Input::get('name');
        $laun->LaunCode = Input::get('LaunCode');
        $laun->unitprice = Input::get('unitprice');
        $laun->company_id = Input::get('company_id');
        $laun->company_name = Input::get('company_name');
        $laun->company_email = Input::get('company_email');
        $laun->company_address = Input::get('company_address');
        $laun->company_license = Input::get('company_license');
        
        $file = Input::file('company_logo');
        $destinationPath = 'uploads/';
        $filename = $file->getClientOriginalName();
        Input::file('company_logo')->move($destinationPath, $filename);
        $laun->company_logo =$filename;

        //$laun->company_logo = Input::get('company_logo');
        
        $laun->save();
        return ['url' => 'laun/list'];
    }

    public function getCreate()
    {
        return view('laun.create');
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "name" => "required|unique:launs",
            "LaunCode" => "required|unique:launs",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $laun = new Laun();
        $laun->name = Input::get('name');
        $laun->LaunCode = Input::get('LaunCode');
        $laun->unitprice = Input::get('unitprice');
        $laun->company_id = Input::get('company_id');
        $laun->company_name = Input::get('company_name');
        $laun->company_email = Input::get('company_email');
        $laun->company_address = Input::get('company_address');
        $laun->company_license = Input::get('company_license');
        
        $file = Input::file('company_logo');
        $destinationPath = 'uploads/';
        $filename = $file->getClientOriginalName();
        Input::file('company_logo')->move($destinationPath, $filename);
        $laun->company_logo =$filename;

        //$laun->company_logo = Input::get('company_logo');
        $laun->save();
        return ['url' => 'laun/list'];
    }

    public function getDelete($id)
    {
        Laun::destroy($id);
        return Redirect('laun/list');
    }

}