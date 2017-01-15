<?php
namespace App\Http\Controllers;

use App\Management;
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
        Session::put('management_field', Input::has('field') ? Input::get('field') : (Session::has('management_field') ? Session::get('management_field') : 'name'));
        Session::put('management_sort', Input::has('sort') ? Input::get('sort') : (Session::has('management_sort') ? Session::get('management_sort') : 'asc'));
        $managements = Management::where('name', 'like', '%' . Session::get('management_search') . '%')
            ->orderBy(Session::get('management_field'), Session::get('management_sort'))->paginate(8);
        return view('management.list', ['managements' => $managements]);
    }

    public function getUpdate($id)
    {
        return view('management.update', ['management' => Management::find($id)]);
    }

    public function postUpdate($id)
    {
        $management = Management::find($id);
        $rules = ["unitprice" => "required|numeric"];
        if ($management->name != Input::get('name'))
            $rules += ['name' => 'required|unique:managements'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $management->name = Input::get('name');
        $management->ManagementCode = Input::get('ManagementCode');
        $management->unitprice = Input::get('unitprice');
        $management->save();
        return ['url' => 'management/list'];
    }

    public function getCreate()
    {
        return view('management.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "name" => "required|unique:managements",
            "ManagementCode" => "required|unique:managements",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $management = new Management();
        $management->name = Input::get('name');
        $management->ManagementCode = Input::get('ManagementCode');
        $management->unitprice = Input::get('unitprice');
        $management->save();
        return ['url' => 'management/list'];
    }

    public function getDelete($id)
    {
        Management::destroy($id);
        return Redirect('management/list');
    }

}