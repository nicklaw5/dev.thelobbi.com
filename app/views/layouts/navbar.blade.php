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