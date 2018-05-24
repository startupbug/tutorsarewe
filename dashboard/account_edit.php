<?php include 'header.php'; ?>

<section class="profile">
   
   <div class="container-fluid f_padding">
    <?php include('menu_left.php') ?>
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
      	<h3 class="f_profile_content">Profile</h3>
      	<p class="f_text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, elium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
       
      </div>
 
  <div class="col-md-6">
  	<form>
  		 <div class="form-group profile_form">
    <label>First Name <span>*</span></label>
    <br>
    <input type="text" name="firstname" class="span3">
</div>
 <div class="form-group profile_form">
    <label>Last Name <span>*</span></label>
    <br>
    <input type="text" name="lastname" class="span3">
</div>
 <div class="form-group profile_form">
    <label>Email <span>*</span></label>
    <br>
    <input type="email" name="email" class="span3">
</div>
 <div class="form-group profile_form">
    <label>Username</label>
    <br>
    <input type="text" name="username" class="span3">
</div>
 <div class="form-group profile_form">
    <label>Password <span>*</span> (Must Be Atleast 6 Characters):</label>
    <br>
    <input type="password" name="password" class="span3">
</div>
 <div class="form-group profile_form">
    <label>Confirm Password <span>*</span></label>
    <br>
    <input type="password" name="password" class="span3">
</div>
    
    <input type="submit" value="SAVE CHANGES" class="btn btn-primary f_save">
    <div class="clearfix"></div>
    </form>
  </div>

  <div class="col-md-6">

  	<form>
  		 <div class="form-group account_f_form">
    <label>Address</label>
    <br>
    <input type="text" name="address" class="span3">
</div>
 <div class="form-group account_f_form">
    <label>Zip Code</label>
    <br>
    <input type="text" name="zipcode" class="span3">
