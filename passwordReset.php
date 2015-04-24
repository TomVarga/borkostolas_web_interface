<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="hu">
<head>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
	<title>Borkóstolás</title>
	<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen, print, projection" />
</head>


<body>
<div id="wrapper">
	<!--HEADER/LOGO-->
	<?php include('header.php'); ?>

	<div id="contentWrapper">
		<!--SIDE BAR CONTENT-->
		<?php include('sidebar.php'); ?>

		<!--MAIN CONTENT-->
		<div id="content">
			<h2>Elfelejtett jelszó &rsaquo;</h2>
			<?php
			if ($login->passwordResetWasSuccessful() == true && $login->passwordResetLinkIsValid() != true) {
				include("login3/views/not_logged_in.php");

			} else {
				// show the request-a-password-reset or type-your-new-password form
				include("login3/views/password_reset.php");
			}
			?>
		</div>
	</div>

	<!--THE FOOTER-->
	<?php include('footer.php'); ?>
</div>
</body>
</html>
