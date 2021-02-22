<?php
/**
 * theRevisedCafe Theme Customizer
 *
 * @package theRevisedCafe
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function therevisedcafe_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'therevisedcafe_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'therevisedcafe_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'therevisedcafe_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function therevisedcafe_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function therevisedcafe_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function therevisedcafe_customize_preview_js() {
	wp_enqueue_script( 'therevisedcafe-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'therevisedcafe_customize_preview_js' );


Kirki::add_config( 'theme_config_id', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );


Kirki::add_panel( 'homepage_settings_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Homepage Settings', 'kirki' ),
    'description' => esc_html__( 'Settings for Restro Homepage', 'kirki' ),
) );
//slider Section

Kirki::add_section( 'slider_section', array(
    'title'          => esc_html__( 'Slider Section', 'kirki' ),
    'description'    => esc_html__( 'Slider section.', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Slider Section', 'kirki' ),
	'section'     => 'slider_section',
	'priority'    => 100,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Slider', 'kirki' ),
	],
	'button_label' => esc_html__('Add new Slider', 'kirki' ),
	'settings'     => 'slider_repeater',
	'fields' => [
		'slider_image' => [
			'type'        => 'image',
			'label'       => esc_html__( 'Slider Image', 'kirki' ),
			'description' => esc_html__( 'This will be the label for your link', 'kirki' ),
			'default'     => '',
		],
		'slider_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Slider Title', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
		'slider_sub_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Slider Sub Title', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
		'slider_desc'  => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Slider Description', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
		'slider_url'  => [
			'type'        => 'url',
			'label'       => esc_html__( 'Slider Url', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
		'slider_button'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Slider Button Name', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
	]
] );

// About section

Kirki::add_section( 'about_section', array(
    'title'          => esc_html__( 'About Section', 'kirki' ),
    'description'    => esc_html__( 'Homepage about section.', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'theme_config_id', [
	'type'     => 'text',
	'settings' => 'about_header',
	'label'    => esc_html__( 'About Header', 'kirki' ),
	'section'  => 'about_section',
	'default'  => esc_html__( 'Discover', 'kirki' ),
	'priority' => 10,
] );

Kirki::add_field( 'theme_config_id', [
	'type'     => 'text',
	'settings' => 'about_subheader',
	'label'    => esc_html__( 'About SubHeader', 'kirki' ),
	'section'  => 'about_section',
	'default'  => esc_html__( 'About us', 'kirki' ),
	'priority' => 10,
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'editor',
	'settings'    => 'about_editor',
	'label'       => esc_html__( 'About Description', 'kirki' ),
	'description' => esc_html__( 'About homepage description', 'kirki' ),
	'section'     => 'about_section',
	'default'     => '',
] );

//Counter Section

Kirki::add_section( 'counter_section', array(
    'title'          => esc_html__( 'Counter Section', 'kirki' ),
    'description'    => esc_html__( 'Homepage about section.', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Counter Items', 'kirki' ),
	'section'     => 'counter_section',
	'priority'    => 100,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Counter Details', 'kirki' ),
	],
	'button_label' => esc_html__('Add New Counter Item', 'kirki' ),
	'settings'     => 'counter_repeater',
	'fields' => [
		'counter_item' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Counter Item', 'kirki' ),
			'description' => esc_html__( 'This will be the label for your link', 'kirki' ),
			'default'     => '',
		],
		'counter_number'  => [
			'type'        => 'number',
			'label'       => esc_html__( 'Counter Number', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
		'counter_sub-item'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Counter Sub Item', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
		
	
	]
] );

// Discover section
Kirki::add_section( 'discover_section', array(
    'title'          => esc_html__( 'Reservation Title Section', 'kirki' ),
    'description'    => esc_html__( 'Reservation Title Section.', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'theme_config_id', [
	'type'     => 'text',
	'settings' => 'discover_menu_header',
	'label'    => esc_html__( 'Discover Header', 'kirki' ),
	'section'  => 'discover_section',
	'default'  => esc_html__( 'Discover', 'kirki' ),
	'priority' => 10,
] );

Kirki::add_field( 'theme_config_id', [
	'type'     => 'text',
	'settings' => 'discover_menu_subheader',
	'label'    => esc_html__( 'Discover Menu Sub Header', 'kirki' ),
	'section'  => 'discover_section',
	'default'  => esc_html__( 'Our Menu', 'kirki' ),
	'priority' => 10,
] );

Kirki::add_section( 'reservation_title', array(
    'title'          => esc_html__( 'Reservation Title Section', 'kirki' ),
    'description'    => esc_html__( 'Reservation Title Section.', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );


Kirki::add_field( 'theme_config_id', [
	'type'     => 'text',
	'settings' => 'reservation_title',
	'label'    => esc_html__( 'Reservation Section', 'kirki' ),
	'section'  => 'reservation_title',
	'default'  => esc_html__( 'Make a Reservation', 'kirki' ),
	'priority' => 10,
] );

Kirki::add_section( 'reservation_desc', array(
    'title'          => esc_html__( 'Reservation Description Section', 'kirki' ),
    'description'    => esc_html__( 'Reservation Description Section.', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'editor',
	'settings'    => 'reservation_desc',
	'label'       => esc_html__( 'Reservation Description', 'kirki' ),
	'description' => esc_html__( 'Reservation Description ', 'kirki' ),
	'section'     => 'reservation_desc',
	'default'     => '',
] );
//gallery section

Kirki::add_section( 'gallery_title', array(
    'title'          => esc_html__( 'Gallery  Section', 'kirki' ),
    'description'    => esc_html__( 'Gallery  Section', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'gallery_title',
	'label'       => esc_html__( 'Gallery Title', 'kirki' ),
	'description' => esc_html__( 'Gallery', 'kirki' ),
	'section'     => 'gallery_title',
	'default'     => '',
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Gallery Section', 'kirki' ),
	'section'     => 'gallery_title',
	'priority'    => 100,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Gallery Image', 'kirki' ),
	],
	'button_label' => esc_html__('Add new Gallery Image', 'kirki' ),
	'settings'     => 'gallery_repeater',
	'fields' => [
		'gallery_image' => [
			'type'        => 'image',
			'label'       => esc_html__( 'Gallery Image', 'kirki' ),
			'description' => esc_html__( 'This will be the label for your link', 'kirki' ),
			'default'     => '',
		],
		
	]
] );

//Testimonials Section
Kirki::add_section( 'testimonials_section', array(
    'title'          => esc_html__( 'Testimonials Section', 'kirki' ),
    'description'    => esc_html__( 'Testimonials Section', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'testimonials_section',
	'label'       => esc_html__( 'Testimonials', 'kirki' ),
	'description' => esc_html__( 'Testimonials Title', 'kirki' ),
	'section'     => 'testimonials_section',
	'default'     => '',
] );

Kirki::add_section( 'testimonials_sub_title', array(
    'title'          => esc_html__( 'Testimonials Sub Title Section', 'kirki' ),
    'description'    => esc_html__( 'Testimonials Sub Title Section', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'testimonials_sub_title',
	'label'       => esc_html__( 'Testimonials Sub Title Secion', 'kirki' ),
	'description' => esc_html__( 'What Ours Customers Says', 'kirki' ),
	'section'     => 'testimonials_section',
	'default'     => '',
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Client Testimonials', 'kirki' ),
	'section'     => 'testimonials_section',
	'priority'    => 100,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Testimonial', 'kirki' ),
	],
	'button_label' => esc_html__('Add new testimonial', 'kirki' ),
	'settings'     => 'testimonials_repeater',
	'fields' => [
		'client_name' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Client Name', 'kirki' ),
			'description' => esc_html__( 'This will be the label for your link', 'kirki' ),
			'default'     => '',
		],
		'client_testimonial'  => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Client Testimonial', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
	]
] );

//Team Members
Kirki::add_section( 'team_section', array(
    'title'          => esc_html__( 'Team Section', 'kirki' ),
    'description'    => esc_html__( 'Team Section', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'team_section',
	'label'       => esc_html__( 'Professionals Teams', 'kirki' ),
	'description' => esc_html__( 'Professionals Teams', 'kirki' ),
	'section'     => 'team_section',
	'default'     => '',
] );

Kirki::add_section( 'members_section', array(
    'title'          => esc_html__( 'Members Section', 'kirki' ),
    'description'    => esc_html__( 'Members Section', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'members_section',
	'label'       => esc_html__( 'Members', 'kirki' ),
	'description' => esc_html__( 'Our Members', 'kirki' ),
	'section'     => 'team_section',
	'default'     => '',
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Client Testimonials', 'kirki' ),
	'section'     => 'team_section',
	'priority'    => 100,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Team Details', 'kirki' ),
	],
	'button_label' => esc_html__('Add New Team Details', 'kirki' ),
	'settings'     => 'team_repeater',
	'fields' => [
		'team_image' => [
			'type'        => 'image',
			'label'       => esc_html__( 'Team Image', 'kirki' ),
			'description' => esc_html__( 'This will be the label for your link', 'kirki' ),
			'default'     => '',
		],
		'team_name'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Team Name', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
		'team_role'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Team Role', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
		'team_facebook'  => [
			'type'        => 'url',
			'label'       => esc_html__( 'Facebook Link', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
		'team_twitter'  => [
			'type'        => 'url',
			'label'       => esc_html__( 'Twitter Link', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
		'team_instagram'  => [
			'type'        => 'url',
			'label'       => esc_html__( 'Instagram Link', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
	]
] );


//Contact Section

Kirki::add_section( 'contact_section', array(
    'title'          => esc_html__( 'Contact Section', 'kirki' ),
    'description'    => esc_html__( 'Contact Section', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'contact_section',
	'label'       => esc_html__( 'Get In Touch', 'kirki' ),
	'description' => esc_html__( 'Get In Touch', 'kirki' ),
	'section'     => 'contact_section',
	'default'     => '',
] );

Kirki::add_section( 'contact_desc', array(
    'title'          => esc_html__( 'Contact Details', 'kirki' ),
    'description'    => esc_html__( 'Contact Details', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'contact_desc',
	'label'       => esc_html__( 'Contact Details', 'kirki' ),
	'description' => esc_html__( 'Contact Details', 'kirki' ),
	'section'     => 'contact_section',
	'default'     => '',
] );

//Google Map

Kirki::add_section( 'google_map', array(
    'title'          => esc_html__( 'Google Map', 'kirki' ),
    'description'    => esc_html__( 'Google map', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'link',
	'settings'    => 'google_map',
	'label'       => esc_html__( 'Google Map Link', 'kirki' ),
	'description' => esc_html__( 'Google Map Link', 'kirki' ),
	'section'     => 'google_map',
	'default'     => '',
] );
//office Address
Kirki::add_section( 'office_details', array(
    'title'          => esc_html__( 'Office Details', 'kirki' ),
    'description'    => esc_html__( 'Office Details', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'office_details',
	'label'       => esc_html__( 'Office Details', 'kirki' ),
	'description' => esc_html__( 'Office Details', 'kirki' ),
	'section'     => 'office_details',
	'default'     => '',
] );

Kirki::add_section( 'phone_no', array(
    'title'          => esc_html__( 'Phone Number', 'kirki' ),
    'description'    => esc_html__( 'Phone Number', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'phone_no',
	'label'       => esc_html__( 'Phone Number', 'kirki' ),
	'description' => esc_html__( 'Phone Number', 'kirki' ),
	'section'     => 'office_details',
	'default'     => '',
] );

Kirki::add_section( 'email', array(
    'title'          => esc_html__( 'Email ', 'kirki' ),
    'description'    => esc_html__( 'Email ', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'email',
	'label'       => esc_html__( 'Email ', 'kirki' ),
	'description' => esc_html__( 'Email ', 'kirki' ),
	'section'     => 'office_details',
	'default'     => '',
] );

Kirki::add_section( 'location', array(
    'title'          => esc_html__( 'Location ', 'kirki' ),
    'description'    => esc_html__( 'Location ', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'location',
	'label'       => esc_html__( 'Location ', 'kirki' ),
	'description' => esc_html__( 'Location ', 'kirki' ),
	'section'     => 'office_details',
	'default'     => '',
] );

//Opening Hours

Kirki::add_section( 'opening_hours', array(
    'title'          => esc_html__( 'Opening Hours', 'kirki' ),
    'description'    => esc_html__( 'Opening Hours', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'text',
	'settings'    => 'opening_hours',
	'label'       => esc_html__( 'Opening Hours', 'kirki' ),
	'description' => esc_html__( 'Opening Hours', 'kirki' ),
	'section'     => 'opening_hours',
	'default'     => '',
] );

Kirki::add_section( 'daysTime', array(
    'title'          => esc_html__( 'Opening Days and Time', 'kirki' ),
    'description'    => esc_html__( 'Opening Days and Time', 'kirki' ),
    'panel'          => 'homepage_settings_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'editor',
	'settings'    => 'daysTime',
	'label'       => esc_html__( 'Opening Days and Time', 'kirki' ),
	'description' => esc_html__( 'Opening Days and Time', 'kirki' ),
	'section'     => 'opening_hours',
	'default'     => '',
] );


//Background Image




Kirki::add_field( 'theme_config_id', [
	'type'        => 'image',
	'settings'    => 'image_setting_url',
	'label'       => esc_html__( 'Background Image)', 'kirki' ),
	'description' => esc_html__( 'Description Here.', 'kirki' ),
	'section'     => 'testimonials_section',
	'default'     => '',
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'image',
	'settings'    => 'counter_bg_image',
	'label'       => esc_html__( 'Background Image', 'kirki' ),
	'description' => esc_html__( 'Description Here.', 'kirki' ),
	'section'     => 'counter_section',
	'default'     => '',
] );
//about Section Image
Kirki::add_field( 'theme_config_id', [
	'type'        => 'image',
	'settings'    => 'about_image',
	'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
	'description' => esc_html__( 'Description Here.', 'kirki' ),
	'section'     => 'about_section',
	'default'     => '',
] );

