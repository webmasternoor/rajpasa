<?php
foreach ($seat_info as $key){
    echo $key->bus_id;
}
?>
<div class="col-md-12">
  <div class="col-md-6">
    <div class="modal-header">
        <h4 class="modal-title" id="H1">Choose your seat(s)</h4>
    </div>
    <div class="">
        <?php
        foreach ($seat_info as $key){
            echo $key->bus_id;
            echo "<br/>Seat Fare: ".$key->seat_fare;
            echo "<br/>Bus type: ".$key->bus_type;
            echo "<input type='hidden' class='seat_fare' id='seat_fare' value='$key->seat_fare' />";
            echo "<input type='hidden' class='bus_type' id='bus_type' value='$key->bus_type' />";
            echo "<input type='text' class='total_seat' id='total_seat' value='$key->total_seat' />";
        }
        ?>
    </div>
    <div class="seatdesign">
        <div id="holder"> 
            <ul  id="place">
            </ul>    
        </div>
        <div style="float:left;"> 
        <ul id="seatDescription">
            <li style="background:url('./images/available_seat_img.gif') no-repeat scroll 0 0 transparent;">Available Seat</li>
            <li style="background:url('./images/booked_seat_img.gif') no-repeat scroll 0 0 transparent;">Booked Seat</li>
            <li style="background:url('./images/selected_seat_img.gif') no-repeat scroll 0 0 transparent;">Selected Seat</li>
        </ul>
        </div>
        <div style="clear:both;width:100%">
          <input type="button" id="btnShowNew" value="Show Selected Seats" />
          <input type="button" id="btnShow" value="Show All" />           
      </div>
    </div>
  </div>
    {!! Form::open(["id"=>"frm","class"=>"form-horizontal"]) !!}
    <div class="col-md-6 seatcusdeta">
        <div class="row">
            <div class="col-sm-4" style="padding-right:0;">
                <ul id="Ul71" class="list-inline clearfix">
                    <li class="seat-white"></li>
                    <li class="legend-label">Available Seats</li>
                </ul>
            </div>
            <div class="col-sm-4" style="padding-right:0;">
                <ul id="Ul72" class="list-inline clearfix">
                    <li class="seat-gray"></li>
                    <li class="legend-label">Booked Seats</li>
                </ul>
            </div>
            <div class="col-sm-4" style="padding-right:0;">
                <ul id="Ul73" class="list-inline clearfix">
                    <li class="seat-green"></li>
                    <li class="legend-label">Selected Seats</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div id="tbl_price_details">
                <table class="table-responsive">
                    <thead>
                        <tr>
                            <div class="col-md-12 seatbookright">
                                <div class="col-md-4">
                                    Seat Number
                                </div>
                                <div class="col-md-4">
                                    Seat Fare
                                </div>
                                <div class="col-md-4">
                                    Bus Type
                                </div>
                            </div>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <input type="text" style="border: 0; background: transparent; box-shadow: 0 0 0;" id="Result" name="Result">
                                        <input type="hidden" style="border: 0;" id="quantity" name="quantity">
                                        <input type="hidden" name="seat_fare" value="<?php //echo $er->seat_fare;?>">    
                                    </div>
                                    <div class="col-md-4">
                                        <div style="display: none;" id="seat_fare1"></div>
                                        <?php //echo $er->seat_fare; ?>        
                                    </div>
                                    <div class="col-md-4">
                                        <div style="display: none;" id="bus_type1"></div>   
                                        <?php //echo $er->bus_type; ?>       
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; padding-top: 10%;">
                                <div style="float: left;">Total Fare: </div>
                                <div id="total_fare" class="t_total" name="total_fare"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>                        
        </div>        
        <div class="row">
            <div class="form-group required col-md-6" id="form-name-error">
                <input type="hidden" name="bus_id" value="<?php //echo $temp;?>">                
                <input type="hidden" name="company_id" value="<?php //echo $er->company_id;?>">
                <input type="hidden" name="departure_place" value="<?php //echo $er->departure_place;?>">
                <input type="hidden" name="arrival_place" value="<?php //echo $er->arrival_place;?>">
                <input type="hidden" name="departure_time" value="<?php //echo $er->departure_time;?>">
                <input type="hidden" name="arrival_time" value="<?php //echo $er->arrival_time;?>">

                {!! Form::label("name","Name",["class"=>"control-label col-md-12"]) !!}
                <div class="col-md-12">
                    {!! Form::text("cus_name",null,["class"=>"form-control required","id"=>"name"]) !!}
                    <span id="name-error" class="help-block"></span>
                </div>
            </div>
            <div class="form-group required col-md-6" id="form-mobile-error">
                {!! Form::label("mobile","Mobile",["class"=>"control-label col-md-12"]) !!}
                <div class="col-md-12">
                    {!! Form::text("mobile", null,["class"=>"mobile form-control required","id"=>"mobile"]) !!}
                    <span id="mobile-error" class="help-block"></span>
                </div>
            </div>
            <div class="form-group required col-md-6" id="form-email-error">
                {!! Form::label("email","Email",["class"=>"control-label col-md-12"]) !!}
                <div class="col-md-12">
                    {!! Form::email("email", null,["class"=>"email form-control required","id"=>"email"]) !!}
                    <span id="email-error" class="help-block"></span>
                </div>
            </div>
            <div class="form-group required col-md-6" id="form-gender-error">
                {!! Form::label("gender","Gender",["class"=>"control-label col-md-12"]) !!}
                <div class="col-md-12">
                    <input type="radio" name="gender" value="male"> Male
                    <input type="radio" name="gender" value="female"> Female
                    <input type="radio" name="gender" value="female"> Others
                </div>
            </div>
            <div class="form-group required col-md-12 paymdiv" id="form-paymdiv-error">
                <div class="col-md-12 paymentmethodoption">
                    <label><input type="radio" name="colorRadio" value="bkash"> bkash</label>
                    <label><input type="radio" name="colorRadio" value="cod"> Cash on delivery</label>
                    <label><input type="radio" name="colorRadio" value="crdr"> credit or debit card</label>
                    <label><input type="radio" name="colorRadio" value="intban"> internet banking</label>
                </div>
                <div class="col-md-12 red box bkash">
                    <div class="borderportion">
                        <label for="">bKash Number: +8801679624759</label>
                    </div>
                </div>
                <div class="col-md-12 green box cod">
                    <div class="borderportion">
                        <div class="form-group required col-md-6" id="form-city-error">
                            {!! Form::label("city","City",["class"=>"control-label col-md-12"]) !!}
                            <div class="col-md-12">
                                {!! Form::text("city",null,["class"=>"form-control required","id"=>"city"]) !!}
                                <span id="city-error" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group required col-md-6" id="form-area-error">
                            {!! Form::label("area","Area",["class"=>"control-label col-md-12"]) !!}
                            <div class="col-md-12">
                                {!! Form::text("area", null,["class"=>"area form-control required","id"=>"area"]) !!}
                                <span id="area-error" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group required col-md-6" id="form-firstname-error">
                            {!! Form::label("firstname","First Name",["class"=>"control-label col-md-12"]) !!}
                            <div class="col-md-12">
                                {!! Form::text("firstname", null,["class"=>"firstname form-control required","id"=>"firstname"]) !!}
                                <span id="firstname-error" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group required col-md-6" id="form-lastname-error">
                            {!! Form::label("lastname","Last Name",["class"=>"control-label col-md-12"]) !!}
                            <div class="col-md-12">
                                {!! Form::text("lastname", null,["class"=>"lastname form-control required","id"=>"lastname"]) !!}
                                <span id="lastname-error" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group required col-md-12" id="form-address1-error">
                            {!! Form::label("address1","Address Line 1",["class"=>"control-label col-md-12"]) !!}
                            <div class="col-md-12">
                                {!! Form::textarea("address1", null,["class"=>"address1 form-control required","id"=>"address1"]) !!}
                                <span id="address1-error" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group required col-md-12" id="form-address2-error">
                            {!! Form::label("address2","Address Line 2",["class"=>"control-label col-md-12"]) !!}
                            <div class="col-md-12">
                                {!! Form::textarea("address2", null,["class"=>"address2 form-control required","id"=>"address2"]) !!}
                                <span id="address2-error" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group required col-md-6" id="form-landmark-error">
                            {!! Form::label("landmark","Landmark",["class"=>"control-label col-md-12"]) !!}
                            <div class="col-md-12">
                                {!! Form::text("landmark", null,["class"=>"landmark form-control required","id"=>"landmark"]) !!}
                                <span id="landmark-error" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group required col-md-6" id="form-postalcode-error">
                            {!! Form::label("postalcode","Postal Code",["class"=>"control-label col-md-12"]) !!}
                            <div class="col-md-12">
                                {!! Form::text("postalcode", null,["class"=>"postalcode form-control required","id"=>"postalcode"]) !!}
                                <span id="postalcode-error" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group required col-md-12" id="form-altcontactno-error">
                            {!! Form::label("altcontactno","Alternate Contact No",["class"=>"control-label col-md-12"]) !!}
                            <div class="col-md-12">
                                {!! Form::text("altcontactno", null,["class"=>"altcontactno form-control required","id"=>"altcontactno"]) !!}
                                <span id="altcontactno-error" class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 blue box crdr"> 
                    <div class="borderportion">
                        <div class="form-group required col-md-12" id="form-email-error">
                            <select id="crdb_card" name="crdb_card" class="form-control" onchange="setDiscount(this.value);">
                                <option value="">Please select one</option>
                                <option value="city_amex" percentage="3.5">American Express</option>
                                <option value="DBBL Nexaus Card" percentage="2">DBBL Nexus</option>
                                <option value="MasterCard" percentage="3">MasterCard (via BRAC gateway)</option>
                                <option value="city_master" percentage="2.5">MasterCard (via City Bank Gateway)</option>
                                <option value="MasterCard_Dutch" percentage="2.5">MasterCard (via Dutch-Bangla gateway)</option>
                                <option value="Visa" percentage="3">VISA (via BRAC gateway)</option>
                                <option value="city_visa" percentage="2.5">VISA (via City Bank Gateway)</option>
                                <option value="Visa_Dutch" percentage="2.5">VISA (via Dutch-Bangla gateway)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 yellow box intban">
                    <div class="borderportion">
                        <div class="form-group required col-md-12" id="form-email-error">
                            <select id="intbank" name="intbank" class="form-control" onchange="setDiscount(this.value);">
                                <option value="">Please select one</option>
                                <option value="bankasia" percentage="2">Bank Asia Internet Banking</option>
                                <option value="city" percentage="3">City Touch Internet Banking</option>
                                <option value="dbblmobilebanking" percentage="2">Rocket - DBBL Mobile Banking</option>
                                <option value="ibbl" percentage="2">IBBL Internet &amp; Mobile Banking</option>
                                <option value="mtbl" percentage="2">Mutual Trust Bank Internet Banking</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-push-3">
            <a href="javascript:ajaxLoad('busraj/list')" class="btn btn-danger"><i
                        class="glyphicon glyphicon-backward"></i>
                Back</a>
            {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Continue",["type" => "submit","class"=>"btn
        btn-primary"])!!}
        </div>
    </div>
    {!! Form::close() !!}
</div>


<script type="text/javascript">
    
   var total_seat = document.getElementById('total_seat').value; 

   if(total_seat == '28'){
    var col = 7;
   }
   else{
    var col = 10;
   }
var settings = {
   rows: 4,
   cols: col,
   rowCssPrefix: 'row-',
   colCssPrefix: 'col-',
   seatWidth: 35,
   seatHeight: 35,
   seatCss: 'seat',
   selectedSeatCss: 'selectedSeat',
   selectingSeatCss: 'selectingSeat'
};

var init = function (reservedSeat) {
    var str = [], seatNo, className;
    for (i = 0; i < settings.rows; i++) {
        for (j = 0; j < settings.cols; j++) {
            seatNo = (i + j * settings.rows + 1);
            className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
            if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
                className += ' ' + settings.selectedSeatCss;
            }
            str.push('<li class="' + className + '"' +
                      'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
                      '<a title="' + seatNo + '">' + seatNo + '</a>' +
                      '</li>');
        }
    }
    $('#place').html(str.join(''));
};

var bookedSeats = [5, 10, 25];



init(bookedSeats);
$('.' + settings.seatCss).click(function () {
if ($(this).hasClass(settings.selectedSeatCss)){
    alert('This seat is already reserved');
}
else{
    $(this).toggleClass(settings.selectingSeatCss);
    }
});
 
$('#btnShow').click(function () {
    var str = [];
    $.each($('#place li.' + settings.selectedSeatCss + ' a, #place li.'+ settings.selectingSeatCss + ' a'), function (index, value) {
        str.push($(this).attr('title'));
    });
    alert(str.join(','));
})
 
$('#btnShowNew').click(function () {
    var str = [], item;
    $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
        item = $(this).attr('title');                   
        str.push(item);                   
    });
    //alert(str.join(','));
    //document.getElementById('Result').str.join(',');
    document.getElementById("Result").value = str.join(',');
})
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>        
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