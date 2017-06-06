@if (Auth::guest())

@else
<h1 class="page-header">
    @if(Auth::user()->type == 'manager') Company Information 
    @elseif (Auth::user()->type == 'company') Company Information
    @elseif (Auth::user()->type == 'counter') Company Information
    @elseif(Auth::user()->type == 'admin') Company Lists
    @endif
    <!-- <br/>Company ID: {{Auth::user()->company_id}} -->
    <div class="pull-right">
        @if(Auth::user()->type == 'admin') <a href="javascript:ajaxLoad('companyraj/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New </a>
    @endif 
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
            <a href="javascript:ajaxLoad('companyraj/list?field=company_logo&sort={{Session::get("companyraj_sort")=="asc"?"desc":"asc"}}')">
                Company Address
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('companyraj_field')=='company_logo'?(Session::get('companyraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('companyraj/list?field=company_logo&sort={{Session::get("companyraj_sort")=="asc"?"desc":"asc"}}')">
                Photo
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('companyraj_field')=='company_logo'?(Session::get('companyraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        @if (Auth::user()->type != 'counter')
        <th width="140px">Actions</th>
        @endif
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($companyrajs as $key=>$companyraj)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$companyraj->company_name}}</td>
            <td>{{$companyraj->email}}</td>            
            <td>{{$companyraj->company_address}}</td> 
            <!-- <td>{{$companyraj->company_license}}</td> -->
            <td>
            <img src="{{asset('uploads/').'/'.$companyraj->company_photo}}">
            <!-- {{$companyraj->company_logo}} -->
            </td>
            @if (Auth::user()->type != 'counter')
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('companyraj/update/{{$companyraj->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <!-- <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('companyraj/view/{{$companyraj->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> View</a> -->    
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('companyraj/delete/{{$companyraj->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
            @endif            
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
@endif