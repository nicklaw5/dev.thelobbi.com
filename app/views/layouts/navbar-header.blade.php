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

      @if(Auth::check())
        <li><a href="#"><i class="fa fa-user"></i> {{ Auth::user()->username }}</a></li>
        <li><a href="{{ url('/signout') }}"><i class="fa fa-sign-out"></i> Sign out</a></li>
      @else
        <li><a data-toggle="modal" data-target=".bs-modal-signin" href="#"><i class="fa fa-user"></i> SIGN IN</a></li>
        <li><a data-toggle="modal" data-target=".bs-modal-signup" href="#"><i class="fa fa-users"></i> JOIN</a></li>
      @endif
      </ul>
    </div>
  </div>
</section>