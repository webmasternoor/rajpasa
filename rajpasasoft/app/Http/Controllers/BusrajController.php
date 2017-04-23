<?php
namespace App\Http\Controllers;


use App\Busraj;
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
        $district_info = District::lists('name', 'id');
        //echo $temparrival = Input::get('arrival_place');
        //echo $temparrival = $_GET['arrival_place'];
        //echo $temparrival = "<script>document.writeln(temparrival);</script>";
        /*$temparrival = "<script>document.writeln(arrival_place);</script>"; echo $temparrival;*/
        //echo $temparrival = $_GET['arrival_place'];
        /*if($_GET['arrival_place']){
            $busrajs = Busraj::where('id', 'like', '%' . Session::get('busraj_search') . '%')
            ->orderBy(Session::get('busraj_field'), Session::get('busraj_sort'))->paginate(8);    
        }
        else{                
            $busrajs = Busraj::where('arrival_place', $temparrival)->paginate(8);
        }*/
        echo $tempdeparture = Input::get('departure_place');
        /*echo $tempdeparture = Input::get('departure_place');
        if($temparrival){
            
        }else{
            
        }*/
        $busrajs = Busraj::where('id', 'like', '%' . Session::get('busraj_search') . '%')
            ->orderBy(Session::get('busraj_field'), Session::get('busraj_sort'))->paginate(8);    
        return view('busraj.list', ['busrajs' => $busrajs])->with('district_info', $district_info)->with('tempdeparture', $tempdeparture);
        
    }

    public function getSuccess(){
        
            return view('busraj.success');
        
    }

    public function getSuccess1(){
        
            return view('busraj.success1');
        
    }
    public function getFail(){
        return view('busraj.fail');
    }
    public function getCancel(){
        return view('busraj.cancel');
    }

    /*public function postList()
    {
        $busrajs32 = new Busraj();
        echo $tempdeparture = Input::get('departure');        
        echo $temparrival = Input::get('arrival');
        $busrajs32 = Busraj::where('id', $tempdeparture)->paginate(8);
        return view('busraj.list', ['busrajs' => $busrajs32])->with('tempdeparture', $tempdeparture);
    }*/

    /*public function getBussearch()
    {
        return view('busraj.bussearch');
    }
    public function postBussearch()
    {
        $busrajs32 = new Busraj();
        echo $tempdeparture = Input::get('departure');        
        echo $temparrival = Input::get('arrival');
        $busrajs32 = Busraj::where('id', $tempdeparture)->paginate(8);
        return view('busraj.list');
    }*/

    public function getBussearch()
    {
        $district_info = District::lists('name', 'id');
        return view('busraj.bussearch')->with('district_info', $district_info);

        
    }

    public function postBussearch()
    {
        $busraj = new Busraj();
        $district_info = District::lists('name', 'id');
        $tempdeparture = Input::get('departure_place');
        $temparrival = Input::get('arrival_place');
        $tempdeparture_date = Input::get('departure_date');
        
        $busrajs34 = Busraj::where('departure_place', $tempdeparture)->where('arrival_place', $temparrival)->where('departure_date', $tempdeparture_date)->paginate(8);
        $this->getList($busrajs34);
        echo "string";
        
         return view('busraj.listbus', ['busrajs' => $busrajs34])->with('tempdeparture', $tempdeparture)->with('district_info', $district_info);
    }
    public function postList(){
        //echo "tt";
        $district_info = District::lists('name', 'id');
        echo $tempdeparture = Input::get('departure_place');
        echo $temparrival = Input::get('arrival_place');
        $busrajs = Busraj::where('departure_place', $tempdeparture)->where('arrival_place', $temparrival)->get();
        return view('busraj.listbus', ['busrajs' => $busrajs])->with('district_info', $district_info);
        //echo $this->getList($busrajs34);
        //exit();
    }
