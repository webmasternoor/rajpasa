{!! Form::open(["id"=>"frm","class"=>"form-horizontal"]) !!}
<div class="col-sm-7 form-group">  	 
    <div class="form-group required col-md-6" id="form-departure-error">
        {!! Form::label("departure","Departure Place",["class"=>"control-label col-md-6"]) !!}
        <div class="col-md-6">
            {!! Form::text("departure",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="departure-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-arrival-error">
        {!! Form::label("arrival","Arrival Place",["class"=>"control-label col-md-6"]) !!}
        <div class="col-md-6">
            {!! Form::text("arrival",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="arrival-error" class="help-block"></span>
        </div>
    </div>
    <div>
    	{!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Search",["type" => "submit","class"=>"btn
    btn-primary"])!!}
    </div>
        <!--  <input class="form-control" id="search" value="{{ Session::get('busticket_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('busticket/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">
               -->
       <!--  <input class="form-control" id="search1" value="{{ Session::get('busticket_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('busticket/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">     
               
        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('busticket/list')}}?ok=1&search='+$('#search').val())"><i
                        class="glyphicon glyphicon-search"></i>
            </button>        
        </div>  -->

</div>
{!! Form::close() !!}

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
        <th>
            <a href="javascript:ajaxLoad('busticket/list?field=bus_id&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Bus Id
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='bus_id'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('busticket/list?field=company_id&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Company Id
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='company_id'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('busticket/list?field=departure_time&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Departure Time
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='departure_time'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('busticket/list?field=arrival_time&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
               Arrival Time
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='arrival_time'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('busticket/list?field=departure_place&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Departure Place
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='departure_place'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('busticket/list?field=arrival_place&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Arrival Place
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='arrival_place'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('busticket/list?field=available_seat&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Available Seat
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='available_seat'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('busticket/list?field=seat_fare&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Seat Fare
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='seat_fare'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
       <!--  <th>
            <a href="javascript:ajaxLoad('busticket/list?field=saving_amount&sort={{Session::get("busticket_sort")=="asc"?"desc":"asc"}}')">
                Entry Saving Amount
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('busticket_field')=='saving_amount'?(Session::get('busticket_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th> -->
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($bustickets as $key=>$busticket)
        <tr>
            <td align="center">{{$i++}}</td>
            <td >{{$busticket->bus_id}}</td>
            <td>{{$busticket->company_id}}</td>
            <td>{{$busticket->departure_time}}</td>
            <td>{{$busticket->arrival_time}}</td>
            <td align="right">{{$busticket->departure_place}}</td>
            <td>{{$busticket->arrival_place}}</td>
            <td>{{$busticket->available_seat}}</td>
            <td>{{$busticket->seat_fare}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('busticket/update/{{$busticket->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> View Seats</a>
                <!-- <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('busticket/delete/{{$busticket->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a> -->
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$bustickets->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$bustickets->total()}} records
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
                console.log(data)
                if (data.fail) {
                    $('#frm input.required, #frm textarea.required').each(function () {
                        index = $(this).attr('departure_place');
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