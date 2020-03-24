var complete = $('.complete-input');
var email_ok = false;
var pass_ok = false;
var pass2_ok = false;

$(document).ready(function() {
	complete.prop('disabled', true);
});

//check email format
function checkEmail() {
	var email = $('.email-form .email-input');
	var valid = $('.email-form .valid-feedback');
	var invalid = $('.email-form .invalid-feedback');
	var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	valid.hide();
	invalid.show();
	email.removeClass('is-valid').addClass('is-invalid');
	email_ok = false;

	if (email.val().match(format)) {
		valid.show();
		invalid.hide();
		email.removeClass('is-invalid').addClass('is-valid');

		email_ok = true;
	}

	complyRequirements();
}

//check password format
function checkPassword() {
	var password = $('.password-form .password-input');
	var valid = $('.password-form .valid-feedback');
	var invalid = $('.password-form .invalid-feedback');
	var format = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;

	valid.hide();
	invalid.show();
	password.removeClass('is-valid').addClass('is-invalid');
	pass_ok = false;

	if (password.val().length >= 8) {
		if (password.val().match(format)) {
			valid.show();
			invalid.hide();
			password.removeClass('is-invalid').addClass('is-valid');

			pass_ok = true;
		}
	}

	complyRequirements();
}

//check if password match
function confirmPassword() {
	var password = $('.password-form .password-input');
	var password2 = $('.password2-form .password2-input');
	var valid = $('.password2-form .valid-feedback');
	var invalid = $('.password2-form .invalid-feedback');

	valid.hide();
	invalid.show();
	password2.removeClass('is-valid').addClass('is-invalid');
	pass2_ok = false;

	if (password.val() === password2.val()) {
		valid.show();
		invalid.hide();
		password2.removeClass('is-invalid').addClass('is-valid');

		pass2_ok = true;
	}

	complyRequirements();
}

//check for compliance of requirements
function complyRequirements() {
	if (email_ok === true && pass_ok === true && pass2_ok === true) {
		complete.prop('disabled', false);
	}
}
