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
			<?php
			if ($login->getPermission() > 0){
				echo "<h2>Adminisztráció</h2>";
				include('admin_wine.php');
			}else{
				echo "<h2>Az admin felület használatához adminként kell bejelentkezni!</h2>";
			};
			?>
		</div>
	</div>

	<!--THE FOOTER-->
	<?php include('footer.php'); ?>
</div>
</body>
</html>
