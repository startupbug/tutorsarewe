@extends('app')
@section('content')

	<form action="{{route('send_forget_email')}}" method="post">
		{{csrf_field()}}
		<label>Email</label>
		<input type="text" name="email">
		<input type="submit" name="submit">
	</form>
@endsection