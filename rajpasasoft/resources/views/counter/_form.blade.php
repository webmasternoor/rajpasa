<div class="col-md-12">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group required col-md-6" id="form-company_id-error">
        {!! Form::label("company_id","Company ID",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::select("company_id",$company_info,null,["class"=>"company_id form-control required","id"=>"company_id"]) !!}
            <span id="company_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-manager_id-error">
        {!! Form::label("manager_id","Manager ID",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::select("manager_id",$manager_info,null,["class"=>"manager_id form-control required","id"=>"manager_id"]) !!}
            <span id="manager_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-counter_id-error">
        {!! Form::label("counter_id","Counter ID",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("counter_id",null,["class"=>"form-control","id"=>"focus"]) !!}
            <span id="counter_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-user_name-error">
        {!! Form::label("user_name","Counter Name",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("counter_name",null,["class"=>"form-control","id"=>"focus"]) !!}
            <span id="user_name-error" class="help-block"></span>
        </div>
    </div>
    <!-- <div class="form-group required col-md-12" id="form-password122-error">
            <label class="col-md-6 control-label">Type</label>
            <div class="col-md-3">
                <select class="form-control" name="type" id="type">
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="counter">Counter</option>
                </select>                           
            </div>
        </div> -->    
    <div class="form-group col-md-4" id="form-emailaddress-error">
        {!! Form::label("emailaddress","Email Address",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            <!-- {!! Form::text("password12",null,["class"=>"form-control","id"=>"focus"]) !!} -->
            {!! Form::email("emailaddress",null,["class"=>"form-control","id"=>"focus"]) !!}
            <span id="emailaddress-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group col-md-4" id="form-password12-error">
        {!! Form::label("password","Password",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::password("password12",null,["class"=>"form-control","id"=>"focus"]) !!}
            <span id="password12-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group col-md-4" id="form-password123-error">
        {!! Form::label("password","Confirm Password",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::password("password122",null,["class"=>"form-control","id"=>"focus"]) !!}
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
<script type="text/javascript">
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
</script>