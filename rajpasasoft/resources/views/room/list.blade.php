<h1 class="page-header">Room List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('room/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('room_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('room/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('room/list')}}?ok=1&search='+$('#search').val())"><i
                        class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
        <th>
            <a href="javascript:ajaxLoad('room/list?field=room_id&sort={{Session::get("room_sort")=="asc"?"desc":"asc"}}')">
                Room ID
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('room_field')=='room_id'?(Session::get('room_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('room/list?field=hotel_id&sort={{Session::get("room_sort")=="asc"?"desc":"asc"}}')">
                Hotel ID
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('room_field')=='hotel_id'?(Session::get('room_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('room/list?field=company_id&sort={{Session::get("room_sort")=="asc"?"desc":"asc"}}')">
                Company ID
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('room_field')=='company_id'?(Session::get('room_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('room/list?field=room_no&sort={{Session::get("room_sort")=="asc"?"desc":"asc"}}')">
                Room No.
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('room_field')=='room_no'?(Session::get('room_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('room/list?field=total_bed&sort={{Session::get("room_sort")=="asc"?"desc":"asc"}}')">
                Total Bed
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('room_field')=='total_bed'?(Session::get('room_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('room/list?field=room_type&sort={{Session::get("room_sort")=="asc"?"desc":"asc"}}')">
                Room Type
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('room_field')=='room_type'?(Session::get('room_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('room/list?field=room_type2&sort={{Session::get("room_sort")=="asc"?"desc":"asc"}}')">
                Room Type2
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('room_field')=='room_type2'?(Session::get('room_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('room/list?field=facility&sort={{Session::get("room_sort")=="asc"?"desc":"asc"}}')">
                Facility
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('room_field')=='facility'?(Session::get('room_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($rooms as $key=>$room)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$room->room_id}}</td>
            <td>{{$room->hotel_id}}</td>
            <td>{{$room->company_id}}</td>
            <td>{{$room->room_no}}</td>
            <td>{{$room->total_bed}}</td>
            <td>{{$room->room_type}}</td>
            <td>{{$room->room_type2}}</td>
            <td>{{$room->facility}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('room/update/{{$room->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('room/delete/{{$room->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$rooms->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$rooms->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>