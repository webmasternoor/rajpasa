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
    
    <!-- <div class="form-group required col-md-4" id="form-bus_id-error">
        {!! Form::label("bus_id","Bus ID",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::text("bus_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="bus_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-4" id="form-company_id-error">
        {!! Form::label("company_id","Company ID",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::select("company_id",$company_info, null,["class"=>"company_id form-control required","id"=>"company_id"]) !!}
            <span id="company_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-4" id="form-manager_id-error">
        {!! Form::label("manager_id","Manager ID",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::select("manager_id",$manager_info, null,["class"=>"manager_id form-control required","id"=>"manager_id"]) !!}
            <span id="manager_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-departure_time-error">
        {!! Form::label("departure_time","Departure Time",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::time("departure_time",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="departure_time-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-arrival_time-error">
        {!! Form::label("arrival_time","Arrival Time",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::time("arrival_time",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="arrival_time-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-departure_date-error">
        {!! Form::label("departure_date","Departure Date",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::date("departure_date",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="departure_date-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-arrival_date-error">
        {!! Form::label("arrival_date","Arrival Date",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::date("arrival_date",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="arrival_date-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-departure_place-error">        
        {!! Form::label("departure_place","Departure Place",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
             {!! Form::select("departure_place",$district_info,null,["class"=>"form-control required","id"=>"focus"]) !!} 
            {!! Form::select("departure_place", $district_info, null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="departure_place-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-arrival_place-error">
        {!! Form::label("arrival_place","Arrival Place",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::select("arrival_place", $district_info, null,["class"=>"form-control required","id"=>"focus"]) !!}
             {!! 
            Form::text("arrival_place",null,["class"=>"form-control required","id"=>"focus"]) !!} 
            <span id="arrival_place-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-bus_type-error">
        {!! Form::label("bus_type","Bus Type",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            <select name="bus_type">
              <option value="ac">AC</option>
              <option value="nonac">Non AC</option>
            </select>
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
            {!! Form::number("seat_fare",null,["class"=>"form-control required","id"=>"focus"]) !!}
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
</div> -->
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('bussearch/list')" class="btn btn-danger"><i
                    class="glyphicon glyphicon-backward"></i>
            Back</a>
        {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Save",["type" => "submit","class"=>"btn
    btn-primary"])!!}
    </div>
</div>
 <!--<script>
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
                        index = $(this).attr('bus_id');
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
<!-- <script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change', '.company_id', function () {
            //console.log("yes it is change");

            var op = " ";
            var company_id = $(this).val();
            //var div = $(this).parent();
            //console.log(DivisionId);
            $('#manager_id').empty();
            $.ajax({
                type: 'get',
                url: 'getManager',
                data: {'id': company_id},
                success: function (data) {
                    $.each(data, function (index, subcatObj) {
                        $('#manager_id').append('<option value="'+subcatObj.id+'">'+subcatObj.user_id +'</option>')
                    });
                },
                error: function () {

                }
            });
            $.ajax(clear);
        });
    });    
</script> -->