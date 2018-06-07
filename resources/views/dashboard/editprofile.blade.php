@extends('dashboard.dashboard-app')
@section('content')

<section class="profile">

   <div class="container-fluid remove_padding bg_color_gray">
  		@include('dashboard.partials.dashboard-sidebar')
      <!--<div class="col-md-3 border_left f_padding">
      	<img src="assets/images/dashboard_img.png" class="img-responsive f_dashimg">
      	<h3 class="f_name">JOHN DOE</h3>
      	<p class="user_f">User Login: 25/04/2018 05:53:40 <br>Balance $: 0</p>
      	<div class="vertical-menu">
  <a href="#" class="active">Dashboard</a>
  <a href="#">Search Tutor</a>
  <a href="#">My Tutor</a>
  <a href="#">Invite Friends</a>
  <a href="#">Messages</a>
  <a href="#">Booking</a>
  <a href="#">Transaction</a>
  <a href="#">Settings</a>
  <a href="#">Logout</a>
</div>

      </div>-->

      <div class="col-md-9 f_padding bg_color">
      	<div class="edit_profile">
      	<h3 class="f_profile_content">Edit Profile</h3>
        @include('partials.error_section')
        @foreach($errors->all() as $erroring)
                  <li>{{$erroring}}  </li>
                  @endforeach
      <!-- 	<p class="f_text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, elium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p> -->

      </div>

  <div class="col-md-6">
  	<form action="{{ route('edit_profile') }}" method="post" enctype="multipart/form-data">
  		 <div class="form-group profile_form">
    <label>First Name <span>*</span></label>
    <br>
    <input type="text" name="first_name" value="{{ isset($user->first_name) ? $user->first_name : '' }}" class="span3" required>
  </div>
   <div class="form-group profile_form">
      <label>Last Name <span>*</span></label>
      <br>
      <input type="text" name="last_name" value="{{ isset($user->last_name) ? $user->last_name : '' }}" class="span3" required>
  </div>

  @if(Auth::user()->role_id == 3)
   <div class="form-group profile_form">
      <label>Rates / Hour <span>*</span></label>
      <br>
      <input type="text" name="tution_per_hour" value="{{ isset($user->tution_per_hour) ? $user->tution_per_hour : '' }}" class="span3" >
   </div>
  @endif

 <div class="form-group profile_form">
    <label>Bio <span>*</span></label>
    <br>
    <textarea name="bio" class="span3 form-control" >{{ isset($user->bio) ? $user->bio : '' }}</textarea>
    <!-- <input type="text" name="bio" value="{{ isset($user->tution_per_hour) ? $user->tution_per_hour : '' }}" class="span3"> -->
</div>

  <div class="form-group profile_form">
    <label>Age <span>*</span></label>
    <br>
    <input type="number" name="age" id="exampleInputage" value="{{$user->age}}" class="span3">
  </div>

  <div class="form-group profile_form">
    <label>Qualifications <span>*</span></label>
    <br>
    <input type="number" name="qualifications" id="exampleInputage" value="{{$user->qualifications}}" class="span3">
  </div>

  <div class="form-group profile_form">
    <label>Qualifications From <span>*</span></label>
    <br>
    <input type="number" name="qualification_from" id="exampleInputage" value="{{$user->qualification_from}}" class="span3">
  </div>

 <div class="form-group profile_form">
  <label>Gender</label>
   <select class="form-control select_f span3" id="gender" name="gender">
               <option value="male" @if($user->gender=="male") selected @endif>Male</option>
               <option value="female" @if($user->gender=="female") selected @endif>female</option>
   </select>
  </div>


 <div class="form-group profile_form">
    <label>Profile picture <span>*</span></label>
    <br>
    <input type="file" name="profile_pic" id="profile_pic" class="span3">
</div>

<!--  <div class="form-group profile_form">
    <label>Email <span>*</span></label>
    <br>
    <input type="email" name="email"  class="span3">
</div> -->
<!--  <div class="form-group profile_form">
    <label>Username</label>
    <br>
    <input type="text" name="username" class="span3">
</div> -->
<!--  <div class="form-group profile_form">
    <label>Password <span>*</span> (Must Be Atleast 6 Characters):</label>
    <br>
    <input type="password" name="password" class="span3">
</div>
 <div class="form-group profile_form">
    <label>Confirm Password <span>*</span></label>
    <br>
    <input type="password" name="password" class="span3">
</div> -->


  </div>

  <div class="col-md-6">


  		 <div class="form-group account_f_form">
    <label>Address</label>
    <br>
    <input type="text" name="address" value="{{ isset($user->address) ? $user->address : '' }}" class="span3">
