<?php
namespace App\Http\Controllers;

use App\Division;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DivisionController extends Controller
{
    public function getIndex()
    {
        return view('division.index');
    }

    public function getList()
    {
        Session::put('division_search', Input::has('ok') ? Input::get('search') : (Session::has('division_search') ? Session::get('division_search') : ''));
        Session::put('division_field', Input::has('field') ? Input::get('field') : (Session::has('division_field') ? Session::get('division_field') : 'name'));
        Session::put('division_sort', Input::has('sort') ? Input::get('sort') : (Session::has('division_sort') ? Session::get('division_sort') : 'asc'));
        $divisions = Division::where('name', 'like', '%' . Session::get('division_search') . '%')
            ->orderBy(Session::get('division_field'), Session::get('division_sort'))->paginate(8);
        return view('division.list', ['divisions' => $divisions]);
    }

    public function getUpdate($id)
    {
        return view('division.update', ['division' => Division::find($id)]);
    }

    public function postUpdate($id)
    {
        $division = Division::find($id);
        /*$rules = ["unitprice" => "required|numeric"];
        if ($division->name != Input::get('name'))
            $rules += ['name' => 'required|unique:divisions'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $division->name = Input::get('name');
        $division->bn_name = Input::get('bn_name');        
        $division->save();
        return ['url' => 'division/list'];
    }

    public function getCreate()
    {
        return view('division.create');
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "name" => "required|unique:divisions",
            "DivisionCode" => "required|unique:divisions",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $division = new Division();
        $division->name = Input::get('name');
        $division->bn_name = Input::get('bn_name');
        $division->save();
        return ['url' => 'division/list'];
    }

    public function getDelete($id)
    {
        Division::destroy($id);
        return Redirect('division/list');
    }

}