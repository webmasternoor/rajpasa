<?php
namespace App\Http\Controllers;

use App\Share;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ShareController extends Controller
{
    public function getIndex()
    {

        return view('share.index');

    }

    public function getList()
    {

        Session::put('share_search', Input::has('ok') ? Input::get('search') : (Session::has('share_search') ? Session::get('share_search') : ''));

        Session::put('share_field', Input::has('field') ? Input::get('field') : (Session::has('share_field') ? Session::get('share_field') : 'member_name'));

        Session::put('share_sort', Input::has('sort') ? Input::get('sort') : (Session::has('share_sort') ? Session::get('share_sort') : 'asc'));

        $shares = Share::where('created_at', 'like', '%' . Session::get('share_search') . '%') 
            ->orderBy(Session::get('share_field'), Session::get('share_sort'))->paginate(10);
            // foreach ($shares as $key => $share) {
            //     # code...
            //     echo $share->member_name;
            // }
            // exit();
        return view('share.list', ['shares' => $shares]);

    }

    public function getUpdate($id)
    {
        return view('share.update', ['share' => Share::find($id)]);
    }

    public function postUpdate($id)
    {
        $share = Share::find($id);
        $share-> serial_no = Input::get('serial_no');
        $share-> member_id = Input::get('member_id');
        $share-> member_name = Input::get('member_name');
        $share-> mobile_no = Input::get('mobile_no');
        $share-> share_number = Input::get('share_number');
        $share-> share_amount = Input::get('share_amount');
        $share-> created_at = Input::get('created_at');
        $share-> updated_at = Input::get('updated_at');
        $share->save();
        return ['url' => 'share/list'];
    }

    public function getCreate()
    {
        return view('share.create');
    }

    public function postCreate()
    {
       
        
        $share = new Share();
        $share-> serial_no = Input::get('serial_no');
        $share-> member_id = Input::get('member_id');
        $share-> member_name = Input::get('member_name');
        $share-> mobile_no = Input::get('mobile_no');
        $share-> share_number = Input::get('share_number');
        $share-> share_amount = Input::get('share_amount');
        $share-> created_at = Input::get('created_at');
        $share-> updated_at = Input::get('updated_at');
        $share->save();
        return ['url' => 'share/list'];
    }

    public function getDelete($id)
    {
        Share::destroy($id);
        return Redirect('share/list');
    }

}