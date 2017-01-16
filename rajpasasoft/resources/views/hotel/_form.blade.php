<div class="col-md-12">
    
    <div class="form-group required col-md-6" id="form-hotel_id-error">
        {!! Form::label("hotel_id","Hotel Id",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("hotel_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="hotel_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-company_id-error">
        {!! Form::label("company_id","Company Id",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("company_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="company_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-address-error">
        {!! Form::label("address","Address",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("address",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="address-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-email-error">
        {!! Form::label("email","Email",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("email",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="email-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-phone-error">
        {!! Form::label("phone","Phone",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("phone",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="phone-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-hotel_name-error">
        {!! Form::label("hotel_name","Hotel Name",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("name",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="name-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-total_room-error">
        {!! Form::label("total_room","No of Rooms",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("total_room",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="total_room-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-check_in-error">
        {!! Form::label("check_in","Check in",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("check_in",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="check_in-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-check_out-error">
        {!! Form::label("check_out","Check out",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("check_out",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="check_out-error" class="help-block"></span>
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
        {!! Form::label("name","hotel name",["class"=>"control-label col-md-3"]) !!}
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