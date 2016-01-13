<?php
/**
 * General Settings
 *
 * Register General section, settings and controls for Theme Customizer
 *
 * @package Beetle
 */


/**
 * Adds all general settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object
 */
function beetle_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options
	$wp_customize->add_section( 'beetle_section_layout', array(
        'title'    => esc_html__( 'Layout Settings', 'beetle' ),
        'priority' => 10,
		'panel' => 'beetle_options_panel' 
		)
	);
	
	// Add Settings and Controls for Layout
	$wp_customize->add_setting( 'beetle_theme_options[layout]', array(
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'beetle_sanitize_select'
		)
	);
    $wp_customize->add_control( 'beetle_theme_options[layout]', array(
        'label'    => esc_html__( 'Theme Layout', 'beetle' ),
        'section'  => 'beetle_section_layout',
        'settings' => 'beetle_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => esc_html__( 'Left Sidebar', 'beetle' ),
            'right-sidebar' => esc_html__( 'Right Sidebar', 'beetle' )
			)
		)
	);
	
	// Add Sticky Navigation Setting
	$wp_customize->add_setting( 'beetle_theme_options[sticky_nav_headline]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Beetle_Customize_Header_Control(
        $wp_customize, 'beetle_theme_options[sticky_nav_headline]', array(
            'label' => esc_html__( 'Sticky Navigation', 'beetle' ),
            'section' => 'beetle_section_layout',
            'settings' => 'beetle_theme_options[sticky_nav_headline]',
            'priority' => 2
            )
        )
    );
	$wp_customize->add_setting( 'beetle_theme_options[sticky_header]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'beetle_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'beetle_theme_options[sticky_header]', array(
        'label'    => esc_html__( 'Enable sticky header feature', 'beetle' ),
        'section'  => 'beetle_section_layout',
        'settings' => 'beetle_theme_options[sticky_header]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);
	
	
	// Add Post Layout Settings for archive posts
	$wp_customize->add_setting( 'beetle_theme_options[post_layout_archives]', array(
        'default'           => 'left',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'beetle_sanitize_select'
		)
	);
    $wp_customize->add_control( 'beetle_theme_options[post_layout_archives]', array(
        'label'    => esc_html__( 'Post Layout (archive pages)', 'beetle' ),
        'section'  => 'beetle_section_layout',
        'settings' => 'beetle_theme_options[post_layout_archives]',
        'type'     => 'select',
		'priority' => 4,
        'choices'  => array(
            'left' => esc_html__( 'Show featured image beside content', 'beetle' ),
            'top' => esc_html__( 'Show featured image above content', 'beetle' ),
			'none' => esc_html__( 'Hide featured image', 'beetle' )
			)
		)
	);
	
	// Add Post Layout Settings for single posts
	$wp_customize->add_setting( 'beetle_theme_options[post_layout_single]', array(
        'default'           => 'header',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'beetle_sanitize_select'
		)
	);
    $wp_customize->add_control( 'beetle_theme_options[post_layout_single]', array(
        'label'    => esc_html__( 'Post Layout (single post)', 'beetle' ),
        'section'  => 'beetle_section_layout',
        'settings' => 'beetle_theme_options[post_layout_single]',
        'type'     => 'select',
		'priority' => 5,
        'choices'  => array(
            'header' => esc_html__( 'Show featured image as header image', 'beetle' ),
            'top' => esc_html__( 'Show featured image above content', 'beetle' ),
			'none' => esc_html__( 'Hide featured image', 'beetle' )
			)
		)
	);

	
}
add_action( 'customize_register', 'beetle_customize_register_general_settings' );