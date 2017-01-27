<div class="col-md-12">
    <div class="form-group required col-md-6" id="form-counter_id-error">
        {!! Form::label("counter_id","Counter ID",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("counter_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="counter_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-manager_id-error">
        {!! Form::label("manager_id","Manager ID",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::select("manager_id",$manager_info,null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="manager_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-company_id-error">
        {!! Form::label("company_id","Company ID",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::select("company_id",$company_info,null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="company_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-user_name-error">
        {!! Form::label("user_name","Counter Name",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("counter_name",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="user_name-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-password12-error">
        {!! Form::label("password","Password",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::password("password12",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="password12-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-password123-error">
        {!! Form::label("password","Confirm Password",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::password("password122",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="password123-error" class="help-block"></span>
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
                        index = $(this).attr('counter_id');
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