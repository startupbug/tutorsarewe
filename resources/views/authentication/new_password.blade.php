<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{route('new_password',$user->email)}}" method="post">
		{{csrf_field()}}
		<label>new password</label>
		<input type="password" name="new_pass">
		<label>confirm password</label>
		<input type="password" name="old_pass">
		<input type="submit" name="submit">
	</form>
</body>
</html>