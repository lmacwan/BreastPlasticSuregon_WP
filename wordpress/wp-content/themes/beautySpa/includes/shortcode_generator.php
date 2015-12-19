<?php
class Shortcode_generator {
	public static $count_service_nav = 0;
	public static $count_service_content = 0;
	static public function bautySpa_register_shortcode() {
		$shortcode = array (
				'slide_wrapper' => 'Shortcode_generator::slide_wrapper',
				'slide' => 'Shortcode_generator::slide',
				'about' => 'Shortcode_generator::about',
				'about_wrapper' => 'Shortcode_generator::about_wrapper',
				'services_wrapper' => 'Shortcode_generator::services_wrapper',
				'services_nav_wrapper' => 'Shortcode_generator::services_nav_wrapper',
				'services_nav' => 'Shortcode_generator::services_nav',
				'services_content_wrapper' => 'Shortcode_generator::services_content_wrapper',
				'services_content' => 'Shortcode_generator::services_content',
				'poster' => 'Shortcode_generator::poster',
				'package_list_wrapper' => 'Shortcode_generator::package_list_wrapper',
				'package_list' => 'Shortcode_generator::package_list',
				'special_offer' =>'Shortcode_generator::special_offer',
				'beautySpa_gallery'=>'Shortcode_generator::beautySpa_gallery',
				'team_wrapper'=>'Shortcode_generator::team_wrapper',
				'team'=>'Shortcode_generator::team',
				'testimonial_wrapper'=>'Shortcode_generator::testimonial_wrapper',
				'testimonial_nav_wrapper'=>'Shortcode_generator::testimonial_nav_wrapper',
				'testimonial_nav'=>'Shortcode_generator::testimonial_nav',
				'testimonial_content_wrapper'=>'Shortcode_generator::testimonial_content_wrapper',
				'testimonial_content'=>'Shortcode_generator::testimonial_content',
				'beauty_newsletter'=>'Shortcode_generator::beauty_newsletter',
				'beauty_contact'=>'Shortcode_generator::beauty_contact',
				'wdg_heading'=>'Shortcode_generator::wdg_heading'

		);
		foreach ( $shortcode as $key => $value ) {
			add_shortcode ( $key, $value );
		}
	}
	static function slide_wrapper($args, $content = null) {
		$html = '<div class="slides">
  				<div class="slides-container">' . do_shortcode ( $content ) . '</div><nav class="slides-navigation">
   <a class="prev" href="#"> <i class="fa fa-chevron-left"></i></a>
   <a class="next" href="#"> <i class="fa fa-chevron-right"></i></a>
  </nav></div>';
		return $html;
	}
	static function slide($args, $content = null) {
		$default = array (
				'img_url' => '',
				'heading' => '',
				'para' => '',
				'button_text' => '',
				'button_url' => '' 
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		
		$html = ' <div class="slide active">
        <img src="' . esc_url ( $sanitized_args ['img_url'] ) . '" alt="slide" class="img-responsive">
          <div class="slide-caption">
            <div class="container wow fadeInDownBig">
              <h1>' . esc_html ( $sanitized_args ['heading'] ) . '</h1>
              <p>' . esc_html ( $sanitized_args ['para'] ) . '</p>
			  <a class="btn btn-primary read" href="' . esc_url ( $sanitized_args ['button_url'] ) . '">' . esc_html ( $sanitized_args ['button_text'] ) . '</a>
            </div>
          </div>
      </div>';
		return $html;
	}
	static function about($args, $content = null) {
		$default = array (
				'img_url' => '',
				'heading' => '',
				'para' => '' 
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		$break_text = explode ( '//', esc_html ( $sanitized_args ['heading'] ) );
		$text = '<h2>';
		foreach ( $break_text as $key => $single_text ) {
			if (($key % 2) != 0) {
				$text .= '<span>' . $single_text . '</span>';
			} else
				$text .= $single_text;
		}
		$text .= '</h2>';
		$html = '<div class="page-block about">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 col-sm-12 text-center">
            	<div class="aboutImg">
        			<img class="img-responsive wow fadeInUpBig" data-wow-offset="300" src="' . esc_url ( $sanitized_args ['img_url'] ) . '" alt="About" />
        			<img class="shadow img-responsive" src="' . get_template_directory_uri () . '/img/seperator-shadow.png" alt="Seperator shadow" />
                </div>
                ' . $text . '
                <p class="text-center">' . esc_html ( $sanitized_args ['para'] ) . '</p>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>';
		return $html;
	}
	static function services_wrapper($args, $content = null) {
		$default = array (
				'heading' => '' 
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		$break_text = explode ( '//', esc_html ( $sanitized_args ['heading'] ) );
		$text = '<h2>';
		foreach ( $break_text as $key => $single_text ) {
			if (($key % 2) != 0) {
				$text .= '<span>' . $single_text . '</span>';
			} else
				$text .= $single_text;
		}
		$text .= '</h2>';
		
		$html = '<div class="services page-block">
		<div class="container">
    	 <div class="row">
        	<div class="col-md-12 col-sm-12">
                ' . $text . '
                <div id="serviceList" class="carousel slide clearfix" data-ride="carousel"> 
				' . do_shortcode ( $content ) . '
			</div>
           </div>
        </div><!-- end row -->
       </div><!-- end container -->
	  </div>';
		self::$count_service_content =0;
		self::$count_service_nav =0;
		return $html;
	}
	static function services_nav_wrapper($args, $content = null) {
		$html = ' <ol class="carousel-indicators clearfix">' . do_shortcode ( $content ) . '</ol>';
		return $html;
	}
	static function services_nav($args, $content = null) {
		$default = array (
				'service_name' => '' 
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		if (self::$count_service_nav == 0) {
			$active = 'active';
		} else {
			$active = '';
		}
		
		$html = '<li data-target="#serviceList" data-slide-to="' . self::$count_service_nav . '" class="item' . self::$count_service_nav . ' 
				' . $active . ' wow fadeInDown" data-wow-offset="200" data-wow-delay="100ms"><strong>'.esc_html($sanitized_args['service_name']).'</strong><span>'.++self::$count_service_nav.'</span></li>';
		
		return $html;
	}
	static function services_content_wrapper($args, $content = null) {
		$html = '  <div class="carousel-inner">' . do_shortcode ( $content ) . '</div>';
		return $html;
	}
	static function services_content($args, $content = null) {
		$default = array (
				'service_name' => '',
				'img_url' => '',
				'currency_symbol' => '',
				'amount' => '',
				'para' => '',
				'services' => '' 
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		$break_text = explode ( ' ', esc_html ( $sanitized_args ['service_name'] ) );
		$text = '<h3>';
		foreach ( $break_text as $key => $single_text ) {
			if ($key == 0) {
				$text .= '<span>' . $break_text [0] . '</span>';
			}else
                $text .= ' '.$break_text [$key];
		}
		$text .= '<strong class="price"><small>'.esc_html($sanitized_args['currency_symbol']).'</small>'.esc_html($sanitized_args['amount']).'</strong></h3>';
		
		$break_services = explode ( '//', esc_html ( $sanitized_args ['services'] ) );
		$services_text = '<ul class="list-default">';
		foreach ( $break_services as $key => $single_text ) {
			$services_text .= '<li>' . $single_text .'</li>';
		}
		$services_text .= '</ul>';
		
		if (self::$count_service_content == 0) {
			$active = 'active';
		} else {
			$active = '';
		}
		$html = '<div class="item ' . $active . '"><div class="col-md-4 col-sm-5"><img class="img-responsive" src="' . esc_url ( $sanitized_args ['img_url'] ) . '" alt="services"></div>
                            <div class="col-md-7 col-md-offset-1 col-sm-7">
                            	' . $text . '
                                <p>' . esc_html ( $sanitized_args ['para'] ) . '</p>
                               ' . $services_text . '
                            </div></div>';
		self::$count_service_content ++;
		return $html;
	}
	
	static function poster($args, $content = null) {
		$default = array (
				'heading' => '',
				'sub_heading' => '',
				'img_url'=>'',
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		if (AfterSetupTheme::bautySpa_return_thme_option('theme_switcher')=='para') {
			$para_class = "para";
		}else{
			$para_class ='none';
		}
		$content_bg = esc_url ( $sanitized_args ['img_url'] ) != null ? 'style="background: url(' . esc_url ( $sanitized_args ['img_url'] ) . ') no-repeat center center; background-size:cover;"':null;
		$break_text = explode ( '//', esc_html ( $sanitized_args ['heading'] ) );
		$text = '<h1 class="wow fadeInDown" data-wow-offset="200" data-wow-delay="100ms">';
		foreach ( $break_text as $key => $single_text ) {
			if (($key % 2) != 0) {
				$text .= '<strong>' . $single_text . '</strong>';
			} else
				$text .= $single_text;
		}
		$text .= '</h1>';
		$html ='<div class="highlightBox page-block-margin '.$para_class.'" '.$content_bg.'>
    	<div class="boxBg">
    		<div class="page-block-big">
            	'.$text.'
				<h5 class="wow fadeInUp" data-wow-offset="200" data-wow-delay="200ms">'.esc_html($sanitized_args['sub_heading']).'</h5>
            </div>
        </div>
    </div><!-- end highlightBox -->';
		return $html;
	}
	
	static function package_list_wrapper($args, $content = null) {
		$default = array (
				'heading' => '',
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		$break_text = explode ( '//', esc_html ( $sanitized_args ['heading'] ) );
		$text = '<h4 class="text-center wow fadeInDown" data-wow-offset="300" data-wow-delay="100ms">';
		foreach ( $break_text as $key => $single_text ) {
			if (($key % 2) != 0) {
				$text .= '<span>' . $single_text . '</span>';
			} else
				$text .= $single_text;
		}
		$text .= '</h4>';
		$html = '  <div class="container packageList page-block-margin">
    	<div class="row">'.$text.do_shortcode($content).'</div></div>';
		
		return $html;
	}
	
	static function package_list($args, $content = null) {
		$default = array (
				'service_name' => '',
				'service_facilities'=>'',
				'currency_symbol'=>'',
				'amount'=>''
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		$break_services = explode ( '//', esc_html ( $sanitized_args ['service_facilities'] ) );
		$services_text = '<ul class="list-default">';
		foreach ( $break_services as $key => $single_text ) {
			$services_text .= '<li>' . $single_text . '</li>';
		}
		$services_text .= '</ul>';
		$html =' <div class="col-md-6">
            	<div class="package wow fadeInLeft" data-wow-offset="250" data-wow-delay="200ms">
                	<h5>'.esc_html($sanitized_args['service_name']).'</h5>
                   '.$services_text.'
                    <strong class="price"><small>'.esc_html($sanitized_args['currency_symbol']).'</small>'.esc_html($sanitized_args['amount']).'</strong>
                </div><!-- end package -->
                </div>';
		return $html;
	}
	
	static function special_offer($args, $content = null){
		$default = array (
				'percentage_amount' => '',
				'off_text'=>'',
				'offer_heading'=>'',
				'para'=>'',
				'button_url'=>'',
				'button_text'=>''
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		$break_text = explode ( '//', esc_html ( $sanitized_args ['offer_heading'] ) );
		if (AfterSetupTheme::bautySpa_return_thme_option('theme_switcher')=='para') {
			$para_class = "para";
		}else{
			$para_class ='none';
		}
		$text = '<h2>';
		foreach ( $break_text as $key => $single_text ) {
			if (($key % 2) != 0) {
				$text .= '<span>' . $single_text . '</span>';
			} else
				$text .= $single_text;
		}
		$text .= '</h2>';
		$html ='<div class="offer highlightBox '.$para_class.'"><div class="boxBg page-block">
    	<div class="container">
            <div class="row">
            
                <div class="col-md-2 col-sm-2 col-xs-12 wow rollIn" data-wow-offset="200" data-wow-delay="100ms">
                    <h1><span>'.esc_html($sanitized_args['percentage_amount']).'<small>'.esc_html($sanitized_args['off_text']).'</small></span></h1>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 wow fadeInLeft" data-wow-offset="200" data-wow-delay="200ms">
                     '.$text.'
                    <p>'.esc_html($sanitized_args['para']).'</p>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 text-center wow fadeInLeft" data-wow-offset="200" data-wow-delay="300ms"><a class="btn btn-primary" href="'.esc_url($sanitized_args['button_url']).'" title="">'.esc_html($sanitized_args['button_text']).'</a></div>
                
            </div><!-- end row -->
        </div><!-- end container -->
    </div></div>';
		/** $html ='<div class="offer page-block-small">
        <div class="container">
		<div class="row">
        
        <div class="col-md-2 col-sm-2 col-xs-12 wow rollIn" data-wow-offset="200" data-wow-delay="100ms">
        <h1><span>'.esc_html($sanitized_args['percentage_amount']).' <small>'.esc_html($sanitized_args['off_text']).'</small></span></h1>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12 wow fadeInLeft" data-wow-offset="200" data-wow-delay="200ms">
        '.$text.'
        <p>'.esc_html($sanitized_args['para']).'</p>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12 text-center wow fadeInLeft" data-wow-offset="200" data-wow-delay="300ms"><a class="btn btn-primary" href="'.esc_url($sanitized_args['button_url']).'" title="">'.esc_html($sanitized_args['button_text']).'</a></div>
        
        </div><!-- end row -->
        </div><!-- end container -->
        </div>';**/
		return $html;
	}
	
	static function beautySpa_gallery($args, $content=null){
		$default = array (
				'heading'=>'',
				'para'=>'',
				'page_id'=>'',
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		$break_text = explode ( '//', esc_html ( $sanitized_args ['heading'] ) );
		$text = '<h2>';
		foreach ( $break_text as $key => $single_text ) {
			if (($key % 2) != 0) {
				$text .= '<span>' . $single_text . '</span>';
			} else
				$text .= $single_text;
		}
		$text .= '</h2>';
		
		$img = '';
		if (class_exists ( 'Dynamic_Featured_Image' )) {
			global $dynamic_featured_image;
			$featured_images = $dynamic_featured_image->get_all_featured_images ( esc_html($sanitized_args['page_id']) );
			//var_dump($featured_images);
			$upload_dir = wp_upload_dir ();
			$img .= '';
			foreach ( $featured_images as $key => $featured_image ) {
				$img_src = wp_get_attachment_metadata ( $featured_image ['attachment_id'] );
				$date = explode('/',$img_src['file']);
				if(count($date)==3){
					$attachment_dir = $upload_dir ['baseurl'].'/'.$date[0].'/'.$date[1];
				}else{
					$attachment_dir = $upload_dir ['baseurl'];
				}
                
				$img .= ' <li class="wow fadeInLeft" data-wow-offset="200" data-wow-delay="100ms"><a href="' . $attachment_dir . '/' . $img_src ['sizes'] ['portfolio_grid'] ['file'] . '" title="'.get_post( $featured_image ['attachment_id'] )->post_excerpt.'" rel="prettyPhoto[gallery1]"><img class="img-reponsive" src="' . $attachment_dir . '/' . $img_src ['sizes'] ['portfolio_v1'] ['file'] . '" alt="Gallery"></a></li>';
			}
			
		}
		
		$html ='<div class="gallery page-block">
	<div class="container wideGallery">
    	<div class="row">'.$text.'
              <p class="text-center">'.esc_html($sanitized_args['para']).'</p>
              <ul class="galleryImg clearfix">
                    '.$img.'
                  </ul></div></div></div>';
		return $html;
	}
	
	static function team_wrapper($args, $content=null) {
		$default = array (
				'heading'=>'',
				'para'=>'',
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		$break_text = explode ( '//', esc_html ( $sanitized_args ['heading'] ) );
		$text = '<h2>';
		foreach ( $break_text as $key => $single_text ) {
			if (($key % 2) != 0) {
				$text .= '<span>' . $single_text . '</span>';
			} else
				$text .= $single_text;
		}
		$text .= '</h2>';
		
		$html ='<div class="team page-block">
    <div class="container">
    	<div class="row">
        	'.$text.'
              <p class="text-center">'.esc_html($sanitized_args['para']).'</p>
		'.do_shortcode($content).'
				</div></div></div>';
		return $html;
	}
	
	static function team($args, $content=null) {
		$default = array (
				'name'=>'',
				'designation'=>'',
				'short_info'=>'',
				'socials_icons'=>'',
				'socials_links'=>'',
				'img_url'=>'img_url'
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		
		$break_icon = explode ( ',', esc_html ( $sanitized_args ['socials_icons'] ) );
		$break_link = explode ( ',', esc_html ( $sanitized_args ['socials_links'] ) );
		
		$icons =' <ul class="social list-inline">';
		foreach ($break_icon as $key=>$single){
			$link = isset ( $break_link [$key] ) ? esc_url ( $break_link [$key] ) : "#";
			$icons .='<li><a href="'.$link.'" title="follow"><i class="fa '.$single.'"></i></a></li>';
		}
		$icons .='</ul>';
		
		$html ='<div class="col-md-3 col-sm-3 wow fadeInDown" data-wow-offset="200" data-wow-delay="300ms">
                  <div class="ih-item square effect10 top_to_bottom">
                      <aside>
                          <div class="img"><img class="img-responsive" src="'.esc_url($sanitized_args['img_url']).'" alt="img"></div>
                          <div class="info">
                              <div class="info-back">
                                  <h4>'.esc_html($sanitized_args['name']).'</h4>
                                  <strong>'.esc_html($sanitized_args['designation']).'</strong>
                                  <p>'.esc_html($sanitized_args['short_info']).'</p>
                                 '.$icons.'
                              </div>
                          </div>
                      </aside>
                  </div>
              </div><!-- end profile -->';
		return $html;
	}
	
	static function testimonial_wrapper($args, $content=null) {
		$default = array (
				'heading'=>'',
				'img_url'=>''
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		if (AfterSetupTheme::bautySpa_return_thme_option('theme_switcher')=='para') {
			$para_class = "para";
		}else{
			$para_class ='none';
		}
		$content_bg = esc_url ( $sanitized_args ['img_url'] ) != null ? 'style="background: url(' . esc_url ( $sanitized_args ['img_url'] ) . ') no-repeat center center; background-size:cover;"':null;
		$break_text = explode ( '//', esc_html ( $sanitized_args ['heading'] ) );
		$text = '<h1 class="wow fadeInDown" data-wow-offset="200" data-wow-delay="300ms">';
		foreach ( $break_text as $key => $single_text ) {
			if (($key % 2) != 0) {
				$text .= '<strong>' . $single_text . '</strong>';
			} else
				$text .= $single_text;
		}
		$text .= '</h1>';
		
		$html ='<div class="quotes">
	<div class="highlightBox '.$para_class.'" '.$content_bg.'>
    	<div class="boxBg">
    		<div class="page-block-big">
            		<i class="fa fa-quote-left wow bounceIn" data-wow-offset="200" data-wow-delay="100ms"></i><i class="fa fa-quote-right wow bounceIn" data-wow-offset="200" data-wow-delay="100ms"></i>
            	 '.$text.'
                  <div id="testimonial" class="carousel slide container" data-ride="carousel">'.do_shortcode($content).' </div><!-- end testimonial -->
			</div><!-- end page-block-bi -->
        </div><!-- end boxBg -->
    </div><!-- end highlightBox -->
</div>';
		self::$count_service_content=0;
		self::$count_service_nav =0;
		return $html;
	}
	
	static function testimonial_nav_wrapper($args, $content=null) {
		$html ='<ol class="carousel-indicators wow fadeInUp" data-wow-offset="200" data-wow-delay="700ms">'.do_shortcode($content).'</ol>';
		return $html;
	}
	static function testimonial_nav($args, $content=null) {
		if (self::$count_service_nav==0) {
			$active = 'active';
		}else{
			$active ='';
		}
		$html = ' <li data-target="#testimonial" data-slide-to="'.self::$count_service_nav.'" class="'.$active.'"></li>';
		self::$count_service_nav++;
		return $html;
	}
	
	static function testimonial_content_wrapper($args, $content=null) {
		$html =' <div class="carousel-inner text-center wow fadeInUp" data-wow-offset="200" data-wow-delay="500ms">'.do_shortcode($content).'</div>';
		return $html;
	}
	
	static function testimonial_content($args, $content=null) {
		$default = array (
				'quote_text'=>'',
				'quote_author'=>''
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		if (self::$count_service_content==0) {
			$active = 'active';
		}else{
			$active ='';
		}
		$html ='<div class="item '.$active.'">
                              <p>'.esc_html($sanitized_args['quote_text']).'</p>
                              <h5>- '.esc_html($sanitized_args['quote_author']).'</h5>
                          </div><!-- end item -->';
		self::$count_service_content++;
		return $html;
	}
	static function beauty_newsletter($args, $content=null) {
		$default = array (
				'heading'=>'',
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		$break_text = explode ( '//', esc_html ( $sanitized_args ['heading'] ) );
		$text = '<h4 class="subscribeHeading">';
		foreach ( $break_text as $key => $single_text ) {
			if (($key % 2) != 0) {
				$text .= '<span>' . $single_text . '</span>';
			} else
				$text .= $single_text;
		}
		$text .= '</h4>';
		
		$html ='<div class="subscribe page-block-small wow fadeInDown" data-wow-offset="200" data-wow-delay="300ms">
	<div class="container">
		<div class="row">
        
        	<div class="col-md-6 col-sm-12 wow fadeInLeft" data-wow-offset="200" data-wow-delay="500ms">
              '.$text.'
            </div>
            <div class="col-md-6 col-sm-12 wow fadeInRight" data-wow-offset="200" data-wow-delay="800ms">
              '.do_shortcode($content).'
            </div>
            
        </div><!-- end row -->
    </div><!-- end container -->
</div>';
		return $html;
	}
	
	static function beauty_contact($args, $content=null) {
		$default = array (
				'heading'=>'',
				'before_form_hading'=>'',
				'get_in_touch_heading'=>'',
				'day_time_open'=>'',
				'address'=>'',
				'phone_fax'=>'',
				'email'=>''
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		$break_text = explode ( '//', esc_html ( $sanitized_args ['heading'] ) );
		$text = '<h2>';
		foreach ( $break_text as $key => $single_text ) {
			if (($key % 2) != 0) {
				$text .= '<span>' . $single_text . '</span>';
			} else
				$text .= $single_text;
		}
		$text .= '</h2>';
		
		$break_day_time = explode ( '//', esc_html ( $sanitized_args ['day_time_open'] ) );
		$break_address = explode ( '//', esc_html ( $sanitized_args ['address'] ) );
		$break_phone_fax = explode ( '//', esc_html ( $sanitized_args ['phone_fax'] ) );
		$day_time_open_text='';
		foreach ( $break_day_time as $key => $single_text ) {
			if (($key % 2) != 0) {
				$day_time_open_text .= '<br>' . $single_text;
			} else
				$day_time_open_text .= $single_text;
		}
		$address_text='';
		foreach ( $break_address as $key => $single_text ) {
			if (($key % 2) != 0) {
				$address_text .= '<br>' . $single_text;
			} else
				$address_text .= $single_text;
		}
		$phone_fax_text='';
		foreach ( $break_phone_fax as $key => $single_text ) {
			if (($key % 2) != 0) {
				$phone_fax_text .= '<br>' . $single_text;
			} else
				$phone_fax_text .= $single_text;
		}
		$day_time_open ='';
		$address ='';
		$phone_fax ='';
		$email='';
		
		
		if ($sanitized_args['day_time_open']!='') {
			$day_time_open .='<p class="no-border wow fadeInRight" data-wow-offset="200" data-wow-delay="100ms">
                  	<i class="fa fa-clock-o"></i> '.$day_time_open_text.'
                  </p>';
		}
		if ($sanitized_args['address']!='') {
			$address .=' <p class="wow fadeInRight" data-wow-offset="200" data-wow-delay="300ms">
                  	<i class="fa fa-map-marker"></i> '.$address_text.'
                  </p>';
		}
		if ($sanitized_args['phone_fax']!='') {
			$phone_fax .='<p class="wow fadeInRight" data-wow-offset="200" data-wow-delay="500ms">
                  	<i class="fa fa-phone"></i>'.$phone_fax_text.'
                  </p>';
		}
		if ($sanitized_args['email']!='') {
			$phone_fax .=' <p class="wow fadeInRight" data-wow-offset="200" data-wow-delay="700ms">
                  	<i class="fa fa-envelope-o"></i> <a href="mailto:'.sanitize_email($sanitized_args['email']).'" title="Email Us" target="_blank">'.sanitize_email($sanitized_args['email']).'</a>
                  </p>';
		}
		$html ='<div class="contact page-block">
	<div class="container">
		<div class="row">
        	'.$text.'
            
            <div class="col-md-8 col-sm-8">
            	<p class="col-md-12">'.esc_html($sanitized_args['before_form_hading']).'</p>
            	'.do_shortcode($content).'
            </div>
            
            <div class="col-md-3 col-md-offset-1 col-sm-4 contactInfo">
                  <h5>'.esc_html($sanitized_args['get_in_touch_heading']).'</h5>
				'.$day_time_open. $address. $phone_fax. $email.'                 
            </div>
            
        </div><!-- end row -->
    </div><!-- end container -->
</div>';
		return $html;
	}

    static function about_wrapper($args, $content = null) {
		$default = array (
				'img_url' => '',
				'heading' => '',
				'para' => '' 
		);
		$sanitized_args = shortcode_atts ( $default, $args );
		$break_text = explode ( '//', esc_html ( $sanitized_args ['heading'] ) );
		$text = '<h2>';
		foreach ( $break_text as $key => $single_text ) {
			if (($key % 2) != 0) {
				$text .= '<span>' . $single_text . '</span>';
			} else
				$text .= $single_text;
		}
		$text .= '</h2>';
		$html = '<div class="page-block about">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 col-sm-12 text-center">
            	<div class="aboutImg">
        			<img class="img-responsive wow fadeInUpBig" data-wow-offset="300" src="' . esc_url ( $sanitized_args ['img_url'] ) . '" alt="About" />
        			<img class="shadow img-responsive" src="' . get_template_directory_uri () . '/img/seperator-shadow.png" alt="Seperator shadow" />
                </div>
                ' . $text . '
                <p class="text-center">' . esc_html ( $sanitized_args ['para'] ) . '</p>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>';
		return $html;
	}
}

