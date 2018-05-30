@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')
   <div class="col-md-9">
	 	@include('partials.error_section')
    <div class="row">
      <div class="col-md-10 col-md-offset-1 border_transaction_page">
        <h3 class="order_heading">Transaction Detail</h3>

        <div class="row description_heading">
          <div class="col-md-8 col-xs-8">
            <p>Detail</p>
          </div>
          <div class="col-md-4 col-xs-4">
            <p>Amount</p>
          </div>
        </div>

        <div class="row description_list">
          <div class="col-md-8 col-xs-8">
            <p>
              <i class="fa fa-id-card"></i>
              <span>0001</span>
            </p>
            <p>
              <i class="fa fa-user"></i>
              <span>Ali Hussain</span>
            </p>
            <p>
              <i class="fa fa-envelope"></i>
              <span>abc@gmail.com</span>
            </p>
            <p>
              <i class="fa fa-clock-o"></i>
              <span>2018-01-20 23:45:00</span>
            </p>
            <p>
              <i class="fa fa-map-marker"></i>
              <span>Pakistan</span>
              <span> , </span>
              <span>Sindh</span>
            </p>
            <p>
              <i class="fa fa-money"></i>
              <span>USD</span>
            </p>
            <p class="description_heading_p">Description</p>
            <p class="description_detail">HIHG-Neck Crop Jumper ABC HIHG-Neck Crop Jumper ABC HIHG-Neck Crop Jumper ABC HIHG-Neck Crop Jumper ABC HIHG-Neck Crop Jumper ABC</p>
          </div>

          <div class="col-md-4 col-xs-4">
            <p>$ 55.0</p>
          </div>

        </div>

      </div>
    </div>


	 </div>
</div>
@endsection
