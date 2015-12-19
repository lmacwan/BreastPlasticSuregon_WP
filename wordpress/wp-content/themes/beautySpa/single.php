<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );
get_header ();
$content_bg = esc_url ( AfterSetupTheme::bautySpa_return_thme_option('blog-details-head-para','url') ) != null ? 'style="background: url(' . esc_url ( AfterSetupTheme::bautySpa_return_thme_option('blog-details-head-para','url') ) . ') no-repeat center center; background-size:cover;"':null;
?>

<section class="breadcrumbs" <?php echo $content_bg;?>>
	<div class="container">
		<div class="page-header">
			<h1><?php echo esc_html(AfterSetupTheme::bautySpa_return_thme_option('blog-page-details-head'));?></h1>
		</div>
		<?php AfterSetupTheme::beautySpa_breadcrumb();?>
	</div>
</section>
<?php get_template_part ( 'menu-section' );?>
<section class="page-block">
	<div class="container">
    	<div class="row">
    	<div class="col-md-9 col-sm-8 content" id="content">
		<?php
		
		while ( have_posts () ) :
			the_post ();
			get_template_part ( 'content-single', get_post_format () );
			
		endwhile
		;
		?>
		</div>
		<aside class="col-md-3 col-sm-4 sidebar" id="sidebar"><?php get_sidebar()?></aside>
	</div>
</div>
</section>
<?php get_footer(); ?>