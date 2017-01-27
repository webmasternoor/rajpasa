<?php
namespace App\Http\Controllers;

use App\District;
use App\Division;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{
    public function getIndex()
    {
        return view('district.index');
    }

    public function getList()
    {
        Session::put('district_search', Input::has('ok') ? Input::get('search') : (Session::has('district_search') ? Session::get('district_search') : ''));
        Session::put('district_field', Input::has('field') ? Input::get('field') : (Session::has('district_field') ? Session::get('district_field') : 'name'));
        Session::put('district_sort', Input::has('sort') ? Input::get('sort') : (Session::has('district_sort') ? Session::get('district_sort') : 'asc'));
        $districts = District::where('name', 'like', '%' . Session::get('district_search') . '%')
            ->orderBy(Session::get('district_field'), Session::get('district_sort'))->paginate(8);
        return view('district.list', ['districts' => $districts]);
    }

    public function getUpdate($id)
    {
        $divisions = Division::lists('name', 'id');
        return view('district.update', ['district' => District::find($id)],['divisions'=>$divisions]);
        
        //return view('district.update', ['district' => District::find($id)]);
    }

    public function postUpdate($id)
    {
        $district = District::find($id);
        /*$rules = ["unitprice" => "required|numeric"];
        if ($district->name != Input::get('name'))
            $rules += ['name' => 'required|unique:districts'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $district->division_id = Input::get('division_id');
        $district->name = Input::get('name');
        $district->bn_name = Input::get('bn_name');
        $district->lat = Input::get('lat');
        $district->lon = Input::get('lon');
        $district->website = Input::get('website');        
        $district->save();
        return ['url' => 'district/list'];
    }

    public function getCreate()
    {
        $divisions = Division::lists('name', 'id');
        return view('district.create',['divisions' => $divisions]);

        //return view('district.create');
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "name" => "required|unique:districts",
            "DistrictCode" => "required|unique:districts",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $district = new District();
        $district->division_id = Input::get('division_id');
        $district->name = Input::get('name');
        $district->bn_name = Input::get('bn_name');
        $district->lat = Input::get('lat');
        $district->lon = Input::get('lon');
        $district->website = Input::get('website');
        $district->save();
        return ['url' => 'district/list'];
    }

    public function getDelete($id)
    {
        District::destroy($id);
        return Redirect('district/list');
    }

}