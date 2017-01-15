<?php
namespace App\Http\Controllers;

use App\Counter;
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
        Session::put('counter_field', Input::has('field') ? Input::get('field') : (Session::has('counter_field') ? Session::get('counter_field') : 'name'));
        Session::put('counter_sort', Input::has('sort') ? Input::get('sort') : (Session::has('counter_sort') ? Session::get('counter_sort') : 'asc'));
        $counters = Counter::where('name', 'like', '%' . Session::get('counter_search') . '%')
            ->orderBy(Session::get('counter_field'), Session::get('counter_sort'))->paginate(8);
        return view('counter.list', ['counters' => $counters]);
    }

    public function getUpdate($id)
    {
        return view('counter.update', ['counter' => Counter::find($id)]);
    }

    public function postUpdate($id)
    {
        $counter = Counter::find($id);
        $rules = ["unitprice" => "required|numeric"];
        if ($counter->name != Input::get('name'))
            $rules += ['name' => 'required|unique:counters'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $counter->name = Input::get('name');
        $counter->CounterCode = Input::get('CounterCode');
        $counter->unitprice = Input::get('unitprice');
        $counter->counter_id = Input::get('counter_id');
        $counter->manager_id = Input::get('manager_id');
        $counter->company_id = Input::get('company_id');
        $counter->user_name = Input::get('user_name');
        $counter->password = Input::get('password');
        $counter->save();
        return ['url' => 'counter/list'];
    }

    public function getCreate()
    {
        return view('counter.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "name" => "required|unique:counters",
            "CounterCode" => "required|unique:counters",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $counter = new Counter();
        $counter->name = Input::get('name');
        $counter->CounterCode = Input::get('CounterCode');
        $counter->unitprice = Input::get('unitprice');
        $counter->counter_id = Input::get('counter_id');
        $counter->manager_id = Input::get('manager_id');
        $counter->company_id = Input::get('company_id');
        $counter->user_name = Input::get('user_name');
        $counter->password = Input::get('password');
        $counter->save();
        return ['url' => 'counter/list'];
    }

    public function getDelete($id)
    {
        Counter::destroy($id);
        return Redirect('counter/list');
    }

}