<?php
/*
Template Name: WP e-Commerce Style Email
*/
?>
<html><body><div style="min-height:214px, background-image:url(http://ajcoffee1.greyleafmedia.com/wp-content/themes/ajcoffee/skins/images/skin2/header_bg.png), background-repeat:repeat-x, background-position:top left">
<a style="margin-left:-5px;" href="http://ajcoffeeco.com"><img src="http://ajcoffee1.greyleafmedia.com/wp-content/uploads/sp-uploads/Horizontal-3d-logo.png" width="275px"></a>
<br/>
<a href="http://ajcoffeeco.com"><b>Visit Site</b></a>  |  <a href="http://ajcoffeeco.com/shop/"><b>Buy Coffee</b></a>  |  <a href="http://ajcoffeeco.com/shop/your-account/"><b>Your Account</b></a>  |  <a href="http://ajcoffeeco.com/category/blog/"><b>Blog</b></a></div>
<br></br>
<h2 style="color:#4C4C4C"><?php echo ecse_get_email_subject(); ?></h2>
<?php echo ecse_get_email_content(); ?>
<br></br>
<p>Copyright © AJ Coffee Company, All Rights Reserved. - <a href="http://ajcoffeeco.com/product-page/your-account/">Your Account</a> - <a href="http://ajcoffeeco.com/about/">About</a> - <a href="http://ajcoffeeco.com/contact/">Contact</a></p>
</body></html>