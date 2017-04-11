<div class="col-md-12">    
    <div class="form-group  col-md-4" id="form-departure_place-error">        
        {!! Form::label("departure_place","Departure Place",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::select("departure_place", $district_info, null,["class"=>"form-control ","id"=>"focus"]) !!}
            <span id="departure_place-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group  col-md-4" id="form-arrival_place-error">
        {!! Form::label("arrival_place","Arrival Place",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::select("arrival_place", $district_info, null,["class"=>"form-control ","id"=>"focus"]) !!}
            <span id="arrival_place-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group  col-md-4" id="form-departure_date-error">
        {!! Form::label("departure_date","Date",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::date("departure_date",null,["class"=>"form-control ","id"=>"focus"]) !!}
            <span id="departure_date-error" class="help-block"></span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('busraj/listbus')" class="btn btn-danger"><i
                    class="glyphicon glyphicon-backward"></i>
            Back</a>
        {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Search",["type" => "submit","class"=>"btn
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
                    $('#frm input., #frm textarea.').each(function () {
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
                    //ajaxLoad('busraj/listbus');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        return false;
    }
    /*$(document).ready(function () {
        ajaxLoad('busraj/listbus');
    }*/
    );
</script>