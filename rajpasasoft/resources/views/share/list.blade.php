<h1 class="page-header">Share List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('share/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('share_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('share/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('share/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('share/list?field=member_id&sort={{Session::get("share_sort")=="asc"?"desc":"asc"}}')">
                Member Id
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('share_field')=='member_id'?(Session::get('share_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('share/list?field=member_name&sort={{Session::get("share_sort")=="asc"?"desc":"asc"}}')">
                Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('share_field')=='member_name'?(Session::get('share_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('share/list?field=share_number&sort={{Session::get("share_sort")=="asc"?"desc":"asc"}}')">
                No of Shares
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('share_field')=='share_number'?(Session::get('share_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('share/list?field=share_amount&sort={{Session::get("share_sort")=="asc"?"desc":"asc"}}')">
               Share Amount
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('share_field')=='share_amount'?(Session::get('share_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('share/list?field=created_at&sort={{Session::get("share_sort")=="asc"?"desc":"asc"}}')">
                Date
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('share_field')=='created_at'?(Session::get('share_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
       <!--  <th>
            <a href="javascript:ajaxLoad('share/list?field=saving_amount&sort={{Session::get("share_sort")=="asc"?"desc":"asc"}}')">
                Entry Saving Amount
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('share_field')=='saving_amount'?(Session::get('share_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th> -->
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($shares as $key=>$share)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$share->member_id}}</td>
            <td>{{$share->member_name}}</td>
            <td>{{$share->share_number}}</td>
            <td align="right">{{$share->share_amount}}</td>
            <td>{{$share->created_at}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('share/update/{{$share->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('share/delete/{{$share->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$shares->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$shares->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>