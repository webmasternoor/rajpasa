<?php
namespace App\Http\Controllers;

use App\Touristplace;
use DB;
use App\District;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TouristplaceController extends Controller
{
    public function getIndex()
    {
        return view('touristplace.index');
    }

    public function getList()
    {
        Session::put('touristplace_search', Input::has('ok') ? Input::get('search') : (Session::has('touristplace_search') ? Session::get('touristplace_search') : ''));
        Session::put('touristplace_field', Input::has('field') ? Input::get('field') : (Session::has('touristplace_field') ? Session::get('touristplace_field') : 'name'));
        Session::put('touristplace_sort', Input::has('sort') ? Input::get('sort') : (Session::has('touristplace_sort') ? Session::get('touristplace_sort') : 'asc'));
        $touristplaces = Touristplace::where('name', 'like', '%' . Session::get('touristplace_search') . '%')
            ->orderBy(Session::get('touristplace_field'), Session::get('touristplace_sort'))->paginate(30);
        $district_data=DB::table('districts')
            ->join('touristplaces', 'touristplaces.district_id', '=', 'districts.id')
            ->select('*')
            ->get();
        return view('touristplace.list', ['touristplaces' => $touristplaces],['district_data' => $district_data]);

        //return view('touristplace.list', ['touristplaces' => $touristplaces]);
    }

    public function getUpdate($id)
    {
        $district_info = District::lists('name', 'id');
        //return view('touristplace.create')->with('district_info', $district_info);

        return view('touristplace.update', ['touristplace' => Touristplace::find($id)])->with('district_info', $district_info);
    }

    public function postUpdate($id)
    {
        $touristplace = Touristplace::find($id);
        /*$rules = ["unitprice" => "required|numeric"];
        if ($touristplace->name != Input::get('name'))
            $rules += ['name' => 'required|unique:touristplaces'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $touristplace->name = Input::get('name');
        $touristplace->district_id = Input::get('district_id');
        $touristplace->description = Input::get('description');        
        $touristplace->save();
        return ['url' => 'touristplace/list'];
    }

    public function getCreate()
    {
        $district_info = District::lists('name', 'id');
        return view('touristplace.create')->with('district_info', $district_info);
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "name" => "required|unique:touristplaces",
            "TouristplaceCode" => "required|unique:touristplaces",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $touristplace = new Touristplace();
        $touristplace->name = Input::get('name');
        $touristplace->district_id = Input::get('district_id');
        $touristplace->description = Input::get('description');
        $touristplace->save();
        return ['url' => 'touristplace/list'];
    }

    public function getDelete($id)
    {
        Touristplace::destroy($id);
        return Redirect('touristplace/list');
    }

}