@if (Auth::guest())

@else
<!-- @extends('app') -->
<h1 class="page-header">Bus Search</h1>
<div class="col-md-12">
    <form href="javascript:ajaxLoad('busraj/list')" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"> 
        <div class="col-md-6"><label>Departure Place</label></div>
        <div class="col-md-6"><input type="text" name="departure"></div>
        <div class="col-md-6"><label>Arrival Place</label></div>
        <div class="col-md-6"><input type="text" name="arrival"></div>
        <div class="col-md-6"><input type="submit" value="submit"></div>
    </form>
</div>

<h1 class="page-header"><!-- Busraj List -->
    <div class="pull-right">
        <a href="javascript:ajaxLoad('busraj/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<!-- <div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('busraj_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('busraj/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('busraj/list')}}?ok=1&search='+$('#search').val())"><i
                        class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div>
</div> -->
<!-- <div class="col-md-12">
    <form action="ajaxLoad('{{url('busraj/listb')}})">
      <input type="text" name="s1">
      <input type="text" name="s2">
      <input type="submit">
    </form>
</div> -->
<!-- <div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search2" value="{{ Session::get('busraj_search2') }}"
                type="text">
         <input class="form-control" id="search" value="{{ Session::get('busraj_search') }}"
                onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('busraj/listb')}}?ok=1&search='+this.value)"
                placeholder="Search..."
                type="text"> 

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('busraj/listb')}})"><i
                        class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div>
</div> -->
<!-- <div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search2" value="{{ Session::get('busraj_search2') }}"
                type="text">
         <input class="form-control" id="search3" value="{{ Session::get('busraj_search3') }}"
                onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('busraj/listb')}}?ok=1&search3='+this.value)"
                placeholder="Search..."
                type="text"> 

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('busraj/listb')}})"><i
                        class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div>
</div> -->
<!-- <div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('busraj_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('busraj/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('busraj/list')}}?ok=1&search='+$('#search').val())"><i
                        class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div>
</div> -->
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
        <th>
            <a href="javascript:ajaxLoad('busraj/list?field=bus_id&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                Bus ID
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busraj_field')=='bus_id'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('busraj/list?field=company_id&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                Company Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busraj_field')=='company_id'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('busraj/list?field=departure_time&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                Departure Time
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busraj_field')=='departure_time'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('busraj/list?field=arrival_time&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                arrival_time
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busraj_field')=='arrival_time'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>        
        <th>
            <a href="javascript:ajaxLoad('busraj/list?field=departure_place&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                Departure Place
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busraj_field')=='departure_place'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>        
        <th>
            <a href="javascript:ajaxLoad('busraj/list?field=arrival_place&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                Arrival Place
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busraj_field')=='arrival_place'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>        
        <th>
            <a href="javascript:ajaxLoad('busraj/list?field=bus_type&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                Bus Type
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busraj_field')=='bus_type'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>        
        <th>
            <a href="javascript:ajaxLoad('busraj/list?field=total_seat&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                Total Seat
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busraj_field')=='total_seat'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>        
        <th>
            <a href="javascript:ajaxLoad('busraj/list?field=seat_fare&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                Seat Fare
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busraj_field')=='seat_fare'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>        
        <th>
            <a href="javascript:ajaxLoad('busraj/list?field=facility&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                Facility
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busraj_field')=='facility'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>        
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($busrajs as $key=>$busraj)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$busraj->bus_id}}</td>
            <td>{{$busraj->company_id}}</td>
            <td>{{$busraj->departure_time}}</td>
            <td>{{$busraj->arrival_time}}</td>
            <td>{{$busraj->departure_place}}</td>
            <td>{{$busraj->arrival_place}}</td>
            <td>{{$busraj->bus_type}}</td>
            <td>{{$busraj->total_seat}}</td>
            <td>{{$busraj->seat_fare}}</td>
            <td>{{$busraj->facility}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('busraj/viewseats/{{$busraj->bus_id}}')">
                    View Seats</a>
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('busraj/update/{{$busraj->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('busraj/delete/{{$busraj->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$busrajs->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$busrajs->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>
@endif