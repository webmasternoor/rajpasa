<?php
namespace App\Http\Controllers;

use App\Busticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BusticketController extends Controller
{
    public function getIndex()
    {

        return view('busticket.index');

    }

    public function getList()
    {

        Session::put('busticket_search', Input::has('ok') ? Input::get('search') : (Session::has('busticket_search') ? Session::get('busticket_search') : ''));

        Session::put('busticket_field', Input::has('field') ? Input::get('field') : (Session::has('busticket_field') ? Session::get('busticket_field') : 'bus_id'));

        Session::put('busticket_sort', Input::has('sort') ? Input::get('sort') : (Session::has('busticket_sort') ? Session::get('busticket_sort') : 'asc'));
        // echo "shishir";
        // exit();
        $bustickets = Busticket::where('bus_id', 'like', '%' . Session::get('busticket_search') . '%') 
            ->orderBy(Session::get('busticket_field'), Session::get('busticket_sort'))->paginate(10);
            // foreach ($bustickets as $key => $busticket) {
            //     # code...
            //     echo $busticket->departure_time;
            // }
            // exit();
        return view('busticket.list', ['bustickets' => $bustickets]);

    }

    public function getUpdate($id)
    {
        return view('busticket.update', ['busticket' => Busticket::find($id)]);
    }

    public function postUpdate($id)
    {
        $busticket = Busticket::find($id);
        $busticket-> bus_id = Input::get('bus_id');
        $busticket-> company_id = Input::get('company_id');
        $busticket-> departure_time = Input::get('departure_time');
        $busticket-> arrival_time = Input::get('arrival_time');
        $busticket-> departure_place = Input::get('departure_place');
        $busticket-> arrival_place = Input::get('arrival_place');
        $busticket-> bus_type = Input::get('bus_type');
        $busticket-> total_seat = Input::get('total_seat');
        $busticket-> available_seat = Input::get('available_seat');
        $busticket-> seat_fare = Input::get('seat_fare');
        $busticket-> facility = Input::get('facility');
        $busticket->save();
        return ['url' => 'busticket/list'];
    }

    public function getCreate()
    {
        return view('busticket.create');
    }

    public function postCreate()
    {
       
        // echo "shishir";
        // exit();
        $busticket = new Busticket();
        $busticket-> bus_id = Input::get('bus_id');
        $busticket-> company_id = Input::get('company_id');
        $busticket-> departure_time = Input::get('departure_time');
        $busticket-> arrival_time = Input::get('arrival_time');
        $busticket-> departure_place = Input::get('departure_place');
        $busticket-> arrival_place = Input::get('arrival_place');
        $busticket-> bus_type = Input::get('bus_type');
        $busticket-> total_seat = Input::get('total_seat');
        $busticket-> available_seat = Input::get('available_seat');
        $busticket-> seat_fare = Input::get('seat_fare');
        $busticket-> facility = Input::get('facility');
        $busticket->save();
        return ['url' => 'busticket/list'];
        // echo "shishir";
        // exit();
    }

    public function getDelete($id)
    {
        Busticket::destroy($id);
        return Redirect('busticket/list');
    }

}