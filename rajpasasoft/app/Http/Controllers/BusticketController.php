<?php
namespace App\Http\Controllers;

use App\Busticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class BusticketController extends Controller
{
    public function getIndex()
    {

        return view('busticket.index');

    }

    public function getList()
    {

        Session::put('busticket_search', Input::has('ok') ? Input::get('search') : (Session::has('busticket_search') ? Session::get('busticket_search') : ''));

        // Session::put('busticket_search1', Input::has('ok') ? Input::get('search1') : (Session::has('busticket_search1') ? Session::get('busticket_search1') : ''));

        Session::put('busticket_field', Input::has('field') ? Input::get('field') : (Session::has('busticket_field') ? Session::get('busticket_field') : 'bus_id'));

        Session::put('busticket_sort', Input::has('sort') ? Input::get('sort') : (Session::has('busticket_sort') ? Session::get('busticket_sort') : 'asc'));

        // $bustickets = Busticket::where('departure_place', 'like', '%' . Session::get('busticket_search') . '%') 
            $bustickets = Busticket::where('bus_id', 'like', '%' . Session::get('busticket_search') . '%') 
            ->orderBy(Session::get('busticket_field'), Session::get('busticket_sort'))->paginate(10);
            
        return view('busticket.list', ['bustickets' => $bustickets]);

        
       

    }

    // public function post(Request $request)
    // {
    //     $app_id = $request->input('departure');
    //     $app_key = $request->input('arrival');

    //   echo $app_id. " ". $app_key;
    //   exit();
    //     // $mines = DB::select('select * from mines where minid = ?', [1]);
    //     // return response()->json(
    //     //         $mines->mineid,
    //     //         $mines->nickname
    //     //     );

    //     $mines = DB::select('select * from mines where mineid = ?', [1]);
    //     foreach ($mines as $mine) {
    //       echo $mine->minename;
    //       echo $mine->nickname;
    //     }    
    // }


    public function postList(Request $request){
         
        $departure = $request->get('departure');
        $arrival = $request->get('arrival');

        
         
        // echo $departure = Input::get('departure');
        // echo $arrival = Input::get('arrival');

        
        $bustickets = Busticket::where('departure_place','=', $departure)
                                ->where('arrival_place','=', $arrival)
                                ->orderBy(Session::get('busticket_field'), Session::get('busticket_sort'))->paginate(1);
                    // return response($bustickets);
            // return view('busticket.list', ['bustickets' => $bustickets]);
            if(Auth::guest()){
                return response($bustickets);
            }
            else
                return view('busticket.list', ['bustickets' => $bustickets]);
    }

    // public function getUpdate($id)
    // {
    //     return view('busticket.update', ['busticket' => Busticket::find($id)]);
    // }

    // public function postUpdate($id)
    // {
    //     $busticket = Busticket::find($id);
    //     $busticket-> bus_id = Input::get('bus_id');
    //     $busticket-> company_id = Input::get('company_id');
    //     $busticket-> departure_time = Input::get('departure_time');
    //     $busticket-> arrival_time = Input::get('arrival_time');
    //     $busticket-> departure_place = Input::get('departure_place');
    //     $busticket-> arrival_place = Input::get('arrival_place');
    //     $busticket-> bus_type = Input::get('bus_type');
    //     $busticket-> total_seat = Input::get('total_seat');
    //     $busticket-> available_seat = Input::get('available_seat');
    //     $busticket-> seat_fare = Input::get('seat_fare');
    //     $busticket-> facility = Input::get('facility');
    //     $busticket-> save();
    //     return ['url' => 'busticket/list'];
    // }

    // public function getCreate()
    // {
    //     return view('busticket.create');
    // }

    // public function postCreate()
    // {
        
      
        // $busticket = new Busticket();

        // $busticket-> bus_id = Input::get('bus_id');
        
        // $busticket-> company_id = Input::get('company_id');
        // $busticket-> departure_time = Input::get('departure_time');
        // $busticket-> arrival_time = Input::get('arrival_time');
        // $busticket-> departure_place = Input::get('departure_place');

        // $busticket-> arrival_place = Input::get('arrival_place');
        // $busticket-> bus_type = Input::get('bus_type');
        // $busticket-> total_seat = Input::get('total_seat');
        // $busticket-> available_seat = Input::get('available_seat');
        // $busticket-> seat_fare = Input::get('seat_fare');
        // $busticket-> facility = Input::get('facility');

        // $busticket->save();
       
        // return ['url' => 'busticket/list'];

    //     $busticket = new Busticket();
    //     $busticket->departure_place = Input::get('departure_place');
    //     $busticket->arrival_place = Input::get('arrival_place');
    //     $busticket->save();
    //     return view('busticket.list', ['bustickets' => $bustickets]);

    //     $bustickets = Busticket::where('departure_place', '=', '1', 'and', 'arrival_place', '=', '1')
    //         ->orderBy(Session::get('busticket_field'), Session::get('busticket_sort'))->paginate(10);

            
      
    // }

    // public function getDelete($id)
    // {
    //     Busticket::destroy($id);
    //     return Redirect('busticket/list');
    // }

}