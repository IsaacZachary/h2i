<?php  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="wrap">
	<h1><?php _e( "Category Order", 'wpcatsort' ) ?></h1>
</div>
<div id="ajax-response"></div>
<noscript>
    <div class="error message">
        <p><?php _e( "This plugin can't work without javascript, because it's use drag and drop and AJAX.", 'wpcatsort' ) ?></p>
    </div>
</noscript>
<form action="edit.php" method="post">
	<div id="wpcatsort-cont">
        <div id="post-body">                    
            <ul class="wpcatsort-sortable" id="">
                <?php //Get all the terms of category taxomony

					$args = array(
						'hide_empty' => 0,
						'show_count' => 1,
						'title_li' =>'',
						'walker' => new WPCategorySortWalker
					);

					wp_list_categories( $args );
                ?>
            </ul>
                            
            <div class="clear"></div>
        </div>
                    
        <div class="alignleft actions">
            <p class="submit">
                <a href="javascript:;" class="wpcatsort-update-order button-primary"><?php _e( "Update", 'wpcatsort' ) ?></a>
            </p>
        </div>
                    
    </div> 
</form> 