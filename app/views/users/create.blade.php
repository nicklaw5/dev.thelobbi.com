@include('layouts.header')
	
	<div class="container">
		<div class="row">

		
  			<div class="col-md-4 col-md-offset-4 box-shadow" id="new-user-form-container">
  				
  				<h4>CREATE NEW ACCOUNT</h4>
  				<hr>
				<p>Looks like you're new here, so let's create you a new account.</p>

				{{ Form::open(['action' => 'UsersController@store', 'id' => 'new-user-form']) }}

					@foreach ($errors->all('<p style="color:#cc0000">:message</p>') as $error)
						{{ $error }}
					@endforeach

		            <div class="form-group">
		              {{ Form::label('username', 'Username') }} <span class="text-primary">*</span> <small id="username-error" class="text-danger form-error-message pull-right"></small>
		              {{ Form::text('username', Session::get('socialData')['username'], ['id' => 'username', 'pattern' => '[a-zA-Z0-9_-].{4,25}','title' => 'Username can only contain numbers, letter, as well as hyphen and underscore characters.', 'class' => 'form-control br-none', 'placeholder' => 'Username', 'autocomplete' => 'off', 'required']) }}
		            </div>

		            <div class="form-group">
		              {{ Form::label('email', 'Email') }} <span class="text-primary">*</span> <small id="email-error" class="text-danger form-error-message pull-right"></small>
		              {{ Form::email('email', Session::get('socialData')['email'], ['id' => 'email', 'class' => 'form-control br-none', 'placeholder' => 'Email', 'autocomplete' => 'off', 'required']) }}
		            </div>

		            <div class="form-group">
		              {{ Form::label('password', 'Password') }} <span class="text-primary">*</span> <small id="password-error" class="text-danger form-error-message pull-right"></small>
		              {{ Form::password('password', ['id' => 'password', 'pattern' => '.{6,}', 'class' => 'form-control br-none', 'placeholder' => 'Password', 'autocomplete' => 'off', 'required']) }}
		            </div>

		            <div class="form-group">
		              {{ Form::label('confirm-password', 'Confirm Password') }} <span class="text-primary">*</span> <small id="confirm-password-error" class="text-danger form-error-message pull-right"></small>
		              {{ Form::password('confirm-password', ['id' => 'confirm-password', 'pattern' => '.{6,}', 'class' => 'form-control br-none', 'placeholder' => 'Confirm Password', 'autocomplete' => 'off', 'required']) }}
		            </div>

		            {{ Form::submit('Create Account', ['id' => 'submit-btn', 'class' => 'btn btn-default btn-lg btn-block br-none']) }}

		        {{ Form::close() }}

		        <p>Already have an account? <a href=""><i class="fa fa-sign-in"></i> Sign in</a></p>

		    </div>
		
        </div>
	</div>
	<!-- END .container -->
	
	<!-- {{ HTML::script('assets/js/signup-validation.js', array('type' => 'text/javascript', 'async' => 'async')) }} -->

@include('layouts.footer')