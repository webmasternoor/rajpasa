<?php
namespace App\Http\Controllers;

use App\Bookinghotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BookinghotelController extends Controller
{
    public function getIndex()
    {
        return view('bookinghotel.index');
    }

    public function getList()
    {
        Session::put('bookinghotel_search', Input::has('ok') ? Input::get('search') : (Session::has('bookinghotel_search') ? Session::get('bookinghotel_search') : ''));
        Session::put('bookinghotel_field', Input::has('field') ? Input::get('field') : (Session::has('bookinghotel_field') ? Session::get('bookinghotel_field') : 'name'));
        Session::put('bookinghotel_sort', Input::has('sort') ? Input::get('sort') : (Session::has('bookinghotel_sort') ? Session::get('bookinghotel_sort') : 'asc'));
        $bookinghotels = Bookinghotel::where('name', 'like', '%' . Session::get('bookinghotel_search') . '%')
            ->orderBy(Session::get('bookinghotel_field'), Session::get('bookinghotel_sort'))->paginate(8);
        return view('bookinghotel.list', ['bookinghotels' => $bookinghotels]);
    }

    public function getUpdate($id)
    {
        return view('bookinghotel.update', ['bookinghotel' => Bookinghotel::find($id)]);
    }

    public function postUpdate($id)
    {
        $bookinghotel = Bookinghotel::find($id);
        $rules = ["unitprice" => "required|numeric"];
        if ($bookinghotel->name != Input::get('name'))
            $rules += ['name' => 'required|unique:bookinghotels'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $bookinghotel->name = Input::get('name');
        $bookinghotel->BookinghotelCode = Input::get('BookinghotelCode');
        $bookinghotel->unitprice = Input::get('unitprice');
        $bookinghotel->company_id = Input::get('company_id');
        $bookinghotel->company_name = Input::get('company_name');
        $bookinghotel->company_email = Input::get('company_email');
        $bookinghotel->company_address = Input::get('company_address');
        $bookinghotel->company_license = Input::get('company_license');
        $bookinghotel->company_logo = Input::get('company_logo');
        
        $bookinghotel->save();
        return ['url' => 'bookinghotel/list'];
    }

    public function getCreate()
    {
        return view('bookinghotel.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "name" => "required|unique:bookinghotels",
            "BookinghotelCode" => "required|unique:bookinghotels",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $bookinghotel = new Bookinghotel();
        $bookinghotel->name = Input::get('name');
        $bookinghotel->BookinghotelCode = Input::get('BookinghotelCode');
        $bookinghotel->unitprice = Input::get('unitprice');
        $bookinghotel->company_id = Input::get('company_id');
        $bookinghotel->company_name = Input::get('company_name');
        $bookinghotel->company_email = Input::get('company_email');
        $bookinghotel->company_address = Input::get('company_address');
        $bookinghotel->company_license = Input::get('company_license');
        $bookinghotel->company_logo = Input::get('company_logo');
        $bookinghotel->save();
        return ['url' => 'bookinghotel/list'];
    }

    public function getDelete($id)
    {
        Bookinghotel::destroy($id);
        return Redirect('bookinghotel/list');
    }

}