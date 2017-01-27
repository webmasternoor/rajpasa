<h1 class="page-header">Counter List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('counter/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('counter_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('counter/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('counter/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('counter/list?field=counter_id&sort={{Session::get("counter_sort")=="asc"?"desc":"asc"}}')">
                Counter ID
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('counter_field')=='counter_id'?(Session::get('counter_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('counter/list?field=manager_id&sort={{Session::get("counter_sort")=="asc"?"desc":"asc"}}')">
                Manager ID
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('counter_field')=='manager_id'?(Session::get('counter_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('counter/list?field=company_id&sort={{Session::get("counter_sort")=="asc"?"desc":"asc"}}')">
                Company ID
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('counter_field')=='company_id'?(Session::get('counter_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('counter/list?field=counter_name&sort={{Session::get("counter_sort")=="asc"?"desc":"asc"}}')">
                Counter Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('counter_field')=='counter_name'?(Session::get('counter_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($counters as $key=>$counter)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$counter->counter_id}}</td>
            <td>{{$counter->manager_id}}</td>
            <td>{{$counter->company_id}}</td>
            <td>{{$counter->counter_name}}</td>            
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('counter/update/{{$counter->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('counter/delete/{{$counter->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$counters->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$counters->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>