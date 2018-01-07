<!DOCTYPE html>
<!-- saved from url=(0042)http://mehrabs-stupendous-site.webflow.io/ -->
<html data-wf-site="567d242424547e43717427ba" data-wf-page="567d242524547e43717427c6" data-wf-status="1" class="w-mod-js w-mod-no-touch w-mod-video w-mod-no-ios wf-bitter-n4-active wf-bitter-n7-active wf-bitter-i4-active wf-opensans-n3-active wf-opensans-i3-active wf-opensans-n4-active wf-opensans-i4-active wf-opensans-n6-active wf-opensans-i6-active wf-opensans-n7-active wf-opensans-i7-active wf-opensans-n8-active wf-opensans-i8-active wf-lato-n1-active wf-lato-i1-active wf-lato-n3-active wf-lato-i3-active wf-lato-n4-active wf-lato-i4-active wf-lato-n7-active wf-lato-i7-active wf-lato-n9-active wf-lato-i9-active wf-merriweather-n3-active wf-merriweather-n4-active wf-merriweather-n7-active wf-merriweather-n9-active wf-lora-n4-active wf-lora-i4-active wf-lora-n7-active wf-oxygen-n3-active wf-oxygen-n4-active wf-oxygen-n7-active wf-active">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!csrf token needed for form how this works??
        part of authentication module>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="utf-8">
      <title>Suggest ME</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="generator" content="Webflow">
      
      {!!Html::style('css/normalize.css')!!}
      {!!Html::style('css/webflow.css')!!}
      {!!Html::style('css/layout.css')!!} 
      <!there are plenty of tooltip plugin available I just picked most lightweight css for tooltips, 
        customized it, for diversity check tooltip jqeury plugin, after all tooltips work is done merge
        this with layout.css>     
      {!!Html::style('css/tooltip.css')!!}
      {!!Html::style('css/perfect-scrollbar.min.css')!!}
      
      

      @yield('css')     

      @yield('js')     
      
      
   </head>

   <body class="main-body">
    <?php $count_id=1; ?> 

    <!this is login/sign up form-start of authentication module>

    <div role="authentication_module">
      <div class="black_overlay" style="display: none;"></div>
      <div class="log_in_white_overlay" style="opacity: 0; display: none; transition: opacity 500ms;">
         <h2 class="overlay_title">Log In</h2>
         <a href="#" data-ix="hide-log-in" class="w-button close_button" >&nbsp;</a>
            <form id="loginForm" name="email-form-2" data-name="Email Form 2" class="log_in_form" >
              {!! csrf_field() !!}
              <label for="email-2" class="overlay_text">Email Address:</label>
              <input id="email-2" type="email" placeholder="Enter your email address" name="email"  value="{{ old('email') }}"  data-name="Email 2" required="required" class="w-input">
              <label for="name-4" class="overlay_text">Password</label>
              <input id="name-4" type="password" placeholder="Enter your password" name="password" data-name="Name 4" required="required" class="w-input">
              <input type="submit" data-wait="Please wait..." value="Log In" class="w-button overlay_button" id="login_button">
            <a href="#" class="bonus_options">Forgot your password?</a>
            <a href="#" data-ix="close-and-show-sign-up" class="bonus_options">Not a member yet?</a></form>
            <div id="success_div_logIn" class="w-form-done upon_success" style="display:none;">
               <p class="overlay_paragragh">You are successfully logged in.</p>
            </div>

            <div id="error_div_logIn" class="w-form-fail upon_error" id="error_div" style="display:none;">
              <p class="overlay_paragragh">Your credentials don't match with our database.</p>              
            </div>
         </div>
      </div>
      <div class="sign_up_white_overlay" style="opacity: 0; display: none; transition: opacity 500ms;">
         <h2 class="overlay_title">Sign Up</h2>
         <a href="#" data-ix="hide-sign-up" class="w-button close_button">&nbsp;</a>
            <form id="signupForm" name="email-form-2" data-name="Email Form 2" class="sign_up_form">
              {!! csrf_field() !!}
              <label for="email-3" class="overlay_text">Name:</label>
              <input id="email-3" type="text" placeholder="Enter your name" name="USER_NAME" required="required" class="w-input">
              <label for="email-3" class="overlay_text">Email Address:</label>
              <input id="email-4" type="email" placeholder="Enter your email address" name="email" data-name="Email 4" required="required" class="w-input">
              <label for="name-6" class="overlay_text">Password:</label>
              <input id="name-6" type="password" placeholder="Enter your password" id="password" name="password" data-name="Name 6" required="required" minlength=6 class="w-input" onchange="if(this.checkValidity()) form.password_confirmation.pattern = this.value;">
              <label for="name-5" class="overlay_text">Retype Your Password:</label>
              <input id="name-5" type="password" placeholder="Enter your password again" id="password_confirmation" name="password_confirmation" data-name="Name 5" required="required" minlength=6 class="w-input" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');">
              <input type="submit" value="Sign Up" data-wait="Please wait..." class="w-button overlay_button">
              <a href="#" data-ix="close-and-show-log-in" class="bonus_options">Already a member?</a></form>
            <div id="success_div_signUp" class="w-form-done upon_success" style="display:none;">
               <p class="overlay_paragragh">Thank you for joining with us!</p>
            </div>
            <div id="error_div_signUp" class="w-form-fail upon_error" style="display:none;">
               <p id="error_message_signUp" class="overlay_paragragh"></p>
            </div>
         </div>
      </div>
    </div>
    
    <!end of signup/login form>

      <div data-collapse="medium" data-animation="default" data-duration="400" class="w-nav header">
         <div class="w-clearfix master">
            <a href="#" class="w-nav-brand w-clearfix">
               <h3 class="logo">Suggest Me</h3>
               <h3 class="mini_logo">Suggest<br> Me</h3>
            </a>
            <div class="w-form w-clearfix search">
               <form id="wf-form-Search" name="wf-form-Search" data-name="Search" class="w-clearfix">
                <input id="name-2" type="text" placeholder="What are you seeking?" name="name-2" data-name="Name 2" class="w-input search-field">
                <a href="#" class="w-button advance-search-button">&nbsp;&nbsp;</a></form>
               <div class="w-form-done"></div>
               <div class="w-form-fail">
                  <p>Oops! Something went wrong while submitting the form</p>
               </div>
            </div>
            @if(Auth::user())
            <nav role="navigation" class="w-nav-menu nav_menu">
              <a href="#" class="w-nav-link nav_button">Ask</a>
              <a href="#" class="w-nav-link nav_button">Add</a>
              <a href="#" class="w-nav-link notification">&nbsp;&nbsp;</a>
              <a href="#" class="w-inline-block image-link">
                <img width="40" height="40" src="{{ asset( '/profile_img/'.Auth::user()->image )}}" class="profile_pic"></a></nav>
            <nav role="navigation" class="w-nav-menu collapsed_nav_menu">
              <a href="#" class="w-nav-link nav_options">Ask</a>
              <a href="#" class="w-nav-link nav_options">Add</a>
              <a href="#" class="w-nav-link nav_options">Notification</a>
              <!is saving the user_id a good idea>
              <a href="#" data-UserID="{{Auth::user()->USER_ID}}" id="profile" class="w-nav-link nav_options">Profile</a>
            </nav>
            @else
            <nav role="navigation" class="w-nav-menu nav_menu">              
              <a href="#" data-ix="show-sign-up" id="sign_up" class="w-nav-link nav_button" style="float:right;">Sign Up</a>
            <a href="#" data-ix="show-log-in" id="log_in" class="w-nav-link nav_button" style="float:right;">Log In</a></nav>
            <nav role="navigation" class="w-nav-menu collapsed_nav_menu">
              <a href="#" class="w-nav-link nav_options">Log In</a>
              <a href="#" class="w-nav-link nav_options">Sign Up</a>
            </nav>
            @endif
            <div class="w-nav-button hidden">
               <div class="w-icon-nav-menu"></div>
            </div>
         </div>
         <div class="subsection"><a href="#" class="w-button homepage_button">Commodity</a><a href="" data-ix="pressed" class="w-button homepage_button selected">Community</a></div>
         <div class="w-nav-overlay" data-wf-ignore=""></div>
      </div>
      <div role="handle_left_side_bar">
        <div class="showandhidebutton_left">
          <a href="#" class="w-button show_left_side_bar">&nbsp;</a>
          <a href="#" class="w-button hide_left_side_bar">&nbsp;</a>     
        </div>
         <div class="left_side_bar">
         <div class="submenu">
            <ul class="w-list-unstyled">
              <li>
                   <a href="/advanced_search" class="w-clearfix w-inline-block submenus">
                     <img width="20" height="20" src="{{ asset( '/images/seek_suggestion.png') }}" class="floatleft">
                     <h5 class="submenu_title">Seek Suggestion</h5>
                  </a>
               </li>
               <li>
                  <a href="#" class="w-clearfix w-inline-block submenus">
                     <img width="20" height="20" src="{{ asset( '/images/trending.png') }}" class="floatleft">
                     <h5 class="submenu_title">Trending</h5>
                  </a>
                 </li>
                <li>
                   <a href="#" class="w-clearfix w-inline-block submenus">
                     <img width="20" height="20" src="{{ asset( '/images/browse.png') }}" class="floatleft">
                     <h5 class="submenu_title">Browse Categories</h5>
                  </a>
               </li>
               
            </ul>
         </div>
         <div>
            <ul class="w-list-unstyled w-clearfix upper_border">
               <li class="floatleft"><a href="#" class="extra_info">About .</a></li>
               <li class="floatleft"><a href="#" class="extra_info">Feedback .</a></li>
               <li class="floatleft"><a href="#" class="extra_info">Contact .</a></li>
               <li class="floatleft"><a href="#" class="extra_info">FAQ .</a></li>
               <li class="floatleft"><a href="#" class="extra_info">Report</a></li>
            </ul>
         </div>
      </div>
      </div>
     
    @yield('content')
     
   </body>
</html>