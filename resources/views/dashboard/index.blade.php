@extends('dashboard.dashboard-app')
@section('content')


<div class="container-fluid f_padding">
	
  @include('dashboard.partials.dashboard-sidebar')



      <div class="col-md-9 f_padding bg_color">
        <div class="col-md-9">
      	<div class="edit_profile">
      	<h3 class="f_profile_content">Profile</h3>
      </div>
    </div>
      <div class="col-md-3">
        <a href="{{route('edit_dashboard')}}" class="btn btn-default f_view_edit">EDIT</a>
      </div>
      <div class="col-md-12">
      	<p class="f_text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, elium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
      </div>
       
  <div class="col-md-6">

  	<form>
  		 <div class="form-group profile_form account_view">
    <label>First Name <span>*</span></label>
    <br>
    <p class="text_aaccountview">{{Auth::user()->first_name}}</p>
</div>
 <div class="form-group profile_form account_view">
    <label>Last Name <span>*</span></label>
    <br>
    <p class="text_aaccountview">{{Auth::user()->last_name}}</p>
</div>
 <div class="form-group profile_form account_view">
    <label>Email <span>*</span></label>
    <br>
    <p class="text_aaccountview">{{Auth::user()->email}}</p>
</div>


<!--  <div class="form-group profile_form account_view">
    <label>Password <span>*</span> (Must Be Atleast 6 Characters):</label>
    <br>
    <p class="text_aaccountview">********</p>    
</div>

 <div class="form-group profile_form account_view">
    <label>Confirm Password <span>*</span></label>
    <br>
    <p class="text_aaccountview">********</p>
    
</div> -->
    
   
    <div class="clearfix"></div>
    </form>
  </div>

  <div class="col-md-6">

  	<form>
  		 <div class="form-group account_f_form view_f">
    <label>Address</label>
    <br>
    <p class="text_aaccountview">{{ isset($user->address) ? $user->address : '-' }}</p>
</div>
 <div class="form-group account_f_form view_f">
    <label>Zip Code</label>
    <br>
   <p class="text_aaccountview">{{ isset($user->zipcode) ? $user->zipcode : '-' }}</p>
</div>
 <div class="form-group account_f_form view_f">
 	<label>State</label>
    					<p class="text_aaccountview">{{ isset($user->state) ? $user->state : '-' }}</p>
    				</div>
 <div class="form-group account_f_form view_f">
 	<label>Country</label>
    					<p class="text_aaccountview">{{ isset($user->country) ? $user->country : '-' }}</p>
    				</div>
 <div class="form-group account_f_form view_f">
    <label>Phone Number <span>*</span></label>
    <p class="text_aaccountview">{{ isset($user->phone_no) ? $user->phone_no : '-' }}</p>
   
</div>


 
    
    
    <div class="clearfix"></div>
    </form>
  </div>
   
</div>
</div>

@endsection