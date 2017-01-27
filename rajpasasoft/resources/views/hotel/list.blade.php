<h1 class="page-header">Hotel List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('hotel/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('hotel_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('hotel/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('hotel/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('hotel/list?field=hotel_id&sort={{Session::get("hotel_sort")=="asc"?"desc":"asc"}}')">
                Hotel ID
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('hotel_field')=='hotel_id'?(Session::get('hotel_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('hotel/list?field=hotel_name&sort={{Session::get("hotel_sort")=="asc"?"desc":"asc"}}')">
                Hotel Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('hotel_field')=='hotel_name'?(Session::get('hotel_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('hotel/list?field=company_id&sort={{Session::get("hotel_sort")=="asc"?"desc":"asc"}}')">
                Company Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('hotel_field')=='company_id'?(Session::get('hotel_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('hotel/list?field=address&sort={{Session::get("hotel_sort")=="asc"?"desc":"asc"}}')">
                Address
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('hotel_field')=='address'?(Session::get('hotel_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('hotel/list?field=email&sort={{Session::get("hotel_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('hotel_field')=='email'?(Session::get('hotel_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('hotel/list?field=phone&sort={{Session::get("hotel_sort")=="asc"?"desc":"asc"}}')">
                Phone
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('hotel_field')=='phone'?(Session::get('hotel_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('hotel/list?field=total_room&sort={{Session::get("hotel_sort")=="asc"?"desc":"asc"}}')">
                Total Room
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('hotel_field')=='total_room'?(Session::get('hotel_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('hotel/list?field=facility&sort={{Session::get("hotel_sort")=="asc"?"desc":"asc"}}')">
                Facility
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('hotel_field')=='facility'?(Session::get('hotel_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($hotels as $key=>$hotel)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$hotel->hotel_id}}</td>
            <td>{{$hotel->hotel_name}}</td>
            <td>{{$hotel->company_id}}</td>
            <td>{{$hotel->address}}</td>
            <td>{{$hotel->email}}</td>
            <td>{{$hotel->phone}}</td>
            <td>{{$hotel->total_room}}</td>
            <td>{{$hotel->facility}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('hotel/update/{{$hotel->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('hotel/delete/{{$hotel->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$hotels->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$hotels->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>