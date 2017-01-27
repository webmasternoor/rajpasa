<h1 class="page-header">Upazilla List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('upazilla/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('upazilla_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('upazilla/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('upazilla/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('upazilla/list?field=name&sort={{Session::get("upazilla_sort")=="asc"?"desc":"asc"}}')">
                Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('upazilla_field')=='name'?(Session::get('upazilla_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('upazilla/list?field=UpazillaCode&sort={{Session::get("upazilla_sort")=="asc"?"desc":"asc"}}')">
                Upazilla Code
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('upazilla_field')=='UpazillaCode'?(Session::get('upazilla_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('upazilla/list?field=unitprice&sort={{Session::get("upazilla_sort")=="asc"?"desc":"asc"}}')">
                Unitprice
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('upazilla_field')=='unitprice'?(Session::get('upazilla_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($upazillas as $key=>$upazilla)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$upazilla->name}}</td>
            <td>{{$upazilla->UpazillaCode}}</td>
            <td>{{$upazilla->testfield}}</td>
            <td align="right">$ {{$upazilla->unitprice}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('upazilla/update/{{$upazilla->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('upazilla/delete/{{$upazilla->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$upazillas->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$upazillas->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>