<?php include 'header.php'; ?>
<section class="login">
  <div class="container">
  	<div class="row">
     <div class="col-md-6 login-tutor">
      <h3 class="login_content">Log In</h3>
       <p class="f_account">Don’t have an account? <span><a href="#">Sign up for free</a></span></p>

        
             
      <form role="form">
            <!--<div class="form-group">
              <label for="exampleInputEmail1" class="f_label">Email</label>
              <input type="email" class="form-control f_control" id="exampleInputEmail1" placeholder="email">
            </div>-->
            <div class="form-group">
            	<label for="exampleInputEmail1" class="f_label">Email</label>
            <select class="form-control" id="emailFrom" name="emailFrom">
            	
    							<option>Select Email Address</option>
    							<option value="Sergio Rodriguez|sergio.rodriguez@tix.com">Sergio Rodriguez (sergio.rodriguez@tix.com)</option>
    							<option value="Silvia Mahoney|silvia.mahoney@tix.com">Silvia Mahoney (sergio.rodriguez@tix.com)</option>
    							<option value="Steve Moore|steve.moore@tix.com">Steve Moore (sergio.rodriguez@tix.com)</option>
    							<option value="Luke Perria|luke.perria@tix.com">Adam Hettinger (sergio.rodriguez@tix.com)</option>
    							<option value="Luke Perria|luke.perria@tix.com">Luke Perea (sergio.rodriguez@tix.com)</option>
    						</select>
    					</div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="f_label">Password</label>
              <input type="password" class="form-control f-control" id="exampleInputPassword1" placeholder="password">
            </div>
           
           <div class="account_form"><a href="#">CREATE AN ACCOUNT</a></div>
           <a href="#" class="f_forgot">Forgot name or password?</a>
          </form>
     
    </div>
    <div class="col-md-4 col-md-offset-2">
    	  <h3 class="f_tutor">New to Tutor are us?</h3>
            <div class="menu">
               <header class="menu__header">
                  <h1 class="menu__header-title">Get to know us</h1>
               </header>
               <div class="menu__body">
                  <ul class="nav">
                     <li class="nav__item">
                        <a href="#" class="nav__item-link">
                        <span class="nav__item-text">About Us</span>
                        </a>   
                     </li>
                     <li class="nav__item">
                        <a href="#" class="nav__item-link">
                        <span class="nav__item-text">Terms And Conditions</span>
                        </a>   
                     </li>
                     <li class="nav__item">
                        <a href="#" class="nav__item-link">
                        <span class="nav__item-text">Search For A Tutor</span>
                        </a>   
                     </li>
                     <li class="nav__item">
                        <a href="#" class="nav__item-link">
                        <span class="nav__item-text">Search For A Student</span>
                        </a>   
                     </li>
                     <li class="nav__item">
                        <a href="#" class="nav__item-link">
                        <span class="nav__item-text">Become A Tutor</span>
                        </a>   
                     </li>
                  </ul>
               </div>
            </div>
    </div>
  </div>
  </div>
  </section>

<?php include 'footer.php'; ?>