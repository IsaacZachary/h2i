<?php
/**
 * Persist Lite About Theme
 *
 * @package Persist Lite
 */

//about theme info
add_action( 'admin_menu', 'persist_lite_abouttheme' );
function persist_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'persist-lite'), __('About Theme Info', 'persist-lite'), 'edit_theme_options', 'persist_lite_guide', 'persist_lite_mostrar_guide');   
} 

//Info of the theme
function persist_lite_mostrar_guide() { 	
?>

<h1><?php esc_html_e('About Theme Info', 'persist-lite'); ?></h1>
<hr />  

<p><?php esc_html_e('Persist Lite is a popular software company WordPress theme best fit for IT companies, creative, digital, it solutions, startup, technology company, digital marketing, business, consultant, corporate, IT-agency, web-agency, technological enterprises, software companies, marketing and consulting agencies, and others. The best thing about this WordPress theme is its visual appearance because it draws the maximum attention of the clients. The undoubtful attractive visual appeal and the on-prompt features of this theme make this theme an out-of-the-box tool. This theme is completely responsive and is also retina-ready. As this free software company WordPress theme is SEO optimized, you can easily make your website more visible to your target audience online. Most of the renowned plugins like Contact Form 7, WPForms, NextGen Gallery, WooCommerce, and others are perfectly compatible with this Persist Lite WordPress theme for your software company. In addition, this theme is compatible with WooCommerce, and this is highly advantageous as it makes financial transactions secure and easier.', 'persist-lite'); ?></p>

<h2><?php esc_html_e('Theme Features', 'persist-lite'); ?></h2>
<hr />  
 
<h3><?php esc_html_e('Theme Customizer', 'persist-lite'); ?></h3>
<p><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'persist-lite'); ?></p>


<h3><?php esc_html_e('Responsive Ready', 'persist-lite'); ?></h3>
<p><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'persist-lite'); ?></p>


<h3><?php esc_html_e('Cross Browser Compatible', 'persist-lite'); ?></h3>
<p><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'persist-lite'); ?></p>


<h3><?php esc_html_e('E-commerce', 'persist-lite'); ?></h3>
<p><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'persist-lite'); ?></p>

<hr />  	
<p><a href="http://www.gracethemesdemo.com/documentation/persist/#homepage-lite" target="_blank"><?php esc_html_e('Documentation', 'persist-lite'); ?></a></p>

<?php } ?>