<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\District;
use App\Management;
class SelectBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        $datetest = '2017-05-03';
        $temp = $request->get('id');
        $temp1 = $request->get('id1');
        $data = DB::table('busrajs')
            ->select('*')
            ->where('departure_place', $temp)
            ->where('arrival_place', $temp1)
            //->where('Date', $datetest)
            ->get();
        return response()->json($data);
    }
}
