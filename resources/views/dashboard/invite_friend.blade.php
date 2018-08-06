@extends('dashboard.dashboard-app')
@section('content')
<section class="profile">
	<div class="container-fluid remove_padding bg_color_gray">
	@include('dashboard.partials.dashboard-sidebar')
	<div class="col-md-9 bg_color">
		<!--<form action="{{ route('invite_request') }}" method="post" class="form-groups">
			{{ csrf_field() }}
			
			<label>Email</label>
			
			<input type="email" class="form-control" name="email" placeholder="Enter Email Address">
			
			<input type="submit" name="submit">
			
			</form>-->
			<div class="row">
				<div class="col-md-12">
					<h2 class="f_up">Invite Your Friend</h2>
					<p class="f_content">
						 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					 </p>
					<img src="{{ asset('public/dashboard/assets/images/invite_friends.jpg') }}" class="img-responsive">
				</div>
				<div class="col-md-12">
					<form class="invite-form" action="{{route('invite_request')}}" method="POST">
						{{csrf_field()}}
						<div class="form-group f_group">
							<input type="email" name="email"  class="form-control my-input" id="email" placeholder="Email">
						</div>
						<div class="text-center f_center">
							<button type="submit" class=" btn btn-block send-button tx-tfm btn_send"><i class="fa fa-envelope env_icon"></i>Send</button>
						</div>
					</form>
				</div>
			</div>
		<hr>
		</div>
	</div>
</section>
@endsection()