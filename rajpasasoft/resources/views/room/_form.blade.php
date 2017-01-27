<div class="col-md-12">
    
    <div class="form-group required col-md-6" id="form-room_id-error">
        {!! Form::label("room_id","Room Id",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("room_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="room_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-hotel_id-error">
        {!! Form::label("hotel_id","Hotel Name",["class"=>"control-label col-md-3"]) !!}
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
    <div class="form-group required col-md-6" id="form-room_no-error">
        {!! Form::label("room_no","Room No",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("room_no",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="room_no-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-total_bed-error">
        {!! Form::label("total_bed","No of Beds",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("total_bed",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="total_bed-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-room_type-error">
        {!! Form::label("room_type","Room Type",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("room_type",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="room_type-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-room_type2-error">
        {!! Form::label("room_type2","Room Type2",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("room_type2",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="room_type2-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-facility-error">
        {!! Form::label("facility","Facility",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("facility",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="facility-error" class="help-block"></span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('room/list')" class="btn btn-danger"><i
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