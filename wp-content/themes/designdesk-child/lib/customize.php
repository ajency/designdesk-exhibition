<?php

/**
 * Genesis Sample.
 *
 * This file adds the Customizer additions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

add_action('customize_register', 'genesis_sample_customizer_register');
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 2.2.3
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function genesis_sample_customizer_register($wp_customize)
{

	$appearance = genesis_get_config('appearance');

	//Topbar section
	$wp_customize->add_section('dd_topbar', array(
		'title'	=>	'Topbar'
	));

	//checkbox
	function mytheme_checkbox_sanitization($input)
	{
		if (true === $input) {
			return 1;
		} else {
			return 0;
		}
	}
	$wp_customize->add_setting(
		'dd_topbar_checkbox',
		array(
			'default' => 1,
			'transport' => 'refresh',
			'sanitize_callback' => 'mytheme_checkbox_sanitization'
		)
	);

	$wp_customize->add_control(
		'dd_topbar_checkbox',
		array(
			'label'	=> esc_html__('Click to enable or disable the topbar.'),
			'section'  => 'dd_topbar',
			'type' => 'checkbox'
		)
	);

	//email ID
	$wp_customize->add_setting(
		'dd_topbar_email',
		[
			'sanitize_callback' => 'sanitize_email',
		]
	);
	$wp_customize->add_control(
		'dd_topbar_email_controls',
		[
			'label'       => __('Email ID', 'designdesk-child'),
			'section'     => 'dd_topbar',
			'settings'    => 'dd_topbar_email',
			'type' => 'text'
		]
	);

	//social links | start
	$wp_customize->add_setting(
		'dd_social_link_1',
		[
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		]
	);
	$wp_customize->add_control(
		'dd_topbar_link_controls_1',
		[
			'label'       => __('Youtube', 'designdesk-child'),
			'section'     => 'dd_topbar',
			'settings'    => 'dd_social_link_1',
			'type' => 'text'
		]
	);

	$wp_customize->add_setting(
		'dd_social_link_2',
		[
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		]
	);
	$wp_customize->add_control(
		'dd_topbar_link_controls_2',
		[
			'label'       => __('Twitter', 'designdesk-child'),
			'section'     => 'dd_topbar',
			'settings'    => 'dd_social_link_2',
			'type' => 'text'
		]
	);

	$wp_customize->add_setting(
		'dd_social_link_3',
		[
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		]
	);
	$wp_customize->add_control(
		'dd_topbar_link_controls_3',
		[
			'label'       => __('Facebook', 'designdesk-child'),
			'section'     => 'dd_topbar',
			'settings'    => 'dd_social_link_3',
			'type' => 'text'
		]
	);

	$wp_customize->add_setting(
		'dd_social_link_4',
		[
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		]
	);
	$wp_customize->add_control(
		'dd_topbar_link_controls_4',
		[
			'label'       => __('Instagram', 'designdesk-child'),
			'section'		=> 'dd_topbar',
			'settings'    => 'dd_social_link_4',
			'type' => 'text'
		]
	);

	$wp_customize->add_setting(
		'dd_social_link_5',
		[
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		]
	);
	$wp_customize->add_control(
		'dd_topbar_link_controls_5',
		[
			'label'       => __('LinkedIn', 'designdesk-child'),
			'section'		=> 'dd_topbar',
			'settings'    => 'dd_social_link_5',
			'type' => 'text'
		]
	);
	//social link  | end

	$wp_customize->add_setting(
		'genesis_sample_link_color',
		[
			'default'           => $appearance['default-colors']['link'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_link_color',
			[
				'description' => __('Change the color of post info links and button blocks, the hover color of linked titles and menu items, and more.', 'designdesk-child'),
				'label'       => __('Link Color', 'designdesk-child'),
				'section'     => 'colors',
				'settings'    => 'genesis_sample_link_color',
			]
		)
	);

	$wp_customize->add_setting(
		'genesis_sample_accent_color',
		[
			'default'           => $appearance['default-colors']['accent'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_accent_color',
			[
				'description' => __('Change the default hover color for button links, menu buttons, and submit buttons. The button block uses the Link Color.', 'designdesk-child'),
				'label'       => __('Accent Color', 'designdesk-child'),
				'section'     => 'colors',
				'settings'    => 'genesis_sample_accent_color',
			]
		)
	);

	$wp_customize->add_setting(
		'genesis_sample_logo_width',
		[
			'default'           => 350,
			'sanitize_callback' => 'absint',
			'validate_callback' => 'genesis_sample_validate_logo_width',
		]
	);

	// Add a control for the logo size.
	$wp_customize->add_control(
		'genesis_sample_logo_width',
		[
			'label'       => __('Logo Width', 'designdesk-child'),
			'description' => __('The maximum width of the logo in pixels.', 'designdesk-child'),
			'priority'    => 9,
			'section'     => 'title_tagline',
			'settings'    => 'genesis_sample_logo_width',
			'type'        => 'number',
			'input_attrs' => [
				'min' => 100,
			],

		]
	);
	$wp_customize->add_setting(
		'dd_mobile_logo',
		[
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		]
	);

	// Add a control for the logo size.
	$wp_customize->add_control(
		'dd_mobile_logo',
		[
			'label'       => __('Mobile Logo', 'designdesk-child'),
			'description' => __('Add mobile logo image link.', 'designdesk-child'),
			'section'     => 'title_tagline',
			'type'        => 'text'

		]
	);
}

/**
 * Displays a message if the entered width is not numeric or greater than 100.
 *
 * @param object $validity The validity status.
 * @param int    $width The width entered by the user.
 * @return int The new width.
 */
function genesis_sample_validate_logo_width($validity, $width)
{

	if (empty($width) || !is_numeric($width)) {
		$validity->add('required', __('You must supply a valid number.', 'designdesk-child'));
	} elseif ($width < 100) {
		$validity->add('logo_too_small', __('The logo width cannot be less than 100.', 'designdesk-child'));
	}

	return $validity;
}
