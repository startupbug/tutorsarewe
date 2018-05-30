@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="edit_profile">
		 <h3 class="f_profile_content text-center">Transaction</h3>
	 </div>
	 <div class="col-md-9">
	 	@include('partials.error_section')
		 <div class="row">
			 <div class="col-md-12">
				 <table id="example" class="display" width="100%" data-page-length="10" class="table table-dark">
					 <thead>
						 <tr>
							 <th>#</th>
							 <th>Id</th>
               <th>Amount</th>
               <th>Type</th>
               <th>Date</th>
               <th>Action</th>
						 </tr>
					 </thead>
					 <tbody>
             <tr>
               <td>1</td>
               <td>004</td>
               <td>4000 USD</td>
               <td>2018-05-16</td>
               <td>
                 <a href="#" class="btn btn-primary s_save">View Detail</a>
               </td>
             </tr>
					 </tbody>
				 </table>
			 </div>
		 </div>
	 </div>
</div>
@endsection
