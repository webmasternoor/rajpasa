@if (Auth::guest())
@else
    <div class="col-md-12">
        <div class="form-group  col-md-4" id="form-departure_place-error">
            <div class="col-md-9">
            {!! Form::select("departure_place",$district_info,null,["class"=>"form-control departure_place required","id"=>"departure_place"]) !!}
            {!! Form::select("arrival_place", $district_info, null,["class"=>"form-control ","id"=>"arrival_place"]) !!}
            {!! Form::date("departure_date", null,["class"=>"form-control ","id"=>"departure_date"]) !!}
            {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Search",["type" => "submit", "id" => "bbt"])!!}
            <!-- {!! Form::open(["id"=>"frmas","class"=>"form-horizontal"]) !!}
            {!! Form::select("departure_place", $district_info, null,["class"=>"form-control ","id"=>"focus"]) !!}
            {!! Form::select("arrival_place", $district_info, null,["class"=>"form-control ","id"=>"focus"]) !!}

            {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Search",["type" => "submit","class"=>"btn
                btn-primary"])!!}
            {!! Form::close() !!} -->
            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped" id="dynatable">
        <thead>
        <tr>
            <th style="text-align: center">No</th>
            <th>Bus ID</th>
            <th>Company ID</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Departure Place</th>
            <th>Arrival Place</th>
            <th>Bus Type</th>
            <th>Total Seat</th>
            <th>Seat Fare</th>
            <th>Facility</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody id="p_scents" class="p_scents">

        </tbody>
    </table>


    <!-- <script>
        $("#frmas").submit(function (event) {
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
                        $('#frmas input., #frmas textarea.').each(function () {
                            index = $(this).attr('id');
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
        }
        );
    </script> -->

    <h1 class="page-header">Bus Search</h1>

    <a class="btn btn-primary btn-xs" title="Edit"
       href="javascript:ajaxLoad('busraj/bussearch')">
        Bus Search</a>

    <div class="pull-right">
        <a href="javascript:ajaxLoad('busraj/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
    </h1>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th width="50px" style="text-align: center">No</th>
            <th>
                <a href="javascript:ajaxLoad('busraj/list?field=bus_id&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                    Bus ID
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('busraj_field')=='bus_id'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('busraj/list?field=company_id&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                    Company Name
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('busraj_field')=='company_id'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('busraj/list?field=departure_time&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                    Departure Time
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('busraj_field')=='departure_time'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('busraj/list?field=arrival_time&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                    arrival_time
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('busraj_field')=='arrival_time'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('busraj/list?field=departure_place&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                    Departure Place
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('busraj_field')=='departure_place'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('busraj/list?field=arrival_place&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                    Arrival Place
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('busraj_field')=='arrival_place'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('busraj/list?field=bus_type&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                    Bus Type
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('busraj_field')=='bus_type'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('busraj/list?field=total_seat&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                    Total Seat
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('busraj_field')=='total_seat'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('busraj/list?field=seat_fare&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                    Seat Fare
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('busraj_field')=='seat_fare'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('busraj/list?field=facility&sort={{Session::get("busraj_sort")=="asc"?"desc":"asc"}}')">
                    Facility
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('busraj_field')=='facility'?(Session::get('busraj_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th width="140px">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
        @foreach($busrajs as $key=>$busraj)
            <tr>
                <td align="center">{{$i++}}</td>
                <td>{{$busraj->bus_id}}</td>
                <td>{{$busraj->company_id}}</td>
                <td>{{$busraj->departure_time}}</td>
                <td>{{$busraj->arrival_time}}</td>
                <td>{{$busraj->departure_place}}</td>
                <td>{{$busraj->arrival_place}}</td>
                <td>{{$busraj->bus_type}}</td>
                <td>{{$busraj->total_seat}}</td>
                <td>{{$busraj->seat_fare}}</td>
                <td>{{$busraj->facility}}</td>
                <td style="text-align: center">
                    <a class="btn btn-primary btn-xs" title="Edit"
                       href="javascript:ajaxLoad('busraj/viewseats/{{$busraj->bus_id}}')">
                        View Seats</a>
                    <a class="btn btn-primary btn-xs" title="Edit"
                       href="javascript:ajaxLoad('busraj/update/{{$busraj->id}}')">
                        <i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a class="btn btn-danger btn-xs" title="Delete"
                       href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('busraj/delete/{{$busraj->id}}')">
                        <i class="glyphicon glyphicon-trash"></i> Delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $('.pagination a').on('click', function (event) {
            event.preventDefault();
            ajaxLoad($(this).attr('href'));
        });
        $(document).ready(function () {
            $(document).on('click', '#bbt', function () {
                var departure_place = document.getElementById('departure_place').value;
                var arrival_place = document.getElementById('arrival_place').value;
                var departure_date = document.getElementById('departure_date').value;
                var i = 1;
                $('#p_scents').empty();
                $.ajax({
                    type: 'get',
                    url: 'getSchedule',
                    data: {'departure_place': departure_place, 'arrival_place': arrival_place, 'departure_date': departure_date},
                    success: function (data) {
//                    console.log(data);
                        $.each(data, function (index, subcatObj3p) {
                            $('#p_scents').append('<tr><td style="text-align: center">' + i + '</td><td style="text-align: center">' + subcatObj3p.bus_id + '</td><td style="text-align: center">' + subcatObj3p.company_id + '</td><td style="text-align: center">' + subcatObj3p.departure_time + '</td><td style="text-align: center">' + subcatObj3p.arrival_time + '</td><td style="text-align: center">' + subcatObj3p.departure_place + '</td><td style="text-align: center">' + subcatObj3p.arrival_place + '</td><td style="text-align: center">' + subcatObj3p.bus_type + '</td><td style="text-align: center">' + subcatObj3p.total_seat + '</td><td style="text-align: center">' + subcatObj3p.seat_fare + '</td><td style="text-align: center">' + subcatObj3p.facility + '</td><td><a class="btn btn-primary btn-xs" title="Edit" href="javascript:ajaxLoad(\'busraj/viewseats/' + subcatObj3p.bus_id + '\')">View Seats</a></td></tr>');
                            i++;
                        });
                        document.getElementById('hidden').value = i - 1;
                    },
                    error: function () {
                    }
                });
                $.ajax(clear);
//            document.getElementById("MemberId").reset();
            });
        });
    </script>

@endif