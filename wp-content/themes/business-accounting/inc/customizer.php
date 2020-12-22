<?php
/**
 * Business Accounting: Customizer
 *
 * @subpackage Business Accounting
 * @since 1.0
 */

use WPTRT\Customize\Section\Business_Accounting_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Business_Accounting_Button::class );

	$manager->add_section(
		new Business_Accounting_Button( $manager, 'business_accounting_pro', [
			'title'      => __( 'Business Accounting Pro', 'business-accounting' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'business-accounting' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/accounting-wordpress-theme/', 'business-accounting')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'business-accounting-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'business-accounting-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function business_accounting_customize_register( $wp_customize ) {

	$wp_customize->add_setting('business_accounting_show_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'business_accounting_sanitize_checkbox'
    ));
    $wp_customize->add_control('business_accounting_show_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','business-accounting'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('business_accounting_show_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'business_accounting_sanitize_checkbox'
    ));
    $wp_customize->add_control('business_accounting_show_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Tagline','business-accounting'),
       'section' => 'title_tagline'
    ));

	$wp_customize->add_panel( 'business_accounting_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'business-accounting' ),
	    'description' => __( 'Description of what this panel does.', 'business-accounting' ),
	) );

	$wp_customize->add_section( 'business_accounting_theme_options_section', array(
    	'title'      => __( 'General Settings', 'business-accounting' ),
		'priority'   => 30,
		'panel' => 'business_accounting_panel_id'
	) );

	$wp_customize->add_setting('business_accounting_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'business_accounting_sanitize_choices'
	));
	$wp_customize->add_control('business_accounting_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','business-accounting'),
        'section' => 'business_accounting_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','business-accounting'),
            'Right Sidebar' => __('Right Sidebar','business-accounting'),
            'One Column' => __('One Column','business-accounting'),
            'Three Columns' => __('Three Columns','business-accounting'),
            'Four Columns' => __('Four Columns','business-accounting'),
            'Grid Layout' => __('Grid Layout','business-accounting')
        ),
	));

	//Header section
	$wp_customize->add_section( 'business_accounting_topbar_section' , array(
    	'title' => __( 'Topbar Section', 'business-accounting' ),
		'priority' => null,
		'panel' => 'business_accounting_panel_id'
	) );

	$wp_customize->add_setting('business_accounting_mail',array(
       	'default' => '',
       	'sanitize_callback'	=> 'business_accounting_sanitize_email'
	));
	$wp_customize->add_control('business_accounting_mail',array(
	   	'type' => 'text',
	   	'label' => __('Add Email Address','business-accounting'),
	   	'section' => 'business_accounting_topbar_section',
	));

	$wp_customize->add_setting('business_accounting_call',array(
       	'default' => '',
       	'sanitize_callback'	=> 'business_accounting_sanitize_phone_number'
	));
	$wp_customize->add_control('business_accounting_call',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','business-accounting'),
	   	'section' => 'business_accounting_topbar_section',
	));

	$wp_customize->add_setting('business_accounting_facebook_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('business_accounting_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','business-accounting'),
	   	'section' => 'business_accounting_topbar_section',
	));

	$wp_customize->add_setting('business_accounting_twitter_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('business_accounting_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','business-accounting'),
	   	'section' => 'business_accounting_topbar_section',
	));

	$wp_customize->add_setting('business_accounting_linkedin_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('business_accounting_linkedin_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Linkedin URL','business-accounting'),
	   	'section' => 'business_accounting_topbar_section',
	));

	$wp_customize->add_setting('business_accounting_rss_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('business_accounting_rss_url',array(
	   	'type' => 'url',
	   	'label' => __('Add RSS URL','business-accounting'),
	   	'section' => 'business_accounting_topbar_section',
	));

	$wp_customize->add_setting('business_accounting_youtube_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('business_accounting_youtube_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Youtube URL','business-accounting'),
	   	'section' => 'business_accounting_topbar_section',
	));

	//home page slider
	$wp_customize->add_section( 'business_accounting_banner_section' , array(
    	'title'      => __( 'Banner Settings', 'business-accounting' ),
		'priority'   => null,
		'panel' => 'business_accounting_panel_id'
	) );

	$wp_customize->add_setting('business_accounting_banner_hide_show',array(
       	'default' => false,
       	'sanitize_callback'	=> 'business_accounting_sanitize_checkbox'
	));
	$wp_customize->add_control('business_accounting_banner_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Banner','business-accounting'),
	   	'section' => 'business_accounting_banner_section',
	));

	$wp_customize->add_setting('business_accounting_slider_small_title',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('business_accounting_slider_small_title',array(
	   	'type' => 'text',
	   	'label' => __('Slider Small Title','business-accounting'),
	   	'section' => 'business_accounting_banner_section',
	));

	$wp_customize->add_setting( 'business_accounting_slider', array(
		'default'           => '',
		'sanitize_callback' => 'business_accounting_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'business_accounting_slider', array(
		'label' => __('Select Banner Image Page', 'business-accounting' ),
   		'description' => __('Image Size (625px x 450px)','business-accounting'),
		'section' => 'business_accounting_banner_section',
		'type' => 'dropdown-pages'
	) );

	//Our Courses Section
	$wp_customize->add_section('business_accounting_our_features',array(
		'title'	=> __('Our Features','business-accounting'),
		'description'=> __('This section will appear below the slider.','business-accounting'),
		'panel' => 'business_accounting_panel_id',
	));

	$wp_customize->add_setting('business_accounting_features_heading',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('business_accounting_features_heading',array(
	   	'type' => 'text',
	   	'label' => __('Add Section Heading','business-accounting'),
	   	'section' => 'business_accounting_our_features',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('business_accounting_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'business_accounting_sanitize_choices',
	));
	$wp_customize->add_control('business_accounting_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','business-accounting'),
		'section' => 'business_accounting_our_features',
	));

	//Footer
    $wp_customize->add_section( 'business_accounting_footer', array(
    	'title'  => __( 'Footer Text', 'business-accounting' ),
		'priority' => null,
		'panel' => 'business_accounting_panel_id'
	) );

    $wp_customize->add_setting('business_accounting_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('business_accounting_footer_copy',array(
		'label'	=> __('Footer Text','business-accounting'),
		'section' => 'business_accounting_footer',
		'setting' => 'business_accounting_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'business_accounting_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'business_accounting_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'business_accounting_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'business_accounting_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'business-accounting' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'business-accounting' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'business_accounting_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'business_accounting_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'business_accounting_customize_register' );

function business_accounting_customize_partial_blogname() {
	bloginfo( 'name' );
}

function business_accounting_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function business_accounting_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function business_accounting_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}