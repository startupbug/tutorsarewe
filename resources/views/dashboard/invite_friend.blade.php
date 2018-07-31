@extends('dashboard.dashboard-app')
@section('content')
<section class="profile">
   <div class="container-fluid remove_padding bg_color_gray">
  		@include('dashboard.partials.dashboard-sidebar')
   		<div class="col-md-9 bg_color">
			<form action="{{ route('invite_request') }}" method="post" class="form-groups">

				{{ csrf_field() }}
				
				<label>Email</label>

				<input type="email" class="form-control" name="email" placeholder="Enter Email Address">

				<input type="submit" name="submit">

			</form>
   		</div>
	</div>
</section>
@endsection()