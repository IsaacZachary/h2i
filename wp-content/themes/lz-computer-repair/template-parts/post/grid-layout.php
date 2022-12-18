<?php
/**
 * Template part for displaying posts
 * 
 * @subpackage lz-computer-repair
 * @since 1.0
 * @version 1.4
 */
?>

<div class="col-lg-4 col-md-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="article_content">
      <?php if(has_post_thumbnail()) { ?>
        <?php the_post_thumbnail(); ?>  
      <?php }?>
      <h3><?php the_title(); ?></h3>
      <p><?php the_excerpt(); ?></p>
      <div class="read-btn">
        <a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'READ MORE', 'lz-computer-repair' ); ?>"><?php esc_html_e('READ MORE','lz-computer-repair'); ?>
        </a>
      </div>
      <div class="clearfix"></div> 
    </div>
  </article>
</div>