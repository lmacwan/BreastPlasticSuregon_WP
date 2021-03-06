<?php
class AfterSetupTheme {
	static function bautySpa_add_theme_support() {
		add_theme_support( 'post-formats', array (
				'aside',
				'image',
				'video',
				'audio',
				'quote',
				'link',
				'gallery' 
		) );
		
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( "title-tag" );
		add_theme_support( "custom-header" );
		add_theme_support( "custom-background" );
		add_editor_style();
		add_theme_support( 'automatic-feed-links' );
		add_image_size( 'top_section_background', 1920, 1080, true );
		add_image_size( 'about', 320, 313, true );
		add_image_size( 'our_services', 350, 350, true );
		add_image_size( 'team', 263, 263, true );
		add_image_size( 'portfolio_v1', 270, 270, true );
		add_image_size( 'portfolio_grid', 370, 370, true );
		add_image_size( 'blog', 806, 343, true );
		add_image_size( 'blog_thumb', 250, 162, true );
		//add_image_size( 'post_formate_background', 770, 124, true );
		
		if (! isset ( $content_width ))
			$content_width = 900;
		
		/**
		 * ******** Enque script *********
		 */
		add_action ( 'wp_enqueue_scripts', 'IncludeCssJs::bautySpa_add_css_js' );
		add_action ( 'admin_enqueue_scripts', 'IncludeCssJs::bautySpa_add_admin_css_js' );
		//add_action ( "wp_ajax_bautySpa_get_custom_post_type", "IncludeCssJs::bautySpa_get_custom_post_type" );
		//add_action ( "wp_ajax_nopriv_bautySpa_get_custom_post_type", "IncludeCssJs::bautySpa_must_login" );
		
		/**
		 * ********* TGMPA REGISTER*********
		 */
		add_action( 'tgmpa_register', 'VossenPlugins::vossen_register_required_plugins' );
		
		/**
		 * *********** WIDGET INITIALIZ ***********
		 */
		add_action( 'widgets_init', 'CreateSidebar::bautySpa_custom_sidebar' );
		//add_action ( 'widgets_init', 'CreateSidebar::reg_footer_sidebar' );
		
		/**
		 * ************* CUSTOM POST TYPE ************
		 */
		/*
		 * add_action('init', 'CreateCustomPostType::vossen_create_services_post_type');
		 * add_action('init', 'CreateCustomPostType::vossen_create_work_post_type');
		 * add_action('init', 'CreateCustomPostType::vossen_create_why_us_post_type');
		 * add_action('init', 'CreateCustomPostType::vossen_create_about_us_post_type');
		 */
		
		/**
		 * ********** META BOX HOOK ******************
		 */
		add_action ( 'add_meta_boxes', 'CustomMetaBox::bautySpa_video_link' );
		add_action ( 'save_post', 'CustomMetaBox::bautySpa_video_link_save' );
		//add_action ( 'add_meta_boxes', 'CustomMetaBox::bautySpa_portfolio_side_info' );
		//add_action ( 'save_post', 'CustomMetaBox::bautySpa_portfolio_side_info_save' );
		
		/**
		 * ******* SHORTCODE INITIALIZE ***********
		 */
		add_action ( 'init', 'Shortcode_generator::bautySpa_register_shortcode' );
		
		/**
		 * ************** ADMIN INITIALIZE **********
		 */
		/* add_action('admin_init', 'AfterSetupTheme::vossen_vossen_admin_init'); */
		
		/**
		 * ********** REGISTER SUB-MENU ***********
		 */
		register_nav_menus ( array (
				'multi_page' => __ ( 'bautySpa Theme Multi Page', 'bautySpa' ),
				'single_page' => __ ( 'bautySpa Theme Single Page', 'bautySpa' )
		) );
		
		/**
		 * ******** PRE GET POST ******
		 */
		// add_filter('pre_get_posts', 'ResetQuery::vossen_my_query_post_type');
		
		/**
		 * ********* ADD EXTRA FIELDS IN USER PROFILE ********
		 */
		add_filter ( 'user_contactmethods', 'AfterSetupTheme::bautySpa_add_to_author_profile', 10, 1 );
		add_filter ( 'widget_text', 'shortcode_unautop' );
		add_filter ( 'widget_text', 'do_shortcode' );
		
		/**
		 * ************ OVERRIDE SEARCH FORM ****************
		 */
		add_filter ( 'get_search_form', 'OverrideWidgets::vossen_jubi_get_search_form' );
		
		/**
		 * ******** WP TITLE FILTER ***********
		 */
		add_filter ( 'wp_title', 'AfterSetupTheme::bautySpa_wp_title', 10, 2 );
		add_filter ( 'image_size_names_choose', 'AfterSetupTheme::sgr_display_image_size_names_muploader', 11, 1 );
		add_filter ( 'wp_list_categories', 'AfterSetupTheme::add_span_cat_count' );
		add_filter ( 'get_archives_link', 'AfterSetupTheme::add_span_arch_count' );
		
		add_filter('manage_posts_columns', 'AfterSetupTheme::posts_column_views');
		add_action('manage_posts_custom_column', 'AfterSetupTheme::posts_custom_column_views',5,2);
	}
	static function sgr_display_image_size_names_muploader($sizes) {
		$new_sizes = array ();
		
		$added_sizes = get_intermediate_image_sizes ();
		
		// $added_sizes is an indexed array, therefore need to convert it
		// to associative array, using $value for $key and $value
		foreach ( $added_sizes as $key => $value ) {
			$new_sizes [$value] = $value;
		}
		
		// This preserves the labels in $sizes, and merges the two arrays
		$new_sizes = array_merge ( $new_sizes, $sizes );
		
		return $new_sizes;
	}
	static function bautySpa_add_to_author_profile($contactmethods) {
		$contactmethods ['google_profile'] = esc_html__ ( 'Google Profile URL', 'bautySpa' );
		$contactmethods ['twitter_profile'] = esc_html__ ( 'Twitter Profile URL', 'bautySpa' );
		$contactmethods ['facebook_profile'] = esc_html__ ( 'Facebook Profile URL', 'bautySpa' );
		$contactmethods ['linkedin_profile'] = esc_html__ ( 'Linkedin Profile URL', 'bautySpa' );
		
		return $contactmethods;
	}
	static function bautySpa_return_thme_option($string, $str = null) {
		global $beauty_demo;
		if ($str != null)
			return isset ( $beauty_demo ['' . $string . ''] ['' . $str . ''] ) ? $beauty_demo ['' . $string . ''] ['' . $str . ''] : null;
		else
			return isset ( $beauty_demo ['' . $string . ''] ) ? $beauty_demo ['' . $string . ''] : null;
	}
	static function bautySpa_wp_title($title, $sep) {
		if (is_feed ()) {
			return $title;
		}
		$sep = '-';
		global $page, $paged, $post;
		
		// Add the blog name
		
		// Add the blog description for the home/front page.
		
		$title_name = get_bloginfo ( 'name', 'display' );
		$site_description = get_bloginfo ( 'description', 'display' );
		
		if ($site_description && (is_home () || is_front_page ())) {
			$title = "$title_name $sep $site_description";
		} elseif (is_page ()) {
			$title = get_the_title ( $post->ID );
			if (($paged >= 2 || $page >= 2) && ! is_404 ()) {
				$title .= " $sep " . sprintf ( __ ( 'Page %s', '_s' ), max ( $paged, $page ) );
			}
		} elseif (($paged >= 2 || $page >= 2) && ! is_404 ()) {
			$title = "$title_name $sep " . sprintf ( __ ( 'Page %s', '_s' ), max ( $paged, $page ) );
		} elseif (is_author ()) {
			$author = get_queried_object ();
			$title = $author->display_name;
		}elseif (is_search()){
			$title = 'Search results for: ' . get_search_query() . '';
		}
		
		return $title;
	}
	static function get_terms($id) {
		// $args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'name');
		$terms = '<ul>';
		$get = false;
		$getTerms = wp_get_post_terms ( $id );
		$getCat = get_the_category ( $id );
		$count = count ( $getTerms );
		if ($count != 0) {
			foreach ( $getTerms as $key => $value ) {
				$link = is_wp_error ( get_term_link ( $value->slug ) ) ? '#' : get_term_link ( $value->slug );
				if ($key == $count - 1) {
					$terms .= '<li><a href="' . $link . '">' . $value->name . '</a></li>';
				} else {
					$terms .= '<li><a href="' . $link . '">' . $value->name . ', </a></li>';
				}
			}
			$get = true;
		} elseif (count ( $getCat ) != 0) {
			foreach ( $getCat as $key => $value ) {
				if ($key == (count ( $getCat ) - 1)) {
					$terms .= '<li><a href="' . get_category_link ( $value->cat_ID ) . '">' . $value->name . '</a></li>';
				} else {
					$terms .= '<li><a href="' . get_category_link ( $value->cat_ID ) . '">' . $value->name . ', </a></li>';
				}
			}
			$get = true;
		} else {
			$get = false;
		}
		$terms .= '</ul>';
		
		if ($get) {
			return $terms;
		} else {
			return AfterSetupTheme::get_custom_taxonomies ();
		}
	}
	static function get_custom_taxonomies() {
		global $post, $post_id;
		// get post by post id
		$post = get_post ( $post->ID );
		// get post type by post
		$post_type = $post->post_type;
		// get post type taxonomies
		$taxonomies = get_object_taxonomies ( $post_type );
		$out = "<ul>";
		foreach ( $taxonomies as $taxonomy ) {
			// get the terms related to post
			$terms = get_the_terms ( $post->ID, $taxonomy );
			if (! empty ( $terms )) {
				foreach ( $terms as $key => $term ) {
					if ($key == (count ( $terms ) - 1)) {
						$out .= '<li><a href="' . get_term_link ( $term->slug, $taxonomy ) . '">' . $term->name . '</a></li>';
					} else {
						$out .= '<li><a href="' . get_term_link ( $term->slug, $taxonomy ) . '">' . $term->name . ', </a></li>';
					}
				}
			}
		}
		$out .= "</ul>";
		return $out;
	}
	static function add_span_cat_count($links) {
		$links = str_replace ( '</a> (', '<small>(', $links );
		$links = str_replace ( ')', ')</small></a>', $links );
		return $links;
	}
	static function add_span_arch_count($links) {
		
		$links = str_replace ( '</a>&nbsp;(', '<small>(', $links );
		$links = str_replace ( ')', ')</small></a>', $links );
		return $links;
	}
	///////////////// POST VIEW COUNT /////////////////
	static function posts_column_views($defaults){
		$defaults['post_views'] = __('Views','bautySpa');
		return $defaults;
	}
	static function posts_custom_column_views($column_name, $id){
		if($column_name === 'post_views'){
			echo self::getPostViews(get_the_ID());
		}
	}
	