//return view('busraj.bussearchlist', ['busrajs34' => $busrajs34]);
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
        //$seat_info = Seatbus::where('bus_id', $id);
        $district_info = District::lists('name', 'id');
        //$tt = Seatbus::table('seatbuses')->get();        
        $seat_info = Seatbus::where('bus_id', $temp)->get();
        //exit();

        //return view('busraj.viewseats', ['busraj' => Busraj::find($id)])->with('seat_info', $seat_info)->with('temp', $temp)->with('district_info', $district_info);

        return view('busraj.viewseats')->with('seat_info', $seat_info);
        
    }

    public function postViewseats($id)
    {
        $temp = $id;
        $seatbuses = new Seatbus();
        echo $seatbuses = Input::get('Result');
        $ttemp = explode(',', $seatbuses);
         foreach($ttemp as $ewew) {
         echo $ewew;
         $seatbuses->bus_type = '1';
         }
        $seatbuses->save();
        exit();
        

        //echo $aa = Input::get('total_fare');
        
        //$total_seat = Busraj::where('total_seat', $id);        
        
        $district_info = District::lists('name', 'id');
        
        //echo $id = $req->input('Result');
        //echo Session::get('Result');

        $customer = new Customer();
        $tt = $customer->bus_id = Input::get('bus_id');
        $customer->name = Input::get('name');
        $customer->customerid = rand(50000, 60000);
        $customer->gender = Input::get('gender');
        $customer->mobile = Input::get('mobile');        
        $customer->email = Input::get('email');
        $customer->paymentgat = Input::get('colorRadio');
        $customer->rajpasafee = Input::get('rajpasafee');
        $customer->processingfee = Input::get('processingfee');
        $customer->discount = Input::get('discount');
        $customer->quantity = Input::get('quantity');
        $customer->totalamount = Input::get('seat_fare') * Input::get('quantity');
        $customer->date12 = Input::get('date12');
        $customer->seatnumber = Input::get('Result');
        $customer->staffid = Input::get('staffid');

        $customer->city = Input::get('city');
        $customer->area = Input::get('area');
        $customer->firstname = Input::get('firstname');
        $customer->lastname = Input::get('lastname');
        $customer->address1 = Input::get('address1');
        $customer->address2 = Input::get('address2');
        $customer->landmark = Input::get('landmark');
        $customer->postalcode = Input::get('postalcode');
        $customer->altcontactno = Input::get('altcontactno');
        $customer->crdb_card = Input::get('crdb_card');
        $customer->intbank = Input::get('intbank');


        $customer->ticketprice = Input::get('seat_fare');
        $customer->bus_id = Input::get('bus_id');
        $customer->company_id = Input::get('company_id');
        $customer->departure_place = Input::get('departure_place');
        $customer->arrival_place = Input::get('arrival_place');
        $customer->departure_time = Input::get('departure_time');
        $customer->arrival_time = Input::get('arrival_time');
        $seat_info = Busraj::where('bus_id', $tt);
        /*
        foreach ($seat_info as $value) {
            $customer->ticketprice = $value->seat_fare;
            $customer->bus_id = $value->bus_id;
            $customer->company_id = $value->company_id;
            $customer->departure_place = $value->departure_place;
            $customer->arrival_place = $value->arrival_place;
            $customer->departure_time = $value->departure_time;
            $customer->arrival_time = $value->arrival_time;
        }*/
        $customer->save();

        $order = new Order();
        //$order->customerid = $customer->customerid;
        $order->customerid = $customer->customerid;
        $order->mobile = $customer->mobile;
        $order->date12 = '0';
        $order->staff_id = '0';
        $order->save();

        
        //$tt = Seatbus::table('seatbuses')->get();        
        //$seat_info = Seatbus::where('id', $id);
        
        return view('busraj.viewseats', ['busraj' => Busraj::find($id)])->with('seat_info', $seat_info)->with('temp', $temp)->with('district_info', $district_info);
        
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
        $busraj12->total_seat = Input::get('total_seat');
        $busraj12->seat_fare = Input::get('seat_fare');
        $busraj12->bus_type = Input::get('bus_type');

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