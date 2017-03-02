<?php
namespace App\Http\Controllers;

use App\Counter;
use App\Companyraj;
use App\Management;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CounterController extends Controller
{
    public function getIndex()
    {
        return view('counter.index');
    }

    public function getList()
    {
        Session::put('counter_search', Input::has('ok') ? Input::get('search') : (Session::has('counter_search') ? Session::get('counter_search') : ''));
        Session::put('counter_field', Input::has('field') ? Input::get('field') : (Session::has('counter_field') ? Session::get('counter_field') : 'counter_id'));
        Session::put('counter_sort', Input::has('sort') ? Input::get('sort') : (Session::has('counter_sort') ? Session::get('counter_sort') : 'asc'));
        /*$counters = Counter::where('counter_id', 'like', '%' . Session::get('counter_search') . '%')
            ->orderBy(Session::get('counter_field'), Session::get('counter_sort'))->paginate(8);*/
        $counters = User::where('company_id', Auth::user()->company_id)
        ->where('type', 'counter')
        ->paginate(8);        
        return view('counter.list', ['counters' => $counters]);
    }

    public function getUpdate($id)
    {
        return view('counter.update', ['counter' => Counter::find($id)]);
    }

    public function postUpdate($id)
    {
        $counter = Counter::find($id);
        /*$rules = ["unitprice" => "required|numeric"];
        if ($counter->name != Input::get('name'))
            $rules += ['name' => 'required|unique:counters'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/        
        $counter->counter_id = Input::get('counter_id');
        $counter->manager_id = Input::get('manager_id');
        $counter->company_id = Input::get('company_id');
        $counter->counter_name = Input::get('counter_name');
        //$counter->password12 = Input::get('password12');
        if(Input::get('password12') == Input::get('password122')){
            $counter->password12 = md5(Input::get('password12'));
            $counter->save();    
        }
        else{
            echo "error";
        }
        return ['url' => 'counter/list'];
    }

    public function getCreate()
    {
        $company_info = Companyraj::lists('company_name','id');
        $manager_info = Management::lists('user_id','id');
        return view('counter.create')->with('company_info',$company_info)->with('manager_info',$manager_info);
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "name" => "required|unique:counters",
            "CounterCode" => "required|unique:counters",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $counter = new Counter();        
        $counter->counter_id = Input::get('counter_id');
        $counter->manager_id = Input::get('manager_id');
        $counter->company_id = Input::get('company_id');
        $counter->counter_name = Input::get('counter_name');
        //$counter->password12 = Input::get('password12');
        if(Input::get('password12') == Input::get('password122')){
            $counter->password12 = md5(Input::get('password12'));
            $counter->save();

            $counter12 = new User();
            $counter12->name = Input::get('counter_name');
            $counter12->company_id = Input::get('company_id');
            $counter12->manager_id = Input::get('manager_id');
            $counter12->counter_id = Input::get('counter_id');
            $counter12->email = Input::get('emailaddress');
            $counter12->password = bcrypt(Input::get('password12'));
            $counter12->type = 'counter';
            $counter12->save();    
        }
        else{
            echo "error";
        }
        //$counter->save();
        return ['url' => 'counter/list'];
    }

    public function getDelete($id)
    {
        Counter::destroy($id);
        return Redirect('counter/list');
    }

}