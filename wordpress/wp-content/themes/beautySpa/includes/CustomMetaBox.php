<?php
class CustomMetaBox {
	static function bautySpa_video_link() {
		$args = array (
				'capability_type' => 'post' 
		);
		$screens = get_post_types ( $args );
		foreach ( $screens as $screen ) {
			
			add_meta_box ( 'bautySpa_video_audio', esc_html__ ( 'Put Video Embeded url', 'bautySpa' ), 'CustomMetaBox::bautySpa_add_meta_box_for_video_audio_callback', $screen, 'advanced', 'high' );
		}
	}
	static function bautySpa_add_meta_box_for_video_audio_callback($post) {
		
		// Add an nonce field so we can check for it later.
		wp_nonce_field ( 'bautySpa_meta_box_video', 'bautySpa_meta_box_video_nonce' );
		
		/*
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		 */
		$value = get_post_meta ( $post->ID, 'bautySpa_video_url', true );
		$html = '';
		$html .= '<label for="bautySpa_video_url">';
		$html .= esc_html__ ( 'Put You video SRC String', 'bautySpa' );
		$html .= '</label> <br>';
		$html .= '<input type="text" id="bautySpa_new_field" name="bautySpa_video_url" value="';
		$html .= esc_url ( $value );
		$html .= ' " size="100" />';
		
		echo $html;
	}
	static function bautySpa_video_link_save($post_id) {
		// Check if our nonce is set.
		if (! isset ( $_POST ['bautySpa_meta_box_video_nonce'] )) {
			return;
		}
		
		// Verify that the nonce is valid.
		if (! wp_verify_nonce ( $_POST ['bautySpa_meta_box_video_nonce'], 'bautySpa_meta_box_video' )) {
			return;
		}
		
		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if (defined ( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}
		
		// Check the user's permissions.
		if (isset ( $_POST ['post_type'] )) {
			
			if (! current_user_can ( 'edit_page', $post_id )) {
				return;
			}
		} else {
			
			if (! current_user_can ( 'edit_post', $post_id )) {
				return;
			}
		}
		
		/* OK, it's safe for us to save the data now. */
		
		// Make sure that it is set.
		if (! isset ( $_POST ['bautySpa_video_url'] )) {
			return;
		}
		
		// Sanitize user input.
		$my_data = esc_url_raw ( $_POST ['bautySpa_video_url'] );
		
		// Update the meta field in the database.
		update_post_meta ( $post_id, 'bautySpa_video_url', $my_data );
	}
	
	/*
	 * Have Sidebar or not
	 *
	 */
	static function bautySpa_portfolio_side_info() {
		$screens = array (
				'portfolio',
		);
		foreach ( $screens as $screen ) {
			
			add_meta_box ( 'bautySpa_portfolio_side_info', esc_html__ ( 'Portfolio Sidbar Info', 'bautySpa' ), 'CustomMetaBox::bautySpa_portfolio_side_info_callback', $screen, 'advanced', 'high' );
		}
	}
	static function bautySpa_portfolio_side_info_callback($post) {
		// Add an nonce field so we can check for it later.
		wp_nonce_field ( 'bautySpa_portfolio_side_info', 'bautySpa_portfolio_side_info_nonce' );
		
		/*
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		 */
		$heading = get_post_meta ( $post->ID, 'bautySpa_portfolio_side_info_heading', true );
		$attributes_heading = get_post_meta ( $post->ID, 'bautySpa_portfolio_side_info_attributes_heading', true );
		$attributes_info = get_post_meta ( $post->ID, 'bautySpa_portfolio_side_info_attributes_info', true );
		$button_text = get_post_meta ( $post->ID, 'bautySpa_portfolio_side_info_button_text', true );
		$button_url = get_post_meta ( $post->ID, 'bautySpa_portfolio_side_info_button_url', true );
		
		
		$html = '';
		$html .= '<label for="bautySpa_portfolio_side_info_heading">**';
		$html .= esc_html__ ( 'Inoformation Heading (Should Not be Null)', 'bautySpa' );
		$html .= '</label> <br>';
		$html .= '<input type="text" id="bautySpa_portfolio_side_info_heading" name="bautySpa_portfolio_side_info_heading" value="';
		$html .= esc_html ( $heading );
		$html .= ' " size="100" /><br>';
		
		$html .= '<label for="bautySpa_portfolio_side_info_attributes_heading">';
		$html .= esc_html__ ( 'Inoformation Attributes Headings Multiple seperated with " ,"', 'bautySpa' );
		$html .= '</label> <br>';
		$html .= '<textarea type="text" id="bautySpa_portfolio_side_info_attributes_heading" name="bautySpa_portfolio_side_info_attributes_heading" value="';
		$html .= '" style="width:100%; height:auto;"/>';
		$html .= esc_html ( $attributes_heading );
		$html .= '</textarea><br>';
		
		$html .= '<label for="bautySpa_portfolio_side_info_attributes_info">';
		$html .= esc_html__ ( 'Attributes Inoformation Multiple seperated with " //"', 'bautySpa' );
		$html .= '</label> <br>';
		$html .= '<textarea type="text" id="bautySpa_portfolio_side_info_attributes_info" name="bautySpa_portfolio_side_info_attributes_info" value="';
		$html .= '" style="width:100%; height:auto;"/>';
		$html .= esc_html ( $attributes_info );
		$html .= '</textarea><br>';
		
		$html .= '<label for="bautySpa_portfolio_side_info_button_text">';
		$html .= esc_html__ ( 'Button Text, Null Not show","', 'bautySpa' );
		$html .= '</label> <br>';
		$html .= '<input type="text" id="bautySpa_portfolio_side_info_button_text" name="bautySpa_portfolio_side_info_button_text" value="';
		$html .= esc_html ( $button_text );
		$html .= ' " size="100" /><br>';
		
		$html .= '<label for="bautySpa_portfolio_side_info_button_url">';
		$html .= esc_html__ ( 'Button Url","', 'bautySpa' );
		$html .= '</label> <br>';
		$html .= '<input type="text" id="bautySpa_portfolio_side_info_button_url" name="bautySpa_portfolio_side_info_button_url" value="';
		$html .= esc_html ( $button_url);
		$html .= ' " size="100" /><br>';
		
		echo $html;
	}
	static function bautySpa_portfolio_side_info_save($post_id) {
		// Check if our nonce is set.
		if (! isset ( $_POST ['bautySpa_portfolio_side_info_nonce'] )) {
			return;
		}
		
		// Verify that the nonce is valid.
		if (! wp_verify_nonce ( $_POST ['bautySpa_portfolio_side_info_nonce'], 'bautySpa_portfolio_side_info' )) {
			return;
		}
		
		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if (defined ( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}
		
		// Check the user's permissions.
		if (isset ( $_POST ['post_type'] )) {
			
			if (! current_user_can ( 'edit_page', $post_id )) {
				return;
			}
		} else {
			
			if (! current_user_can ( 'edit_post', $post_id )) {
				return;
			}
		}
		
		/* OK, it's safe for us to save the data now. */
		
		// Make sure that it is set.
		if (! isset ( $_POST ['bautySpa_portfolio_side_info_heading'] )) {
			return;
		}
		
		// Sanitize user input.
		$my_data = esc_html ( $_POST ['bautySpa_portfolio_side_info_heading'] );
		$attr_heading = esc_html($_POST['bautySpa_portfolio_side_info_attributes_heading']);
		$attr_info = esc_html($_POST['bautySpa_portfolio_side_info_attributes_info']);
		$btn_text = esc_html($_POST['bautySpa_portfolio_side_info_button_text']);
		$btn_url = esc_html($_POST['bautySpa_portfolio_side_info_button_url']);
		
		// Update the meta field in the database.
		update_post_meta ( $post_id, 'bautySpa_portfolio_side_info_heading', $my_data );
		update_post_meta ( $post_id, 'bautySpa_portfolio_side_info_attributes_heading', $attr_heading );
		update_post_meta ( $post_id, 'bautySpa_portfolio_side_info_attributes_info', $attr_info );
		update_post_meta ( $post_id, 'bautySpa_portfolio_side_info_button_text', $btn_text );
		update_post_meta ( $post_id, 'bautySpa_portfolio_side_info_button_url', $btn_url );
	}
}