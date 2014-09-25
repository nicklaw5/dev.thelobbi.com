@include('layouts.header')
	
	<div class="container">
		<div class="row">

  			<div class="col-md-4 col-md-offset-4" id="new-user-form-container">
  				
  				<h4>CREATE NEW ACCOUNT - {{ $display_name }}</h4>
  				<hr>
				<p>Looks like you're new here. Let's create you a username and password.</p>

				{{ Form::open(['action' => 'UsersController@store', 'id' => 'new-user-form']) }}

		            <div class="form-group">
		              {{ Form::label('username', 'Username') }} <span class="text-primary">*</span> <small id="username-error" class="text-danger form-error-message pull-right"></small>
		              {{ Form::text('username', $display_name, ['id' => 'username', 'class' => 'form-control br-none', 'placeholder' => 'Username', 'autocomplete' => 'off', 'required']) }}
		            </div>

		            <div class="form-group">
		              {{ Form::label('password', 'Password') }} <span class="text-primary">*</span> <small id="password-error" class="text-danger form-error-message pull-right"></small>
		              {{ Form::password('password', ['id' => 'password', 'class' => 'form-control br-none', 'placeholder' => 'Password', 'autocomplete' => 'off', 'required']) }}
		            </div>

		            <div class="form-group">
		              {{ Form::label('confirm-password', 'Confirm Password') }} <span class="text-primary">*</span> <small id="confirm-password-error" class="text-danger form-error-message pull-right"></small>
		              {{ Form::password('confirm-password', ['id' => 'confirm-password', 'class' => 'form-control br-none', 'placeholder' => 'Confirm Password', 'autocomplete' => 'off', 'required']) }}
		            </div>

		            {{ Form::submit('Create Account', ['id' => 'submit-btn', 'class' => 'btn btn-default btn-lg btn-block br-none']) }}

		        {{ Form::close() }}

		        <p>Already have an account? <a href=""><i class="fa fa-sign-in"></i> Sign in</a></p>

		    </div>
        </div>
	</div>
	<!-- END .container -->
	
	

	<script  type="text/javascript">
		$(function() {
			
			// Password strength: 6 characters, at least one upper and
			// lowercase letter, and one digit
			var remove_icon = '<i class="fa fa-remove"></i> ';
			var check_icon = '<i class="fa fa-check"></i> ';
			var postUrl = $('#new-user-form').attr('action');
			var passwordStrengthRegex = /^((?=.*[0-9])(?=.*[a-zA-Z]).{6,})$/g;
			var usernameRegex = /^[a-zA-Z0-9_-]{4,25}$/;
			var dangerColor = '#cc0000';
			var successColor = '#77b300';
			var passRules = remove_icon + 'Rules: 6 characters (incl. numbers and letters)';
			var passMatch = remove_icon + 'Passwords don\'t match.';
			var gotIt = check_icon + 'You got it!';
			var allyours = check_icon + 'It\'s all yours!';

			function checkIfUsernameAvailable(username) {
				var username = username;
				$.post(postUrl, { username: username }, function(resp) {
					console.log('request sent');
					if(resp === 'exists') {
						$('#username-error').html(remove_icon + 'Username already in use.').css("color", dangerColor);
						$('#username').css("border-color", dangerColor);
					} else {
						$('#username-error').html(check_icon + 'Username is available!').css("color", successColor);
						$('#username').css("border-color", successColor);
					}
				});				
			}


			if($('#username').val() !== '') {
				checkIfUsernameAvailable($('#username').val());
			}
			

			$('#username').keyup(function() {
				var username = $(this).val();

				if(username.length < 4) {
					$('#username-error').html(remove_icon + 'Must be 4 characters or more.').css("color", dangerColor);
					$(this).css("border-color", dangerColor);
				} 
				else if (username.length > 25) {
					$('#username-error').html(remove_icon + 'Must be 25 characters or less.').css("color", dangerColor);
					$(this).css("border-color", dangerColor);
				} else if (!username.match(usernameRegex)) {
					$('#username-error').html(remove_icon + 'Numbers, letters, underscores and hyphens only.').css("color", dangerColor);
					$('#username').css("border-color", dangerColor);
				}
				else {
					//check if username already taken (AJAX)
					checkIfUsernameAvailable(username);
				}
			});
		
			
			$('#password').keyup(function() {
				if(!$(this).val().match(passwordStrengthRegex)) {
					$(this).css("border-color", dangerColor);	
					$('#password-error').html(passRules).css("color", dangerColor);
				} else {
					$(this).css("border-color", successColor);
					$('#password-error').html(gotIt).css("color", successColor);
				}
			});
			

			$('#confirm-password').keyup(function() {
				if($(this).val() !== $('#password').val() || $(this).val().length < 6) {
					$(this).css("border-color", dangerColor);	
					$('#confirm-password-error').html(passMatch).css("color", dangerColor);
				} else {
					$(this).css("border-color", successColor);
					$('#confirm-password-error').html(gotIt).css("color", successColor);
				}
			});


			$('#new-user-form').on("submit", function(evt) {
				evt.preventDefault();
				alert('form submitted!');
			})

		});
	</script>

@include('layouts.footer')