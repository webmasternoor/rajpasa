<h1 class="page-header">Companyraj List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('companyraj/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('companyraj_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('companyraj/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('companyraj/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('companyraj/list?field=company_id&sort={{Session::get("companyraj_sort")=="asc"?"desc":"asc"}}')">
                Company ID
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('companyraj_field')=='company_id'?(Session::get('companyraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('companyraj/list?field=company_name&sort={{Session::get("companyraj_sort")=="asc"?"desc":"asc"}}')">
                Company Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('companyraj_field')=='company_name'?(Session::get('companyraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('companyraj/list?field=company_email&sort={{Session::get("companyraj_sort")=="asc"?"desc":"asc"}}')">
                Company Email
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('companyraj_field')=='company_email'?(Session::get('companyraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('companyraj/list?field=company_address&sort={{Session::get("companyraj_sort")=="asc"?"desc":"asc"}}')">
                Company Address
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('companyraj_field')=='company_address'?(Session::get('companyraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('companyraj/list?field=company_license&sort={{Session::get("companyraj_sort")=="asc"?"desc":"asc"}}')">
                Company License
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('companyraj_field')=='company_license'?(Session::get('companyraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('companyraj/list?field=company_logo&sort={{Session::get("companyraj_sort")=="asc"?"desc":"asc"}}')">
                Company Logo
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('companyraj_field')=='company_logo'?(Session::get('companyraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($companyrajs as $key=>$companyraj)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$companyraj->company_id}}</td>
            <td>{{$companyraj->company_name}}</td>
            <td>{{$companyraj->company_email}}</td>            
            <td>{{$companyraj->company_address}}</td>
            <td>{{$companyraj->company_license}}</td>
            <td>{{$companyraj->company_logo}}</td>            
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('companyraj/update/{{$companyraj->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('companyraj/delete/{{$companyraj->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$companyrajs->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$companyrajs->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>