<?php
class Comments {
	// /Comment call back function
	static function vossen_comments($comment, $args, $depth) {
		$GLOBALS ['comment'] = $comment;
		extract ( $args, EXTR_SKIP );
		
		if ('div' == $args ['style']) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>
<<?php echo esc_attr($tag); ?> <?php
		
		comment_class ( empty ( $args ['has_children'] ) ? 'media comment-author' : 'media comment-author parent' )?> id="comment-<?php comment_ID() ?>">
<?php if ( 'div' != $args['style'] ) : ?>
<div id="div-comment-<?php comment_ID() ?>" class="">
	<?php endif; ?>
		<div class="media-left">
		<a class="pull-left comment-avatar" href="#">
             <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
         </a>
	</div>
		<div class="media-body">
			<p class="comment-meta"><span class="comment-author">
				<a href="<?php echo esc_url($comment->comment_author_url);?>"><?php echo esc_attr($comment->comment_author);?></a>
				<span class="comment-date"><?php echo date(get_option( 'date_format' ), strtotime($comment->comment_date))?><i class="fa fa-flag"></i></span>
				</span>
			</p>
            <?php if ( esc_attr($comment->comment_approved) == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','bautySpa' ); ?>
			</em> <br />
			<?php endif; ?>
             <p class="comment-text"><?php echo get_comment_text(); ?></p>
			<p class="reply-button">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text '=>'ad','login_text'=>'Log In' ) ) ); ?>
			<?php edit_comment_link( esc_html__( 'Edit this comment','bautySpa' ), '  ', '' );?>
			</p>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
</div>
<?php endif; ?>
	<?php
	}
}