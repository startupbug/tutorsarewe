@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="f_profile_content text-center">Post Job</h3>
     </div>
		 	@include('partials.error_section')
		 <div class="row">
			 <div class="col-md-6 col-md-offset-3">
				 <form action="" method="post">
					 {{csrf_field()}}
					 <div class="form-group profile_form s_profile_form">
						 <label>Tile <span>*</span></label>
						 <br>
             <input type="text" name="title" class="form-control span3" required>
					 </div>
					 <div class="form-group profile_form s_profile_form">
						 <label>Subjects <span>*</span></label>
						 <br>
             <select class="form-control span3 " name="subject_name" required>
               <option value="english">English</option>
						 </select>
					 </div>
					 <div class="form-group profile_form s_profile_form">
						 <label>Date <span>*</span></label>
						 <br>
             <input type="date" name="date" class="form-control span3" required>
					 </div>
           <div class="form-group profile_form s_profile_form">
						 <label>Type </label>
						 <br>
             <div class="s_padding_top">
               <label class="s_container">Online
                 <input type="checkbox" class="online" checked="checked">
                 <span class="s_checkmark"></span>
               </label>
               <label class="s_container">Offline
                 <input type="checkbox" class="offline">
                 <span class="s_checkmark"></span>
               </label>
             </div>
					 </div>
           <div class="form-group profile_form s_profile_form form_address hidden">
						 <label>Address <span>*</span></label>
						 <br>
             <textarea name="address" rows="4" cols="80" class="form-control span3 job_address" disabled required></textarea>
					 </div>
					 <div class="form-group profile_form s_profile_form">
						 <label>Description <span>*</span></label>
						 <br>
             <textarea name="description" rows="8" cols="80" class="form-control span3" required></textarea>
					 </div>
					 <div class="form-group">
					 	<input type="submit" value="ADD" class="btn s_save">
					 </div>
				 </form>
			 </div>
		 </div>
	 </div>
</div>
@endsection
