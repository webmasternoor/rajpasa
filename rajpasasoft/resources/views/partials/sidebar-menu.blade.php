@if (Auth::guest())

@elseif (Auth::user()->type == 'admin')
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; width: 180px;">
    <li><a tabindex="-1" href="{{ url('/companyraj') }}">Company</a></li>
    <li><a tabindex="-1" href="{{ url('/management') }}">Management</a></li>
    <li><a tabindex="-1" href="{{ url('/counter') }}">Counter</a></li>
    <li><a tabindex="-1" href="{{ url('/busraj') }}">Bus</a></li>
    <li><a tabindex="-1" href="{{ url('/seatavailable') }}">Seat Available</a></li>
    <li><a tabindex="-1" href="{{ url('/hotel') }}">Hotel</a></li>
    <li><a tabindex="-1" href="{{ url('/room') }}">Room</a></li>
    <li><a tabindex="-1" href="{{ url('/division') }}">Division</a></li>
    <li><a tabindex="-1" href="{{ url('/district') }}">District</a></li>
    <li><a tabindex="-1" href="{{ url('/upazilla') }}">Upazilla</a></li>
    <li><a tabindex="-1" href="{{ url('/bookingb') }}">Bookingbus</a></li>
    <li><a tabindex="-1" href="{{ url('/bookinghotel') }}">Bookinghotel</a></li>
    <li><a tabindex="-1" href="{{ url('/laun') }}">Launch</a></li>
    <li><a tabindex="-1" href="{{ url('/touristplace') }}">Touristplace</a></li>
</ul>
@elseif (Auth::user()->type == 'company')
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; width: 180px;">
    <li><a tabindex="-1" href="{{ url('/companyraj') }}">Company</a></li>
    <li><a tabindex="-1" href="{{ url('/management') }}">Management</a></li>
    <li><a tabindex="-1" href="{{ url('/counter') }}">Counter</a></li>
    <li><a tabindex="-1" href="{{ url('/busraj') }}">Bus</a></li>
    <li><a tabindex="-1" href="{{ url('/seatavailable') }}">Seat Available</a></li>
    <li><a tabindex="-1" href="{{ url('/hotel') }}">Hotel</a></li>
    <li><a tabindex="-1" href="{{ url('/room') }}">Room</a></li>
    <li><a tabindex="-1" href="{{ url('/division') }}">Division</a></li>
    <li><a tabindex="-1" href="{{ url('/district') }}">District</a></li>
    <li><a tabindex="-1" href="{{ url('/upazilla') }}">Upazilla</a></li>
    <li><a tabindex="-1" href="{{ url('/bookingb') }}">Bookingbus</a></li>
    <li><a tabindex="-1" href="{{ url('/bookinghotel') }}">Bookinghotel</a></li>
    <li><a tabindex="-1" href="{{ url('/laun') }}">Launch</a></li>
    <li><a tabindex="-1" href="{{ url('/touristplace') }}">Touristplace</a></li>
</ul>
@elseif (Auth::user()->type == 'manager')
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; width: 180px;">
    <li><a tabindex="-1" href="{{ url('/companyraj') }}">Company</a></li>
    <li><a tabindex="-1" href="{{ url('/management') }}">Management</a></li>
    <li><a tabindex="-1" href="{{ url('/counter') }}">Counter</a></li>
    <li><a tabindex="-1" href="{{ url('/busraj') }}">Bus</a></li>
</ul>
@elseif (Auth::user()->type == 'counter')
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; width: 180px;">
    <li><a tabindex="-1" href="{{ url('/companyraj') }}">Company</a></li>
    <li><a tabindex="-1" href="{{ url('/management') }}">Management</a></li>
    <li><a tabindex="-1" href="{{ url('/counter') }}">Counter</a></li>
    <li><a tabindex="-1" href="{{ url('/busraj') }}">Bus</a></li>
</ul>
@endif