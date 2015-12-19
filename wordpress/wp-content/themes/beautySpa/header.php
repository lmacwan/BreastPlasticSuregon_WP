<?php defined('ABSPATH') or die("No script kiddies please!");?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="description"
	content="<?php
	if (is_single ()) {
		single_post_title ( '', true );
	} else {
		bloginfo ( 'name' );
		echo " - ";
		bloginfo ( 'description' );
	}
	?>" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- The favicon -->
<link rel="shortcut icon"
	href="<?php echo esc_url(AfterSetupTheme::bautySpa_return_thme_option('favicon','url'));?>" />
<link rel="apple-touch-icon"
	href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72"
	href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114"
	href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="144x144"
	href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/apple-touch-icon.png">

<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
<![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class('appear-animate body-push'); ?> data-spy="scroll"
	data-target=".navbar-default" data-offset="150">
<?php if( AfterSetupTheme::bautySpa_return_thme_option('loader')!=1):?>
	<div id="preloader">
		<div class="loading">
			<ul class="spinner">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>
<?php endif;?>
<div id='tops'></div>

<div class="container">
	<div class="row">
       
       <a class="logo wow fadeInDown" data-wow-iteration="1" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Beautyspa">
            <img class="img-responsive" src="<?php echo esc_url(AfterSetupTheme::bautySpa_return_thme_option('logo','url'));?>" alt="Beautyspa" />
       </a>
    </div>
</div>