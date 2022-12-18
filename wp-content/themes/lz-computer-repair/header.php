<?php
/**
 * The header for our theme
 *
 * @subpackage lz-computer-repair
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}	?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lz-computer-repair' ); ?></a>

	<header id="header" role="banner">
		<div class="container">
			<div class="top-header">
				<div class="row">
					<div class="col-lg-4 col-md-12">
						<div class="logo">
					        <?php if ( has_custom_logo() ) : ?>
						        <div class="site-logo"><?php the_custom_logo(); ?></div>
						    <?php endif; ?>
				            <?php if (get_theme_mod('lz_computer_repair_show_site_title',true)) {?>
						        <?php $blog_info = get_bloginfo( 'name' ); ?>
						        <?php if ( ! empty( $blog_info ) ) : ?>
						            <?php if ( is_front_page() && is_home() ) : ?>
							            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>
						        	<?php else : ?>
					            		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></p>
						            <?php endif; ?>
						        <?php endif; ?>
						    <?php }?>
				        	<?php if (get_theme_mod('lz_computer_repair_show_tagline',true)) {?>
						        <?php
						        $description = get_bloginfo( 'description', 'display' );
						        if ( $description || is_customize_preview() ) :
						          ?>
							        <p class="site-description">
							            <?php echo esc_html($description); ?>
							        </p>
						        <?php endif; ?>
						    <?php }?>
					    </div>
					</div>
					<div class="col-lg-8 col-md-12 p-0">
						<div class="row m-0">
							<div class="col-lg-4 col-md-3 contact">
								<?php if( get_theme_mod('lz_computer_repair_call1') != '' || get_theme_mod( 'lz_computer_repair_call' )!= ''){ ?>
									<div class="row">
										<div class="col-lg-2 col-md-2">
											<i class="fas fa-mobile-alt"></i>
										</div>
										<div class="col-lg-10 col-md-10 contact">
											<p class="para-call"><?php if( get_theme_mod('lz_computer_repair_call') != ''){ ?>
												<?php echo esc_html( get_theme_mod('lz_computer_repair_call','') ); ?>
												<?php } ?>
											</p>
											<p><?php if( get_theme_mod('lz_computer_repair_call1') != ''){ ?>
												<a href="tel:<?php echo esc_url( get_theme_mod('lz_computer_repair_call1','') ); ?>"><?php echo esc_html( get_theme_mod('lz_computer_repair_call1','') ); ?></a>
												<?php } ?>
											</p>
										</div>
									</div>		
								<?php } ?>
							</div>
							<div class="col-lg-4 col-md-5 contact">
								<?php if( get_theme_mod('lz_computer_repair_time') != '' || get_theme_mod( 'lz_computer_repair_time1' )!= ''){ ?>
									<div class="row">
										<div class="col-lg-2 col-md-2">
											<i class="far fa-clock"></i>
										</div>
										<div class="col-lg-10 col-md-10 contact">
											<p class="para-call"><?php if( get_theme_mod('lz_computer_repair_time') != ''){ ?>
												<?php echo esc_html( get_theme_mod('lz_computer_repair_time','') ); ?>
												<?php } ?>
											</p>
											<p><?php if( get_theme_mod('lz_computer_repair_time1') != ''){ ?>
												<?php echo esc_html( get_theme_mod('lz_computer_repair_time1','') ); ?>
											<?php } ?>
											</p>		
										</div>
									</div>
								<?php } ?>
							</div>
							<div class="col-lg-4 col-md-4">
								<?php if ( get_theme_mod('lz_computer_repair_btn_text','') != "" ) {?>
									   	<div class="quote-btn">
									     	<a href="<?php echo esc_html( get_theme_mod('lz_computer_repair_btn_link','') ); ?>"><?php echo esc_html( get_theme_mod('lz_computer_repair_btn_text','') ); ?></a>
									    </div>      
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="menu-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-11 col-md-11 col-6">
						<?php if (has_nav_menu('primary')){ ?>
							<div class="toggle-menu responsive-menu">
					            <button onclick="lz_computer_repair_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','lz-computer-repair'); ?></span></button>
					        </div>
							<div id="sidelong-menu" class="nav sidenav">
				                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'lz-computer-repair' ); ?>">
				                  	<?php 
				                    wp_nav_menu( array( 
				                      'theme_location' => 'primary',
				                      'container_class' => 'main-menu-navigation clearfix' ,
				                      'menu_class' => 'clearfix',
				                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                      'fallback_cb' => 'wp_page_menu',
				                    ) ); 
				                  	?>
				                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="lz_computer_repair_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','lz-computer-repair'); ?></span></a>
				                </nav>
				            </div>
				        <?php }?>
					</div>
					<div class="col-lg-1 col-md-1 col-6">
						<div class="search-box">
							<button  onclick="lz_computer_repair_search_open()" class="search-toggle"><i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
				<div class="search-outer">
					<div class="search-inner">
		        		<?php get_search_form(); ?>
		        	</div>
		        	<button onclick="lz_computer_repair_search_close()" class="search-close"><i class="fas fa-times"></i></button>
		        </div> 
			</div>
		</div>
	</header>

	<?php if(is_singular()) {?>
		<div id="inner-pages-header">
		    <div class="header-content py-2">
			    <div class="container"> 
			      	<h1><?php single_post_title(); ?></h1>
		      	</div>
	      	</div>
	      	<div class="theme-breadcrumb py-2">
	      		<div class="container">
					<?php lz_computer_repair_breadcrumb();?>
				</div>
			</div>
		</div>
	<?php } ?>

	<div class="site-content-contain">
		<div id="content" class="site-content">