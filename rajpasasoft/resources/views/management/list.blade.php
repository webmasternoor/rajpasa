<h1 class="page-header">@if(Auth::user()->type == 'manager') Manager Information @else All managers @endif
    <div class="pull-right">
        <a href="javascript:ajaxLoad('management/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('management_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('management/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('management/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('management/list?field=manager_id&sort={{Session::get("management_sort")=="asc"?"desc":"asc"}}')">
                Company Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('management_field')=='manager_id'?(Session::get('management_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('management/list?field=user_id&sort={{Session::get("management_sort")=="asc"?"desc":"asc"}}')">
                Manager ID
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('management_field')=='user_id'?(Session::get('management_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('management/list?field=company_id&sort={{Session::get("management_sort")=="asc"?"desc":"asc"}}')">
                Manager Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('management_field')=='company_id'?(Session::get('management_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th> 
        <th>
            <a href="javascript:ajaxLoad('management/list?field=company_id&sort={{Session::get("management_sort")=="asc"?"desc":"asc"}}')">
                Manager Email
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('management_field')=='company_id'?(Session::get('management_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th> 
        <th>
            <a href="javascript:ajaxLoad('management/list?field=company_id&sort={{Session::get("management_sort")=="asc"?"desc":"asc"}}')">
                Manager Photo
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('management_field')=='company_id'?(Session::get('management_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>        
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;$j = 0;?>
    @foreach($managements as $key=>$management)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$management->company_id}}</td>
            <td>{{$management->manager_id}}</td>
            <td>{{$management->name}}</td>            
            <td>{{$management->email}}</td>            
            <td>
            <img src="{{asset('uploads/').'/'.$management->manager_photo}}">            
            </td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('management/update/{{$management->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('management/delete/{{$management->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$managements->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$managements->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>