<?php
namespace App\Http\Controllers;

use App\Busraj;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BusrajController extends Controller
{
    public function getIndex()
    {
        return view('busraj.index');
    }

    public function getList()
    {
        Session::put('busraj_search', Input::has('ok') ? Input::get('search') : (Session::has('busraj_search') ? Session::get('busraj_search') : ''));
        Session::put('busraj_field', Input::has('field') ? Input::get('field') : (Session::has('busraj_field') ? Session::get('busraj_field') : 'name'));
        Session::put('busraj_sort', Input::has('sort') ? Input::get('sort') : (Session::has('busraj_sort') ? Session::get('busraj_sort') : 'asc'));
        $busrajs = Busraj::where('name', 'like', '%' . Session::get('busraj_search') . '%')
            ->orderBy(Session::get('busraj_field'), Session::get('busraj_sort'))->paginate(8);
        return view('busraj.list', ['busrajs' => $busrajs]);
    }

    public function getUpdate($id)
    {
        return view('busraj.update', ['busraj' => Busraj::find($id)]);
    }

    public function postUpdate($id)
    {
        $busraj = Busraj::find($id);
        $rules = ["unitprice" => "required|numeric"];
        if ($busraj->name != Input::get('name'))
            $rules += ['name' => 'required|unique:busrajs'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $busraj->name = Input::get('name');
        $busraj->BusrajCode = Input::get('BusrajCode');
        $busraj->unitprice = Input::get('unitprice');
        $busraj->save();
        return ['url' => 'busraj/list'];
    }

    public function getCreate()
    {
        return view('busraj.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "name" => "required|unique:busrajs",
            "BusrajCode" => "required|unique:busrajs",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $busraj = new Busraj();
        $busraj->name = Input::get('name');
        $busraj->BusrajCode = Input::get('BusrajCode');
        $busraj->unitprice = Input::get('unitprice');
        $busraj->save();
        return ['url' => 'busraj/list'];
    }

    public function getDelete($id)
    {
        Busraj::destroy($id);
        return Redirect('busraj/list');
    }

}