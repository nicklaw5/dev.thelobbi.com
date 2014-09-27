<div class="modal fade bs-modal-signup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="br-none modal-signup-content modal-content">
        <div class="col-sm-12 modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4>SIGN UP</h4>
        </div>

        <ul class="col-sm-6 social-signin">
          @include('layouts.components.social-signin-buttons')
        </ul>

        <div class="col-sm-6 signup-form-container">
          <p>Create a new account.</p>

          {{ Form::open(['action' => 'UsersController@store']) }}

            <div class="form-group">
              {{ Form::label('username', 'Username') }} <span class="text-primary">*</span>
              {{ Form::text('username', '', ['class' => 'form-control br-none', 'placeholder' => 'Username', 'autocomplete' => 'off', 'required']) }}              
            </div>
            
            <div class="form-group">
              {{ Form::label('email', 'Email Address') }} <span class="text-primary">*</span>
              {{ Form::email('email', '', ['class' => 'form-control br-none', 'placeholder' => 'Email', 'autocomplete' => 'off', 'required']) }}
            </div>

            <div class="form-group">
              {{ Form::label('password', 'Password') }} <span class="text-primary">*</span>
              {{ Form::password('password', ['class' => 'form-control br-none', 'placeholder' => 'Password', 'autocomplete' => 'off', 'required']) }}
            </div>

            <div class="form-group">
              {{ Form::label('confirm-password', 'Confirm Password') }} <span class="text-primary">*</span>
              {{ Form::password('confirm-password', ['class' => 'form-control br-none', 'placeholder' => 'Confirm Password', 'autocomplete' => 'off', 'required']) }}
            </div>

            {{ Form::submit('Sign up', ['class' => 'btn btn-default btn-lg btn-block br-none']) }}

          {{ Form::close() }}
        </div>

    </div>
  </div>
</div>