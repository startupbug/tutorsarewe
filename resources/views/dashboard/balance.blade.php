@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="f_profile_content text-center">My Wallet</h3>
     </div>
		 	@include('partials.error_section')
		 <div class="row">
			 <div class="col-md-12">
         <h3 class="sub_heading">Deposit</h3>
				 <form action="{{route('tutor_subject')}}" method="post">
					 {{csrf_field()}}
					 <div class="form-group profile_form s_profile_form col-md-4">
						 <label>Amount <span>*</label><br>
             <input type="text" name="amount" class="form-control span3" value="">
					 </div>
					 <div class="form-group profile_form s_profile_form col-md-2">
					 	<input type="submit" value="ADD" class="btn s_save">
					 </div>
				 </form>
			 </div>
		 </div><br>
		 <div class="row">
			 <div class="col-md-12">
				 <table id="example" class="display" width="100%" data-page-length="10" class="table table-dark">
					 <thead>
						 <tr>
							 <th>#</th>
							 <th>Date</th>
							 <th>Amount</th>
							 <th>Transaction Detail</th>
						 </tr>
					 </thead>
					 <tbody>
             <tr>
               <td>1</td>
               <td>2018-02-19</td>
               <td>$ 200</td>
               <td>ABC</td>
             </tr>
					 </tbody>
				 </table>
			 </div>
		 </div>
   </div>

 	 <div class="col-md-9">
 		 	@include('partials.error_section')
 		 <div class="row">
 			 <div class="col-md-12">
         <h3 class="sub_heading">WithDraw</h3>
 				 <form action="{{route('tutor_subject')}}" method="post">
 					 {{csrf_field()}}
           {{csrf_field()}}
					 <div class="form-group profile_form s_profile_form col-md-4">
						 <label>Amount <span>*</label><br>
             <input type="text" name="amount" class="form-control span3" value="">
					 </div>
					 <div class="form-group profile_form s_profile_form col-md-2">
					 	<input type="submit" value="ADD" class="btn s_save">
					 </div>
 				 </form>
 			 </div>
 		 </div><br>
 		 <div class="row">
 			 <div class="col-md-12">
 				 <table id="example1" class="display" width="100%" data-page-length="10" class="table table-dark">
 					 <thead>
 						 <tr>
							 <th>#</th>
							 <th>Date</th>
							 <th>Amount</th>
							 <th>Transaction Detail</th>
 						 </tr>
 					 </thead>
 					 <tbody>
             <tr>
               <td>1</td>
               <td>2018-02-19</td>
               <td>$ 200</td>
               <td>ABC</td>
             </tr>
 					 </tbody>
 				 </table>
 			 </div>
 		 </div>
    </div>
</div>
@endsection
