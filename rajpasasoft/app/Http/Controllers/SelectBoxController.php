<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\District;
use App\Management;
use App\Busraj;
use App\Seatbus;
class SelectBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getBookingSeats(Request $request){
        
        $app_id = $request->app_id;
        $app_key = $request->app_key;
        $bus_id = $request->bus_id;
        $seat1 = $request->seat1;
        $seat2 = $request->seat2;
        $seat3 = $request->seat3;

         if($app_id == '1234' && $app_key == "our_app_key"){
            
           DB::table('seatbuses')->where('bus_id', '=', $bus_id)
                                 ->update(
                                            [$seat1 => '1', $seat2 => '1', $seat3 => '1']
                                            
                                        );

                 $items = array('code' => '2000',
                        'message' => 'seccessful request',
                        'data' => 'booking_reference_token',
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
         $data = DB::table('busrajs')
            ->select('*')
            ->where('bus_id', $request->id)
            ->where('')
            ->get();

        return response()->json($data);
    }

    public function getBookedSeats(Request $request){
         $data = DB::table('busrajs')
            ->select('*')
            ->where('bus_id', $request->id)
            ->where('')
            ->get();

        return response()->json($data);
    }


    public function getManager(Request $request)
    {
        $data=DB::table('managements')
            ->select('*')
            ->where('company_id',$request->id)
            ->get();
        return response()->json($data);
    }

    public function getSchedule(Request $request)
    {
        $temp = $request->get('departure_place');
        $temp1 = $request->get('arrival_place');
        $date1 = $request->get('departure_date');
        $data = DB::table('busrajs')
            ->select('*')
            ->where('departure_place', $temp)
            ->where('arrival_place', $temp1)
            ->where('departure_date', $date1)
            ->get();
        return response()->json($data);
    }
}
