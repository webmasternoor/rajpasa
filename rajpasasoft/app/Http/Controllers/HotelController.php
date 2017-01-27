<?php
namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    public function getIndex()
    {
        return view('hotel.index');
    }

    public function getList()
    {
        Session::put('hotel_search', Input::has('ok') ? Input::get('search') : (Session::has('hotel_search') ? Session::get('hotel_search') : ''));
        Session::put('hotel_field', Input::has('field') ? Input::get('field') : (Session::has('hotel_field') ? Session::get('hotel_field') : 'hotel_name'));
        Session::put('hotel_sort', Input::has('sort') ? Input::get('sort') : (Session::has('hotel_sort') ? Session::get('hotel_sort') : 'asc'));
        $hotels = Hotel::where('hotel_name', 'like', '%' . Session::get('hotel_search') . '%')
            ->orderBy(Session::get('hotel_field'), Session::get('hotel_sort'))->paginate(8);
        return view('hotel.list', ['hotels' => $hotels]);
    }

    public function getUpdate($id)
    {
        return view('hotel.update', ['hotel' => Hotel::find($id)]);
    }

    public function postUpdate($id)
    {
        $hotel = Hotel::find($id);
        //$rules = ["unitprice" => "required|numeric"];
        /*if ($hotel->name != Input::get('name'))
            $rules += ['name' => 'required|unique:hotels'];*/
        //$validator = Validator::make(Input::all(), $rules);
        /*if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $hotel->hotel_id = Input::get('hotel_id');
        $hotel->hotel_name = Input::get('hotel_name');
        $hotel->company_id = Input::get('company_id');
        $hotel->address = Input::get('address');
        $hotel->email = Input::get('email');
        $hotel->phone = Input::get('phone');
        $hotel->total_room = Input::get('total_room');
        $hotel->facility = Input::get('facility');
        $hotel->save();
        return ['url' => 'hotel/list'];
    }

    public function getCreate()
    {
        return view('hotel.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            //"name" => "required|unique:hotels",
            //"HotelCode" => "required|unique:hotels",
            //"unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $hotel = new Hotel();
        $hotel->hotel_id = Input::get('hotel_id');
        $hotel->hotel_name = Input::get('hotel_name');
        $hotel->company_id = Input::get('company_id');
        $hotel->address = Input::get('address');
        $hotel->email = Input::get('email');
        $hotel->phone = Input::get('phone');
        $hotel->total_room = Input::get('total_room');
        $hotel->facility = Input::get('facility');
        $hotel->save();
        return ['url' => 'hotel/list'];
    }

    public function getDelete($id)
    {
        Hotel::destroy($id);
        return Redirect('hotel/list');
    }

}