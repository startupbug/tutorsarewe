@extends('app')
@section('content')

<section class="aboutus">
   <div class="container">
      <div class="row">

      @if($flag == 1)
         <div class="col-md-12">
              <h1> Hello, {{Auth::user()->first_name}}. You need to Give Pre test to Move further </h1>
              <p>The Pretest costs 40$ to Proceed further</p>
              <a href="{{route('pre_test_payment_index', ['name' => '2'])}}"><button>Proceed</button></a>
         </div>      
      @elseif($flag == 2)
         <div class="col-md-12">
              <h1> You need to Pay 40$ for Taking the Pre-test. Click Pay to proceed payment using your Wallet </h1>
              <a href="{{route('pay_pretest_student')}}"><button>Pay 40$</button></a>
         </div>
      @elseif($flag == 3)
         <div class="col-md-12">
              @include('partials.error_section')
              <br>
              Click The Link below to go to your Test Page
              <a href="{{route('student_pretest')}}">Pre-Test</a>
         </div>
      @elseif($flag=4)
          @include('partials.error_section')
          <a target="_blank" href="{{route('my_balance')}}">Go to My Wallet</a>
      @endif



      
      </div>
   </div>
</section>

@endsection