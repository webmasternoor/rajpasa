<?php
namespace App\Http\Controllers;

use App\Busraj;
use DB;
use App\Seatbus;
use App\Busticket;
use App\District;
use App\Companyraj;
use App\Management;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BusrajController extends Controller
{
    public function getIndex()
    {
        return view('busraj.index');
    }

    public function getList()
    {
        Session::put('busraj_search', Input::has('ok') ? Input::get('search') : (Session::has('busraj_search') ? Session::get('busraj_search') : ''));
        Session::put('busraj_field', Input::has('field') ? Input::get('field') : (Session::has('busraj_field') ? Session::get('busraj_field') : 'bus_id'));
        Session::put('busraj_sort', Input::has('sort') ? Input::get('sort') : (Session::has('busraj_sort') ? Session::get('busraj_sort') : 'asc'));
        $busrajs = Busraj::where('id', 'like', '%' . Session::get('busraj_search') . '%')
            ->orderBy(Session::get('busraj_field'), Session::get('busraj_sort'))->paginate(8);
        return view('busraj.list', ['busrajs' => $busrajs]);
    }
    public function postList(Request $request){
        
        $departure = $request->get('departure');
        $arrival = $request->get('arrival');
        $busrajs = Busticket::where('departure_place','=', $departure)
                                ->where('arrival_place','=', $arrival)
                                ->orderBy(Session::get('busticket_field'), Session::get('busticket_sort'))->paginate(1);
                    // return response($bustickets);
            // return view('busticket.list', ['bustickets' => $bustickets]);
            if(Auth::guest()){
                return response($bustickets);
            }
            else{
                return view('busraj.list', ['busrajs' => $busrajs]);
            }
    }

    public function getListb()
    {
        /*Session::put('busraj_search2', Input::has('ok') ? Input::get('search2') : (Session::has('busraj_search2') ? Session::get('busraj_search2') : ''));*/
        /*Session::put('busraj_search3', Input::has('ok') ? Input::get('search3') : (Session::has('busraj_search3') ? Session::get('busraj_search3') : ''));
        Session::put('busraj_field', Input::has('field') ? Input::get('field') : (Session::has('busraj_field') ? Session::get('busraj_field') : 'bus_id'));
        Session::put('busraj_sort', Input::has('sort') ? Input::get('sort') : (Session::has('busraj_sort') ? Session::get('busraj_sort') : 'asc'));
        $busrajs = Busraj::where('bus_id', 'like', '%' . Session::get('busraj_search3') . '%')
            ->orderBy(Session::get('busraj_field'), Session::get('busraj_sort'))->paginate(8);
        return view('busraj.listb', ['busrajs' => $busrajs]);*/
        $busrajs = new Busraj();
        $a=Session::get('busraj_search2');
        $b=Session::get('busraj_search3');
        $busrajs = Busraj::where('bus_id', 'like', '%' . $a . '%')
            ->orderBy(Session::get('busraj_field'), Session::get('busraj_sort'))->paginate(8);
        //$busrajs = 'select * from busrajs'; 
        /*Busraj::where('bus_id', 'like', '%' . Session::get('busraj_search') . '%')
            ->orderBy(Session::get('busraj_field'), Session::get('busraj_sort'))->paginate(8);*/
        return view('busraj.listb', ['busrajs' => $busrajs]);
        //echo $busrajs->bus_id1 = Input::get('s1');
        //echo $busrajs->bus_id2 = Input::get('s2');
        //return view('busraj.listb', ['busraj12' => Busraj::find($busrajs->bus_id1)]);
        //exit();
    }

    public function getViewseats($id)
    {
        $temp = $id;
        //$total_seat = Busraj::where('total_seat', $id);
        $seat_info = Seatbus::where('bus_id', $id);
        //$tt = Seatbus::table('seatbuses')->get();        
        //$seat_info = Seatbus::where('id', $id);
        
        return view('busraj.viewseats', ['busraj' => Busraj::find($id)])->with('seat_info', $seat_info)->with('temp', $temp)/*->with('total_seat', $total_seat)*/;
    }

    public function getUpdate($id)
    {
        $company_info = Companyraj::lists('company_name', 'id');
        $manager_info = Management::lists('user_id', 'id');
        $district_info = District::lists('name', 'id');
        return view('busraj.update', ['busraj' => Busraj::find($id)])->with('manager_info', $manager_info)->with('district_info', $district_info)->with('company_info', $company_info);
    }

    public function postUpdate($id)
    {
        $busraj = Busraj::find($id);
        /*$rules = ["unitprice" => "required|numeric"];
        if ($busraj->name != Input::get('name'))
            $rules += ['name' => 'required|unique:busrajs'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/

        $busraj = new Busraj();
        $busraj->bus_id = Input::get('bus_id');
        $busraj->company_id = Input::get('company_id');
        $busraj->manager_id = Input::get('manager_id');
        $busraj->departure_time = Input::get('departure_time');
        $busraj->departure_date = Input::get('departure_date');
        $busraj->arrival_date = Input::get('arrival_date');
        $busraj->arrival_time = Input::get('arrival_time');
        $busraj->departure_place = Input::get('departure_place');
        $busraj->arrival_place = Input::get('arrival_place');
        $busraj->bus_type = Input::get('bus_type');
        $busraj->total_seat = Input::get('total_seat');
        $busraj->seat_fare = Input::get('seat_fare');
        $busraj->facility = Input::get('facility');
        $busraj->save();
        
        $SeatCount = Input::get('total_seat');
        $busraj12 = new Seatbus();
        $busraj12->bus_id = Input::get('bus_id');
        $busraj12->company_id = Input::get('company_id');
        $busraj12->manager_id = Input::get('manager_id');

        for($i=1; $i<=$SeatCount; $i++){
            $busraj12->$i = '0';
            $busraj12->save();    
        }
        
        return ['url' => 'busraj/list'];
        /*
        $busraj = new Busraj();
        $busraj->bus_id = Input::get('bus_id');
        $busraj->company_id = Input::get('company_id');
        $busraj->manager_id = Input::get('manager_id');
        $busraj->departure_time = Input::get('departure_time');
        $busraj->departure_date = Input::get('departure_date');
        $busraj->arrival_date = Input::get('arrival_date');
        $busraj->arrival_time = Input::get('arrival_time');
        $busraj->departure_place = Input::get('departure_place');
        $busraj->arrival_place = Input::get('arrival_place');
        $busraj->bus_type = Input::get('bus_type');
        $busraj->total_seat = Input::get('total_seat');
        $busraj->seat_fare = Input::get('seat_fare');
        $busraj->facility = Input::get('facility');
        $busraj->save();
        
        $SeatCount = Input::get('total_seat');
        $busraj12 = new Seatbus();
        $busraj12->bus_id = Input::get('bus_id');
        $busraj12->company_id = Input::get('company_id');
        $busraj12->manager_id = Input::get('manager_id');

        for($i=1; $i<=$SeatCount; $i++){
            $busraj12->$i = '0';
            $busraj12->save();    
        }
        
        return ['url' => 'busraj/list'];*/
    }

    public function getCreate()
    {
        
        $company_info = Companyraj::lists('company_name', 'id');
        $manager_info = Management::lists('user_id', 'id');
        $district_info = District::lists('name', 'id');
        return view('busraj.create')->with('manager_info', $manager_info)->with('district_info', $district_info)->with('company_info', $company_info);
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            //"name" => "required|unique:busrajs",
            //"BusrajCode" => "required|unique:busrajs",
            //"unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $busraj = new Busraj();
        $busraj->bus_id = Input::get('bus_id');
        $busraj->company_id = Input::get('company_id');
        $busraj->manager_id = Input::get('manager_id');
        $busraj->departure_time = Input::get('departure_time');
        $busraj->departure_date = Input::get('departure_date');
        $busraj->arrival_date = Input::get('arrival_date');
        $busraj->arrival_time = Input::get('arrival_time');
        $busraj->departure_place = Input::get('departure_place');
        $busraj->arrival_place = Input::get('arrival_place');
        $busraj->bus_type = Input::get('bus_type');
        $busraj->total_seat = Input::get('total_seat');
        $busraj->seat_fare = Input::get('seat_fare');
        $busraj->facility = Input::get('facility');
        $busraj->save();
        
        $SeatCount = Input::get('total_seat');
        $busraj12 = new Seatbus();
        $busraj12->bus_id = Input::get('bus_id');
        $busraj12->company_id = Input::get('company_id');
        $busraj12->manager_id = Input::get('manager_id');

        for($i=1; $i<=$SeatCount; $i++){
            $busraj12->$i = '0';
            $busraj12->save();    
        }
        
        return ['url' => 'busraj/list'];
    }

    public function getDelete($id)
    {
        Busraj::destroy($id);
        return Redirect('busraj/list');
    }

}