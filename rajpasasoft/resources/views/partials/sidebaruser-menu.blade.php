@if (Auth::guest())
        <!-- <li><a href="{{ url('/admin/login') }}">Login</a></li>
        <li><a href="{{ url('/admin/register') }}">Register</a></li> -->
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">    
            <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">Dashboard User Panel</a>
                <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="#">Dashboard</a></li>
                </ul>
            </li>
        </ul>
@else
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">    
    <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">ড্যাসবোর্ড</a>
        <ul class="dropdown-menu">
            <li><a tabindex="-1" href="#">ড্যাসবোর্ড</a></li>
        </ul>
    </li>
    <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">সদস্য</a>
        <ul class="dropdown-menu">
            <li><a tabindex="-1" href="{{ url('/survey') }}">জরীপ</a></li>
            <li><a tabindex="-1" href="{{ url('/member') }}">সদস্য</a></li>
            <li><a tabindex="-1" href="{{ url('/loan') }}">ঋণ আবেদন</a></li>
            <li><a tabindex="-1" href="{{ url('/') }}">ঋণ অনুমদন</a></li>
            <li><a tabindex="-1" href="{{ url('/jamindar') }}">জামিনদার</a></li>
        </ul>
    </li>
    <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">পোর্টফোলিও/MIS</a>
        <ul class="dropdown-menu">
            <li><a tabindex="-1" href="{{ url('/savings') }}">সঞ্চয়</a></li>
            <li><a tabindex="-1" href="{{ url('/investment') }}">বিনিয়োগ/ ঋণ</a></li>
        </ul>
    </li>
    <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">অ্যাকাউন্টিং/FIS</a>
        <ul class="dropdown-menu">
            <li><a tabindex="-1" href="{{ url('/savings') }}">অটো ভাউচার</a></li>
            <li><a tabindex="-1" href="{{ url('/investment') }}">ঋণ লেজার</a></li>
            <li><a tabindex="-1" href="{{ url('/saving1') }}">সঞ্চয় লেজার</a></li>
            <li><a tabindex="-1" href="{{ url('/investment') }}">ম্যানুয়াল ভাউচার</a></li>
            <li><a tabindex="-1" href="{{ url('/dpsapplication') }}">DPS Application</a></li>
        </ul>
    </li>
    <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">রিপোর্ট</a>
        <ul class="dropdown-menu">
            <li><a tabindex="-1" href="{{ url('/savings') }}">TMSS IMF(MIS+FIS)</a></li>
            <li><a tabindex="-1" href="{{ url('/investment') }}">PKSF Compliance</a></li>
        </ul>
    </li>
    <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">সিকিউরিটি</a>
        <ul class="dropdown-menu">
            <li><a tabindex="-1" href="{{ url('/savings') }}">অ্যাকসেস কন্ট্রোল</a></li>
            <li><a tabindex="-1" href="{{ url('/investment') }}">অডিট ট্রেইল</a></li>
            <li><a tabindex="-1" href="{{ url('/investment') }}">রোল বেস প্রিভিলিজ</a></li>
        </ul>
    </li>
    <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">সেটিং</a>
        <ul class="dropdown-menu">
            <li><a tabindex="-1" href="{{ url('/zone') }}">জোন</a></li>
            <li><a tabindex="-1" href="{{ url('/area') }}">এরিয়া</a></li>
            <li><a tabindex="-1" href="{{ url('/brn') }}">ব্রাঞ্চ</a></li>
            <li><a tabindex="-1" href="{{ url('/cashinflow') }}">টোটাল ক্যাশ ইনফ্লো</a></li>
            <li><a tabindex="-1" href="{{ url('/cashoutflow') }}">টোটাল ক্যাশ আউটফ্লো</a></li>
            <li><a tabindex="-1" href="{{ url('/bussinesscashinflow') }}">বিজনেস ক্যাশ ইনফ্লো</a></li>
            <li><a tabindex="-1" href="{{ url('/bussinesscashoutflow') }}"> বিজনেস ক্যাশ আউটফ্লো</a></li>
            <li><a tabindex="-1" href="{{ url('/countr') }}">দেশ</a></li>
            <li><a tabindex="-1" href="{{ url('/division') }}">বিভাগ</a></li>
            <li><a tabindex="-1" href="{{ url('/district') }}">জেলা</a></li>
            <li><a tabindex="-1" href="{{ url('/thana') }}">থানা</a></li>
            <li><a tabindex="-1" href="{{ url('/union') }}">ইউনিয়ন</a></li>
            <li><a tabindex="-1" href="{{ url('/postoffice') }}">ডাকঘর</a></li>
            <li><a tabindex="-1" href="{{ url('/ward') }}">ওয়ার্ড</a></li>
            <li><a tabindex="-1" href="{{ url('/organization') }}">প্রতিষ্ঠান</a></li>
            <li><a tabindex="-1" href="{{ url('/product') }}">প্রোডাক্ট</a></li>
            <li><a tabindex="-1" href="{{ url('/purpose') }}">উদ্দেশ্য</a></li>
            <li><a tabindex="-1" href="{{ url('/investor') }}">বিনিয়োগকারী</a></li>
            <li><a tabindex="-1" href="{{ url('/grace') }}">গ্রেছ</a></li>
            <li><a tabindex="-1" href="{{ url('/asset') }}">সম্পদের বিবরণ</a></li>
            <li><a tabindex="-1" href="{{ url('/liab') }}">দেনার বিবরণ</a></li>
            <li><a tabindex="-1" href="{{ url('/producttype') }}">প্রোডাক্টের ধরণ</a></li>
            <li><a tabindex="-1" href="{{ url('/zone1') }}">সমিতি</a></li>
            <li><a tabindex="-1" href="{{ url('/holiday') }}">ছুটির দিনপঞ্জিকা</a></li>
            <li><a tabindex="-1" href="{{ url('/userstimf') }}">ব্যবহারকারীগণ</a></li>
            <li><a tabindex="-1" href="{{ url('/users') }}">Super Admin</a></li>
        </ul>
    </li>
</ul>
@endif