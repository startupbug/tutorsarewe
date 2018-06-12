@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="f_profile_content text-center">Scheduling</h3>
     </div>

     @include('partials.error_section')
		 <div class="row">
       <div class="col-md-6 color_padding">
         <span class="box_color_green"></span>
         <span class="color_status">Available</span>
         <span class="box_color_white"></span>
         <span class="color_status">Not Available</span>
         <span class="box_color_red"></span>
         <span class="color_status">Booked</span>
       </div>
     </div>
		 <div class="row">
			 <div class="col-md-12">
         <div class="table-responsive table-bordered">
          <table id="s-table" class="table s_table">
            <thead>
              <tr>
                 <th></th>
                 <th>2018-06-25</th>
                 <th>2018-06-26</th>
                 <th>2018-06-27</th>
                 <th>2018-06-28</th>
                 <th>2018-06-29</th>
                 <th>2018-06-30</th>
                 <th>2018-07-01</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                 <td>
                    12:00 am
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="1" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="2" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="3" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="4" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="5" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="6" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="7" data-toggle="tooltip" title="Not Available"></div>
                 </td>
              </tr>
              <tr>
                 <td>
                    12:30 am
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="8" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="9" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="10" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="11" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="12" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="13" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="14" data-toggle="tooltip" title="Not Available"></div>
                 </td>
              </tr>
              <tr>
                 <td>
                    1:00 am
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="15" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="16" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="17" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="18" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="19" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="20" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="21" data-toggle="tooltip" title="Not Available"></div>
                 </td>
              </tr>
              <tr>
                 <td>
                    1:30 am
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="22" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="23" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="24" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="25" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="26" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="27" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="28" data-toggle="tooltip" title="Not Available"></div>
                 </td>
              </tr>
              <tr>
                 <td>
                    2:00 am
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="29" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="30" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="31" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="32" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="33" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="34" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="35" data-toggle="tooltip" title="Not Available"></div>
                 </td>
              </tr>
              <tr>
                 <td>
                    2:30 am
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="36" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="37" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="38" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="39" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="40" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="41" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                 <td>
                    <div class="create_schedule" data-status="0" data-id="42" data-toggle="tooltip" title="Not Available"></div>
                 </td>
              </tr>
            </tbody>
          </table>
         </div>
       </div>
		 </div>
	  </div>
  </div>
</div>
@endsection
