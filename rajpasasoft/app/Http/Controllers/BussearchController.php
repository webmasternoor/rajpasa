<?php
namespace App\Http\Controllers;

use App\Bussearch;
use App\Order;
use DB;
use App\Seatbus;
use App\Busticket;
use App\District;
use App\Companyraj;
use App\Management;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;


class BussearchController extends Controller
{
    public function getIndex()
    {
        return view('bussearch.index');
    }

    public function getList()
    {

        $departure = Input::get('departure_place');
        $arrival = Input::get('arrival_place');
        // Session::put('bussearch_search', Input::has('ok') ? Input::get('search') : (Session::has('bussearch_search') ? Session::get('bussearch_search') : ''));
        // Session::put('bussearch_field', Input::has('field') ? Input::get('field') : (Session::has('bussearch_field') ? Session::get('bussearch_field') : 'bus_id'));
        // Session::put('bussearch_sort', Input::has('sort') ? Input::get('sort') : (Session::has('bussearch_sort') ? Session::get('bussearch_sort') : 'asc'));
        if($departure == ''){
             $bussearches = Bussearch::where('id', 'like', '%' . Session::get('bussearch_search') . '%') 
            // ->orderBy(Session::get('bussearch_field'), Session::get('bussearch_sort'))
             ->paginate(10);
            
        return view('bussearch.list', ['bussearches' => $bussearches]);
        
        }
        else{
            $bussearches = Bussearch::where('departure_place', '=', $departure)
                        ->where('arrival_place', '=', $arrival)
            // ->orderBy(Session::get('bussearch_field'), Session::get('bussearch_sort'))
            ->paginate(8);
        
        return view('bussearch.list', ['bussearches' => $bussearches]);
        }
        
    }

    // public function getBussearch()
    // {
        

    //     $district_info = District::lists('name', 'id');
    //     return view('bussearch.bussearch')->with('district_info', $district_info);

        
    // }

    // public function postBussearch()
    // {
    //     $bussearch = new Bussearch();
    //     $district_info = District::lists('name', 'id');
    //     $tempdeparture = Input::get('departure_place');
    //     $temparrival = Input::get('arrival_place');
    //     $tempdeparture_date = Input::get('departure_date');
        
    //     $bussearchs34 = Bussearch::where('departure_place', $tempdeparture)->where('arrival_place', $temparrival)->where('departure_date', $tempdeparture_date)->paginate(8);
    //     $this->getList($bussearchs34);
    //      return view('bussearch.bussearchlist', ['bussearchs' => $bussearchs34])->with('tempdeparture', $tempdeparture);

    // }


    // public function getViewseats($id)
    // {
    //     $temp = $id;
       
    //     $seat_info = Seatbus::where('bus_id', $id);
    //     $district_info = District::lists('name', 'id');
       
        
    //     return view('bussearch.viewseats', ['bussearch' => Bussearch::find($id)])->with('seat_info', $seat_info)->with('temp', $temp)->with('district_info', $district_info);
    // }

    // public function postViewseats($id)
    // {
    //     echo $temp = $id;
       
    //     $district_info = District::lists('name', 'id');

    //     $customer = new Customer();
    //     $tt = $customer->bus_id = Input::get('bus_id');
    //     $customer->name = Input::get('name');
    //     $customer->customerid = rand(50000, 60000);
    //     $customer->gender = Input::get('gender');
    //     $customer->mobile = Input::get('mobile');        
    //     $customer->email = Input::get('email');
    //     $customer->paymentgat = Input::get('paymentgat');
    //     $customer->rajpasafee = Input::get('rajpasafee');
    //     $customer->processingfee = Input::get('processingfee');
    //     $customer->discount = Input::get('discount');
    //     $customer->quantity = Input::get('quantity');
    //     $customer->totalamount = Input::get('totalamount');
    //     $customer->date12 = Input::get('date12');
    //     $customer->seatnumber = Input::get('seatnumber');
    //     $customer->staffid = Input::get('staffid');

    //     $customer->ticketprice = Input::get('seat_fare');
    //     $customer->bus_id = Input::get('bus_id');
    //     $customer->company_id = Input::get('company_id');
    //     $customer->departure_place = Input::get('departure_place');
    //     $customer->arrival_place = Input::get('arrival_place');
    //     $customer->departure_time = Input::get('departure_time');
    //     $customer->arrival_time = Input::get('arrival_time');
    //     $seat_info = Bussearch::where('bus_id', $tt);
       
