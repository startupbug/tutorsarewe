<!DOCTYPE html>
<html>
<head>
    <title>Invitation Email</title>
</head>
 
<body>
<h2>Hello<b></b></h2>
{{$user->email}}
<br/>
	Click this button to renew password.
	<a href="{{route('set_new_password',$user->token)}}">Click HERE</a>
</body>
 
</html>