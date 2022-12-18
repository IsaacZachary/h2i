<?php    
/**
 *persist-lite Theme Customizer
 *
 * @package Persist Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function persist_lite_customize_register( $wp_customize ) {	
	
	function persist_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function persist_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	} 
	
	function persist_lite_sanitize_phone_number( $phone ) {
		// sanitize phone
		return preg_replace( '/[^\d+]/', '', $phone );
	} 
	
	
	function persist_lite_sanitize_excerptrange( $number, $setting ) {	
		// Ensure input is an absolute integer.
		$number = absint( $number );	
		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;	
		// Get minimum number in the range.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );	
		// Get maximum number in the range.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );	
		// Get step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );	
		// If the number is within the valid range, return it; otherwise, return the default
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}

	function persist_lite_sanitize_number_absint( $number, $setting ) {
		// Ensure $number is an absolute integer (whole number, zero or greater).
		$number = absint( $number );		
		// If the input is an absolute integer, return it; otherwise, return the default
		return ( $number ? $number : $setting->default );
	}
	
	// Ensure is an absolute integer
	function persist_lite_sanitize_choices( $input, $setting ) {
		global $wp_customize; 
		$control = $wp_customize->get_control( $setting->id ); 
		if ( array_key_exists( $input, $control->choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
	
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo h1 a',
		'render_callback' => 'persist_lite_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.logo p',
		'render_callback' => 'persist_lite_customize_partial_blogdescription',
	) );
		
	 	
	//Panel for section & control
	$wp_customize->add_panel( 'persist_lite_panel_settings', array(
		'priority' => 4,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'persist-lite' ),		
	) );

	$wp_customize->add_section('persist_lite_sitelayout',array(
		'title' => __('Layout Style','persist-lite'),			
		'priority' => 1,
		'panel' => 	'persist_lite_panel_settings',          
	));		
	
	$wp_customize->add_setting('persist_lite_layoutoption',array(
		'sanitize_callback' => 'persist_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'persist_lite_layoutoption', array(
    	'section'   => 'persist_lite_sitelayout',    	 
		'label' => __('Check to Show Box Layout','persist-lite'),
		'description' => __('check for box layout','persist-lite'),
    	'type'      => 'checkbox'
     )); //Layout Settings 
	
	$wp_customize->add_setting('persist_lite_colorscheme',array(
		'default' => '#096bd8',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'persist_lite_colorscheme',array(
			'label' => __('Color Scheme','persist-lite'),			
			'section' => 'colors',
			'settings' => 'persist_lite_colorscheme'
		))
	);
	
	$wp_customize->add_setting('persist_lite_secondcolor',array(
		'default' => '#134d8d',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'persist_lite_secondcolor',array(
			'label' => __('Second Color Scheme','persist-lite'),			
			'section' => 'colors',
			'settings' => 'persist_lite_secondcolor'
		))
	);
	
	$wp_customize->add_setting('persist_lite_hdrmenu',array(
		'default' => '#333333',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'persist_lite_hdrmenu',array(
			'label' => __('Navigation font Color','persist-lite'),			
			'section' => 'colors',
			'settings' => 'persist_lite_hdrmenu'
		))
	);
	
	
	$wp_customize->add_setting('persist_lite_hdrmenuactive',array(
		'default' => '#096bd8',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'persist_lite_hdrmenuactive',array(
			'label' => __('Navigation Hover/Active Color','persist-lite'),			
			'section' => 'colors',
			'settings' => 'persist_lite_hdrmenuactive'
		))
	);
	
	
	 //Header Contact Info
	$wp_customize->add_section('persist_lite_ctninfo',array(
		'title' => __('Header Contact Info','persist-lite'),				
		'priority' => null,
		'panel' => 	'persist_lite_panel_settings',
	));	
	
	$wp_customize->add_setting('persist_lite_contactno',array(
		'default' => null,
		'sanitize_callback' => 'persist_lite_sanitize_phone_number'	
	));
	
	$wp_customize->add_control('persist_lite_contactno',array(	
		'type' => 'text',
		'label' => __('Enter phone number here','persist-lite'),
		'section' => 'persist_lite_ctninfo',
		'setting' => 'persist_lite_contactno'
	));
	
	$wp_customize->add_setting('persist_lite_emailinfo',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('persist_lite_emailinfo',array(
		'type' => 'email',
		'label' => __('Enter email id here','persist-lite'),
		'section' => 'persist_lite_ctninfo'
	));	
	
	
	$wp_customize->add_setting('persist_lite_facebooklink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('persist_lite_facebooklink',array(
		'label' => __('Add facebook link here','persist-lite'),
		'section' => 'persist_lite_ctninfo',
		'setting' => 'persist_lite_facebooklink'
	));	
	
	$wp_customize->add_setting('persist_lite_twitterlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('persist_lite_twitterlink',array(
		'label' => __('Add twitter link here','persist-lite'),
		'section' => 'persist_lite_ctninfo',
		'setting' => 'persist_lite_twitterlink'
	));

	
	$wp_customize->add_setting('persist_lite_linkedinlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('persist_lite_linkedinlink',array(
		'label' => __('Add linkedin link here','persist-lite'),
		'section' => 'persist_lite_ctninfo',
		'setting' => 'persist_lite_linkedinlink'
	));
	
	$wp_customize->add_setting('persist_lite_instagramlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('persist_lite_instagramlink',array(
		'label' => __('Add instagram link here','persist-lite'),
		'section' => 'persist_lite_ctninfo',
		'setting' => 'persist_lite_instagramlink'
	));		
	
	$wp_customize->add_setting('persist_lite_show_ctninfo',array(
		'default' => false,
		'sanitize_callback' => 'persist_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'persist_lite_show_ctninfo', array(
	   'settings' => 'persist_lite_show_ctninfo',
	   'section'   => 'persist_lite_ctninfo',
	   'label'     => __('Check To show Header contact bar','persist-lite'),
	   'type'      => 'checkbox'
	 ));//Show Contact Info
	 
	 $wp_customize->add_setting('persist_lite_hdrappbtn',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('persist_lite_hdrappbtn',array(	
		'type' => 'text',
		'label' => __('Enter appointment button name here','persist-lite'),
		'setting' => 'persist_lite_bookbtn',
		'section' => 'persist_lite_ctninfo'
	));	
	
	$wp_customize->add_setting('persist_lite_hdrappbtnlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('persist_lite_hdrappbtnlink',array(
		'label' => __('Add appointment button link here','persist-lite'),		
		'setting' => 'persist_lite_hdrappbtnlink',
		'section' => 'persist_lite_ctninfo'
	));	
	 
	 	
	//HomePage Slide Section		
	$wp_customize->add_section( 'persist_lite_slidersection', array(
		'title' => __('Slider Section', 'persist-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 824 pixel.','persist-lite'), 
		'panel' => 	'persist_lite_panel_settings',           			
    ));
	
	$wp_customize->add_setting('persist_lite_slideno1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'persist_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('persist_lite_slideno1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide 1:','persist-lite'),
		'section' => 'persist_lite_slidersection'
	));	
	
	$wp_customize->add_setting('persist_lite_slideno2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'persist_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('persist_lite_slideno2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide 2:','persist-lite'),
		'section' => 'persist_lite_slidersection'
	));	
	
	$wp_customize->add_setting('persist_lite_slideno3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'persist_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('persist_lite_slideno3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide 3:','persist-lite'),
		'section' => 'persist_lite_slidersection'
	));	//frontpage Slider Section	
	
	//Slider Excerpt Length
	$wp_customize->add_setting( 'persist_lite_slide_excerpt_length', array(
		'default'              => 10,
		'type'                 => 'theme_mod',		
		'sanitize_callback'    => 'persist_lite_sanitize_excerptrange',		
	) );
	$wp_customize->add_control( 'persist_lite_slide_excerpt_length', array(
		'label'       => __( 'Slider Excerpt length','persist-lite' ),
		'section'     => 'persist_lite_slidersection',
		'type'        => 'range',
		'settings'    => 'persist_lite_slide_excerpt_length','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );	
	
	$wp_customize->add_setting('persist_lite_slideno_moretext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('persist_lite_slideno_moretext',array(	
		'type' => 'text',
		'label' => __('Enter button name here','persist-lite'),
		'section' => 'persist_lite_slidersection',
		'setting' => 'persist_lite_slideno_moretext'
	)); // slider read more button text
	
		
	$wp_customize->add_setting('persist_lite_slidersection_show',array(
		'default' => false,
		'sanitize_callback' => 'persist_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'persist_lite_slidersection_show', array(
	    'settings' => 'persist_lite_slidersection_show',
	    'section'   => 'persist_lite_slidersection',
	    'label'     => __('Check To Show This Section','persist-lite'),
	   'type'      => 'checkbox'
	 ));//Show Home Page Slider Sections	
	 
	 
	 //Four Column Sections
	$wp_customize->add_section('persist_lite_fourcolumn_section', array(
		'title' => __('Four Column Services','persist-lite'),
		'description' => __('Select pages from the dropdown for three column services','persist-lite'),
		'priority' => null,
		'panel' => 	'persist_lite_panel_settings',          
	));
		
	$wp_customize->add_setting('persist_lite_services_pageno1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'persist_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'persist_lite_services_pageno1',array(
		'type' => 'dropdown-pages',			
		'section' => 'persist_lite_fourcolumn_section',
	));		
	
	$wp_customize->add_setting('persist_lite_services_pageno2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'persist_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'persist_lite_services_pageno2',array(
		'type' => 'dropdown-pages',			
		'section' => 'persist_lite_fourcolumn_section',
	));
	
	$wp_customize->add_setting('persist_lite_services_pageno3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'persist_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'persist_lite_services_pageno3',array(
		'type' => 'dropdown-pages',			
		'section' => 'persist_lite_fourcolumn_section',
	));
	
	$wp_customize->add_setting('persist_lite_services_pageno4',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'persist_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'persist_lite_services_pageno4',array(
		'type' => 'dropdown-pages',			
		'section' => 'persist_lite_fourcolumn_section',
	));
	
	$wp_customize->add_setting('persist_lite_morebtntext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('persist_lite_morebtntext',array(	
		'type' => 'text',
		'label' => __('Enter read more button text','persist-lite'),
		'section' => 'persist_lite_fourcolumn_section',
		'setting' => 'persist_lite_morebtntext'
	)); // four column read more button text	
	
	$wp_customize->add_setting( 'persist_lite_services_pageno_excerpt_length', array(
		'default'              => 8,
		'type'                 => 'theme_mod',		
		'sanitize_callback'    => 'persist_lite_sanitize_excerptrange',		
	) );
	$wp_customize->add_control( 'persist_lite_services_pageno_excerpt_length', array(
		'label'       => __( 'Circle box excerpt length','persist-lite' ),
		'section'     => 'persist_lite_fourcolumn_section',
		'type'        => 'range',
		'settings'    => 'persist_lite_services_pageno_excerpt_length','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );	
	
	
	$wp_customize->add_setting('persist_lite_fourcolumn_section_show',array(
		'default' => false,
		'sanitize_callback' => 'persist_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));		
	
	$wp_customize->add_control( 'persist_lite_fourcolumn_section_show', array(
	   'settings' => 'persist_lite_fourcolumn_section_show',
	   'section'   => 'persist_lite_fourcolumn_section',
	   'label'     => __('Check To Show This Section','persist-lite'),
	   'type'      => 'checkbox'
	 ));//Show Four box sections
	 
	 
	 //Welcome Sections
	$wp_customize->add_section('persist_lite_welsection2', array(
		'title' => __('Welcome Sections','persist-lite'),
		'description' => __('Select pages from the dropdown for welcome sections','persist-lite'),
		'priority' => null,
		'panel' => 	'persist_lite_panel_settings',          
	));
	
	$wp_customize->add_setting('persist_lite_welsection2_subtitle',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('persist_lite_welsection2_subtitle',array(	
		'type' => 'text',
		'label' => __('Enter sub title here','persist-lite'),
		'section' => 'persist_lite_welsection2',
		'setting' => 'persist_lite_welsection2_subtitle'
	)); // Welcome sub title	
		
	$wp_customize->add_setting('persist_lite_welcomepage',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'persist_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'persist_lite_welcomepage',array(
		'type' => 'dropdown-pages',			
		'section' => 'persist_lite_welsection2',
	));	
	
	$wp_customize->add_setting( 'persist_lite_excerpt_length_welcomepage', array(
		'default'              => 100,
		'type'                 => 'theme_mod',		
		'sanitize_callback'    => 'persist_lite_sanitize_excerptrange',		
	) );
	$wp_customize->add_control( 'persist_lite_excerpt_length_welcomepage', array(
		'label'       => __( 'Circle box excerpt length','persist-lite' ),
		'section'     => 'persist_lite_welsection2',
		'type'        => 'range',
		'settings'    => 'persist_lite_excerpt_length_welcomepage','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	
	$wp_customize->add_setting('persist_lite_welcome_readmoretext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('persist_lite_welcome_readmoretext',array(	
		'type' => 'text',
		'label' => __('Enter read more button text','persist-lite'),
		'section' => 'persist_lite_welsection2',
		'setting' => 'persist_lite_welcome_readmoretext'
	)); // welcome read more button text	
	
	
	$wp_customize->add_setting('persist_lite_show_welcomesection',array(
		'default' => false,
		'sanitize_callback' => 'persist_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));		
	
	$wp_customize->add_control( 'persist_lite_show_welcomesection', array(
	   'settings' => 'persist_lite_show_welcomesection',
	   'section'   => 'persist_lite_welsection2',
	   'label'     => __('Check To Show This Section','persist-lite'),
	   'type'      => 'checkbox'
	 ));//Show Welcome sections
	
	 
	 //Blog Posts Settings
	$wp_customize->add_panel( 'persist_lite_blogsettings_panel', array(
		'priority' => 3,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Blog Posts Settings', 'persist-lite' ),		
	) );
	
	$wp_customize->add_section('persist_lite_blogmeta_options',array(
		'title' => __('Blog Meta Options','persist-lite'),			
		'priority' => null,
		'panel' => 	'persist_lite_blogsettings_panel', 	         
	));		
	
	$wp_customize->add_setting('persist_lite_hide_blogdate',array(
		'sanitize_callback' => 'persist_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'persist_lite_hide_blogdate', array(
    	'label' => __('Check to hide post date','persist-lite'),	
		'section'   => 'persist_lite_blogmeta_options', 
		'setting' => 'persist_lite_hide_blogdate',		
    	'type'      => 'checkbox'
     )); //Blog Post Date
	 
	 
	 $wp_customize->add_setting('persist_lite_hide_postcats',array(
		'sanitize_callback' => 'persist_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'persist_lite_hide_postcats', array(
		'label' => __('Check to hide post category','persist-lite'),	
    	'section'   => 'persist_lite_blogmeta_options',		
		'setting' => 'persist_lite_hide_postcats',		
    	'type'      => 'checkbox'
     )); //blog Posts category	 
	 
	 
	 $wp_customize->add_section('persist_lite_postfeatured_image',array(
		'title' => __('Posts Featured image','persist-lite'),			
		'priority' => null,
		'panel' => 	'persist_lite_blogsettings_panel', 	         
	));		
	
	$wp_customize->add_setting('persist_lite_hide_postfeatured_image',array(
		'sanitize_callback' => 'persist_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'persist_lite_hide_postfeatured_image', array(
		'label' => __('Check to hide post featured image','persist-lite'),
    	'section'   => 'persist_lite_postfeatured_image',		
		'setting' => 'persist_lite_hide_postfeatured_image',	
    	'type'      => 'checkbox'
     )); //Posts featured image
	
	$wp_customize->add_section('persist_lite_blogpost_content_settings',array(
		'title' => __('Posts Excerpt Options','persist-lite'),			
		'priority' => null,
		'panel' => 	'persist_lite_blogsettings_panel', 	         
	 ));	 
	 
	$wp_customize->add_setting( 'persist_lite_blogexcerptrange', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'persist_lite_sanitize_excerptrange',		
	) );
	
	$wp_customize->add_control( 'persist_lite_blogexcerptrange', array(
		'label'       => __( 'Excerpt length','persist-lite' ),
		'section'     => 'persist_lite_blogpost_content_settings',
		'type'        => 'range',
		'settings'    => 'persist_lite_blogexcerptrange','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('persist_lite_blogfullcontent',array(
        'default' => 'Excerpt',     
        'sanitize_callback' => 'persist_lite_sanitize_choices'
	));
	
	$wp_customize->add_control('persist_lite_blogfullcontent',array(
        'type' => 'select',
        'label' => __('Posts Content','persist-lite'),
        'section' => 'persist_lite_blogpost_content_settings',
        'choices' => array(
        	'Content' => __('Content','persist-lite'),
            'Excerpt' => __('Excerpt','persist-lite'),
            'No Content' => __('No Excerpt','persist-lite')
        ),
	) ); 
	
	
	$wp_customize->add_section('persist_lite_postsinglemeta',array(
		'title' => __('Posts Single Settings','persist-lite'),			
		'priority' => null,
		'panel' => 	'persist_lite_blogsettings_panel', 	         
	));	
	
	$wp_customize->add_setting('persist_lite_hide_postdate_fromsingle',array(
		'sanitize_callback' => 'persist_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'persist_lite_hide_postdate_fromsingle', array(
    	'label' => __('Check to hide post date from single','persist-lite'),	
		'section'   => 'persist_lite_postsinglemeta', 
		'setting' => 'persist_lite_hide_postdate_fromsingle',		
    	'type'      => 'checkbox'
     )); //Hide Posts date from single
	 
	 
	 $wp_customize->add_setting('persist_lite_hide_postcats_fromsingle',array(
		'sanitize_callback' => 'persist_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'persist_lite_hide_postcats_fromsingle', array(
		'label' => __('Check to hide post category from single','persist-lite'),	
    	'section'   => 'persist_lite_postsinglemeta',		
		'setting' => 'persist_lite_hide_postcats_fromsingle',		
    	'type'      => 'checkbox'
     )); //Hide blogposts category single
		 
}
add_action( 'customize_register', 'persist_lite_customize_register' );

function persist_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a,
        #sidebar ul li a:hover,
		#sidebar ol li a:hover,	
		.left-column-45 h4,						
        .DefaultPostList h3 a:hover,
		.site-footer ul li a:hover, 
		.site-footer ul li.current_page_item a,				
        .postmeta a:hover,
        .button:hover,
		h2.services_title span,			
		.blog-postmeta a:hover,
		.blog-postmeta a:focus,
		blockquote::before	
            { color:<?php echo esc_html( get_theme_mod('persist_lite_colorscheme','#096bd8')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,
        .nivo-controlNav a.active,
		.sd-search input, .sd-top-bar-nav .sd-search input,			
		a.blogreadmore,
		a.appontmentbtn:hover,	
		a.ReadMoreBtn:hover,
		.copyrigh-wrapper:before,										
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,		
		.morebutton,
		.nivo-directionNav a:hover,	
		.nivo-caption .slidermorebtn	
            { background-color:<?php echo esc_html( get_theme_mod('persist_lite_colorscheme','#096bd8')); ?>;}
			

		
		.tagcloud a:hover,
		.logo::after,
		.logo,
		blockquote
            { border-color:<?php echo esc_html( get_theme_mod('persist_lite_colorscheme','#096bd8')); ?>;}
			
		#SiteWrapper a:focus,
		input[type="date"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="button"]:focus,
		input[type="month"]:focus,
		button:focus,
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="range"]:focus,		
		input[type="password"]:focus,
		input[type="datetime"]:focus,
		input[type="week"]:focus,
		input[type="submit"]:focus,
		input[type="datetime-local"]:focus,		
		input[type="url"]:focus,
		input[type="time"]:focus,
		input[type="reset"]:focus,
		input[type="color"]:focus,
		textarea:focus
            { outline:1px solid <?php echo esc_html( get_theme_mod('persist_lite_colorscheme','#096bd8')); ?>;}	
			
		a.ReadMoreBtn,
		a.appontmentbtn,
		.nivo-caption .slidermorebtn:hover 			
            { background-color:<?php echo esc_html( get_theme_mod('persist_lite_secondcolor','#134d8d')); ?>;}
			
		.site-footer h2::before,
		.site-footer h3::before,
		.site-footer h4::before,
		.site-footer h5::before
            { border-color:<?php echo esc_html( get_theme_mod('persist_lite_secondcolor','#134d8d')); ?>;}			
			
		
		.site-navi a,
		.site-navi ul li.current_page_parent ul.sub-menu li a,
		.site-navi ul li.current_page_parent ul.sub-menu li.current_page_item ul.sub-menu li a,
		.site-navi ul li.current-menu-ancestor ul.sub-menu li.current-menu-item ul.sub-menu li a  			
            { color:<?php echo esc_html( get_theme_mod('persist_lite_hdrmenu','#333333')); ?>;}	
			
		
		.site-navi ul.nav-menu .current_page_item > a,
		.site-navi ul.nav-menu .current-menu-item > a,
		.site-navi ul.nav-menu .current_page_ancestor > a,
		.site-navi ul.nav-menu .current-menu-ancestor > a, 
		.site-navi .nav-menu a:hover,
		.site-navi .nav-menu a:focus,
		.site-navi .nav-menu ul a:hover,
		.site-navi .nav-menu ul a:focus,
		.site-navi ul li a:hover, 
		.site-navi ul li.current-menu-item a,			
		.site-navi ul li.current_page_parent ul.sub-menu li.current-menu-item a,
		.site-navi ul li.current_page_parent ul.sub-menu li a:hover,
		.site-navi ul li.current-menu-item ul.sub-menu li a:hover,
		.site-navi ul li.current-menu-ancestor ul.sub-menu li.current-menu-item ul.sub-menu li a:hover 		 			
            { color:<?php echo esc_html( get_theme_mod('persist_lite_hdrmenuactive','#096bd8')); ?>;}
			
		.hdrtopcart .cart-count
            { background-color:<?php echo esc_html( get_theme_mod('persist_lite_hdrmenuactive','#096bd8')); ?>;}		
			
		#SiteWrapper .site-navi a:focus		 			
            { outline:1px solid <?php echo esc_html( get_theme_mod('persist_lite_hdrmenuactive','#096bd8')); ?>;}	
	
    </style> 
<?php                       
}
         
add_action('wp_head','persist_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function persist_lite_customize_preview_js() {
	wp_enqueue_script( 'persist_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '19062019', true );
}
add_action( 'customize_preview_init', 'persist_lite_customize_preview_js' );