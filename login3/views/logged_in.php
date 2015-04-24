<?php include('_header.php'); ?>

<?php
// if you need the user's information, just put them into the $_SESSION variable and output them here
echo WORDING_YOU_ARE_LOGGED_IN_AS . $_SESSION['user_name'] . "<br />";
//echo WORDING_PROFILE_PICTURE . '<br/><img src="' . $login->user_gravatar_image_url . '" />;
echo WORDING_PROFILE_PICTURE . '<br/><br/>' . $login->user_gravatar_image_tag;
?>

<a href="<?php echo curPageName();?>?logout" class="link"><?php echo WORDING_LOGOUT; ?></a>
<a href="editProfile.php" class="link"><?php echo WORDING_EDIT_USER_DATA; ?></a>


