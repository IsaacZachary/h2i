<?php
/**
 * @package Persist Lite
 */
?>
 <div class="DefaultPostList">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>         
		  <?php if( get_theme_mod( 'persist_lite_hide_postfeatured_image' ) == '') { ?> 
			 <?php if (has_post_thumbnail() ){ ?>
                <div class="BlogThumb">
                 <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                </div>
             <?php } ?> 
          <?php } ?> 
       
        <header class="entry-header">
           <?php if ( 'post' == get_post_type() ) : ?>
                <div class="blog-postmeta">
                   <?php if( get_theme_mod( 'persist_lite_hide_blogdate' ) == '') { ?> 
                      <div class="post-date"> <i class="far fa-clock"></i>  <?php echo esc_html( get_the_date() ); ?></div><!-- post-date --> 
                    <?php } ?> 
                    
                    <?php if( get_theme_mod( 'persist_lite_hide_postcats' ) == '') { ?> 
                      <span class="blog-postcat"> <i class="far fa-folder-open"></i> <?php the_category( __( ', ', 'persist-lite' ));?></span>
                   <?php } ?>                                                   
                </div><!-- .blog-postmeta -->
            <?php endif; ?>
            <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>                           
                                
        </header><!-- .entry-header -->          
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">           
        
            <?php $persist_lite_arg = get_theme_mod( 'persist_lite_blogfullcontent','Excerpt');
              if($persist_lite_arg == 'Content'){ ?>
                <p><?php the_content(); ?></p>
              <?php }
              if($persist_lite_arg == 'Excerpt'){ ?>
                <?php if(get_the_excerpt()) { ?>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( persist_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('persist_lite_blogexcerptrange','30')))); ?> </p>
                <?php }?>
                <a class="morebutton" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'persist-lite'); ?></a>				 
              <?php }?>
          
         
                    
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'persist-lite' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'persist-lite' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php endif; ?>
        <div class="clear"></div>
    </article><!-- #post-## --> 
</div>