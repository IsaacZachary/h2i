<?php
/**
 * @package Persist Lite
 */
?>
<div class="DefaultPostList">
 <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
   <div class="blogin-bx"> 
    <header class="entry-header">        
           <div class="blog-postmeta">
			 <?php if( get_theme_mod( 'persist_lite_hide_postdate_fromsingle' ) == '') { ?> 
                  <div class="post-date"> <i class="far fa-clock"></i>  <?php echo esc_html( get_the_date() ); ?></div><!-- post-date --> 
                <?php } ?> 
                
                <?php if( get_theme_mod( 'persist_lite_hide_postcats_fromsingle' ) == '') { ?> 
                  <span class="blog-postcat"> <i class="far fa-folder-open"></i> <?php the_category( __( ', ', 'persist-lite' ));?></span>
               <?php } ?>  
             </div><!-- .blog-postmeta --> 
             <?php the_title( '<h3 class="single-title">', '</h3>' ); ?>      
    </header><!-- .entry-header -->
    <div class="entry-content">		
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'persist-lite' ),
            'after'  => '</div>',
        ) );
        ?>
        <div class="postmeta">          
            <div class="post-tags"><?php the_tags(); ?> </div>
            <div class="clear"></div>
        </div><!-- postmeta -->
    </div><!-- .entry-content -->   
    <footer class="entry-meta">
      <?php edit_post_link( __( 'Edit', 'persist-lite' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
    </div><!-- .blogin-bx--> 
 </article>
</div><!-- .DefaultPostList-->