</div>
 <div class="form-group account_f_form">
 	<label>State</label>
    					<select name="country" id="country" class="span3" placeholder="Select">
    						<option value=""></option>
    						<option value="AR">Argentina</option>
    						<option value="AU">Australia</option>
    						<option value="AT">Austria</option>
    						<option value="BY">Belarus</option>
    						<option value="BE">Belgium</option>
    						<option value="BA">Bosnia and Herzegovina</option>
    						<option value="BR">Brazil</option>
    						<option value="BG">Bulgaria</option>
    						<option value="CA">Canada</option>
    						<option value="CL">Chile</option>
    						<option value="CN">China</option>
    						<option value="CO">Colombia</option>
    						<option value="CR">Costa Rica</option>
    						<option value="HR">Croatia</option>
    						<option value="CU">Cuba</option>
    						<option value="CY">Cyprus</option>
    						<option value="CZ">Czech Republic</option>
    						<option value="DK">Denmark</option>
    						<option value="DO">Dominican Republic</option>
    						<option value="EG">Egypt</option>
    						<option value="EE">Estonia</option>
    						<option value="FI">Finland</option>
    						<option value="FR">France</option>
    						<option value="GE">Georgia</option>
    						<option value="DE">Germany</option>
    						<option value="GI">Gibraltar</option>
    						<option value="GR">Greece</option>
    						<option value="HK">Hong Kong S.A.R., China</option>
    						<option value="HU">Hungary</option>
    						<option value="IS">Iceland</option>
    						<option value="IN">India</option>
    						<option value="ID">Indonesia</option>
    						<option value="IR">Iran</option>
    						<option value="IQ">Iraq</option>
    						<option value="IE">Ireland</option>
    						<option value="IL">Israel</option>
    						<option value="IT">Italy</option>
    						<option value="JM">Jamaica</option>
    						<option value="JP">Japan</option>
    						<option value="KZ">Kazakhstan</option>
    						<option value="KW">Kuwait</option>
    						<option value="KG">Kyrgyzstan</option>
    						<option value="LA">Laos</option>
    						<option value="LV">Latvia</option>
    						<option value="LB">Lebanon</option>
    						<option value="LT">Lithuania</option>
    						<option value="LU">Luxembourg</option>
    						<option value="MK">Macedonia</option>
    						<option value="MY">Malaysia</option>
    						<option value="MT">Malta</option>
    						<option value="MX">Mexico</option>
    						<option value="MD">Moldova</option>
    						<option value="MC">Monaco</option>
    						<option value="ME">Montenegro</option>
    						<option value="MA">Morocco</option>
    						<option value="NL">Netherlands</option>
    						<option value="NZ">New Zealand</option>
    						<option value="NI">Nicaragua</option>
    						<option value="KP">North Korea</option>
    						<option value="NO">Norway</option>
    						<option value="PK">Pakistan</option>
    						<option value="PS">Palestinian Territory</option>
    						<option value="PE">Peru</option>
    						<option value="PH">Philippines</option>
    						<option value="PL">Poland</option>
    						<option value="PT">Portugal</option>
    						<option value="PR">Puerto Rico</option>
    						<option value="QA">Qatar</option>
    						<option value="RO">Romania</option>
    						<option value="RU">Russia</option>
    						<option value="SA">Saudi Arabia</option>
    						<option value="RS">Serbia</option>
    						<option value="SG">Singapore</option>
    						<option value="SK">Slovakia</option>
    						<option value="SI">Slovenia</option>
    						<option value="ZA">South Africa</option>
    						<option value="KR">South Korea</option>
    						<option value="ES">Spain</option>
    						<option value="LK">Sri Lanka</option>
    						<option value="SE">Sweden</option>
    						<option value="CH">Switzerland</option>
    						<option value="TW">Taiwan</option>
    						<option value="TH">Thailand</option>
    						<option value="TN">Tunisia</option>
    						<option value="TR">Turkey</option>
    						<option value="UA">Ukraine</option>
    						<option value="AE">United Arab Emirates</option>
    						<option value="GB">United Kingdom</option>
    						<option value="US">USA</option>
    						<option value="UZ">Uzbekistan</option>
    						<option value="VN">Vietnam</option>
    					</select>
    				</div>
 <div class="form-group account_f_form">
 	<label>Country</label>
    					<select name="country" id="country" class="span3" placeholder="Select">
    						<option value=""></option>
    						<option value="AR">Argentina</option>
    						<option value="AU">Australia</option>
    						<option value="AT">Austria</option>
    						<option value="BY">Belarus</option>
    						<option value="BE">Belgium</option>
    						<option value="BA">Bosnia and Herzegovina</option>
    						<option value="BR">Brazil</option>
    						<option value="BG">Bulgaria</option>
    						<option value="CA">Canada</option>
    						<option value="CL">Chile</option>
    						<option value="CN">China</option>
    						<option value="CO">Colombia</option>
    						<option value="CR">Costa Rica</option>
    						<option value="HR">Croatia</option>
    						<option value="CU">Cuba</option>
    						<option value="CY">Cyprus</option>
    						<option value="CZ">Czech Republic</option>
    						<option value="DK">Denmark</option>
    						<option value="DO">Dominican Republic</option>
    						<option value="EG">Egypt</option>
    						<option value="EE">Estonia</option>
    						<option value="FI">Finland</option>
    						<option value="FR">France</option>
    						<option value="GE">Georgia</option>
    						<option value="DE">Germany</option>
    						<option value="GI">Gibraltar</option>
    						<option value="GR">Greece</option>
    						<option value="HK">Hong Kong S.A.R., China</option>
    						<option value="HU">Hungary</option>
    						<option value="IS">Iceland</option>
    						<option value="IN">India</option>
    						<option value="ID">Indonesia</option>
    						<option value="IR">Iran</option>
    						<option value="IQ">Iraq</option>
    						<option value="IE">Ireland</option>
    						<option value="IL">Israel</option>
    						<option value="IT">Italy</option>
    						<option value="JM">Jamaica</option>
    						<option value="JP">Japan</option>
    						<option value="KZ">Kazakhstan</option>
    						<option value="KW">Kuwait</option>
    						<option value="KG">Kyrgyzstan</option>
    						<option value="LA">Laos</option>
    						<option value="LV">Latvia</option>
    						<option value="LB">Lebanon</option>
    						<option value="LT">Lithuania</option>
    						<option value="LU">Luxembourg</option>
    						<option value="MK">Macedonia</option>
    						<option value="MY">Malaysia</option>
    						<option value="MT">Malta</option>
    						<option value="MX">Mexico</option>
    						<option value="MD">Moldova</option>
    						<option value="MC">Monaco</option>
    						<option value="ME">Montenegro</option>
    						<option value="MA">Morocco</option>
    						<option value="NL">Netherlands</option>
    						<option value="NZ">New Zealand</option>
    						<option value="NI">Nicaragua</option>
    						<option value="KP">North Korea</option>
    						<option value="NO">Norway</option>
    						<option value="PK">Pakistan</option>
    						<option value="PS">Palestinian Territory</option>
    						<option value="PE">Peru</option>
    						<option value="PH">Philippines</option>
    						<option value="PL">Poland</option>
    						<option value="PT">Portugal</option>
    						<option value="PR">Puerto Rico</option>
    						<option value="QA">Qatar</option>
    						<option value="RO">Romania</option>
    						<option value="RU">Russia</option>
    						<option value="SA">Saudi Arabia</option>
    						<option value="RS">Serbia</option>
    						<option value="SG">Singapore</option>
    						<option value="SK">Slovakia</option>
    						<option value="SI">Slovenia</option>
    						<option value="ZA">South Africa</option>
    						<option value="KR">South Korea</option>
    						<option value="ES">Spain</option>
    						<option value="LK">Sri Lanka</option>
    						<option value="SE">Sweden</option>
    						<option value="CH">Switzerland</option>
    						<option value="TW">Taiwan</option>
    						<option value="TH">Thailand</option>
    						<option value="TN">Tunisia</option>
    						<option value="TR">Turkey</option>
    						<option value="UA">Ukraine</option>
    						<option value="AE">United Arab Emirates</option>
    						<option value="GB">United Kingdom</option>
    						<option value="US">USA</option>
    						<option value="UZ">Uzbekistan</option>
    						<option value="VN">Vietnam</option>
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
    <input type="phonenum1" name="phonenum1" class="span3" placeholder="Phone Number">
</div>
</div>
</div>


 
    
    
    <div class="clearfix"></div>
    </form>
  </div>
   
</div>
</div>
</section>



<?php include 'footer.php'; ?>