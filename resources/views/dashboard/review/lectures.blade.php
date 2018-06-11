@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="f_profile_content text-center">Lectures Information</h3>
     </div>
		 	@include('partials.error_section')
		 <div class="row">
			 <div class="col-md-12">
				 <table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
					 <thead>
						 <tr>
							 <th>#</th>
							 <th>abc 1</th>
							 <th>abc 2</th>
							 <th>Action</th>
						 </tr>
					 </thead>
					 <tbody>
             <tr>
               <td>1</td>
               <td>abc</td>
               <td>abc</td>
               <td>abc</td>
             </tr>
             <tr>
               <td>1</td>
               <td>abc</td>
               <td>abc</td>
               <td>abc</td>
             </tr>
					 </tbody>
				 </table>
			 </div>
		 </div>
	 </div>
</div>
@endsection
