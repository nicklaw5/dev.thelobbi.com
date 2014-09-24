@include('layouts.header')
	
	<div class="container">
		<div class="row">
  			<div class="col-md-4 col-md-offset-4 new-user-form-container">

				<p>You're almost there. Let's create you a new username and password.</p>

				{{ Form::open(['action' => 'UsersController@store', 'id' => 'new-user-form']) }}

		            <div class="form-group">
		              {{ Form::label('username', 'Username') }} <span class="text-primary">*</span> <!--<small class="text-danger form-error-message">This is an error.</small>-->
		              {{ Form::text('username', '', ['class' => 'form-control br-none', 'placeholder' => 'Username', 'autocomplete' => 'off', 'required']) }}              
		            </div>

		            <div class="form-group">
		              {{ Form::label('password', 'Password') }} <span class="text-primary">*</span> <!--<small class="text-danger form-error-message">This is an error.</small>-->
		              {{ Form::password('password', ['class' => 'form-control br-none', 'placeholder' => 'Password', 'autocomplete' => 'off', 'required']) }}
		            </div>

		            <div class="form-group">
		              {{ Form::label('confirm-password', 'Confirm Password') }} <span class="text-primary">*</span> <!--<small class="text-danger form-error-message">This is an error.</small>-->
		              {{ Form::password('confirm-password', ['class' => 'form-control br-none', 'placeholder' => 'Confirm Password', 'autocomplete' => 'off', 'required']) }}
		            </div>

		            {{ Form::submit('Create Account', ['class' => 'btn btn-default btn-lg btn-block br-none']) }}

		        {{ Form::close() }}

		    </div>
        </div>
	</div>
	<!-- END .container -->

@include('layouts.footer')