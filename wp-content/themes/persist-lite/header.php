<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Persist Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#Tab-Naviagtion">
<?php esc_html_e('Skip to content', 'persist-lite' ); ?>
</a>
<?php
$persist_lite_show_ctninfo 	   			= esc_attr( get_theme_mod('persist_lite_show_ctninfo', false) ); 
$persist_lite_slidersection_show 	  		= esc_attr( get_theme_mod('persist_lite_slidersection_show', false) );
$persist_lite_fourcolumn_section_show      		= esc_attr( get_theme_mod('persist_lite_fourcolumn_section_show', false) );
$persist_lite_show_welcomesection      		= esc_attr( get_theme_mod('persist_lite_show_welcomesection', false) );
?>
<div id="SiteWrapper" <?php if( get_theme_mod( 'persist_lite_layoutoption' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($persist_lite_slidersection_show)) {
	 	$innerpage_cls = '';
	}
	else {
		$innerpage_cls = 'innerpage_header';
	}
}
else {
$innerpage_cls = 'innerpage_header';
}
?>

<div id="masthead" class="site-header <?php echo esc_attr($innerpage_cls); ?> ">      
        <?php if( $persist_lite_show_ctninfo != ''){ ?> 
          <div class="topInfostrip">
           <div class="container">  
           <div class="left">           
            <?php $persist_lite_contactno = get_theme_mod('persist_lite_contactno');
                if( !empty($persist_lite_contactno) ){ ?>              
                <div class="DetailBoX">
                    <i class="fas fa-phone fa-rotate-90"></i>
                    <?php echo esc_html($persist_lite_contactno); ?>
                </div>       
            <?php } ?>
            
             <?php $email = get_theme_mod('persist_lite_emailinfo');
                if( !empty($email) ){ ?>                
                <div class="DetailBoX">
                    <i class="far fa-envelope"></i>
                    <a href="<?php echo esc_url('mailto:'.sanitize_email($email)); ?>"><?php echo sanitize_email($email); ?></a>
                </div>            
            <?php } ?>           
         </div>
         <div class="right">
             <div class="DetailBoX">
                <div class="hdrSocial">                                                
					   <?php $persist_lite_facebooklink = get_theme_mod('persist_lite_facebooklink');
                        if( !empty($persist_lite_facebooklink) ){ ?>
                        <a class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($persist_lite_facebooklink); ?>"></a>
                       <?php } ?>
                    
                       <?php $persist_lite_twitterlink = get_theme_mod('persist_lite_twitterlink');
                        if( !empty($persist_lite_twitterlink) ){ ?>
                        <a class="fab fa-twitter" target="_blank" href="<?php echo esc_url($persist_lite_twitterlink); ?>"></a>
                       <?php } ?>
                
                      <?php $persist_lite_linkedinlink = get_theme_mod('persist_lite_linkedinlink');
                        if( !empty($persist_lite_linkedinlink) ){ ?>
                        <a class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($persist_lite_linkedinlink); ?>"></a>
                      <?php } ?> 
                      
                      <?php $persist_lite_instagramlink = get_theme_mod('persist_lite_instagramlink');
                        if( !empty($persist_lite_instagramlink) ){ ?>
                        <a class="fab fa-instagram" target="_blank" href="<?php echo esc_url($persist_lite_instagramlink); ?>"></a>
                      <?php } ?> 
                  </div><!--end .hdrSocial-->
                </div><!--end .DetailBoX-->   
               </div> 
        	<div class="clear"></div> 
          </div><!-- .container -->  
      </div><!-- .topInfostrip -->      
   <?php } ?>   

      <div class="LogoNavBar">  
       <div class="container">    
         <div class="logo <?php if( $persist_lite_show_ctninfo == ''){ ?>hdrlogo<?php } ?>">
           <?php persist_lite_the_custom_logo(); ?>
            <div class="site_branding">
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <p><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
         </div><!-- logo --> 
         
          <div class="MenuPart_Right"> 
             <div id="navigationpanel"> 
                 <nav id="main-navigation" class="site-navi" role="navigation" aria-label="Primary Menu">
                    <button type="button" class="menu-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                    	wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                    ) );
                    ?>
                </nav><!-- #main-navigation -->  
            </div><!-- #navigationpanel -->   
             <?php
                $persist_lite_hdrappbtn = get_theme_mod('persist_lite_hdrappbtn');
                if( !empty($persist_lite_hdrappbtn) ){ ?>        
                <?php $persist_lite_hdrappbtnlink = get_theme_mod('persist_lite_hdrappbtnlink');
                if( !empty($persist_lite_hdrappbtnlink) ){ ?>              
                        <div class="appbox">
                        <a class="appontmentbtn" target="_blank" href="<?php echo esc_url($persist_lite_hdrappbtnlink); ?>">
                        	<?php echo esc_html($persist_lite_hdrappbtn); ?>            
                        </a>
                     </div>
             <?php }} ?>
          </div><!-- .MenuPart_Right --> 
          
          
         <div class="clear"></div>
           
       </div><!-- .container -->  
    </div><!-- .LogoNavBar --> 
 <div class="clear"></div> 
