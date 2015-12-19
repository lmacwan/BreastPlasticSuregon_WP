<?php
class IncludeCssJs {
	public static function bautySpa_add_css_js() {
		$src_css = get_template_directory_uri () . "/css/";
		$src = get_template_directory_uri () . "/js/";
		
		$js = array (
				'modernizr' => 'modernizr.custom.63321.js',
				'bootstrap.min.js' => 'bootstrap.min.js',
				'wow.min.js' => 'wow.min.js',
				'placeholders.js' => 'placeholders.js',
				'superslides' => 'jquery.superslides.min.js',
				'prettyPhoto' => 'jquery.prettyPhoto.js',
				'datetimepicker' => 'jquery.datetimepicker.js',
				'carousel' => 'owl-carousel2/owl.carousel.min.js',
				'master.js' => 'master.js' 
		);
		
		// ////////////==============JS ENQUEue =========///
		
		wp_enqueue_script ( 'jquery' );
		// wp_enqueue_script ( 'gmapapi', 'http://maps.google.com/maps/api/js?sensor=false&amp;language=en', '', '', true );
		foreach ( $js as $key => $value ) {
			wp_enqueue_script ( $key, $src . $value, '', '', true );
		}
		
		// ///=================CSS ENQUEue===========///
		$css_file = AfterSetupTheme:: bautySpa_return_thme_option ( 'style_switcher' );
		if ($css_file == null) {
			$css_file = 'style1';
		}
		$css = array (
				'bootstrap.css' => 'bootstrap.min.css',
				'loading.css' => 'loading.css',
				'animate.min.css' => 'animate.min.css',
				'style-main.css' => 'style1.css',
				'datetimepicker1' => 'jquery.datetimepicker1.css',
				'prettyPhoto' => 'prettyPhoto.css',
				'owl.carousel.min.css' => 'assets/owl.carousel.min.css',
				'owl.theme.default.min.css' => 'assets/owl.theme.default.min.css',
				$css_file => $css_file . '.css' ,
		);
		wp_register_style ( "googlefont", 'http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' );
		wp_register_style ( "googlefont1", 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800,800italic,300italic' );
		wp_register_style ( "fontawesome", get_template_directory_uri () . '/fonts/font-awesome/css/font-awesome.min.css' );
		wp_enqueue_style ( "googlefont" );
		wp_enqueue_style ( "googlefont1" );
		wp_enqueue_style ( "fontawesome" );
		foreach ( $css as $key => $value ) {
			wp_register_style ( $key, $src_css . $value );
			wp_enqueue_style ( $key );
		}
	}
	static function bautySpa_add_admin_css_js() {
		$src_css = get_template_directory_uri () . "/css/";
		$css = array (
				'admin' => 'admin.css' 
		);
		foreach ( $css as $key => $value ) {
			
			wp_register_style ( $key, $src_css . $value );
			wp_enqueue_style ( $key );
		}
		wp_enqueue_style ( 'thickbox' );
		$src = get_template_directory_uri () . "/js/";
		
		/* $js = array (
				'admin_vossen' => 'admin_vossen.js' 
		); */
		wp_enqueue_script ( 'jquery' );
		wp_enqueue_script ( 'media-upload' );
		wp_enqueue_script ( 'thickbox' );
		/* foreach ( $js as $key => $value ) {
			
			wp_enqueue_script ( $key, $src . $value, '', '', true );
		}
		
		wp_localize_script ( 'admin_vossen', 'vossenAjax', array (
				'ajaxurl' => admin_url ( 'admin-ajax.php' ) 
		) ); */
		
		
	}
	static function bautySpa_get_custom_post_type() {
		$push_array = "";
		echo ($push_array);
		die ();
	}
	static function bautySpa_must_login() {
		echo "You must log in to vote";
		die ();
	}
}