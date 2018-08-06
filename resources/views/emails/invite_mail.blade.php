<!DOCTYPE html>
<html>
<head>
	<title>Invitation</title>
</head>
<body>
	{{Auth::user()->first_name}} send you an invitation email. kindly register by clicking on <a href="http://site.startupbug.net:6888/tutorsarewe/v1/signup/{{Auth::user()->first_name}}?" >Tutorsarus</a> link
</body>
</html>