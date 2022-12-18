<?php 

	$lz_computer_repair_custom_style = '';

	// Logo Size
	$lz_computer_repair_logo_top_padding = get_theme_mod('lz_computer_repair_logo_top_padding');
	$lz_computer_repair_logo_bottom_padding = get_theme_mod('lz_computer_repair_logo_bottom_padding');
	$lz_computer_repair_logo_left_padding = get_theme_mod('lz_computer_repair_logo_left_padding');
	$lz_computer_repair_logo_right_padding = get_theme_mod('lz_computer_repair_logo_right_padding');

	if( $lz_computer_repair_logo_top_padding != '' || $lz_computer_repair_logo_bottom_padding != '' || $lz_computer_repair_logo_left_padding != '' || $lz_computer_repair_logo_right_padding != ''){
		$lz_computer_repair_custom_style .=' .logo {';
			$lz_computer_repair_custom_style .=' padding-top: '.esc_attr($lz_computer_repair_logo_top_padding).'px; padding-bottom: '.esc_attr($lz_computer_repair_logo_bottom_padding).'px; padding-left: '.esc_attr($lz_computer_repair_logo_left_padding).'px; padding-right: '.esc_attr($lz_computer_repair_logo_right_padding).'px;';
		$lz_computer_repair_custom_style .=' }';
	}

	// service section padding
	$lz_computer_repair_service_section_padding = get_theme_mod('lz_computer_repair_service_section_padding');

	if( $lz_computer_repair_service_section_padding != ''){
		$lz_computer_repair_custom_style .=' #our_services {';
			$lz_computer_repair_custom_style .=' padding-top: '.esc_attr($lz_computer_repair_service_section_padding).'px; padding-bottom: '.esc_attr($lz_computer_repair_service_section_padding).'px;';
		$lz_computer_repair_custom_style .=' }';
	}

	// Site Title Font Size
	$lz_computer_repair_site_title_font_size = get_theme_mod('lz_computer_repair_site_title_font_size');
	if( $lz_computer_repair_site_title_font_size != ''){
		$lz_computer_repair_custom_style .=' .logo h1.site-title, .logo p.site-title {';
			$lz_computer_repair_custom_style .=' font-size: '.esc_attr($lz_computer_repair_site_title_font_size).'px;';
		$lz_computer_repair_custom_style .=' }';
	}

	// Site Tagline Font Size
	$lz_computer_repair_site_tagline_font_size = get_theme_mod('lz_computer_repair_site_tagline_font_size');
	if( $lz_computer_repair_site_tagline_font_size != ''){
		$lz_computer_repair_custom_style .=' .logo p.site-description {';
			$lz_computer_repair_custom_style .=' font-size: '.esc_attr($lz_computer_repair_site_tagline_font_size).'px;';
		$lz_computer_repair_custom_style .=' }';
	}

	// Copyright padding
	$lz_computer_repair_copyright_padding = get_theme_mod('lz_computer_repair_copyright_padding');

	if( $lz_computer_repair_copyright_padding != ''){
		$lz_computer_repair_custom_style .=' .site-info {';
			$lz_computer_repair_custom_style .=' padding-top: '.esc_attr($lz_computer_repair_copyright_padding).'px; padding-bottom: '.esc_attr($lz_computer_repair_copyright_padding).'px;';
		$lz_computer_repair_custom_style .=' }';
	}

	$lz_computer_repair_slider_hide_show = get_theme_mod('lz_computer_repair_slider_hide_show',false);
	if( $lz_computer_repair_slider_hide_show == true){
		$lz_computer_repair_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$lz_computer_repair_custom_style .=' display:none;';
		$lz_computer_repair_custom_style .=' }';
	}