    //     $customer->save();

    //     $order = new Order();
    //     //$order->customerid = $customer->customerid;
    //     $order->customerid = $customer->customerid;
    //     $order->mobile = $customer->mobile;
    //     $order->date12 = '0';
    //     $order->staff_id = '0';
    //     $order->save();

        
    //     return view('bussearch.viewseats', ['bussearch' => Bussearch::find($id)])->with('seat_info', $seat_info)->with('temp', $temp)->with('district_info', $district_info);
        
    // }

    public function getUpdate($id)
    {
        $company_info = Companyraj::lists('company_name', 'id');
        $manager_info = Management::lists('user_id', 'id');
        $district_info = District::lists('name', 'id');
        return view('bussearch.update', ['bussearch' => Bussearch::find($id)])->with('manager_info', $manager_info)->with('district_info', $district_info)->with('company_info', $company_info);
    }

    public function postUpdate($id)
    {
        $bussearch = Bussearch::find($id);
        

        $bussearch = new Bussearch();
        $bussearch->bus_id = Input::get('bus_id');
        $bussearch->company_id = Input::get('company_id');
        $bussearch->manager_id = Input::get('manager_id');
        $bussearch->departure_time = Input::get('departure_time');
        $bussearch->departure_date = Input::get('departure_date');
        $bussearch->arrival_date = Input::get('arrival_date');
        $bussearch->arrival_time = Input::get('arrival_time');
        $bussearch->departure_place = Input::get('departure_place');
        $bussearch->arrival_place = Input::get('arrival_place');
        $bussearch->bus_type = Input::get('bus_type');
        $bussearch->total_seat = Input::get('total_seat');
        $bussearch->seat_fare = Input::get('seat_fare');
        $bussearch->facility = Input::get('facility');
        $bussearch->save();
        
        $SeatCount = Input::get('total_seat');
        $bussearch12 = new Seatbus();
        $bussearch12->bus_id = Input::get('bus_id');
        $bussearch12->company_id = Input::get('company_id');
        $bussearch12->manager_id = Input::get('manager_id');

        for($i=1; $i<=$SeatCount; $i++){
            $bussearch12->$i = '0';
            $bussearch12->save();    
        }
        
        return ['url' => 'bussearch/list'];
      
    }

    public function getCreate()
    {
        $company_info = Companyraj::lists('company_name', 'id');
        $manager_info = Management::lists('user_id', 'id');
        $district_info = District::lists('name', 'id');
        return view('bussearch.create')->with('manager_info', $manager_info)->with('district_info', $district_info)->with('company_info', $company_info);
    }

    public function postCreate()
    {
       
        $bussearch = new Bussearch();
        $bussearch->bus_id = Input::get('bus_id');
        $bussearch->company_id = Input::get('company_id');
        $bussearch->manager_id = Input::get('manager_id');
        $bussearch->departure_time = Input::get('departure_time');
        $bussearch->departure_date = Input::get('departure_date');
        $bussearch->arrival_date = Input::get('arrival_date');
        $bussearch->arrival_time = Input::get('arrival_time');
        $bussearch->departure_place = Input::get('departure_place');
        $bussearch->arrival_place = Input::get('arrival_place');
        $bussearch->bus_type = Input::get('bus_type');
        $bussearch->total_seat = Input::get('total_seat');
        $bussearch->seat_fare = Input::get('seat_fare');
        $bussearch->facility = Input::get('facility');
        $bussearch->save();
        
        $SeatCount = Input::get('total_seat');
        $bussearch12 = new Seatbus();
        $bussearch12->bus_id = Input::get('bus_id');
        $bussearch12->company_id = Input::get('company_id');
        $bussearch12->manager_id = Input::get('manager_id');

        for($i=1; $i<=$SeatCount; $i++){
            $bussearch12->$i = '0';
            $bussearch12->save();    
        }
        
        return ['url' => 'bussearch/list'];
    }

    public function getDelete($id)
    {
        Bussearch::destroy($id);
        return Redirect('bussearch/list');
    }

}