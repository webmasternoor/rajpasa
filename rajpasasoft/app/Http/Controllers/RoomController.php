<?php
namespace App\Http\Controllers;

use App\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function getIndex()
    {
        return view('room.index');
    }

    public function getList()
    {
        Session::put('room_search', Input::has('ok') ? Input::get('search') : (Session::has('room_search') ? Session::get('room_search') : ''));
        Session::put('room_field', Input::has('field') ? Input::get('field') : (Session::has('room_field') ? Session::get('room_field') : 'name'));
        Session::put('room_sort', Input::has('sort') ? Input::get('sort') : (Session::has('room_sort') ? Session::get('room_sort') : 'asc'));
        $rooms = Room::where('name', 'like', '%' . Session::get('room_search') . '%')
            ->orderBy(Session::get('room_field'), Session::get('room_sort'))->paginate(8);
        return view('room.list', ['rooms' => $rooms]);
    }

    public function getUpdate($id)
    {
        return view('room.update', ['room' => Room::find($id)]);
    }

    public function postUpdate($id)
    {
        $room = Room::find($id);
        $rules = ["unitprice" => "required|numeric"];
        if ($room->name != Input::get('name'))
            $rules += ['name' => 'required|unique:rooms'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $room->name = Input::get('name');
        $room->RoomCode = Input::get('RoomCode');
        $room->unitprice = Input::get('unitprice');
        $room->save();
        return ['url' => 'room/list'];
    }

    public function getCreate()
    {
        return view('room.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "name" => "required|unique:rooms",
            "RoomCode" => "required|unique:rooms",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $room = new Room();
        $room->name = Input::get('name');
        $room->RoomCode = Input::get('RoomCode');
        $room->unitprice = Input::get('unitprice');
        $room->save();
        return ['url' => 'room/list'];
    }

    public function getDelete($id)
    {
        Room::destroy($id);
        return Redirect('room/list');
    }

}