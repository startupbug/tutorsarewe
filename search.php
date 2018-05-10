   <?php include 'header.php'; ?>
<section class="search">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <h3 class="f_tutor">Filters</h3>
            <h3 class="f_class">Hourly rate: 410 -$200+</h3>
           
            <input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/> 
            <!--<div id="slider"></div>-->
            <h3 class="f_class">Availability</h3>
            <form>
               <input type="checkbox" name="vehicle" value="Bike" class="checkbox_search"><span class="days">Sunday</span><br>
               <input type="checkbox" name="vehicle" value="Car" class="checkbox_search"><span class="days">Monday</span><br>
               <input type="checkbox" name="vehicle" value="Bike" class="checkbox_search"><span class="days">Tuesday</span><br>
               <input type="checkbox" name="vehicle" value="Car" class="checkbox_search"><span class="days">Wednesday</span><br>
               <input type="checkbox" name="vehicle" value="Bike" class="checkbox_search"><span class="days">Thursday</span><br>
               <input type="checkbox" name="vehicle" value="Car" class="checkbox_search"><span class="days">Friday</span><br>
               <input type="checkbox" name="vehicle" value="Bike" class="checkbox_search"><span class="days">Saturday</span><br>
               <div class="form-group">
                  <label for="exampleInputcourse" class="f_label f_course">Course</label>
                  <select class="form-control select_f" id="courseFrom" name="courseFrom">
                     <option>Select</option>
                     <option value="Sergio Rodriguez">Sergio</option>
                     <option value="Silvia Mahoney">Silvia</option>
                     <option value="Steve Moore">Steve</option>
                     <option value="Luke Perria">Adam</option>
                     <option value="Luke Perria">Luke</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputlocation" class="f_label f_course">Location</label>
                  <select class="form-control select_f" id="locationFrom" name="locationFrom">
                     <option>Select</option>
                     <option value="Sergio Rodriguez|sergio.rodriguez@tix.com">Sergio</option>
                     <option value="Silvia Mahoney|silvia.mahoney@tix.com">Silvia</option>
                     <option value="Steve Moore|steve.moore@tix.com">Steve Moore</option>
                     <option value="Luke Perria|luke.perria@tix.com">Adam Hettinger</option>
                     <option value="Luke Perria|luke.perria@tix.com">Luke Perea</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputstate" class="f_label f_course">States</label>
                  <select class="form-control select_f" id="stateFrom" name="stateFrom">
                     <option>Select</option>
                     <option value="Sergio Rodriguez|sergio.rodriguez@tix.com">Sergio</option>
                     <option value="Silvia Mahoney|silvia.mahoney@tix.com">Silvia</option>
                     <option value="Steve Moore|steve.moore@tix.com">Steve Moore</option>
                     <option value="Luke Perria|luke.perria@tix.com">Adam Hettinger</option>
                     <option value="Luke Perria|luke.perria@tix.com">Luke Perea</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputtype" class="f_label f_course">Type</label>
                  <select class="form-control select_f" id="typeFrom" name="typeFrom">
                     <option>Select</option>
                     <option value="Sergio Rodriguez|sergio.rodriguez@tix.com">Sergio</option>
                     <option value="Silvia Mahoney|silvia.mahoney@tix.com">Silvia </option>
                     <option value="Steve Moore|steve.moore@tix.com">Steve</option>
                     <option value="Luke Perria|luke.perria@tix.com">Adam</option>
                     <option value="Luke Perria|luke.perria@tix.com">Luke</option>
                  </select>
               </div>
            </form>
         </div>
         <div class="col-md-9">
            <form id="togglingForm" method="post" class="form-horizontal">
               <div class="form-group">
                  <div class="col-md-9">
                     <div class="icon-addon addon-lg">
                    <input type="text" placeholder="Email" class="form-control select_f f_paddingright" id="email">
                    <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                </div>

                        <!--<input type="text" class="searchField">
                        <label for="search" class="glyphicon glyphicon-search"></label>-->
                        <p class="f_fit">415 Java tutors fit your choices</p>
                     
                  </div>
                  <div class="col-md-3">
                     <button type="button" class="btn btn_search" data-toggle="#jobInfo">SEARCH</button>
                  </div>
               </div>
            </form>
            <!--<div class="row f_mainborder">
               <div class="col-md-2">
                  <img src="assets/images/search_img.png" class="img-responsive img_searchresp">
               <div class="col-md-7 border_search">
                  <h3 class="search_name">Alex. S.</h3>
                  <h3 class="f_course">Computer Programming, Karate,<br> Music, and General Ed Tutor</h3>
                  <p class="f_findcontent">As a professional Karate instructor for five years <br>with a second degree black belt in Wado <br>Karate, I have experience tutoring students of <br>all ages, both in large groups and individually.
                     <br>As a high...
                  </p>
                  <a href="#" class="f_detail">Read More</a>
               </div>
               <div class="col-md-3">
                  <h3 class="search_name">$70/hour</h3>
                  <ul class="search_list">
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li>
                        <h3 class="search_name">5.0(367)</h3>
                     </li>
                  </ul>
                  <ul class="search_list">
                     <li><i class="fa fa-clock-o f_clock"></i></li>
                     <li>
                        <h3 class="search_name ">1,722 <span>hours tutoring</span></h3>
                     </li>
                  </ul>
               </div>
            </div>-->
             <div class="row f_mainborder">
               <div class="col-md-2">
                  <img src="assets/images/search_img.png" class="img-responsive img_searchresp">
               </div>
               <div class="col-md-7 border_search">
                  <h3 class="search_name">Alex. S.</h3>
                  <h3 class="f_course">Computer Programming, Karate,<br> Music, and General Ed Tutor</h3>
                  <p class="f_findcontent">As a professional Karate instructor for five years <br>with a second degree black belt in Wado <br>Karate, I have experience tutoring students of <br>all ages, both in large groups and individually.
                     <br>As a high...
                  </p>
                  <a href="#" class="f_detail">Read More</a>
               </div>
               <div class="col-md-3">
                  <h3 class="search_name">$70/hour</h3>
                  <ul class="search_list">
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li>
                        <h3 class="search_name f_iphone">5.0(367)</h3>
                     </li>
                  </ul>
                  <ul class="search_list">
                     <li><i class="fa fa-clock-o f_clock"></i></li>
                     <li>
                        <h3 class="search_name ">1,722 <span>hours tutoring</span></h3>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="row f_mainborder">
               <div class="col-md-2">
                  <img src="assets/images/search_img.png" class="img-responsive img_searchresp">
               </div>
               <div class="col-md-7 border_search">
                  <h3 class="search_name">Alex. S.</h3>
                  <h3 class="f_course">Computer Programming, Karate,<br> Music, and General Ed Tutor</h3>
                  <p class="f_findcontent">As a professional Karate instructor for five years <br>with a second degree black belt in Wado <br>Karate, I have experience tutoring students of <br>all ages, both in large groups and individually.
                     <br>As a high...
                  </p>
                  <a href="#" class="f_detail">Read More</a>
               </div>
               <div class="col-md-3">
                  <h3 class="search_name">$70/hour</h3>
                  <ul class="search_list">
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li>
                        <h3 class="search_name f_iphone">5.0(367)</h3>
                     </li>
                  </ul>
                  <ul class="search_list">
                     <li><i class="fa fa-clock-o f_clock"></i></li>
                     <li>
                        <h3 class="search_name ">1,722 <span>hours tutoring</span></h3>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="row f_mainborder">
               <div class="col-md-2">
                  <img src="assets/images/search_img.png" class="img-responsive img_searchresp">
               </div>
               <div class="col-md-7 border_search">
                  <h3 class="search_name">Alex. S.</h3>
                  <h3 class="f_course">Computer Programming, Karate,<br> Music, and General Ed Tutor</h3>
                  <p class="f_findcontent">As a professional Karate instructor for five years <br>with a second degree black belt in Wado <br>Karate, I have experience tutoring students of <br>all ages, both in large groups and individually.
                     <br>As a high...
                  </p>
                  <a href="#" class="f_detail">Read More</a>
               </div>
               <div class="col-md-3">
                  <h3 class="search_name">$70/hour</h3>
                  <ul class="search_list">
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li>
                        <h3 class="search_name">5.0(367)</h3>
                     </li>
                  </ul>
                  <ul class="search_list">
                     <li><i class="fa fa-clock-o f_clock"></i></li>
                     <li>
                        <h3 class="search_name ">1,722 <span>hours tutoring</span></h3>
                     </li>
                  </ul>
               </div>
            </div>


            <div class="row f_mainborder">
               <div class="col-md-2">
                  <img src="assets/images/search_img.png" class="img-responsive img_searchresp">
               </div>
               <div class="col-md-7 border_search">
                  <h3 class="search_name">Alex. S.</h3>
                  <h3 class="f_course">Computer Programming, Karate,<br> Music, and General Ed Tutor</h3>
                  <p class="f_findcontent">As a professional Karate instructor for five years <br>with a second degree black belt in Wado <br>Karate, I have experience tutoring students of <br>all ages, both in large groups and individually.
                     <br>As a high...
                  </p>
                  <a href="#" class="f_detail">Read More</a>
               </div>
               <div class="col-md-3">
                  <h3 class="search_name">$70/hour</h3>
                  <ul class="search_list">
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li>
                        <h3 class="search_name">5.0(367)</h3>
                     </li>
                  </ul>
                  <ul class="search_list">
                     <li><i class="fa fa-clock-o f_clock"></i></li>
                     <li>
                        <h3 class="search_name ">1,722 <span>hours tutoring</span></h3>
                     </li>
                  </ul>
               </div>
            </div>

            <div class="f_resultbtn"><button type="button" class="btn btn_result" data-toggle="#jobInfo">SHOW MORE RESULTS</button></div>
         </div>
      </div>
   </div>
</section>
<?php include 'footer.php'; ?>