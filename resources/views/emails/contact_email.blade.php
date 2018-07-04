<DOCTYPE html>
<html>
<head>
  <title>Contact Email</title>
</head>
<body>
 <div style="
   background:  #06c;
   padding: 20px;
   text-align:  center;
   font-family:  sans-serif;
   color: #fff;
   font-size: 20px;
 ">
   <h2>{{$email_data['subject_description']}}</h2>
 </div>
 <div style="
   padding: 20px;
   padding-bottom: 10px;
   text-align: center;
   font-family: sans-serif;
   color: #eb681f;
   font-size: 18px;
 ">
   <h2>{{$email_data['full_name']}},</h2>
 </div>
 <div style="
   color: #6a6a6a;
   font-size: 17px;
   text-align: center;
   font-family: sans-serif;
 ">
   <p style=" margin-top:0;">{{ $email_data['message_description'] }}</p>
 </div>
 <hr>
 <div style="
   color: #6a6a6a;
   font-size: 17px;
   text-align: center;
   font-family: sans-serif;
   ">
 <!--   <p style="margin-bottom: 0;">Regards,</p>
   <p style="margin-top: 10px; font-weight: 600;">The ABC Company</p> -->
 </div>
</body>
</html>