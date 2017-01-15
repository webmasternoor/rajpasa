<div class="col-md-12">
    <div class="form-group required col-md-6" id="form-name-error">
        {!! Form::label("name","প্রোডাক্ট কোডঃ",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("name",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="name-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-CounterCode-error">
        {!! Form::label("CounterCode","প্রোডাক্টের নামঃ",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("CounterCode",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="CounterCode-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-unitprice-error">
        {!! Form::label("unitprice","প্রোডাক্টের নামঃ",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("unitprice",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="unitprice-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-counter_id-error">
        {!! Form::label("counter_id","Counter Id",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("counter_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="counter_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-manager_id-error">
        {!! Form::label("manager_id","Manager Id",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("manager_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="manager_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-company_id-error">
        {!! Form::label("company_id","Company Id",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("company_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="company_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-user_name-error">
        {!! Form::label("user_name","User Name",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("user_name",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="user_name-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-password-error">
        {!! Form::label("user_name","Password",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("user_name",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="user_name-error" class="help-block"></span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('counter/list')" class="btn btn-danger"><i
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