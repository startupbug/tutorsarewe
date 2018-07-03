@extends('app')
@section('content')
<section class="aboutus">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <h3 class="about_us" style="text-align: center;">Terms And Conditions</h3>
            <p class="about_content">
               <p class="about_content" >
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                 <br>

                 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </p>
               <p class="about_content">
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

               </p><p class="about_content">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </p>

               <p class="about_content">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </p>  
               <p class="about_content">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </p>
               <p class="about_content">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                 

               <br>
               <br>
            </p>            
         </div>
         <div class="col-md-4">
            <h3 class="f_tutor">New to Tutor are us?</h3>
            <div class="menu">
               <header class="menu__header">
                  <h1 class="menu__header-title">Get to know us</h1>
               </header>
               <div class="menu__body">
                  <ul class="nav">
                     <li class="nav__item">
                        <a href="{{route('aboutus')}}" class="nav__item-link">
                           <span class="nav__item-text">About Us</span>
                        </a>
                     </li>
                     <li class="nav__item">
                        <a href="{{route('terms')}}" class="nav__item-link">
                           <span class="nav__item-text">Terms And Conditions</span>
                        </a>   
                     </li>
                     <li class="nav__item">
                        <a href="{{route('tutors_listing')}}" class="nav__item-link">
                           <span class="nav__item-text">Search For A Tutor</span>
                        </a>   
                     </li>
                     <li class="nav__item">
                        <a href="#" class="nav__item-link">
                           <span class="nav__item-text">Search For A Student</span>
                        </a>   
                     </li>
                     <li class="nav__item">
                        <a href="{{route('fulltime_tutor')}}" class="nav__item-link">
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

@endsection