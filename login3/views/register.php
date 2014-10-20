<?php include('_header.php'); ?>

<!-- show registration form, but only if we didn't submit already -->
<div>
<p>
<?php if (!$registration->registration_successful && !$registration->verification_successful) { ?>
<form method="post" action="register.html" name="registerform">
	<br />
	<label for="user_name"><?php echo WORDING_REGISTRATION_USERNAME; ?></label>
	<br />
	<br />
	<input id="user_name" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
	<br />
	<br />
	<hr/>
	<br />
	<label for="user_email"><?php echo WORDING_REGISTRATION_EMAIL; ?></label>
	<input id="user_email" type="email" name="user_email" required />
	<br />
	<hr/>
	<br />
	<label for="user_password_new"><?php echo WORDING_REGISTRATION_PASSWORD; ?></label>
	<input id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
	<label for="user_password_repeat"><?php echo WORDING_REGISTRATION_PASSWORD_REPEAT; ?></label>
	<input id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
	<br />
	<hr/>
	<br />
	<img src="login3/tools/showCaptcha.php" alt="captcha" />
	<br />
	<label><?php echo WORDING_REGISTRATION_CAPTCHA; ?></label>
	<br />
	<input type="text" name="captcha" required />
	<hr/>

	<input type="submit" name="register" value="<?php echo WORDING_REGISTER; ?>" />
</form>
<?php } ?>
</p>
</div>

