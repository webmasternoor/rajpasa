<h1 class="page-header">Seatavailable List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('seatavailable/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('seatavailable_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('seatavailable/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('seatavailable/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('seatavailable/list?field=name&sort={{Session::get("seatavailable_sort")=="asc"?"desc":"asc"}}')">
                Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('seatavailable_field')=='name'?(Session::get('seatavailable_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('seatavailable/list?field=SeatavailableCode&sort={{Session::get("seatavailable_sort")=="asc"?"desc":"asc"}}')">
                Seatavailable Code
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('seatavailable_field')=='SeatavailableCode'?(Session::get('seatavailable_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('seatavailable/list?field=unitprice&sort={{Session::get("seatavailable_sort")=="asc"?"desc":"asc"}}')">
                Unitprice
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('seatavailable_field')=='unitprice'?(Session::get('seatavailable_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($seatavailables as $key=>$seatavailable)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$seatavailable->name}}</td>
            <td>{{$seatavailable->SeatavailableCode}}</td>
            <td>{{$seatavailable->testfield}}</td>
            <td align="right">$ {{$seatavailable->unitprice}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('seatavailable/update/{{$seatavailable->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('seatavailable/delete/{{$seatavailable->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$seatavailables->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$seatavailables->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>