<?php
foreach ($seat_info as $key){
    echo $key->bus_id;
}
?>
<div class="col-md-12">
    <div class="modal-header">
        <h4 class="modal-title" id="H1">Choose your seat(s)</h4>
    </div>
    <div class="col-md-6">
        <?php
        foreach ($seat_info as $key){
            echo $key->bus_id;
            echo "<br/>Seat Fare: ".$key->seat_fare;
            echo "<br/>Bus type: ".$key->bus_type;
            echo "<input type='text' class='seat_fare' id='seat_fare' value='$key->seat_fare' />";
            echo "<input type='text' class='bus_type' id='bus_type' value='$key->bus_type' />";
            echo "<input type='text' class='total_seat' id='total_seat' value='$key->total_seat' />";
        }
        ?>
    </div>
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
    alert(str.join(','));
})

</script>        