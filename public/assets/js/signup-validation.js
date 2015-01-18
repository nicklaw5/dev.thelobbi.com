$(function() {
			
	// Password strength: 6 characters, at least one upper and
	// lowercase letter, and one digit
	var usernameDone = false;
	var passDone = false;
	var passConDone = false;
	var remove_icon = '<i class="fa fa-remove"></i> ';
	var check_icon = '<i class="fa fa-check"></i> ';
	var postUrl = $('#new-user-form').attr('action');
	var passwordStrengthRegex = /^(.{6,})$/g;  // /^((?=.*[0-9])(?=.*[a-zA-Z]).{6,})$/g
	var usernameRegex = /^[a-zA-Z0-9_-]{4,25}$/;
	var dangerColor = '#cc0000';
	var successColor = '#77b300';
	var passRules = remove_icon + 'Minimun of 6 characters.';
	var passMatch = remove_icon + 'Passwords don\'t match.';
	var gotIt = check_icon + 'You got it!';
	var allyours = check_icon + 'It\'s all yours!';

	function checkIfUsernameAvailable(username) {
		$.post(postUrl, { checkIfUsername: '', username: username }, function(resp) {
			console.log('request sent');
			if(resp === 'exists') {
				$('#username-error').html(remove_icon + 'Username already in use.').css("color", dangerColor);
				$('#username').css("border-color", dangerColor);
				usernameDone = false;
			} else {
				$('#username-error').html(check_icon + 'Username available!').css("color", successColor);
				$('#username').css("border-color", successColor);
				usernameDone = true;
			}
		});
	}

	// If username input field already populated,
	// check if username is available.
	if($('#username').val().length > 3) {
		checkIfUsernameAvailable($('#username').val());
	}


	$('#username').keyup(function() {
		var username = $(this).val();

		if(username.length < 4) {
			$('#username-error').html(remove_icon + 'Must be 4 characters or more.').css("color", dangerColor);
			$(this).css("border-color", dangerColor);
			usernameDone = false;
		} 
		else if (username.length > 25) {
			$('#username-error').html(remove_icon + 'Must be 25 characters or less.').css("color", dangerColor);
			$(this).css("border-color", dangerColor);
			usernameDone = false;
		} else if (!username.match(usernameRegex)) {
			$('#username-error').html(remove_icon + 'Numbers, letters, underscores and hyphens only.').css("color", dangerColor);
			$('#username').css("border-color", dangerColor);
		}
		else {
			//check if username already taken
			checkIfUsernameAvailable(username);
		}
	});


	$('#password').keyup(function() {
		if(!$(this).val().match(passwordStrengthRegex)) {
			$(this).css("border-color", dangerColor);	
			$('#password-error').html(passRules).css("color", dangerColor);
			passDone = false;
		} else {
			$(this).css("border-color", successColor);
			$('#password-error').html(gotIt).css("color", successColor);
			passDone = true;
		}
	});


	$('#confirm-password').keyup(function() {
		if($(this).val() !== $('#password').val() || $(this).val().length < 6) {
			$(this).css("border-color", dangerColor);	
			$('#confirm-password-error').html(passMatch).css("color", dangerColor);
			passConDone = false;
		} else {
			$(this).css("border-color", successColor);
			$('#confirm-password-error').html(gotIt).css("color", successColor);
			passConDone = true;
		}
	});


	$('#new-user-form').submit(function() {
		
		var username = $('#username').val();
		var password = $('#password').val();
		var confirm_password = $('#confirm-password').val();

		//check if fields empty
		if(username === '' || password === '' || confirm_password === '') {
			alert('All fields required');
			return false;
		}

		//submit form if data validates
		if(usernameDone && passDone && passConDone) {
			return true;
		}
		//else alert user of invalid data
		alert('You haven\'t completed all fields appropriately.');
		return false;
	});

});