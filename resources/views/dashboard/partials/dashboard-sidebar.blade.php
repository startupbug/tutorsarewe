 <div class="col-md-3 border_left f_padding">
      	<img src="{{ asset('public/dashboard/assets/images/dashboard_img.png') }}" class="img-responsive f_dashimg">
      	<h3 class="f_name">

        {{ Auth::user()->first_name }} (@if(Auth::user()->role_id == 2) Student 
         @elseif( Auth::user()->role_id == 3) Teacher @endif )

         </h3>
      	<p class="user_f">User Login: 25/04/2018 05:53:40 <br>Balance $: 0</p>
      	<div class="vertical-menu">
          <a href="{{ route('dashboard_index') }}" class="active"><i class="fa fa-tachometer f_icon_menu"></i>Dashboard</a>
          <a href="{{route('dashboard_index')}}"><i class="fa fa-search f_icon_menu"></i>Transactions</a>
          <a href="#"><i class="fa fa-user f_icon_menu" aria-hidden="true"></i>My Tutor</a>
          <a href="#"><i class="fa fa-user-plus f_icon_menu"></i>Invite Friends</a>
          <a href="#"><i class="fa fa-envelope f_icon_menu" aria-hidden="true"></i>Messages</a>
          <a href="#"><i class="fa fa-calendar-check-o f_icon_menu"></i>Booking</a>
          <a href="#"><i class="fa fa-credit-card f_icon_menu"></i>Transaction</a>
          <a href="#"><i class="fa fa-cog f_icon_menu"></i>Settings</a>
          <a href="#"><i class="fa fa-sign-out f_icon_menu" aria-hidden="true"></i>Logout</a>
        </div>
         
      </div>