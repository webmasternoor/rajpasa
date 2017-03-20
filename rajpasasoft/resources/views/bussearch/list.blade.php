<h1 class="page-header">Bus Search
    <div class="pull-right">
        <a href="javascript:ajaxLoad('bussearch/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
   {!! Form::open(["id"=>"frm","class"=>"form-horizontal"]) !!} 
  <div class="col-md-12">    
    <div class="form-group required col-md-6" id="form-departure-error">
        {!! Form::label("departure","departure place",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("departure",null,["class"=>"form-control required","id"=>"departure"]) !!}
            <span id="departure-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-arrival-error">
        {!! Form::label("arrival","arrival place",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("arrival",null,["class"=>"form-control required","id"=>"arrival"]) !!}
            <span id="arrival-error" class="help-block"></span>
        </div>
    </div>
    
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
         <!-- <a href="javascript:ajaxLoad('bussearch/list')" class="btn btn-danger"><i
                    class="glyphicon glyphicon-backward"></i>
            Back</a> -->
        {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Search",["type" => "submit","class"=>"btn
    btn-primary"])!!}
    </div>
</div>
{!! Form::close() !!} 
<!-- <script>
  
</script> -->


<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
        <th>
            <a href="javascript:ajaxLoad('bussearch/list?field=bus_id&sort={{Session::get("bussearch_sort")=="asc"?"desc":"asc"}}')">
                Bus Id
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('bussearch_field')=='bus_id'?(Session::get('bussearch_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('bussearch/list?field=company_id&sort={{Session::get("bussearch_sort")=="asc"?"desc":"asc"}}')">
                Company Id
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('bussearch_field')=='company_id'?(Session::get('bussearch_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('bussearch/list?field=departure_time&sort={{Session::get("bussearch_sort")=="asc"?"desc":"asc"}}')">
                Departure Time
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('bussearch_field')=='departure_time'?(Session::get('bussearch_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('bussearch/list?field=arrival_time&sort={{Session::get("bussearch_sort")=="asc"?"desc":"asc"}}')">
               Arrival Time
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('bussearch_field')=='arrival_time'?(Session::get('bussearch_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('bussearch/list?field=departure_place&sort={{Session::get("bussearch_sort")=="asc"?"desc":"asc"}}')">
                Departure Place
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('bussearch_field')=='departure_place'?(Session::get('bussearch_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('bussearch/list?field=arrival_place&sort={{Session::get("bussearch_sort")=="asc"?"desc":"asc"}}')">
                Arrival Place
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('bussearch_field')=='arrival_place'?(Session::get('bussearch_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('bussearch/list?field=available_seat&sort={{Session::get("bussearch_sort")=="asc"?"desc":"asc"}}')">
                Available Seat
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('bussearch_field')=='available_seat'?(Session::get('bussearch_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('bussearch/list?field=seat_fare&sort={{Session::get("bussearch_sort")=="asc"?"desc":"asc"}}')">
                Seat Fare
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('bussearch_field')=='seat_fare'?(Session::get('bussearch_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
       <!--  <th>
            <a href="javascript:ajaxLoad('bussearch/list?field=saving_amount&sort={{Session::get("bussearch_sort")=="asc"?"desc":"asc"}}')">
                Entry Saving Amount
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('bussearch_field')=='saving_amount'?(Session::get('bussearch_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th> -->
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($bussearches as $key=>$bussearch)
        <tr>
            <td align="center">{{$i++}}</td>
            <td >{{$bussearch->bus_id}}</td>
            <td>{{$bussearch->company_id}}</td>
            <td>{{$bussearch->departure_time}}</td>
            <td>{{$bussearch->arrival_time}}</td>
            <td align="right">{{$bussearch->departure_place}}</td>
            <td>{{$bussearch->arrival_place}}</td>
            <td>{{$bussearch->available_seat}}</td>
            <td>{{$bussearch->seat_fare}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('bussearch/update/{{$bussearch->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> View Seats</a>
                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$bussearches->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$bussearches->total()}} records
    </i>
</div>

<script type="text/javascript">
      $("#frm").submit(function (event) {
        event.preventDefault();
        $('.loading').show();
        var form = $(this);
        var data = new FormData($(this)[0]);
        var url = form.attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#frm input.required, #frm textarea.required').each(function () {
                        index = $(this).attr('company_name');
                        if (index in data.errors) {
                            $("#form-" + index + "-error").addClass("has-error");
                            $("#" + index + "-error").html(data.errors[index]);
                        }
                        else {
                            $("#form-" + index + "-error").removeClass("has-error");
                            $("#" + index + "-error").empty();
                        }
                    });
                    $('#focus').focus().select();
                } else {
                    $(".has-error").removeClass("has-error");
                    $(".help-block").empty();
                    $('.loading').hide();
                    ajaxLoad(data.url, data.content);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        return false;
    });
      
	 $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });

</script>