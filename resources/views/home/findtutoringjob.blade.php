@extends('app')
@section('content')

<section class="findtutoring_job">
   <div class="container">
   <div class="row">
      <div class="col-md-3">

         <h3 class="f_tutor">Filters</h3>

         <form method="get" action="{{route('filter_jobs')}}">
            {{csrf_field()}}
            <div class="form-group">
               <label for="course" class="f_course">Course</label>
               <select class="form-control select_f" id="course" name="courseform" onchange="form.submit();" >

                  <option disabled="" selected="">Select</option>
                  @foreach($subjects as $subject)
                     <option value="{{$subject->id}}">{{$subject->subject}}</option>
                  @endforeach

               </select>
            </div>
            <div class="form-group">
               <label for="exampleInputstate" class="f_label">State</label>
               <select class="form-control select_f" id="state" onchange="form.submit();" name="state">
                  <option disabled="" selected="">Select</option>
                  <option value="NewYork">NewYork</option>
                  <option value="New south wales">New south wales</option>
                  <option value="Texas">Texas</option>
                  <option value="South">South</option>
               </select>
            </div>
            <div class="form-group">
               <label for="location" class="f_course">Country</label>
               <select class="form-control select_f" id="conutry" onchange="form.submit();" name="conutry_id">
                  <option disabled="" selected="">Select</option>
                  <option value=""></option>
                        <option value="AR">Argentina</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BR">Brazil</option>
                        <option value="BG">Bulgaria</option>
                        <option value="CA">Canada</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CO">Colombia</option>
                        <option value="CR">Costa Rica</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EG">Egypt</option>
                        <option value="EE">Estonia</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="HK">Hong Kong S.A.R., China</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Laos</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MK">Macedonia</option>
                        <option value="MY">Malaysia</option>
                        <option value="MT">Malta</option>
                        <option value="MX">Mexico</option>
                        <option value="MD">Moldova</option>
                        <option value="MC">Monaco</option>
                        <option value="ME">Montenegro</option>
                        <option value="MA">Morocco</option>
                        <option value="NL">Netherlands</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="KP">North Korea</option>
                        <option value="NO">Norway</option>
                        <option value="PK">Pakistan</option>
                        <option value="PS">Palestinian Territory</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russia</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="RS">Serbia</option>
                        <option value="SG">Singapore</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="ZA">South Africa</option>
                        <option value="KR">South Korea</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="TW">Taiwan</option>
                        <option value="TH">Thailand</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">USA</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VN">Vietnam</option>
               </select>
            </div>
            <div class="form-group">
               <label for="type" class="f_course">Type</label>
               <select class="form-control select_f" id="type"  onchange="form.submit();" name="typeform">
                  <option disabled="" selected="">Select</option>
                  @foreach($lesson_types as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                  @endforeach
               </select>
            </div>
            
         </form>
      </div>
      <div class="col-md-8 col-md-offset-1">
         @include('partials.error_section')
         <h3 class="f_lefttutor">717 Tutoring jobs in New York, NY</h3>
         @foreach($all_jobs as $jobs)
         <div class="row f_mainborder">
            <div class="col-md-9">
               <h3 class="f_course">{{$jobs->title}}</h3>
               <p class="f_findcontent">{{$jobs->details}}</p>
               <a href="#" class="f_detail">Show Details</a>
               <p class="f_posted">- Posted by {{$jobs->first_name}}, {{$jobs->created_at->diffForHumans(\Carbon\Carbon::now())}}</p>
            </div>
            <div class="col-md-3">
               <div class="f_buttonview">
                  @if($jobs->job_id == null)
                     <a class="btn btn-theme btn-sm btn-min-block f_viewjob" href="#">REQUEST JOB</a>
                  @endif
                  @if($jobs->job_id == 2)
                     <a class="btn btn-theme btn-sm btn-min-block f_viewjob" href="#">APPLIED</a>
                  @endif
               </div>
            </div>
         </div>
         @endforeach
            {{$all_jobs->links()}}
      </div>
   </div>
</section>

@endsection