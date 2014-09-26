	@include('layouts.header')
		  <div class="modal-dialog modal-lg">
		    <div class="br-none modal-signin-content modal-content">
		      
		        <div class="col-sm-12 modal-header">
		          <h4>SIGN IN</h4>
		        </div>

		        <ul class="col-sm-6 social-signin">
		          @include('layouts.components.social-signin-buttons')
		        </ul>

		        <div class="col-sm-6 signin-form-container">
		          <p>Sign in to your account.</p>

		          @if(Session::has('signinError'))
		          	<p class="signin-error"><i class="fa fa-remove"></i> {{ Session::pull('signinError', 'Default');  }} </p>
		          @endif

		          {{ Form::open(['action' => 'SessionsController@store']) }}

		            <div class="form-group">
		              {{ Form::label('username', 'Username') }} <span class="text-primary">*</span> <!--<small class="text-danger form-error-message">This is an error.</small>-->
		              {{ Form::text('username', '', ['class' => 'form-control br-none', 'placeholder' => 'Username', 'autocomplete' => 'off', 'required']) }}
		            </div>
		            
		            <div class="form-group">
		              {{ Form::label('password', 'Password') }} <span class="text-primary">*</span> <!--<small class="text-danger form-error-message">This is an error.</small>-->
		              {{ Form::password('password', ['class' => 'form-control br-none', 'placeholder' => 'Password', 'autocomplete' => 'off', 'required']) }}
		            </div>

		            {{ Form::submit('Sign in', ['class' => 'btn btn-default btn-lg btn-block br-none']) }}

		          {{ Form::close() }}

		          <br>
		          <a href="#">Forgot your password?</a>
		          <br>
		          <a href="#">Send me my email verification again.</a>
		        </div>

		    </div>
		  </div>
		@include('layouts.footer')
	