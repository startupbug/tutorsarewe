@extends('dashboard.dashboard-app')
@section('content')
	<form action="{{route('invite_request')}}" method="post">
		{{csrf_field()}}
		<label>Email</label>
		<input type="email" name="email">
		<input type="submit" name="submit">
	</form>
@endsection()