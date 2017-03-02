<h1 class="page-header">Launch List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('laun/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('laun_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('laun/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('laun/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('laun/list?field=name&sort={{Session::get("laun_sort")=="asc"?"desc":"asc"}}')">
                Launch Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('laun_field')=='name'?(Session::get('laun_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('laun/list?field=LaunCode&sort={{Session::get("laun_sort")=="asc"?"desc":"asc"}}')">
                Company Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('laun_field')=='LaunCode'?(Session::get('laun_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('laun/list?field=unitprice&sort={{Session::get("laun_sort")=="asc"?"desc":"asc"}}')">
                Company Email
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('laun_field')=='unitprice'?(Session::get('laun_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('laun/list?field=unitprice&sort={{Session::get("laun_sort")=="asc"?"desc":"asc"}}')">
                Company Address
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('laun_field')=='unitprice'?(Session::get('laun_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('laun/list?field=unitprice&sort={{Session::get("laun_sort")=="asc"?"desc":"asc"}}')">
                Company License
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('laun_field')=='unitprice'?(Session::get('laun_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('laun/list?field=unitprice&sort={{Session::get("laun_sort")=="asc"?"desc":"asc"}}')">
                Company Logo
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('laun_field')=='unitprice'?(Session::get('laun_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($launs as $key=>$laun)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$laun->name}}</td>
            <td>{{$laun->company_name}}</td>
            <td>{{$laun->company_email}}</td>
            <td>{{$laun->company_address}}</td>
            <td>{{$laun->company_license}}</td>
            <td>
            <img src="{{asset('uploads/').'/'.$laun->company_logo}}">
                <!-- {{$laun->company_logo}} -->
            </td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('laun/update/{{$laun->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('laun/delete/{{$laun->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$launs->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$launs->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>