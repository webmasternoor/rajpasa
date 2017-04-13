

<div class="col-md-12">
    <div class="modal-header">
        <h4 class="modal-title" id="H1">Choose your seat(s)</h4>
    </div>
    <div class="col-md-6">
        Bus ID: {{$temp}}
        <?php
            echo $temp;
        ?>
        <?php
        $total_seat = DB::table('busrajs')->where('id',$temp)->get();
        //$total_seat = "SELECT * FROM `busrajs` WHERE `bus_id` = '45' ";
        //echo "<pre>";
        //print_r($total_seat);
        //echo "</pre>";
        foreach ($total_seat as $erqw)
        {   
            echo "<br/>Seat Fare: ".$erqw->seat_fare;
            echo "<br/>Bus type: ".$erqw->bus_type;
            echo "<input type='hidden' class='seat_fare' id='seat_fare' value='$erqw->seat_fare' />";
            echo "<input type='hidden' class='bus_type' id='bus_type' value='$erqw->bus_type' />";
            echo "<input type='text' class='total_seat' id='total_seat' value='$erqw->total_seat' />";
        }
        ?>
        <?php
        $temp21 = $erqw->bus_id;
        $users = DB::table('seatbuses')->where('bus_id',$temp21)->get();
        /*echo "<pre>";
        print_r($users);
        echo "</pre>";*/
        foreach ($users as $user)
        {
            echo "<p class='driverimg'><img src='./images/driver.png' alt=''></p>";
            $counter = 0;
            for($i=1;$i<=$erqw->total_seat;$i++){
                //echo $user->$i;
                ?>
                <div class="col-md-12 seatarra">                        
                    <table class="seatformat">
                        <tr>                                
                            <td>
                                <div class="seat28">                                    
                                    <div class="col-md-2 singleseat">
                                        <?php
                                            echo "<input type='button' id='$i' value='$i' class='blue' onclick='selected_seat();' />";
                                            //echo $counter."<br/>";
                                            $counter++;
                                            if($i%4 == 0)
                                            {
                                                echo "<br/>";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>                
                </div>
                <?php
            }    
            ?>
            <p id="show_seat"></p>
            <?php
        }
        ?>
        <?php
        if($erqw->total_seat == '28'){
        ?>
        <div class="col-md-12 seatarra">                        
            <table class="seatformat">
                <tr>                                
                    <td>
                        <div class="seat28">
                            <p class="driverimg"><img src="./images/driver.png" alt=""></p>
                            <div class="col-md-2 singleseat">
                                <input type='button' id='1' title="[A1]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='4' title="[A2]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='7' title="[A3]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='10' title="[A4]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='13' title="[A5]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='16' title="[A6]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='19' title="[A7]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='22' title="[A8]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='25' title="[A9]" value='1' class='blue' onclick='selected_seat();' />
                            </div>
                            <div class="col-md-1">
                                &nbsp;
                                <input class="seat28sigle" type='button' id='1' title="[B9]" value='1' class='blue' onclick='selected_seat();' />
                            </div>
                            <div class="col-md-5">
                                <input type='button' id='2' title="[B1]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='3' title="[C1]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='5' title="[B2]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='6' title="[C2]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='8' title="[B3]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='9' title="[C3]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='11' title="[B4]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='12' title="[C4]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='14' title="[B5]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='15' title="[C5]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='17' title="[B6]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='18' title="[C6]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='20' title="[B7]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='21' title="[C7]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='23' title="[B8]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='24' title="[C8]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='26' title="[C9]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='27' title="[D9]" value='1' class='blue' onclick='selected_seat();' />
                            </div>
                        </div>
                    </td>
                </tr>
            </table>                        
        </div>
        <?php }else{?>
        <div class="col-md-12 seatarra">                        
            <table class="seatformat">
                <tr>                                
                    <td>
                        <div class="seat40">
                            <p class="driverimg"><img src="./images/driver.png" alt=""></p>
                            <div class="col-md-5">
                                <input type='button' title="[A1]" id='1' value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[B1]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[A2]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[B2]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[A3]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[B3]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[A4]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[B4]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[A5]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[B5]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[A6]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[B6]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[A7]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[B7]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[A8]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[B8]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[A9]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[B9]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[A10]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[B10]" value='1' class='blue' onclick='selected_seat();' />
                            </div>
                            <div class="col-md-1">
                                &nbsp;
                            </div>
                            <div class="col-md-5">
                                <input type='button' id='1' title="[C1]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[D1]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[C2]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[D2]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[C3]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[D3]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[C4]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[D4]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[C5]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[D5]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[C6]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[D6]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[C7]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[D7]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[C8]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[D8]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[C9]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[D9]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[C10]" value='1' class='blue' onclick='selected_seat();' />
                                <input type='button' id='1' title="[D10]" value='1' class='blue' onclick='selected_seat();' />
                            </div>
                        </div>
                    </td>
                </tr>
            </table>                        
        </div>
        <?php } ?>
        <div class="col-md-6 confirmseat"><input type="button" value="Confirm your Seat(s)" onclick="finalSelection()"></div>
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
        <div class="test">            
        {{ csrf_field() }}
                <input type="hidden" name="total_amount" id="total_amount"/>
                <input type="hidden" name="store_id" value="testbox" />
                <input type="hidden" name="tran_id" value="58cf51141d28c" />
                <input type="hidden" name="success_url" value="http://localhost/rajpasa/rajpasasoft/public/busraj/success" />
                <input type="hidden" name="fail_url" value="http://localhost/rajpasa/rajpasasoft/public/busraj/fail" />
                <input type="hidden" name="cancel_url" value="http://localhost/rajpasa/rajpasasoft/public/busraj/cancel" />
                <input type="hidden" name="version" value="3.00" /> 

                <!-- Customer Information !-->
                
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
                
        </div>
        
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
        <!-- SUBMIT REQUEST  !-->
        <!-- <input type="submit" name="submit" value="Confirm" /> -->
        <a href="javascript:ajaxLoad('busraj/success')" class="btn btn-danger"><i
                                class="glyphicon glyphicon-backward"></i>
                        success</a>
        <a href="javascript:ajaxLoad('busraj/fail')" class="btn btn-danger"><i
                                class="glyphicon glyphicon-backward"></i>
                        fail</a>
        <a href="javascript:ajaxLoad('busraj/cancel')" class="btn btn-danger"><i
                                class="glyphicon glyphicon-backward"></i>
                        cancel</a>                                
        <div class="form-group">
                <div class="col-md-6 col-md-push-3">
                    <a href="javascript:ajaxLoad('busraj/list')" class="btn btn-danger"><i
                                class="glyphicon glyphicon-backward"></i>
                        Back</a>
                    {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Continue",["type" => "submit","class"=>"btn
                btn-primary"])!!}
                </div>
            </div>
        </form>
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
  <!-- <script>
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
  
  
  </script> -->