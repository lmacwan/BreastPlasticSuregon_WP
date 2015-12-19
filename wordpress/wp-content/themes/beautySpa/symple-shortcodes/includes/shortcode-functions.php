<?php
/**
 *
 *
 *
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter ( 'widget_text', 'do_shortcode' );

// Wayfarer Shortcode Start Here

// Why Choose Us Shortcode

if (! function_exists ( 'wf_why_choose_shortcode' )) {
	function wf_why_choose_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		return '
			<section class="title-section why-us-section" id="why-us-section">
            <div class="container">
                ' . do_shortcode ( $content ) . '
            </div>
       </section>
				';
	}
	add_shortcode ( 'wf_why_choose', 'wf_why_choose_shortcode' );
}

if (! function_exists ( 'wf_why_choose_head_shortcode' )) {
	function wf_why_choose_head_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'title' => 'Why choose us?' 
		)
		, $atts ) );
		
		return '
			 <h3>' . $title . '</h3>
                <span class="separator d-border-c"></span>
                <p>' . $content . '</p>
                <br/><br/>
                
				';
	}
	add_shortcode ( 'wf_why_choose_head', 'wf_why_choose_head_shortcode' );
}

if (! function_exists ( 'wf_why_choose_body_shortcode' )) {
	function wf_why_choose_body_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		return '
			 <div class="row">
			 ' . do_shortcode ( $content ) . '
			 </div>
                
				';
	}
	add_shortcode ( 'wf_why_choose_body', 'wf_why_choose_body_shortcode' );
}

if (! function_exists ( 'wf_why_choose_body_content_shortcode' )) {
	function wf_why_choose_body_content_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'title' => 'Bright ideas',
				'icon' => 'icon-basic-lightbulb' 
		)
		, $atts ) );
		
		return '
			 <div class="col-md-3">
                        <div class="one-secret d-bg-c-h d-border-c-h">
                            <i class="icon ' . $icon . ' d-text-c"></i>
                            <h3>' . $title . '</h3>
                            <p>' . $content . '</p>
                            <div class="separation-line d-border-c"><span class="d-border-c"></span></div>
                        </div>
                    </div>
                
				';
	}
	add_shortcode ( 'wf_why_choose_body_content', 'wf_why_choose_body_content_shortcode' );
}

// TESTIMONIALS Shortcode

if (! function_exists ( 'wf_testimonial_shortcode' )) {
	function wf_testimonial_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'name' => '' 
		)
		, $atts ) );
		
		return '
				<section class="testimonials-section-small" id="testimonials-section-small">
            <div class="container">
                <ul class="testimonials-line">
                    <li>&nbsp;</li>
                    <li><i class="d-text-c fa fa-quote-right"></i></li>
                    <li>&nbsp;</li>
                </ul>
                <h2>' . $content . '</h2>
                <h5>' . $name . '</h5>
            </div>         
        </section>
				';
	}
	add_shortcode ( 'wf_testimonial', 'wf_testimonial_shortcode' );
}

// Skill Shortcode

// Why Choose Us Shortcode

if (! function_exists ( 'wf_skill_shortcode' )) {
	function wf_skill_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		$html = '';
		$wf_options = get_option ( 'wayfarer_theme' );
		if (! empty ( $wf_options ['skillimage'] )) :
			$html .= '<section class="title-section our-skills-section" id="our-skills-section" style="';
			$html .= 'background: url(\'' . $wf_options ['skillimage'] . '\')"';
			$html .= '>';
			$html .= '<div class="bg-cover">';
		 else :
			$html .= '<section class="title-section our-skills-section" id="our-skills-section">';
			$html .= '<div class="bg-cover">';
		endif;
		$html .= '<div class="container">';
		$html .= do_shortcode ( $content );
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</section>';
		
		return $html;
	}
	add_shortcode ( 'wf_skill', 'wf_skill_shortcode' );
}

if (! function_exists ( 'wf_Skill_head_shortcode' )) {
	function wf_Skill_head_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'title' => 'Some funny skills' 
		)
		, $atts ) );
		
		return '
			<h3 class="white">' . $title . '</h3>
                    <span class="separator d-border-c"></span>
                    <p class="white">Our work experience</p>
                    <br/><br/>
                
				';
	}
	add_shortcode ( 'wf_skill_head', 'wf_Skill_head_shortcode' );
}

if (! function_exists ( 'wf_skill_body_shortcode' )) {
	function wf_skill_body_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		return '
			 <div class="row">
			 ' . do_shortcode ( $content ) . '
			 </div>
                
				';
	}
	add_shortcode ( 'wf_skill_body', 'wf_skill_body_shortcode' );
}

if (! function_exists ( 'wf_skill_body_content_shortcode' )) {
	function wf_skill_body_content_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'name' => 'photoshop',
				'percent' => '75' 
		)
		, $atts ) );
		
		return '
			 <div class="col-md-3">
                            <div class="one-skill">
                                <div class="skill-circle d-border-c">
                                    <h2>' . $percent . '%</h2>
                                </div>
                                <h3>' . $name . '</h3>
                            </div>
                        </div>
                
				';
	}
	add_shortcode ( 'wf_skill_body_content', 'wf_skill_body_content_shortcode' );
}

// Team Shortcode

if (! function_exists ( 'wf_team_shortcode' )) {
	function wf_team_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'title' => 'Our creative minds' 
		)
		, $atts ) );
		
		$html = '';
		$html .= '<section class="title-section our-team-section" id="our-team-section">';
		$html .= '<div class="container">';
		$html .= '<h3>' . $title . '</h3>';
		$html .= '<span class="separator d-border-c"></span>';
		$html .= '<p>' . $content . '</p>';
		$html .= '<br/><br/>';
		$html .= '<div class="row">';
		global $post;
		query_posts ( array (
				'post_type' => 'team',
				'showposts' => - 1 
		) );
		while ( have_posts () ) :
			the_post ();
			$html .= '<div class="col-md-3">';
			$html .= '<div class="team-member">';
			$html .= '<div class="member-cover">';
			$html .= '<div class="member-info d-bg-c">';
			$html .= '<h3>';
			$html .= get_the_title ();
			$html .= '</h3>';
			$team_category = wp_get_post_terms ( $post->ID, 'team_category' );
			$html .= '<h6>';
			foreach ( $team_category as $item )
				;
			$html .= $item->name . ' ';
			$html .= '</h6>';
			$html .= '</div>';
			$url = wp_get_attachment_url ( get_post_thumbnail_id ( $post->ID, 'thumbnail' ) );
			$html .= '<img src="';
			$html .= $url;
			$html .= '" alt="member" />';
			$html .= '</div>';
			$html .= '<div class="member-name">';
			$html .= '<div class="member-details">';
			$html .= '<ul>';
			$themeta = get_post_meta ( $post->ID, 'rnr_linkt1', TRUE );
			if ($themeta != '') {
				$html .= '<li><a href="';
				$html .= get_post_meta ( $post->ID, 'rnr_linkt1', true );
				$html .= '" class="d-text-c-h"><i class="fa ';
				$html .= get_post_meta ( $post->ID, 'rnr_icont1', true );
				$html .= '"></i></a></li>';
			}
			$themeta = get_post_meta ( $post->ID, 'rnr_linkt2', TRUE );
			if ($themeta != '') {
				$html .= '<li><a href="';
				$html .= get_post_meta ( $post->ID, 'rnr_linkt2', true );
				$html .= '" class="d-text-c-h"><i class="fa ';
				$html .= get_post_meta ( $post->ID, 'rnr_icont2', true );
				$html .= '"></i></a></li>';
			}
			$themeta = get_post_meta ( $post->ID, 'rnr_linkt3', TRUE );
			if ($themeta != '') {
				$html .= '<li><a href="';
				$html .= get_post_meta ( $post->ID, 'rnr_linkt3', true );
				$html .= '" class="d-text-c-h"><i class="fa ';
				$html .= get_post_meta ( $post->ID, 'rnr_icont3', true );
				$html .= '"></i></a></li>';
			}
			$themeta = get_post_meta ( $post->ID, 'rnr_linkt4', TRUE );
			if ($themeta != '') {
				$html .= '<li><a href="';
				$html .= get_post_meta ( $post->ID, 'rnr_linkt4', true );
				$html .= '" class="d-text-c-h"><i class="fa ';
				$html .= get_post_meta ( $post->ID, 'rnr_icont4', true );
				$html .= '"></i></a></li>';
			}
			$themeta = get_post_meta ( $post->ID, 'rnr_linkt5', TRUE );
			if ($themeta != '') {
				$html .= '<li><a href="';
				$html .= get_post_meta ( $post->ID, 'rnr_linkt5', true );
				$html .= '" class="d-text-c-h"><i class="fa ';
				$html .= get_post_meta ( $post->ID, 'rnr_icont5', true );
				$html .= '"></i></a></li>';
			}
			$themeta = get_post_meta ( $post->ID, 'rnr_linkt6', TRUE );
			if ($themeta != '') {
				$html .= '<li><a href="';
				$html .= get_post_meta ( $post->ID, 'rnr_linkt6', true );
				$html .= '" class="d-text-c-h"><i class="fa ';
				$html .= get_post_meta ( $post->ID, 'rnr_icont6', true );
				$html .= '"></i></a></li>';
			}
			$html .= '</ul>';
			$html .= '</div>';
			$html .= '<h3>';
			$html .= get_the_title ();
			$html .= '</h3>';
			$html .= '<h6 class="d-text-c">';
			foreach ( $team_category as $item )
				;
			$html .= $item->name . ' ';
			$html .= '</h6>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
		endwhile
		;
		wp_reset_query ();
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</section>';
		
		return $html;
	}
	add_shortcode ( 'wf_team', 'wf_team_shortcode' );
}

// Statistics
if (! function_exists ( 'wf_statistics_shortcode' )) {
	function wf_statistics_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		$html = '';
		$wf_options = get_option ( 'wayfarer_theme' );
		if (! empty ( $wf_options ['statisticsimage'] )) :
			$html .= '<section class="statistics-section" id="statistics-section" style="';
			$html .= 'background: url(\'' . $wf_options ['statisticsimage'] . '\')"';
			$html .= '>';
			$html .= '<div class="bg-cover">';
		 else :
			$html .= '<section class="statistics-section" id="statistics-section">';
			$html .= '<div class="bg-cover">';
		endif;
		$html .= '<div class="container">';
		$html .= do_shortcode ( $content );
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</section>';
		
		return $html;
	}
	add_shortcode ( 'wf_statistics', 'wf_statistics_shortcode' );
}

if (! function_exists ( 'wf_statistics_details_shortcode' )) {
	function wf_statistics_details_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'name' => '',
				'number' => '',
				'icon' => 'icon-basic-clock' 
		)
		, $atts ) );
		
		return '
			 
                    <div class="col-md-3 col-xs-6">
                        <div class="statistic">
                            <h3>' . $number . '</h3>
                            <i class="icon ' . $icon . ' d-text-c"></i>
                            <p>' . $name . '</p>
                        </div>
                    </div>
                 
                
				';
	}
	add_shortcode ( 'wf_statistics_details', 'wf_statistics_details_shortcode' );
}

// Services Shortcode

if (! function_exists ( 'wf_services_shortcode' )) {
	function wf_services_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		return '
				 <section class="title-section our-services-section" id="our-services-section">
            		<div class="container">
            		' . do_shortcode ( $content ) . '
            		</div>
            	</section>
				';
	}
	add_shortcode ( 'wf_services', 'wf_services_shortcode' );
}

if (! function_exists ( 'wf_service_head_shortcode' )) {
	function wf_service_head_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'title' => 'Our services' 
		)
		, $atts ) );
		
		return '
				 <h3>' . $title . '</h3>
                <span class="separator d-border-c"></span>
                <p>' . $content . '</p>
                <br/><br/>
				';
	}
	add_shortcode ( 'wf_service_head', 'wf_service_head_shortcode' );
}

if (! function_exists ( 'wf_service_body_shortcode' )) {
	function wf_service_body_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		return '
				 <div class="row">
				 ' . do_shortcode ( $content ) . '
				 </div>
				';
	}
	add_shortcode ( 'wf_service_body', 'wf_service_body_shortcode' );
}

if (! function_exists ( 'wf_service_body_content_shortcode' )) {
	function wf_service_body_content_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'name' => 'Design',
				'icon' => 'icon-basic-pencil-ruler-pen' 
		)
		, $atts ) );
		
		return '
				<div class="col-md-4">
                        <div class="one-service">
                            <i class="icon ' . $icon . ' d-text-c"></i>
                            <h3>' . $name . '</h3>
                            <div class="separation-line d-border-c"><span class="d-border-c"></span></div>
                            <p>' . $content . '</p>
                        </div>
                    </div>				 
				';
	}
	add_shortcode ( 'wf_service_body_content', 'wf_service_body_content_shortcode' );
}

// Poster Shortcode

if (! function_exists ( 'wf_poster_shortcode' )) {
	function wf_poster_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'title' => '',
				'picture' => '' 
		)
		, $atts ) );
		
		$html = '';
		$wf_options = get_option ( 'wayfarer_theme' );
		if (! empty ( $wf_options ['posterimage'] )) :
			$html .= '<section class="custom-section" style="';
			$html .= 'background: url(\'' . $wf_options ['posterimage'] . '\')"';
			$html .= '>';
			$html .= '<div class="bg-cover">';
		 else :
			$html .= '<section class="custom-section">';
			$html .= '<div class="bg-cover">';
		endif;
		$html .= '<div class="container">';
		$html .= '<div class="row">';
		$html .= '<div class="col-md-4">';
		$html .= '<h2 class="white">' . $title . '</h2>';
		$html .= '<br/>';
		$html .= '<p class="white">' . $content . '</p>';
		$html .= '<br/><br/>';
		$html .= '<a href="#" class="button-1 d-bg-c bold">Buy theme</a>';
		$html .= '</div>';
		$html .= '<div class="col-md-8">';
		$html .= '<br/>';
		$html .= '<img src="' . $picture . '" alt="custom images" />';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</section>';
		
		return $html;
	}
	add_shortcode ( 'wf_poster', 'wf_poster_shortcode' );
}

if (! function_exists ( 'wf_portfolio_shortcode' )) {
	function wf_portfolio_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		return '
				 <section class="title-section our-works-section" id="our-works-section">
				 ' . do_shortcode ( $content ) . '
				 </section>
				';
	}
	add_shortcode ( 'wf_portfolio', 'wf_portfolio_shortcode' );
}

if (! function_exists ( 'wf_portfolio_head_shortcode' )) {
	function wf_portfolio_head_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'title' => 'Our works' 
		)
		, $atts ) );
		
		return '
				<div class="container">
                <h3>' . $title . '</h3>
                <span class="separator d-border-c"></span>
                <p>' . $content . '</p>
            </div>
				';
	}
	add_shortcode ( 'wf_portfolio_head', 'wf_portfolio_head_shortcode' );
}

if (! function_exists ( 'wf_portfolio_body_shortcode' )) {
	function wf_portfolio_body_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		$html = '';
		$html .= '<div class="filter-area">';
		$html .= '<div class="filter-box">';
		if (! get_post_meta ( get_the_ID (), 'portfolio_category', true )) :
			$portfolio_category = get_terms ( 'portfolio_category' );
			if ($portfolio_category) :
				$html .= '<ul class="filter tesla_filters" data-tesla-plugin="filters">';
				$html .= '<li><a data-category="" class="d-bg-c-h d-border-c-h" href="#">All</a></li>';
				foreach ( $portfolio_category as $portfolio_cat ) :
					$html .= '<li><a data-category="';
					$html .= $portfolio_cat->slug;
					;
					$html .= '" class="d-bg-c-h d-border-c-h" href="#">';
					$html .= $portfolio_cat->name;
					$html .= '</a></li>';
				endforeach
				;
				$html .= '</ul>';
			
		endif;
		
		endif;
		$html .= '</div>';
		global $post;
		query_posts ( array (
				'post_type' => 'Portfolio',
				'showposts' => - 1 
		) );
		$html .= '<div class="row-fluid" data-tesla-plugin="masonry">';
		while ( have_posts () ) :
			the_post ();
			$portfolio_category = wp_get_post_terms ( $post->ID, 'portfolio_category' );
			$html .= '<div class="col-md-2 col-sm-4 col-xs-6 ';
			foreach ( $portfolio_category as $item )
				$html .= $item->slug . ' ';
			$html .= '">';
			$html .= '<div class="project">';
			$html .= '<div class="project-hover d-bg-c">';
			$html .= '<div class="project-info">';
			$html .= '<h4><a href="';
			$html .= get_the_permalink ();
			$html .= '">';
			$html .= get_the_title ();
			$html .= '</a></h4>';
			$html .= '<div class="separation-line"><span></span></div>';
			$html .= '<h6>';
			foreach ( $portfolio_category as $item )
				$html .= $item->name . ' ';
			$html .= '</h6>';
			$html .= '</div>';
			$html .= '</div>';
			$url = wp_get_attachment_url ( get_post_thumbnail_id ( $post->ID, 'thumbnail' ) );
			$html .= '<img src="';
			$html .= $url;
			$html .= '" alt="project image" />';
			$html .= '</div>';
			$html .= '</div>';
		endwhile
		;
		$html .= '</div>';
		
		$html .= '</div>';
		
		return $html;
	}
	add_shortcode ( 'wf_portfolio_body', 'wf_portfolio_body_shortcode' );
}

// Our Client

if (! function_exists ( 'wf_client_shortcode' )) {
	function wf_client_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		return '
				<section class="title-section clients-section" id="clients-section">
            		<div class="container">
				 	' . do_shortcode ( $content ) . '
				 	</div>
				 </section>
				';
	}
	add_shortcode ( 'wf_client', 'wf_client_shortcode' );
}

if (! function_exists ( 'wf_client_head_shortcode' )) {
	function wf_client_head_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		$html = '';
		$wf_options = get_option ( 'wayfarer_theme' );
		if (! empty ( $wf_options ['ctitle'] )) :
			$html .= '<h3>';
			$html .= $wf_options ['ctitle'];
			$html .= '</h3>';
			$html .= '<span class="separator d-border-c"></span>';
		
		endif;
		if (! empty ( $wf_options ['ccontent'] )) :
			$html .= '<p>';
			$html .= $wf_options ['ccontent'];
			$html .= '</p>';
			$html .= '<br/>';
		

		endif;
		
		return $html;
	}
	add_shortcode ( 'wf_client_head', 'wf_client_head_shortcode' );
}

if (! function_exists ( 'wf_client_body_shortcode' )) {
	function wf_client_body_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		$html = '';
		$wf_options = get_option ( 'wayfarer_theme' );
		
		$html .= '<div class="row">';
		
		if (! empty ( $wf_options ['client1'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client1'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		if (! empty ( $wf_options ['client2'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client2'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		if (! empty ( $wf_options ['client3'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client3'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		if (! empty ( $wf_options ['client4'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client4'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		if (! empty ( $wf_options ['client5'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client5'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		if (! empty ( $wf_options ['client6'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client6'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		if (! empty ( $wf_options ['client7'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client7'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		if (! empty ( $wf_options ['client8'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client8'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		if (! empty ( $wf_options ['client9'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client9'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		if (! empty ( $wf_options ['client10'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client10'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		if (! empty ( $wf_options ['client11'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client11'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		if (! empty ( $wf_options ['client12'] )) :
			$html .= '<div class="col-md-2 col-xs-4"><a><img src="';
			$html .= $wf_options ['client12'];
			$html .= '" alt="partner" /></a></div>';
		
		endif;
		$html .= '</div>';
		return $html;
	}
	add_shortcode ( 'wf_client_body', 'wf_client_body_shortcode' );
}

// portfolio testimonial

if (! function_exists ( 'wf_portfolio_testimonial_shortcode' )) {
	function wf_portfolio_testimonial_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		$html = '';
		
		$wf_options = get_option ( 'wayfarer_theme' );
		if (! empty ( $wf_options ['testext'] )) :
			if (! empty ( $wf_options ['testimonialimage'] )) :
				$html .= '<section class="testimonials-section" id="testimonials-section" style="';
				$html .= 'background: url(\'' . $wf_options ['testimonialimage'] . '\')"';
				$html .= '>';
				$html .= '<div class="bg-cover">';
			 else :
				$html .= '<section class="testimonials-section" id="testimonials-section">';
				$html .= '<div class="bg-cover">';
			endif;
			$html .= '<div class="container">';
			$html .= '<ul class="testimonials-line">';
			$html .= '<li>&nbsp;</li>';
			$html .= '<li><i class="d-text-c fa fa-quote-right"></i></li>';
			$html .= '<li>&nbsp;</li>';
			$html .= '</ul>';
			$html .= '<h2>';
			$html .= ($wf_options ['testext']);
			$html .= '</h2>';
			$html .= '<h5>';
			$html .= ($wf_options ['tesname']);
			$html .= '</h5>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</section>';
		
		endif;
		
		return $html;
	}
	add_shortcode ( 'testimonial', 'wf_portfolio_testimonial_shortcode' );
}

// Blog

if (! function_exists ( 'wf_blog_shortcode' )) {
	function wf_blog_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'title' => 'Latest blog posts' 
		)
		, $atts ) );
		
		$html = '';
		$html .= '<section class="title-section blog-section" id="blog-section">';
		$html .= '<div class="container">';
		$html .= '<h3>' . $title . '</h3>';
		$html .= '<span class="separator d-border-c"></span>';
		$html .= '<p>' . $content . '</p>';
		$html .= '<br/><br/>';
		$html .= '<div class="row">';
		global $post;
		query_posts ( array (
				'post_type' => 'post',
				'showposts' => 3 
		) );
		while ( have_posts () ) :
			the_post ();
			$html .= '<div class="col-md-4">';
			$html .= '<div class="blog-entry">';
			$html .= '<div class="entry-cover">';
			$html .= '<div class="entry-cover-hover d-bg-c"><a href="';
			$html .= get_the_permalink ();
			$html .= '">View</a></div>';
			$url = wp_get_attachment_url ( get_post_thumbnail_id ( $post->ID, 'thumbnail' ) );
			$html .= '<img src="';
			$html .= $url;
			$html .= '" alt="blog image" />';
			$html .= '</div>';
			$html .= '<div class="entry-header">';
			$html .= '<h4><a href="';
			$html .= get_the_permalink ();
			$html .= '" class="d-text-c-h">';
			$html .= get_the_title ();
			$html .= '</a></h4>';
			$html .= '<h6>';
			$html .= get_the_date ( 'F j, Y' );
			$html .= '</h6>';
			$html .= '<div class="separation-line d-border-c"><span class="d-border-c"></span></div>';
			$html .= '</div>';
			$html .= '<div class="entry-content">';
			$html .= '<p>';
			$html .= get_the_excerpt ();
			$html .= '</p>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
		endwhile
		;
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</section>';
		
		return $html;
	}
	add_shortcode ( 'wf_blog', 'wf_blog_shortcode' );
}

// Contact Shortcode

if (! function_exists ( 'wf_contact_shortcode' )) {
	function wf_contact_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		return '
				<section class="title-section contac" id="contact-section">
				' . do_shortcode ( $content ) . '
				</section>
				';
	}
	add_shortcode ( 'wf_contact', 'wf_contact_shortcode' );
}

if (! function_exists ( 'wf_contact_head_shortcode' )) {
	function wf_contact_head_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		return '
				<div class="container">
				' . do_shortcode ( $content ) . '
				</div>
				';
	}
	add_shortcode ( 'wf_contact_head', 'wf_contact_head_shortcode' );
}

if (! function_exists ( 'wf_contact_head_details_shortcode' )) {
	function wf_contact_head_details_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'title' => 'Contacts' 
		)
		, $atts ) );
		
		return '
				<h3>' . $title . '</h3>
                <span class="separator d-border-c"></span>
                <p>' . $content . '</p>
				';
	}
	add_shortcode ( 'wf_contact_head_details', 'wf_contact_head_details_shortcode' );
}

if (! function_exists ( 'wf_contact_social_shortcode' )) {
	function wf_contact_social_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '' 
		)
		, $atts ) );
		
		return '
				<ul class="socials">
				' . do_shortcode ( $content ) . '
				</ul>
				';
	}
	add_shortcode ( 'wf_contact_social', 'wf_contact_social_shortcode' );
}

if (! function_exists ( 'wf_contact_icon_shortcode' )) {
	function wf_contact_icon_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'icon' => '',
				'link' => 'Social Link' 
		)
		, $atts ) );
		$html = '';
		$wf_options = get_option ( 'wayfarer_theme' );
		if (! empty ( $wf_options ['facebook'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['facebook'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-facebook"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['twitter'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['twitter'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-twitter"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['google'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['google'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-google-plus"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['linkedin'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['linkedin'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-linkedin"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['dribbble'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['dribbble'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-dribbble"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['pinterest'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['pinterest'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-pinterest"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['skype'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['skype'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-skype"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['flickr'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['flickr'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-flickr"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['vimeo-square'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['vimeo-square'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-vimeo-square"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['vimeo-square'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['vimeo-square'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-vimeo-square"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['youtube'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['youtube'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-youtube"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['tumblr'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['tumblr'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-tumblr"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['dropbox'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['dropbox'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-dropbox"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['digg'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['digg'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-digg"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['instagram'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['instagram'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-instagram"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['foursquare'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['foursquare'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-foursquare"></i></a></li>';
		
			endif;
		if (! empty ( $wf_options ['git-square'] )) :
			$html .= '<li><a href="';
			$html .= $wf_options ['git-square'];
			$html .= '" class="d-text-c-h d-border-c-h"><i class="fa fa-git-square"></i></a></li>';
		
			endif;
		
		return $html;
	}
	add_shortcode ( 'wf_contact_icon', 'wf_contact_icon_shortcode' );
}

if (! function_exists ( 'wf_contact_map_shortcode' )) {
	function wf_contact_map_shortcode($atts, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '',
				'id' => '',
				'location' => '' 
		)
		, $atts ) );
		
		return '
				<div id="map-section" class="map-section">
                ' . $content . '
            </div>
				';
	}
	add_shortcode ( 'wf_contact_map', 'wf_contact_map_shortcode' );
}
