<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage beautySpa
 * @since beautySpa
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required ()) {
	return;
}
?>

<section class="comments-section"><?php if ( have_comments() ) : ?>
<div class="comments">
		<h4 class="comments-title">
			<span><?php
	comments_number ( 'NO COMMENT', 'COMMENT <span class="thin">&nbsp;(1)</span>', 'COMMENTS <span class="thin">&nbsp;(%)</span>' );
	?> </span>
		</h4>
		<div class="comment-title-border"></div>
		<div class="post-comment-wraper">
			<ul class="media-list">
<?php
	wp_list_comments ( array (
			'style' => 'ul',
			'short_ping' => true,
			'avatar_size' => 70,
			'callback' => 'Comments::vossen_comments' 
	) );
	?>
</ul>
		</div>
		<div class="navigation-altra">
			<div class="next-posts">
			<?php previous_comments_link()?>
		</div>
			<div class="prev-posts">
			<?php next_comments_link()?>
		</div>
		</div>
	</div>
 <?php endif;  ?>

<?php

if (! comments_open () && get_comments_number () && post_type_supports ( get_post_type (), 'comments' )) :
	?>
<p class="no-comments"><?php _e( 'Comments are closed.', 'beautySpa' ); ?></p>
<?php endif; ?> 


<?php if ( comments_open() ) : ?>
<div class="send-post-comment comments-form">
		<h4 class="block-title"><?php comment_form_title( 'Submit Your Comment', 'Submit Your Comment To %s' ); ?></h4>
		<div class="cancel-comment-reply reply">
		<?php cancel_comment_reply_link(); ?>
	    </div>
		<div class="fill-comment-form">

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>
			<?php esc_html_e('You must be','beautySpa')?> <a
					href="<?php echo wp_login_url( get_permalink() ); ?>"><?php
		
		esc_html_e ( 'logged in', 'beautySpa' )?></a> <?php esc_html_e('to post a comment','beautySpa')?>.
		</p>
		<?php else : ?>
		<form
				action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php"
				method="post" name="comments-form" id="comments-form"
				class="form contact-form">

			<?php if ( is_user_logged_in() ) : ?>

			<p class="comment-notes">
				<?php esc_html_e('Logged in as','beautySpa')?> <a
						href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo esc_html($user_identity); ?>
				</a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>"
						title="<?php esc_html_e('Log out from this account','beautySpa'); ?>"><?php esc_html_e('Logged in as','beautySpa')?> &raquo;</a>
				</p>

			<?php else : ?>

			<p class="comment-notes">
				<?php esc_html_e('Your email address will not be published. Required fields are marked','beautySpa')?>
				<span class="required">*</span>
				</p>
				<div class="form-group row-gap">
					<input class="comment-input form-control bottom-border" id="name"
						name="author" type="text" placeholder="NAME*" value="" size="30"
						aria-required="true" required="required" />
				</div>
				<div class="form-group row-gap">
					<input class="comment-input form-control bottom-border" id="email"
						name="email" type="text" value="" placeholder="EMAIL*" size="30"
						aria-required="true" required="required" />
				</div>
				<div class="form-group row-gap">
					<input class="comment-input form-control bottom-border"
						id="subject" name="subject" type="text" value=""
						placeholder="SUBJECT" size="30" />
				</div>
			
			<?php endif; ?>

			<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

				<div class="form-group row-gap">
					<textarea name="comment" rows="1" id="comment" aria-required="true"
						class="form-control bottom-border"
						placeholder="<?php esc_html_e('TYPE YOUR MESSAGE HERE*','beautySpa');?>"></textarea>
				</div>

				<div class="form-submit">
					<button type="submit"
						class="btn btn-primary btn-icon-left" id="submit"
						><i class="fa fa-comment"></i><?php esc_html_e('Send Comment','beautySpa')?></button>
				<?php comment_id_fields(); ?>
			</div>

			<?php do_action('comment_form', $post->ID); ?>
		</form>

		<?php endif;  ?>
	</div>
	</div>
</section>
<?php endif; ?>