<section id="header" class="nav-hidden-container">
  <div class="container">
    <div class="nav-hidden-left">
      <ul>
        <li><a href="#">PC</a></li>
        <li><a href="#">PS4</a></li>
        <li><a href="#">PS3</a></li>
        <li><a href="#">PSP</a></li>
        <li><a href="#">Xbox One</a></li>
        <li><a href="#">Xbox 360</a></li>
        <li><a href="#">Wii U</a></li>
        <li><a href="#">3DS</a></li>
        <li><a href="#">Mobile</a></li>
      </ul>
    </div>

    <div class="nav-hidden-right">
      <ul>
        <li><a target="_blank" href="https://plus.google.com/+thelobbi/posts"><i class="fa fa-google-plus-square"></i> Google Plus</a></li>
        <li><a target="_blank" href="https://twitter.com/thelobbi"><i class="fa fa-twitter-square"></i> Twitter</a></li>
        <li><a target="_blank" href="https://www.facebook.com/thelobbi"><i class="fa fa-facebook-square"></i> Facebook</a></li>
        <li><a data-toggle="modal" data-target=".bs-modal-signin" href="#"><i class="fa fa-user"></i> Sign In</a></li> 
        <li><a data-toggle="modal" data-target=".bs-modal-signup" href="#"><i class="fa fa-users"></i> Join</a></li>
      </ul>
    </div>
  </div>
</section>

<div id="nav" class="navbar navbar-inverse br-none">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand navbar-logo" href="/">
        <img src="/assets/images/logos/thelobbi-logo-181x30.png">
      </a>
    </div>
    <div class="navbar-collapse collapse navbar-inverse-collapse pr-none">
      <ul class="nav navbar-nav">
        <li><a href="#">News</a></li>
        <li><a href="#">Reviews</a></li>
        <li><a href="#">Features</a></li>
        <li><a href="#">Videos</a></li>
        <li><a href="#">Forums</a></li>
        <li><a href="#">More</a></li>
      </ul>      
      <ul class="nav navbar-nav navbar-right">
        <li>
          <form class="navbar-form navbar-left">
            <fieldset>
              <i class="nav-search-icon fa fa-search"></i>
              <input type="text" class="navbar-search br-none form-control col-lg-8" placeholder="Search">
            </fieldset>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- Modals -->
<!-- Sign in modal -->
@include('layouts.modals.signin-modal')
<!-- END Sign in modal -->

<!-- Sign up modal -->
@include('layouts.modals.signup-modal')
<!-- END Sign up modal -->
<!-- END Modals -->