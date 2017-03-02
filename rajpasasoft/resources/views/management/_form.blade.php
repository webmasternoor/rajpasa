<div class="col-md-12">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group required col-md-6" id="form-manager_id-error">
        {!! Form::label("manager_id","Manager Id",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::text("manager_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="manager_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-company_id-error">
        {!! Form::label("company_id","Company Name",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::select("company_id", $company_info, null,["class"=>"form-control required","id"=>"focus"]) !!}
            <!-- {!! Form::text("company_id",null,["class"=>"form-control required","id"=>"focus"]) !!} -->
            <span id="company_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-user_id-error">
        {!! Form::label("user_id","Manager Name",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::text("user_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="user_id-error" class="help-block"></span>
        </div>
    </div>    
    <div class="form-group required col-md-6" id="form-emailaddress-error">
        {!! Form::label("emailaddress","Email Address",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            <!-- {!! Form::text("password12",null,["class"=>"form-control required","id"=>"focus"]) !!} -->
            {!! Form::email("emailaddress",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="emailaddress-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-password-error">
        {!! Form::label("password","Password",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            <!-- {!! Form::text("password12",null,["class"=>"form-control required","id"=>"focus"]) !!} -->
            {!! Form::password("password12",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="password-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-password122-error">
        {!! Form::label("password122","Confirm Password",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::password("password122",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="password122-error" class="help-block"></span>
        </div>
    </div>
    <!-- <div class="form-group required col-md-6" id="form-password122-error">
        <label class="col-md-6 control-label">Type</label>
        <div class="col-md-6">
            <select class="form-control" name="type" id="type">
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="counter">Counter</option>
            </select>                           
        </div>
    </div> -->
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('management/list')" class="btn btn-danger"><i
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
                        index = $(this).attr('manager_id');
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