</div><!--.site-header --> 
 
<?php 
if ( is_front_page() && !is_home() ) {
if($persist_lite_slidersection_show != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('persist_lite_slideno'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('persist_lite_slideno'.$i,true));
	  }
	}
?> 
<div class="FrontSlider">              
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">         
     <h2><?php the_title(); ?></h2>
     <p><?php $excerpt = get_the_excerpt(); echo esc_html( persist_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('persist_lite_slide_excerpt_length','10')))); ?></p>
		<?php
        $persist_lite_slideno_moretext = get_theme_mod('persist_lite_slideno_moretext');
        if( !empty($persist_lite_slideno_moretext) ){ ?>
            <a class="slidermorebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($persist_lite_slideno_moretext); ?></a>
        <?php } ?>  
                        
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>   
<?php } ?>
</div><!-- .FrontSlider -->    
<?php } } ?> 

<?php if ( is_front_page() && ! is_home() ) { ?>   
   
   <section id="Section-1">
     <div class="container">              
       <?php if( $persist_lite_fourcolumn_section_show != ''){ ?> 
         <div class="box-equal-height"> 
            <?php 
                for($n=1; $n<=4; $n++) {    
                if( get_theme_mod('persist_lite_services_pageno'.$n,false)) {      
                    $queryvar = new WP_Query('page_id='.absint(get_theme_mod('persist_lite_services_pageno'.$n,true)) );		
                    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
                     <div class="block-25bx <?php if($n % 2 == 0) { echo "last_column"; } ?>">  
                    	 <div class="topboxbg">
							  <?php if(has_post_thumbnail() ) { ?>
                                <div class="imgbox25 bgcolorbx<?php echo $n; ?>">
                                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>                                
                                </div>        
                               <?php } ?>
                               <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                               <p><?php $excerpt = get_the_excerpt(); echo esc_html( persist_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('persist_lite_services_pageno_excerpt_length','5')))); ?></p>
                               <?php
                                $persist_lite_morebtntext = get_theme_mod('persist_lite_morebtntext');
                                if( !empty($persist_lite_morebtntext) ){ ?>
                                <a class="blogreadmore" href="<?php the_permalink(); ?>"><?php echo esc_html($persist_lite_morebtntext); ?></a>
                                <?php } ?>
                        </div>
                      </div>
                    <?php endwhile;
                    wp_reset_postdata();                                  
                } } ?>                                 
                 <div class="clear"></div>  
               </div>
           </div><!-- .container -->
         </section><!-- #Section-1-->          
      <?php } ?>    
          
     <?php if( $persist_lite_show_welcomesection != ''){ ?>   
         <section id="Section-2">
           <div class="container"> 
           <?php 
                if( get_theme_mod('persist_lite_welcomepage',false)) {      
                    $queryvar = new WP_Query('page_id='.absint(get_theme_mod('persist_lite_welcomepage',true)) );		
                    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>    
                               <div class="left-column-45">
								<?php
                                $persist_lite_welsection2_subtitle = get_theme_mod('persist_lite_welsection2_subtitle');
                                if( !empty($persist_lite_welsection2_subtitle) ){ ?>
                                	<h4><?php echo esc_html($persist_lite_welsection2_subtitle); ?></h4>
                                <?php } ?>
                               <h2><?php the_title(); ?></h2>
                               <p><?php $excerpt = get_the_excerpt(); echo esc_html( persist_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('persist_lite_excerpt_length_welcomepage','100')))); ?></p>
								<?php
                                $persist_lite_welcome_readmoretext = get_theme_mod('persist_lite_welcome_readmoretext');
                                if( !empty($persist_lite_welcome_readmoretext) ){ ?>
                                <a class="ReadMoreBtn" href="<?php the_permalink(); ?>"><?php echo esc_html($persist_lite_welcome_readmoretext); ?></a>
                                <?php } ?>
                         	 </div>
                             
                              <?php if(has_post_thumbnail() ) { ?>
                               <div class="right-column-45">
                                  <div class="ImgFix">
                                     <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a> 
                                  </div>                               
                                </div>        
                              <?php } ?>
                               
                    <?php endwhile;
                    wp_reset_postdata();                                  
                } ?> 
            <div class="clear"></div>    
     	 </div><!-- .container -->
      </section><!-- #Section-2-->  
    <?php } ?>    
<?php } ?>