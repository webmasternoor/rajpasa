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
        }
        ?>
        <div class="col-md-12 seatarra">                        
            <table>
                <tr>                                
                    <td>
                        <div>
                        <p class="driverimg"><img src="./images/driver.png" alt=""></p>
        <?php
        /*$table_name = 'seatbuses';
        $columns = DB::select('show columns from ' . $table_name);
        foreach ($columns as $value) {
           echo $value->Field ;
        }
        */
        //$users = Seatbus::table('seatbuses')->where('bus_id',$temp)->get();
        //echo $us = Seatbus::seatbuse()->total_seat;

        //Auth::user()->type == 'admin')
        $total_seat = DB::table('busrajs')->where('bus_id',$temp)->get();
        foreach ($total_seat as $er)
        {   
            //echo $er->seat_fare;
        }
        $users = DB::table('seatbuses')->where('bus_id',$temp)->get();
        foreach ($users as $user)
        {
            //$table_name = 'seatbuses';
            //$columns = DB::select('show columns from ' . $table_name);
            
            //foreach ($columns as $value) {
            //$tte = $value->Field ;
            //echo $user->id;
            $counter = 0;
            for($i=1;$i<$er->total_seat;$i++){
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
        <!-- <input type="button" id="button2" value="Display" onclick="display_array();"></input> -->
            <p id="show_seat"></p>
            <?php
        }
        ?>
                        </div>
                    </td>
                </tr>
            </table>                        
        </div>
    </div>
    <div class="col-md-6">
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
                            <th>Seats</th>
                            <th>Fare</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div id="Result"></div>
                            </td>
                            <td>
                                <div id="seat_fare1"></div>
                            </td>
                            <td>
                                 <div id="bus_type1"></div>   
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;">
                                Total Fare: 
                                <div id="total_fare"></div>   
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>                           
        </div>
    </div>
</div> 
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('busraj/list')" class="btn btn-danger"><i
                    class="glyphicon glyphicon-backward"></i>
            Back</a>
    </div>
</div>
<script>
$( "input" ).click(function() {
  $( this ).toggleClass( "highlight" );
});
</script>
<script type="text/javascript">
    var total_selected_seat = 0;
    var x = 0;
    var array = Array();
    var seat_fare = document.getElementById("seat_fare").value;
    var bus_type = document.getElementById("bus_type").value;
    var counter = 0;
    function selected_seat(){
     counter++;
     document.getElementById("total_fare").innerHTML = seat_fare * counter ;
     array[x] = document.getElementById(selected_seat.caller.arguments[0].target.id).value;
     //alert("Element: " + array[x] + " Added at index " + x);
     x++;
     document.getElementById("seat_fare1").innerHTML += seat_fare + "<br/>";
     document.getElementById("bus_type1").innerHTML += bus_type + "<br/>";

     //var e = "<hr/>";   
     var e = "";   
    
   for (var y=0; y<array.length; y++)
   {
     //e += "Element " + y + " = " + array[y] + "<br/>";
     e += array[y] + "<br/>";
     //var e = e.unique();
   }
   document.getElementById("Result").innerHTML = e;

}
/*function display_array()
{
   var e = "<hr/>";   
    
   for (var y=0; y<array.length; y++)
   {
     //e += "Element " + y + " = " + array[y] + "<br/>";
     e += array[y] + ",";
     //var e = e.unique();
   }
   document.getElementById("Result").innerHTML = e;
}*/
</script>
<script type="text/javascript">
    
</script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>