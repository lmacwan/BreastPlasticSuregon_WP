<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage gilas
 * @since gilas
 */

$getCat = get_the_category ( get_the_ID () );
$cat = '';
foreach ( $getCat as $key => $value ) {
	if ($key == (count ( $getCat ) - 1)) {
		$cat .= '<a href="'.get_category_link( $value->term_id  ).'">'.esc_html($value->name).'</a>';
	} else {
		$cat .= '<a href="'.get_category_link( $value->term_id  ).'">'.esc_html($value->name).'</a>, ';
	}
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap'); ?>>
	<div class="post-media">
		<blockquote>
                            <p><?php if (get_the_excerpt()!=''){ echo get_the_excerpt();} else the_content();?></p>
                            <footer><cite title="Source Title"><?php echo get_the_title()?></cite></footer>
                        </blockquote>
	</div>
	<div class="post-header">
		<div class="post-meta">
			<ul>
				<li><i class="fa fa-user"></i> <a href="<?php  echo get_author_posts_url(get_the_author_meta( 'ID'));?>"><?php echo get_the_author_meta( 'user_nicename');?></a></li>
				<li><i class="fa fa-calendar"></i> <?php echo get_the_time(get_option( 'date_format' ));?></li>
				<li><i class="fa fa-folder-open"></i><?php echo $cat;?></li>
				<li><i class="fa fa-comments"></i><a href="<?php echo get_permalink()?>#comments"><?php comments_number('0  Comment', '1  Comment', '%  Comments' );?></a></li>
			</ul>
		</div>
	</div>
	<div class="post-footer">
		<footer class="entry-footer"> <?php edit_post_link( __( 'Edit', 'gilas' ), '<span class="edit-link">', '</span>' ); ?>
</footer>
		<span class="post-read-more"><a href="<?php echo get_permalink()?>"
			class="btn btn btn-primary btn-icon-left"><?php esc_html_e('Read More ... ','gilas')?></a></span>
	</div>
</article>