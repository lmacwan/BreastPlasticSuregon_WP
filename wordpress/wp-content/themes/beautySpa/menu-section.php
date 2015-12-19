<?php defined('ABSPATH') or die("No script kiddies please!");?>

<header id="home" class="">
	<section class="navigation">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="row">
					
					<div class="navbar-header visible-xs">
						<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target="#menu">
							<span class="sr-only"><?php esc_html_e('Toggle navigation','beautySpa')?></span>
							<span class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><?php esc_html_e('Navigation','beautySpa')?></a>
					</div>

					
                   <?php
																			$fornt_page = 'scrollto';
																			$object;
																			if (is_front_page ()) {
																				$object = new Vossen_Nav_Menu ( $fornt_page );
																			} else {
																				$object = new Vossen_Nav_Menu ( $fornt_page = '' );
																			}
																			$defaults = array (
																					'theme_location' => 'single_page',
																					'menu' => '',
																					'container' => 'div',
																					'container_class' => 'collapse navbar-collapse',
																					'container_id' => 'menu',
																					'menu_class' => 'nav navbar-nav wow fadeInLeftBig',
																					'menu_id' => '',
																					'echo' => true,
																					'fallback_cb' => 'wp_page_menu',
																					'before' => '',
																					'after' => '',
																					'link_before' => '',
																					'link_after' => '',
																					'items_wrap' => '<ul id="%1$s" class="%2$s"  data-wow-offset="30">%3$s</ul>',
																					'depth' => 0,
																					'walker' => $object 
																			);
																			
																			$defaults_multi = array (
																					'theme_location' => 'multi_page',
																					'menu' => '',
																					'container' => 'div',
																					'container_class' => 'collapse navbar-collapse',
																					'container_id' => 'menu',
																					'menu_class' => 'nav navbar-nav wow fadeInLeftBig',
																					'menu_id' => '',
																					'echo' => true,
																					'fallback_cb' => 'wp_page_menu',
																					'before' => '',
																					'after' => '',
																					'link_before' => '',
																					'link_after' => '',
																					'items_wrap' => '<ul id="%1$s" class="%2$s"  data-wow-offset="30">%3$s</ul>',
																					'depth' => 0,
																					'walker' => new Vossen_Nav_Menu ( $fornt_page = 'alter' ) 
																			);
																			if (has_nav_menu ( 'single_page' )) {
																				wp_nav_menu ( $defaults );
																			} elseif (has_nav_menu ( 'multi_page' )) {
																				wp_nav_menu ( $defaults_multi );
																			}
																			
																			?> 
				</div>
				
			</div>
			
		</nav>
	</section>
</header>