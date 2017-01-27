<?php
namespace App\Http\Controllers;

use App\Bookingb;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BookingbController extends Controller
{
    public function getIndex()
    {
        return view('bookingb.index');
    }

    public function getList()
    {
        Session::put('bookingb_search', Input::has('ok') ? Input::get('search') : (Session::has('bookingb_search') ? Session::get('bookingb_search') : ''));
        Session::put('bookingb_field', Input::has('field') ? Input::get('field') : (Session::has('bookingb_field') ? Session::get('bookingb_field') : 'name'));
        Session::put('bookingb_sort', Input::has('sort') ? Input::get('sort') : (Session::has('bookingb_sort') ? Session::get('bookingb_sort') : 'asc'));
        $bookingbs = Bookingb::where('name', 'like', '%' . Session::get('bookingb_search') . '%')
            ->orderBy(Session::get('bookingb_field'), Session::get('bookingb_sort'))->paginate(8);
        return view('bookingb.list', ['bookingbs' => $bookingbs]);
    }

    public function getUpdate($id)
    {
        return view('bookingb.update', ['bookingb' => Bookingb::find($id)]);
    }

    public function postUpdate($id)
    {
        $bookingb = Bookingb::find($id);
        $rules = ["unitprice" => "required|numeric"];
        if ($bookingb->name != Input::get('name'))
            $rules += ['name' => 'required|unique:bookingbs'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $bookingb->name = Input::get('name');
        $bookingb->BookingbCode = Input::get('BookingbCode');
        $bookingb->unitprice = Input::get('unitprice');
        $bookingb->company_id = Input::get('company_id');
        $bookingb->company_name = Input::get('company_name');
        $bookingb->company_email = Input::get('company_email');
        $bookingb->company_address = Input::get('company_address');
        $bookingb->company_license = Input::get('company_license');
        $bookingb->company_logo = Input::get('company_logo');
        
        $bookingb->save();
        return ['url' => 'bookingb/list'];
    }

    public function getCreate()
    {
        return view('bookingb.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "name" => "required|unique:bookingbs",
            "BookingbCode" => "required|unique:bookingbs",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $bookingb = new Bookingb();
        $bookingb->name = Input::get('name');
        $bookingb->BookingbCode = Input::get('BookingbCode');
        $bookingb->unitprice = Input::get('unitprice');
        $bookingb->company_id = Input::get('company_id');
        $bookingb->company_name = Input::get('company_name');
        $bookingb->company_email = Input::get('company_email');
        $bookingb->company_address = Input::get('company_address');
        $bookingb->company_license = Input::get('company_license');
        $bookingb->company_logo = Input::get('company_logo');
        $bookingb->save();
        return ['url' => 'bookingb/list'];
    }

    public function getDelete($id)
    {
        Bookingb::destroy($id);
        return Redirect('bookingb/list');
    }

}