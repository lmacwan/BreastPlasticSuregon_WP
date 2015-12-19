<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );

get_header ();
?>

<section class="breadcrumbs">
	<div class="container">
		<div class="page-header">
			<h1><?php wp_title('')?></h1>
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
		
		if (have_posts ()) :
			
			while ( have_posts () ) :
				the_post ();
				
				get_template_part ( 'content', get_post_format () );
				
			endwhile
			;
		
		else :
			get_template_part ( 'content', 'none' );
		

		endif;
		?>
				<div class="pagination-wrapper">
					<?php Navigation::vossen_paging_nav ();?>
				</div>
				
			</div>
			<aside class="col-md-3 col-sm-4 sidebar" id="sidebar"><?php get_sidebar()?></aside>
		</div>
	</div>
</section>

<div style="display: none;">
		<?php
		if ( is_search() ) {
		
		}else{
		comment_form();
		the_tags();
		wp_list_comments();
		comments_template();
		wp_link_pages( array (
				'before' => '<div class="page-links"><span class="page-links-title">' . __ ( 'Pages:', 'bautySpa' ) . '</span>',
				'after' => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>' 
		) );
		}
		?>
	</div>
<?php get_footer(); ?>