	// function to display number of posts.
	static function getPostViews($postID){
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 View";
		}
		return $count.' Views';
	}
	
	// function to count views.
	static function setPostViews($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	
	///////==================== BREADCUM =================== /////////////
	static function beautySpa_breadcrumb() {
		// Settings
    $id         = 'breadcrumbs';
    $class      = 'breadcrumb';
    $home_title = esc_html__('Home','beautySpa');
     
    // Get the query & post information
    global $post,$wp_query;
    $category = get_the_category();
    
    // Build the breadcrums
    echo '<ul id="' . $id . '" class="' . $class . '">';
    if(isset($category[0])){
	  $cat = '<li class="item-cat item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a class="bread-cat bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '" href="' . get_category_link($category[0]->term_id ) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a></li>';
	}else{
	  $cat ='';
	}
    // Do not display on the homepage
    if ( !is_front_page() ) {
         
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url( home_url( '/' ) ) . '" title="' . $home_title . '">' . $home_title . '</a></li>';
         
        if ( is_single() ) {
             
            // Single post (Only display the first category)
            echo $cat;
            echo '<li class="item-current item-' . $post->ID . '"><a class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
             
        } else if ( is_category() ) {
             
            // Category page
            echo '<li class="item-current item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a class="bread-current bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '">' . single_cat_title("", false) . '</a></li>';
             
        } else if ( is_page() ) {
            
            // Standard page
            if( $post->post_parent ){
                  $parents ='';
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                 
                // Get parents in the right order
                $anc = array_reverse($anc);
                 
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
                 
                // Display parent pages
                echo $parents;
                 
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><a title="' . get_the_title() . '" href="#"> ' . get_the_title() . '</a></li>';
                 
            } else {
                 
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><a class="bread-current bread-' . $post->ID . '" href="#"> ' . get_the_title() . '</a></li>';
                 
            }
             
        } else if ( is_tag() ) {
             
            // Tag page
             
            // Get tag information
            $term_id = get_query_var('tag_id');
            $taxonomy = 'post_tag';
            $args ='include=' . $term_id;
            $terms = get_terms( $taxonomy, $args );
             
            // Display the tag name
            echo '<li class="item-current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '"><a href="#" class="bread-current bread-tag-' . $terms[0]->term_id . ' bread-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</a></li>';
         
        } elseif ( is_day() ) {
             
            // Day archive
             
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
             
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a href="#" class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
             
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><a href="#" class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</a></li>';
             
        } else if ( is_month() ) {
             
            // Month Archive
             
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
             
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a href="#" class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
             
        } else if ( is_year() ) {
             
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><a href="#" class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
             
        } else if ( is_author() ) {
             
            // Auhor archive
             
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
             
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><a href="#" class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</a></li>';
         
        } else if ( get_query_var('paged') ) {
             
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><a class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '" href="#">'.__('Page') . ' ' . get_query_var('paged') . '</a></li>';
             
        } else if ( is_search() ) {
         
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><a class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '" href="#">Search results for: ' . get_search_query() . '</a></li>';
         
        } elseif ( is_404() ) {
             
            // 404 page
            echo '<li><a href="#">' . esc_html__('Error 404','beautySpa') . '</a></li>';
        }
         
    }else{
    	echo '<li><a href="#">' . $home_title . '</a></li>';
    }
     
    echo '</ul>';
     
	}
}