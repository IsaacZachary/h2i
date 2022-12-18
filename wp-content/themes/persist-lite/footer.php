<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Persist Lite
 */
?>

<div class="site-footer">         
    <div class="container"> 
       <div class="footfix">         
          <?php if ( is_active_sidebar( 'fw-column-1' ) ) : ?>
                <div class="fwcolumn-1">  
                    <?php dynamic_sidebar( 'fw-column-1' ); ?>
                </div>
           <?php endif; ?>
          
          <?php if ( is_active_sidebar( 'fw-column-2' ) ) : ?>
                <div class="fwcolumn-2">  
                    <?php dynamic_sidebar( 'fw-column-2' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'fw-column-3' ) ) : ?>
                <div class="fwcolumn-3">  
                    <?php dynamic_sidebar( 'fw-column-3' ); ?>
                </div>
           <?php endif; ?> 
           
           <?php if ( is_active_sidebar( 'fw-column-4' ) ) : ?>
                <div class="fwcolumn-4">  
                    <?php dynamic_sidebar( 'fw-column-4' ); ?>
                </div>
           <?php endif; ?>            
          	
           <div class="clear"></div>
        </div><!--.footfix-->
           
           <div class="copyrigh-wrapper"> 
                <div class="CopyBX">
				   <?php bloginfo('name'); ?> 
                </div> 
                 <div class="CopyBX">
				   <?php esc_html_e('Theme by Grace Themes','persist-lite'); ?>  
                </div> 
                <div class="CopyBX">
                <div class="FooterSocial">                                                
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
              </div>
              <div class="clear"></div>                             
        </div><!--end .copyrigh-wrapper-->  
               
        
       </div><!--end .container-->   

        
                             
     </div><!--end #site-footer-->
</div><!--#end SiteWrapper-->
<?php wp_footer(); ?>
</body>
</html>