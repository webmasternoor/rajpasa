<div class="col-md-12">
    <div class="form-group required col-md-6" id="form-name-error">
        {!! Form::label("name","name",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("name",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="name-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-CompanyrajCode-error">
        {!! Form::label("CompanyrajCode","faname",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("CompanyrajCode",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="CompanyrajCode-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-unitprice-error">
        {!! Form::label("unitprice","moname",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("unitprice",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="unitprice-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-company_id-error">
        {!! Form::label("company_id","Company Id",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("company_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="company_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-company_name-error">
        {!! Form::label("company_name","Company Name",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("company_name",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="company_name-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-company_email-error">
        {!! Form::label("company_email","Company Email",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("company_email",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="company_email-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-company_address-error">
        {!! Form::label("company_address","Company Address",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("company_address",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="company_address-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-company_license-error">
        {!! Form::label("company_license","Company License",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("company_license",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="company_license-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-company_logo-error">
        {!! Form::label("company_logo","Company Logo",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("company_logo",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="company_logo-error" class="help-block"></span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('companyraj/list')" class="btn btn-danger"><i
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