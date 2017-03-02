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
}
