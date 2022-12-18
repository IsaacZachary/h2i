<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Persist Lite
 */

get_header(); ?>

<div class="container">
  <div id="Tab-Naviagtion">
         <div class="LS-Content-70">               
                <?php while( have_posts() ) : the_post(); ?>                               
                    <?php get_template_part( 'content', 'page' ); ?>
                    <?php
                        //If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                        ?>                               
                <?php endwhile; ?>                     
        </div><!-- .LS-Content-70-->       
        <?php get_sidebar();?>
    <div class="clear"></div>
  </div><!-- #Tab-Naviagtion --> 
</div><!-- .container --> 
<?php get_footer(); ?>