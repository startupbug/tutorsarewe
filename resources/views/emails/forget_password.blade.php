<!DOCTYPE html>
<html>
<head>
    <title>Invitation Email</title>
</head>
 
<body>
<h2>Title<b></b></h2>
{{$user->email}}
<br/>
<h3>Description</h3>
{{$user->token}}
<br>
	This is invitation mail to candidate from recruiter.
	<a href="{{route('set_new_password',$user->token)}}">Click HERE</a>
</body>
 
</html>