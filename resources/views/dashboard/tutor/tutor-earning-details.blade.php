@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
	@include('dashboard.partials.dashboard-sidebar')

	<div class="edit_profile">
		<h3 class="f_profile_content text-center">Tutor Earnings</h3>
	</div>
	
	<div class="col-md-9">
		@include('partials.error_section')
		<div class="row padding_top">
			<div class="col-md-12">
				<table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
					<thead>
						<tr>
							
							<th>booking id</th>
							<th>title</th>
							<th>details</th>
							<th>student</th>
							
							<th>subject</th>
							<th>type</th>
							
							<th>amount</th>
						
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
							
						<tr>
							
							<td>{{ $tutor_earnings->booking_id }}</td>
							<td>{{ $tutor_earnings->title }}</td>
							<td>{{ $tutor_earnings->details }}</td>
							<td><a href="{{route('tutor_profile',$tutor_earnings->student_id)}}">{{ $tutor_earnings->first_name }}</a></td>
		
							<td>{{ $tutor_earnings->subject }}</td>
							<td>{{ $tutor_earnings->type }}</td>
							
							<td>{{ $tutor_earnings->amount }}</td>
							
							<td>{{ $tutor_earnings->date }}</td>
							<td>
								<a href="{{ route('tutor_earnings_details', ['id' => $tutor_earnings->booking_id]) }}" class="btn a_href_btn">View Detail</a>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
