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
							<th>#</th>
							<th>booking id</th>
							<th>Student</th>
							<th></th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($tutor_earnings as $key => $value)	
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $tutor_earnings->booking_id }}</td>
							<td>{{ $description->transactions[0]->amount->total }} {{ $description->transactions[0]->amount->currency }}</td>
							<td>{{ $value->type }}</td>
							<td>{{ $value->created_at }}</td>
							<td>
								<a href="{{ route('transaction_detail', ['id' => $value->id]) }}" class="btn a_href_btn">View Detail</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
