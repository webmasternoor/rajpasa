@extends("app")
<h1 class="page-header">Bus Search</h1>
<div class="col-md-12">
    <form action="busticket/list" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"> 
        <div class="col-md-6"><label>Departure Place</label></div>
        <div class="col-md-6"><input type="text" name="departure"></div>
        <div class="col-md-6"><label>Arrival Place</label></div>
        <div class="col-md-6"><input type="text" name="arrival"></div>
        <div class="col-md-6"><input type="submit" value="submit" ></div>
    </form>
</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
        <th>
            <a href="javascript:ajaxLoad('busticket/list?field=bus_id&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Bus Id
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='bus_id'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('busticket/list?field=company_id&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Company Id
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='company_id'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('busticket/list?field=departure_time&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Departure Time
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='departure_time'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('busticket/list?field=arrival_time&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
               Arrival Time
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='arrival_time'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('busticket/list?field=departure_place&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Departure Place
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='departure_place'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('busticket/list?field=arrival_place&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Arrival Place
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='arrival_place'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('busticket/list?field=available_seat&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Available Seat
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='available_seat'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('busticket/list?field=seat_fare&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Seat Fare
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='seat_fare'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($bustickets as $key=>$busticket)
        <tr>
            <td align="center">{{$i++}}</td>
            <td >{{$busticket->bus_id}}</td>
            <td>{{$busticket->company_id}}</td>
            <td>{{$busticket->departure_time}}</td>
            <td>{{$busticket->arrival_time}}</td>
            <td align="right">{{$busticket->departure_place}}</td>
            <td>{{$busticket->arrival_place}}</td>
            <td>{{$busticket->available_seat}}</td>
            <td>{{$busticket->seat_fare}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('busticket/update/{{$busticket->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> View Seats</a>
                <!-- <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('busticket/delete/{{$busticket->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a> -->
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$bustickets->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$bustickets->total()}} records
    </i>
</div>

<script type="text/javascript">

      
	 $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });

</script>