<?php
namespace App\Http\Controllers;

use App\Busticket;
use App\Seatbus;
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


        Session::put('busticket_field', Input::has('field') ? Input::get('field') : (Session::has('busticket_field') ? Session::get('busticket_field') : 'bus_id'));

        Session::put('busticket_sort', Input::has('sort') ? Input::get('sort') : (Session::has('busticket_sort') ? Session::get('busticket_sort') : 'asc'));

            $bustickets = Busticket::where('bus_id', 'like', '%' . Session::get('busticket_search') . '%') 
            ->orderBy(Session::get('busticket_field'), Session::get('busticket_sort'))->paginate(10);
            
        return view('busticket.list', ['bustickets' => $bustickets]);

        
       

    }
    // $data =json_decode( $request->json()->all());
            // echo ($data);$request->json()->all();
         // $data = $request->all();
         // print_r($data);
         // $mine = json_decode($data, 1);
         // print_r($mine);
         // $area = json_decode($request, true);

           // foreach ($data as $mine)
           //      {
           //       print_r($mine); // this is your area from json response
           //       echo $app_id = $mine['app_id'];
           //          echo $app_key = $mine['app_key'];
           //          echo $departure = $mine['data["bus_source"]'];
           //          echo $arrival = $mine('data["bus_destination"]');
           //      }
    // public function apiResponse(Request $request){
    //     $data = $request->all();
    //     print_r($data);
    //     $app_id = $request->get('app_id');
    //     // $app_key = $data->keyBy('app_key');
    //     // $app_id = $request->json()->get($data['app_id']);
    //     $app_key = $request->input('app_key');
    //     $departure = $request->input('bus_source');
    //     $arrival = $request->input('bus_destination');
    //     /*$departure = 1;
    //     $arrival = 1;*/

    //     $bustickets = Busticket::where('departure_place', '=', $departure)
    //                             ->where('arrival_place', '=', $arrival)
    //                             ->get();

    //     if($app_id == '1234' && $app_key == "our_app_key"){
    //              $items = array('code' => '2000',
    //                     'message' => 'seccessful request',
    //                     'data' => $bustickets,
    //                      );
    //                 return json_encode($items);
    //     }
    //     else {
    //         $items = array('code' => '4000',
    //                     'message' => 'failed request',
    //                     'data' => 'Invalid user request',
    //                     'app_key' => $app_key,
    //                     'app_id' => $app_id,
    //                      );
    //                 return json_encode($items);
    //     }
      
       

    // }
    public function seatDetails(Request $request){
        
        $app_id = $request->input('app_id');
        $app_key = $request->input('app_key');
        $bus_id = $request->input('bus_id');
        
        
        $seatbuses = Seatbus::where('bus_id', '=', $bus_id)
                                ->get();

        if($app_id == '1234' && $app_key == "our_app_key"){
                 $items = array('code' => '2000',
                        'message' => 'seccessful request',
                        'data' => $seatbuses,
                         );
                    return json_encode($items);
        }
        else {
            $items = array('code' => '4000',
                        'message' => 'failed request',
                        'error' => ['Invalid user request'],
                         );
                    return json_encode($items);
        }
      
       

    }

    public function apiResponse(Request $request){
        
        $app_id = $request->input('app_id');
        $app_key = $request->input('app_key');
        $departure = $request->input('bus_source');
        $arrival = $request->input('bus_destination');
        
        $bustickets = Busticket::where('departure_place', '=', $departure)
                                ->where('arrival_place', '=', $arrival)
                                ->get();

        if($app_id == '1234' && $app_key == "our_app_key"){
                 $items = array('resp'=>['code' => '2000',
                        'message' => 'seccessful request'],
                        'data' => $bustickets,
                         );
                    return json_encode($items);
        }
        else {
            $items = array('code' => '4000',
                        'message' => 'failed request',
                        'error' => ['Invalid user request'],
                         );
                    return json_encode($items);
        }
      
       

    }

    public function postList(Request $request){
         
        $departure = $request->get('departure');
        $arrival = $request->get('arrival');

        
        $bustickets = Busticket::where('departure_place','=', $departure)
                                ->where('arrival_place','=', $arrival)
                                ->orderBy(Session::get('busticket_field'), Session::get('busticket_sort'))->paginate(1);
                    
            if(Auth::guest()){
                return response($bustickets);
            }
            else
                return view('busticket.listview', ['bustickets' => $bustickets]);
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