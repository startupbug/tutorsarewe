<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<style type="text/css">
	.e-container{
		width: 80%;
		margin: auto;
	}
</style>
 
<body>
	<div class="e-container">
		<img src="{{ asset('public/assets/images/logo_big.png') }}">

		<h3>Welcome to Tutorsareus family {{ $user->name }}</h3>
		@if($user->role_id == 2)
			<p>Thank you for making a decision for success. You can get started by taking a <a href="{{ route('student_pretest') }}">diagnostic test</a>  and contacting tutors. We are looking forward too.</p>
		@else
			<p>Thank you for joining the family of successful people. We would like to make you successful by tutoring as many students as possible. </p>
		@endif
		<p>But , first, <a href="{{route('verified_email',['email_token' => $user->email_token])}}">Verify email address</a></p>
		<p>Also, don’t forget our  referral program <a href="{{ route('invite_friend') }}">here</a>.</p> 
		
		@if($user->role_id == 2)
			<p>You can also get a copy of the tutors background check here (hyperlink).</p>
		@else
			<p>You can do your background check here  (hyperlink)</p>
		@endif
		<p>Tutors Are Us</p>
		<p>+44 1877 3 tutors</p>

	</div>

</body>
 
</html>