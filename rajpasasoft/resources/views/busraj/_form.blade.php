<div class="col-md-12">
    
    <div class="form-group required col-md-6" id="form-bus_id-error">
        {!! Form::label("bus_id","Bus Id",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("bus_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="bus_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-company_id-error">
        {!! Form::label("company_id","Company Id",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("company_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="company_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-departure_time-error">
        {!! Form::label("departure_time","Departure Time",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("departure_time",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="departure_time-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-arrival_time-error">
        {!! Form::label("arrival_time","Arrival Time",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("arrival_time",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="arrival_time-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-departure_place-error">
        {!! Form::label("departure_place","Departure Place",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("departure_place",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="departure_place-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-arrival_place-error">
        {!! Form::label("arrival_place","Arrival Place",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("arrival_place",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="arrival_place-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-bus_type-error">
        {!! Form::label("bus_type","Bus Type",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("bus_type",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="bus_type-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-total_seat-error">
        {!! Form::label("total_seat","Total Seats",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("total_seat",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="total_seat-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-seat_fare-error">
        {!! Form::label("seat_fare","Seat Fare",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("seat_fare",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="seat_fare-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-facility-error">
        {!! Form::label("facility","Facility",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("facility",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="facility-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-name-error">
        {!! Form::label("name","bus name",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("name",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="name-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-BusrajCode-error">
        {!! Form::label("BusrajCode","প্রোডাক্টের নামঃ",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("BusrajCode",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="BusrajCode-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-unitprice-error">
        {!! Form::label("unitprice","প্রোডাক্টের নামঃ",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("unitprice",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="unitprice-error" class="help-block"></span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('busraj/list')" class="btn btn-danger"><i
                    class="glyphicon glyphicon-backward"></i>
            Back</a>
        {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Save",["type" => "submit","class"=>"btn
    btn-primary"])!!}
    </div>
</div>
<script>
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
                        index = $(this).attr('name');
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
</script>