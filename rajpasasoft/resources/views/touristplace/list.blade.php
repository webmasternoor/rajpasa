<h1 class="page-header">Touristplace List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('touristplace/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('touristplace_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('touristplace/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('touristplace/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('touristplace/list?field=name&sort={{Session::get("touristplace_sort")=="asc"?"desc":"asc"}}')">
                Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('touristplace_field')=='name'?(Session::get('touristplace_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('touristplace/list?field=district_id&sort={{Session::get("touristplace_sort")=="asc"?"desc":"asc"}}')">
                District ID
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('touristplace_field')=='district_id'?(Session::get('touristplace_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('touristplace/list?field=description&sort={{Session::get("touristplace_sort")=="asc"?"desc":"asc"}}')">
                Description
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('touristplace_field')=='description'?(Session::get('touristplace_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; $j = 0;?>
    @foreach($touristplaces as $key=>$touristplace)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$touristplace->name}}</td>
            <td>{{$touristplace->district_id}}</td>
            <!-- <td>{{$district_data[$j++]->name}}</td> -->
            <td>{{$touristplace->description}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('touristplace/update/{{$touristplace->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('touristplace/delete/{{$touristplace->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$touristplaces->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$touristplaces->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>