<?php
namespace App\Http\Controllers;

use App\Seatavailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SeatavailableController extends Controller
{
    public function getIndex()
    {
        return view('seatavailable.index');
    }

    public function getList()
    {
        Session::put('seatavailable_search', Input::has('ok') ? Input::get('search') : (Session::has('seatavailable_search') ? Session::get('seatavailable_search') : ''));
        Session::put('seatavailable_field', Input::has('field') ? Input::get('field') : (Session::has('seatavailable_field') ? Session::get('seatavailable_field') : 'name'));
        Session::put('seatavailable_sort', Input::has('sort') ? Input::get('sort') : (Session::has('seatavailable_sort') ? Session::get('seatavailable_sort') : 'asc'));
        $seatavailables = Seatavailable::where('name', 'like', '%' . Session::get('seatavailable_search') . '%')
            ->orderBy(Session::get('seatavailable_field'), Session::get('seatavailable_sort'))->paginate(8);
        return view('seatavailable.list', ['seatavailables' => $seatavailables]);
    }

    public function getUpdate($id)
    {
        return view('seatavailable.update', ['seatavailable' => Seatavailable::find($id)]);
    }

    public function postUpdate($id)
    {
        $seatavailable = Seatavailable::find($id);
        $rules = ["unitprice" => "required|numeric"];
        if ($seatavailable->name != Input::get('name'))
            $rules += ['name' => 'required|unique:seatavailables'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $seatavailable->name = Input::get('name');
        $seatavailable->SeatavailableCode = Input::get('SeatavailableCode');
        $seatavailable->unitprice = Input::get('unitprice');
        $seatavailable->save();
        return ['url' => 'seatavailable/list'];
    }

    public function getCreate()
    {
        return view('seatavailable.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "name" => "required|unique:seatavailables",
            "SeatavailableCode" => "required|unique:seatavailables",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $seatavailable = new Seatavailable();
        $seatavailable->name = Input::get('name');
        $seatavailable->SeatavailableCode = Input::get('SeatavailableCode');
        $seatavailable->unitprice = Input::get('unitprice');
        $seatavailable->save();
        return ['url' => 'seatavailable/list'];
    }

    public function getDelete($id)
    {
        Seatavailable::destroy($id);
        return Redirect('seatavailable/list');
    }

}