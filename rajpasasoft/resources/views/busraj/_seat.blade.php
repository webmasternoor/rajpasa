Bus ID: {{$temp}}
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('busraj/list')" class="btn btn-danger"><i
                    class="glyphicon glyphicon-backward"></i>
            Back</a>
    </div>
</div>
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
    //echo $er->total_seat.".";
}
$users = DB::table('seatbuses')->where('bus_id',$temp)->get();
foreach ($users as $user)
{
    //$table_name = 'seatbuses';
    //$columns = DB::select('show columns from ' . $table_name);
    
    //foreach ($columns as $value) {
    //$tte = $value->Field ;
    //echo $user->id;
    for($i=0;$i<$er->total_seat;$i++){
        //echo $user->$i;
        echo "<p id='$i' value='$i' class='blue' onclick='selected_seat();'>&nbsp;</p>";
        
    }    
    ?>

    <p id="show_seat"></p>
    <?php
    //echo "<br/>";
    //echo $user->$tte;

    /*if($user->$tte == '0'){
    ?>
    
                <p class="blue"><?php //echo $user->$tte; ?> &nbsp;</p>
    <?php
    }*/
    //echo $value->Field;
    //echo "<br/>";
    //}
    //echo $user->1;
    //echo $user->10;
    //echo mysql_field_name($user, 0) . "\n";
    //echo mysql_field_name($user, 2);
}
?>
                </div>
            </td>
        </tr>
    </table>                        
</div> 
<script>
$( "p" ).click(function() {
  $( this ).toggleClass( "highlight" );
});
</script>
<script type="text/javascript">
    var total_selected_seat = 0;
    //document.getElementById('') = 

    function selected_seat(){
    //document.write('i am here');
    
    //document.write(++total_selected_seat);
    document.getElementById("show_seat").innerHTML = ++total_selected_seat;
    
    //setText("show_seat",++total_selected_seat);
}
</script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>