<div class="col-md-12">
    <div class="modal-header">
        <h4 class="modal-title" id="H1">Choose your seat(s)</h4>
    </div>
    <div class="col-md-6">
        Bus ID: {{$temp}}
        <?php
        $total_seat = DB::table('busrajs')->where('bus_id',$temp)->get();
        foreach ($total_seat as $er)
        {   
            echo "<br/>Seat Fare: ".$er->seat_fare;
            echo "<br/>Bus type: ".$er->bus_type;
            echo "<input type='hidden' class='seat_fare' id='seat_fare' value='$er->seat_fare' />";
            echo "<input type='hidden' class='bus_type' id='bus_type' value='$er->bus_type' />";
            echo "<input type='hidden' class='total_seat' id='total_seat' value='$er->total_seat' />";
        }
        ?>
        <div class="col-md-12 seatarra">                        
            <table class="seatformat">
                <tr>                                
                    <td>
                        <div class="seatdiv">
                        <p class="driverimg"><img src="./images/driver.png" alt=""></p>
        <?php
        
        $total_seat = DB::table('busrajs')->where('bus_id',$temp)->get();
        foreach ($total_seat as $er)
        {   
            //echo $er->seat_fare;
        }
        $users = DB::table('seatbuses')->where('bus_id',$temp)->get();
        foreach ($users as $user)
        {
            
            $counter = 0;
            for($i=1;$i<=$er->total_seat;$i++){
                //echo $user->$i;
                echo "<input type='button' id='$i' value='$i' class='blue' onclick='selected_seat();' />";
                //echo $counter."<br/>";
                $counter++;
                if($i%4 == 0)
                {
                    echo "<br/>";
                }
                
            }    
            ?>
            <p id="show_seat"></p>
            <?php
        }
        ?>
                        </div>
                    </td>
                </tr>
            </table>                        
        </div>
        <div class="col-md-6 confirmseat"><input type="button" value="Confirm your Seat(s)" onclick="finalSelection()"></div>
    </div>
    
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
                                        <input type="hidden" name="seat_fare" value="<?php echo $er->seat_fare;?>">    
                                    </div>
                                    <div class="col-md-4">
                                        <div id="seat_fare1"></div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div id="bus_type1"></div>          
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; padding-top: 10%;">
                                <div style="float: left;">Total Fare: </div>
                                <div id="total_fare" class="t_total"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>                        
        </div>
        <div class="test">
            <form id="payment_gw" name="payment_gw" method="POST" action="https://sandbox.sslcommerz.com/gwprocess/v3/process.php">
                <input type="hidden" name="total_amount" id="total_amount"/>
                <input type="hidden" name="store_id" value="testbox" />
                <input type="hidden" name="tran_id" value="58cf51141d28c" />
                <input type="hidden" name="success_url" value="https://sandbox.sslcommerz.com/developer/success.php" />
                <input type="hidden" name="fail_url" value="https://sandbox.sslcommerz.com/developer/fail.php" />
                <input type="hidden" name="cancel_url" value="https://sandbox.sslcommerz.com/developer/cancel.php" />
                <input type="hidden" name="version" value="3.00" /> 

                <!-- Customer Information !-->
                <input type="hidden" name="cus_name" value="ABC XYZ">
                <input type="hidden" name="cus_email" value="abc.xyz@mail.com"> 
                <input type="hidden" name="cus_add1" value="Address Line One">
                <input type="hidden" name="cus_add2" value="Address Line Two">
                <input type="hidden" name="cus_city" value="City Name">
                <input type="hidden" name="cus_state" value="State Name">
                <input type="hidden" name="cus_postcode" value="Post Code">
                <input type="hidden" name="cus_country" value="Country">
                <input type="hidden" name="cus_phone" value="01111111111">
                <input type="hidden" name="cus_fax" value="01711111111">

                <!-- Shipping Information !-->
                <input type="hidden" name="ship_name" value="ABC XYZ">
                <input type="hidden" name="ship_add1" value="Address Line One"> 
                <input type="hidden" name="ship_add2" value="Address Line Two">
                <input type="hidden" name="ship_city" value="City Name">
                <input type="hidden" name="ship_state" value="State Name">
                <input type="hidden" name="ship_postcode" value="Post Code">
                <input type="hidden" name="ship_country" value="Country">

                <!-- Optional Parameters which will be stored and returned at the end !-->
                <input type="hidden" name="value_a" value="ref001">
                <input type="hidden" name="value_b" value="ref002"> 
                <input type="hidden" name="value_c" value="ref003">
                <input type="hidden" name="value_d" value="ref004"> 

                <!-- PRODUCT 1 !-->
                <input type="hidden" name="cart[0][product]" value="FRESH HOME MADE BREAD 350GM" />
                <input type="hidden" name="cart[0][amount]" value="500.00" />

                <!-- PRODUCT 2 !-->
                <input type="hidden" name="cart[1][product]" value="FRESH HOME MADE BREAD 350GM Quantity(1)" />
                <input type="hidden" name="cart[1][amount]" value="600.00">

                <!-- PRODUCT 3 !-->
                <input type="hidden" name="cart[2][product]" value="SHIPMENT CHARGE" />
                <input type="hidden" name="cart[2][amount]" value="50.00" />

                <!-- SUBMIT REQUEST  !-->
                <input type="submit" name="submit" value="Pay Now" />
            </form> 
        </div>
        {!! Form::model($busraj,["id"=>"frm","class"=>"form-horizontal"]) !!}
        <div class="row">
            <div class="form-group required col-md-12" id="form-departure_place-error">
                {!! Form::label("departure_place","Choose Boarding Point",["class"=>"control-label col-md-8"]) !!}
                <div class="col-md-12">
                    {!! Form::select("departure_place",$district_info, null,["class"=>"departure_place form-control required","id"=>"departure_place"]) !!}
                    <span id="departure_place-error" class="help-block"></span>
                </div>
            </div>
            <div class="form-group required col-md-6" id="form-name-error">
                <input type="hidden" name="bus_id" value="<?php echo $temp;?>">                
                <input type="hidden" name="company_id" value="<?php echo $er->company_id;?>">
                <input type="hidden" name="departure_place" value="<?php echo $er->departure_place;?>">
                <input type="hidden" name="arrival_place" value="<?php echo $er->arrival_place;?>">
                <input type="hidden" name="departure_time" value="<?php echo $er->departure_time;?>">
                <input type="hidden" name="arrival_time" value="<?php echo $er->arrival_time;?>">

                {!! Form::label("name","Name",["class"=>"control-label col-md-12"]) !!}
                <div class="col-md-12">
                    {!! Form::text("name",null,["class"=>"form-control required","id"=>"name"]) !!}
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
            <div class="form-group">
                <div class="col-md-6 col-md-push-3">
                    <a href="javascript:ajaxLoad('busraj/list')" class="btn btn-danger"><i
                                class="glyphicon glyphicon-backward"></i>
                        Back</a>
                    {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Continue",["type" => "submit","class"=>"btn
                btn-primary"])!!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script>
$( "input" ).click(function() {
  $( this ).toggleClass( "highlight" );
});
</script>
<script type="text/javascript">
   var total_selected_seat = 0;
    var counter = 0, seat_id = 0, i = 0, seats = 0;

    var arr = Array(), finalArr = Array();
    

    var total_seat = document.getElementById("total_seat").value;
    var seat_fare = document.getElementById("seat_fare").value;
    var bus_type = document.getElementById("bus_type").value;
    

    function selected_seat(){
        
     arr[i++] = document.getElementById(selected_seat.caller.arguments[0].target.id).value;
     
     }
     
     function find_duplicate_in_array(arra1) {  
      var i, x=0, counter = 0, len=arra1.length,  result = [],  obj = {}, repeat;   
      for (i=0; i<len; i++)  
      {  
            if(arra1[i] != 0){
                repeat = arra1[i];      
                for(var y = 0; y<len; y++){
                        if(arra1[y] == repeat){
                            counter ++;
                            arra1[y] = 0;
                        }
                }
                if(counter % 2 != 0)
                {
                    result[x] = repeat;
                    x++;
                    counter = 0;
                }
            } 
     } 
      return result;  
   }  
        

     function finalSelection(){
        var x = 0;
       finalArr = find_duplicate_in_array(arr); 
       // document.write(finalArr);
       
        document.getElementById("Result").value = finalArr;
        
        document.getElementById("total_amount").value = seat_fare * finalArr.length ;

        document.getElementById("quantity").value = finalArr.length;
        document.getElementById("seat_fare1").innerHTML += seat_fare ;
        document.getElementById("bus_type1").innerHTML += bus_type ;
        document.getElementById("total_fare").innerHTML = seat_fare * finalArr.length ;
      
}
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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