</div>
 <div class="form-group account_f_form">
    <label>Zip Code</label>
    <br>
    <input type="text" name="zipcode" value="{{ isset($user->zipcode) ? $user->zipcode : '' }}" class="span3">
</div>
 <!-- <div class="form-group account_f_form">
 	<label>State</label>

      <select class="form-control select_f" id="state" name="state">
         <option>Select</option>
         <option value="NewYork" {{ ($user->state == 'NewYork') ? 'selected' : '' }}>New York</option>
         <option value="Newsouthwales" {{ ($user->country == 'Newsouthwales') ? 'selected' : '' }}>New south wales</option>
         <option value="Texas" {{ ($user->state == 'Texas') ? 'selected' : '' }}>Texas</option>
         <option value="South" {{ ($user->state == 'South') ? 'selected' : '' }}>South</option>
      </select>


    				</div>
 <div class="form-group account_f_form">
 	<label>Country</label>


                        <select name="country" id="country" class="span3" placeholder="Select">
                            <option value="AR" {{ ($user->country == 'AR') ? 'selected' : '' }}>Argentina</option>
                            <option value="AU" {{ ($user->country == 'AU') ? 'selected' : '' }}>Australia</option>
                            <option value="AT" {{ ($user->country == 'AT') ? 'selected' : '' }}>Austria</option>
                            <option value="BY" {{ ($user->country == 'BY') ? 'selected' : '' }}>Belarus</option>
                            <option value="BE" {{ ($user->country == 'BE') ? 'selected' : '' }}>Belgium</option>
                            <option value="BA" {{ ($user->country == 'BA') ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                            <option value="BR" {{ ($user->country == 'BR') ? 'selected' : '' }}>Brazil</option>
                            <option value="BG" {{ ($user->country == 'BG') ? 'selected' : '' }}>Bulgaria</option>
                            <option value="CA" {{ ($user->country == 'CA') ? 'selected' : '' }}>Canada</option>
                            <option value="CL" {{ ($user->country == 'CL') ? 'selected' : '' }}>Chile</option>
                            <option value="CN" {{ ($user->country == 'CN') ? 'selected' : '' }}>China</option>
                            <option value="CO" {{ ($user->country == 'CO') ? 'selected' : '' }}>Colombia</option>
                            <option value="CR" {{ ($user->country == 'CR') ? 'selected' : '' }}>Costa Rica</option>
                            <option value="HR" {{ ($user->country == 'HR') ? 'selected' : '' }} >Croatia</option>
                            <option value="CU"  {{ ($user->country == 'CU') ? 'selected' : '' }}>Cuba</option>
                            <option value="CY" {{ ($user->country == 'CY') ? 'selected' : '' }}>Cyprus</option>
                            <option value="CZ" {{ ($user->country == 'CZ') ? 'selected' : '' }}>Czech Republic</option>
                            <option value="DK" {{ ($user->country == 'DK') ? 'selected' : '' }}>Denmark</option>
                            <option value="DO" {{ ($user->country == 'DO') ? 'selected' : '' }}>Dominican Republic</option>
                            <option value="EG" {{ ($user->country == 'EG') ? 'selected' : '' }}>Egypt</option>
                            <option value="EE" {{ ($user->country == 'EE') ? 'selected' : '' }}>Estonia</option>
                            <option value="FI" {{ ($user->country == 'FI') ? 'selected' : '' }}>Finland</option>
                            <option value="FR" {{ ($user->country == 'FR') ? 'selected' : '' }}>France</option>
                            <option value="GE" {{ ($user->country == 'GE') ? 'selected' : '' }}>Georgia</option>
                            <option value="DE" {{ ($user->country == 'DE') ? 'selected' : '' }}>Germany</option>
                            <option value="GI" {{ ($user->country == 'GI') ? 'selected' : '' }}>Gibraltar</option>
                            <option value="GR" {{ ($user->country == 'GR') ? 'selected' : '' }}>Greece</option>
                            <option value="HK" {{ ($user->country == 'HK') ? 'selected' : '' }}>Hong Kong S.A.R., China</option>
                            <option value="HU" {{ ($user->country == 'HU') ? 'selected' : '' }}>Hungary</option>
                            <option value="IS" {{ ($user->country == 'IS') ? 'selected' : '' }}>Iceland</option>
                            <option value="IN" {{ ($user->country == 'IN') ? 'selected' : '' }}>India</option>
                            <option value="ID" {{ ($user->country == 'ID') ? 'selected' : '' }}>Indonesia</option>
                            <option value="IR" {{ ($user->country == 'IR') ? 'selected' : '' }}>Iran</option>
                            <option value="IQ" {{ ($user->country == 'IQ') ? 'selected' : '' }}>Iraq</option>
                            <option value="IE" {{ ($user->country == 'IE') ? 'selected' : '' }}>Ireland</option>
                            <option value="IL" {{ ($user->country == 'IL') ? 'selected' : '' }}>Israel</option>
                            <option value="IT" {{ ($user->country == 'IT') ? 'selected' : '' }}>Italy</option>
                            <option value="JM" {{ ($user->country == 'JM') ? 'selected' : '' }}>Jamaica</option>
                            <option value="JP" {{ ($user->country == 'JP') ? 'selected' : '' }}>Japan</option>
                            <option value="KZ" {{ ($user->country == 'KZ') ? 'selected' : '' }}>Kazakhstan</option>
                            <option value="KW" {{ ($user->country == 'KW') ? 'selected' : '' }}>Kuwait</option>
                            <option value="KG" {{ ($user->country == 'KG') ? 'selected' : '' }}>Kyrgyzstan</option>
                            <option value="LA" {{ ($user->country == 'LA') ? 'selected' : '' }}>Laos</option>
                            <option value="LV" {{ ($user->country == 'LV') ? 'selected' : '' }}>Latvia</option>
                            <option value="LB" {{ ($user->country == 'LB') ? 'selected' : '' }}>Lebanon</option>
                            <option value="LT" {{ ($user->country == 'LT') ? 'selected' : '' }}>Lithuania</option>
                            <option value="LU" {{ ($user->country == 'LU') ? 'selected' : '' }}>Luxembourg</option>
                            <option value="MK" {{ ($user->country == 'MK') ? 'selected' : '' }}>Macedonia</option>
                            <option value="MY" {{ ($user->country == 'MY') ? 'selected' : '' }}>Malaysia</option>
                            <option value="MT" {{ ($user->country == 'MT') ? 'selected' : '' }}>Malta</option>
                            <option value="MX" {{ ($user->country == 'MX') ? 'selected' : '' }}>Mexico</option>
                            <option value="MD" {{ ($user->country == 'MD') ? 'selected' : '' }}>Moldova</option>
                            <option value="MC" {{ ($user->country == 'MC') ? 'selected' : '' }}>Monaco</option>
                            <option value="ME" {{ ($user->country == 'ME') ? 'selected' : '' }}>Montenegro</option>
                            <option value="MA" {{ ($user->country == 'MA') ? 'selected' : '' }}>Morocco</option>
                            <option value="NL" {{ ($user->country == 'NL') ? 'selected' : '' }}>Netherlands</option>
                            <option value="NZ" {{ ($user->country == 'NZ') ? 'selected' : '' }}>New Zealand</option>
                            <option value="NI"  {{ ($user->country == 'NI') ? 'selected' : '' }}>Nicaragua</option>
                            <option value="KP" {{ ($user->country == 'KP') ? 'selected' : '' }}>North Korea</option>
                            <option value="NO" {{ ($user->country == 'NO') ? 'selected' : '' }}>Norway</option>
                            <option value="PK" {{ ($user->country == 'PK') ? 'selected' : '' }}>Pakistan</option>
                            <option value="PS"  {{ ($user->country == 'PS') ? 'selected' : '' }}>Palestinian Territory</option>
                            <option value="PE"  {{ ($user->country == 'PE') ? 'selected' : '' }}>Peru</option>
                            <option value="PH" {{ ($user->country == 'PH') ? 'selected' : '' }}>Philippines</option>
                            <option value="PL" {{ ($user->country == 'PL') ? 'selected' : '' }}>Poland</option>
                            <option value="PT" {{ ($user->country == 'PT') ? 'selected' : '' }}>Portugal</option>
                            <option value="PR" {{ ($user->country == 'PR') ? 'selected' : '' }}>Puerto Rico</option>
                            <option value="QA" {{ ($user->country == 'QA') ? 'selected' : '' }}>Qatar</option>
                            <option value="RO" {{ ($user->country == 'RO') ? 'selected' : '' }}>Romania</option>
                            <option value="RU" {{ ($user->country == 'RU') ? 'selected' : '' }}>Russia</option>
                            <option value="SA" {{ ($user->country == 'SA') ? 'selected' : '' }}>Saudi Arabia</option>
                            <option value="RS" {{ ($user->country == 'RS') ? 'selected' : '' }}>Serbia</option>
                            <option value="SG"  {{ ($user->country == 'SG') ? 'selected' : '' }}>Singapore</option>
                            <option value="SK" {{ ($user->country == 'SK') ? 'selected' : '' }}>Slovakia</option>
                            <option value="SI" {{ ($user->country == 'SI') ? 'selected' : '' }}>Slovenia</option>
                            <option value="ZA" {{ ($user->country == 'ZA') ? 'selected' : '' }}>South Africa</option>
                            <option value="KR" {{ ($user->country == 'KR') ? 'selected' : '' }}>South Korea</option>
                            <option value="ES" {{ ($user->country == 'ES') ? 'selected' : '' }}>Spain</option>
                            <option value="LK" {{ ($user->country == 'LK') ? 'selected' : '' }}>Sri Lanka</option>
                            <option value="SE" {{ ($user->country == 'SE') ? 'selected' : '' }}>Sweden</option>
                            <option value="CH" {{ ($user->country == 'CH') ? 'selected' : '' }}>Switzerland</option>
                            <option value="TW" {{ ($user->country == 'TW') ? 'selected' : '' }}>Taiwan</option>
                            <option value="TH" {{ ($user->country == 'TH') ? 'selected' : '' }}>Thailand</option>
                            <option value="TN" {{ ($user->country == 'TN') ? 'selected' : '' }}>Tunisia</option>
                            <option value="TR" {{ ($user->country == 'TR') ? 'selected' : '' }}>Turkey</option>
                            <option value="UA" {{ ($user->country == 'UA') ? 'selected' : '' }}>Ukraine</option>
                            <option value="AE" {{ ($user->country == 'AE') ? 'selected' : '' }}>United Arab Emirates</option>
                            <option value="GB" {{ ($user->country == 'GB') ? 'selected' : '' }}>United Kingdom</option>
                            <option value="US" {{ ($user->country == 'US') ? 'selected' : '' }}>USA</option>
                            <option value="UZ" {{ ($user->country == 'UZ') ? 'selected' : '' }}>Uzbekistan</option>
                            <option value="VN" {{ ($user->country == 'VN') ? 'selected' : '' }}>Vietnam</option>
                        </select> -->
    				<!-- </div> -->

            <div class="form-group">
              <label for="exampleInputlesson" class="f_label">Lesson Type</label>
              <select class="form-control select_f" id="lesson" name="lesson_type" data-url="{{route('profile_register.ajax')}}">
                 <option>Select</option>
                 @foreach($lessons as $lesson)
                    <option value="{{$lesson->id}}">{{$lesson->type}}</option>
                 @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputcountry" class="f_label">Country</label>
              <select class="form-control select_f" id="country" name="profile_country" data-url="{{route('profile_register.ajax')}}">
                 <option>Select</option>
                 @foreach($countries as $country)
                    <option value="{{$country->id}}" @if($country->id == $user->country_id)  selected @endif>{{$country->name}}</option>
                 @endforeach
              </select>
            </div>

               <div class="form-group">
                  <label for="exampleInputstate" class="f_label">City</label>
                  <select class="form-control select_f" id="city" name="city" >
                     <option>Select</option>
                     <div id="cityDropdown">
                           
                     </div>
                  <!--    @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                     @endforeach -->
                  </select>
               </div>
 <div class="form-group account_f_form">
    <label>Phone Number <span>*</span></label>
    <br>
    <div class="row">
    <div class="col-md-6">
    <!--<input type="phonenum" name="phonenum" class="span3">-->
    <div class="date">
<select name="countryCode" id="" class="span3">
   <option data-countryCode="GB" value="44" Selected><span class="country_f">United States +1</span></option>
   <option data-countryCode="US" value="1">USA (+1)</option>
   <optgroup label="Other countries">
      <option data-countryCode="DZ" value="213">Algeria (+213)</option>
      <option data-countryCode="AD" value="376">Andorra (+376)</option>
      <option data-countryCode="AO" value="244">Angola (+244)</option>
      <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
      <option data-countryCode="AG" value="1268">Antigua & Barbuda (+1268)</option>
   <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
   </optgroup>
</select>
</div>
</div>

<div class="col-md-6">
    <input type="phonenum1" name="phonenum1" value="{{ isset($user->phone_no) ? $user->phone_no: '' }}" class="span3" placeholder="Phone Number">
</div>
</div>
</div>



<input type="hidden" name="user_id" value="{{$user->user_id}}">

<input type="hidden" name="_token" value="{{Session::token()}}">
<input type="submit" value="SAVE CHANGES" class="btn btn-primary f_save">
    <div class="clearfix"></div>
    </form>
  </div>

</div>
</div>
</section>


@endsection
