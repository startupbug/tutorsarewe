@extends('app')
@section('content')

<section class="findtutoring_job">
   <div class="container">
   <div class="row">
      <div class="col-md-3">
         <h3 class="f_tutor">Filters</h3>
         <form method="post" action="{{route('filter_jobs')}}">
            {{csrf_field()}}
            <div class="form-group">
               <label for="course" class="f_course">Course</label>
               <select class="form-control select_f" id="course" name="courseform">
                  <option>Select</option>
                  <option value="Sergio Rodriguez|sergio.rodriguez@tix.com">Sergio</option>
                  <option value="Silvia Mahoney|silvia.mahoney@tix.com">Silvia</option>
                  <option value="Steve Moore|steve.moore@tix.com">Steve Moore</option>
                  <option value="Luke Perria|luke.perria@tix.com">Adam Hettinger</option>
                  <option value="Luke Perria|luke.perria@tix.com">Luke Perea</option>
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
               <label for="city" class="f_course">City</label>
               <select class="form-control select_f" id="city"  onchange="form.submit();" name="city_id">
                  @if(isset($cities))
                  {{dd($cities)}}
                     @foreach($cities as $city)
                           {{dd($city)}}
                        <option value="{{$city->id}}">{{$city->name}}</option>
                     @endforeach
                  @else
                     <option selected="" disabled="">Select</option>
                  @endif
               </select>
            </div>
            <div class="form-group">
               <label for="type" class="f_course">Type</label>
               <select class="form-control select_f" id="type" name="typeform">
                  <option>Select</option>
                  <option value="Sergio Rodriguez|sergio.rodriguez@tix.com">Sergio</option>
                  <option value="Silvia Mahoney|silvia.mahoney@tix.com">Silvia</option>
                  <option value="Steve Moore|steve.moore@tix.com">Steve Moore</option>
                  <option value="Luke Perria|luke.perria@tix.com">Adam Hettinger</option>
                  <option value="Luke Perria|luke.perria@tix.com">Luke Perea</option>
               </select>
            </div>
            
         </form>
      </div>
      <div class="col-md-8 col-md-offset-1">
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

            <button type="button" class="btn btn-default pull-right f_buttonview" data-toggle="modal" data-target="#editAddSubjectModal" ><i class="fa fa-plus"></i> View Job </button>

               <!-- <div class="f_buttonview"><a class="btn btn-theme btn-sm btn-min-block f_viewjob" href="#">VIEW JOB</a>
               </div> -->
            </div>
         </div>
         @endforeach
        {{$all_jobs->links()}}
      </div>
   </div>
</section>

<!-- Subject Edit Modal -->
<div class="modal fade" id="editAddSubjectModal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" 
                       data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        <span class="subjModalHeading"></span> Subject
                    </h4>
                </div>
            
                <!-- Modal Body -->
                <div class="modal-body">
                    
                    <form role="form" id="editAddSubject" action="{{route('subject_submit')}}">
                      <div class="form-group">
                        <label for="task">Subject</label>
                          <input type="text" class="form-control"
                          id="subject" name="subject"/>
                      </div>

                      <div class="form-group">
                        <label for="task">Subject Code</label>
                          <input type="text" class="form-control"
                          id="subject_code" name="subject_code"/>
                          <input type="hidden" name="edit_subj_id" id="edit_subj_id" value="">
                      </div>                
                </div>
            
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                                Close
                    </button>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <span class="subjModalHeading"></span> Subject
                    </button>
                </div>
             </form>
        </div>
    </div>
</div>

@endsection