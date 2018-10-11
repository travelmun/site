<?php
/**
 * Andorra functions and definitions
 *
 * @package Andorra
*/

function andorra_customize_register($wp_customize){

	
	class Andorra_WP_Customize_Info_Control extends WP_Customize_Control {
		public $type = 'info';
	
		public function render_content() {
			?>
				<strong> <?php esc_html_e('If you like our work. Buy us a coffee.','andorra'); ?></strong>
                <div class="donate">
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="T5VCDMLPPLBBS">
						<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
				</div>
				<p class="btn">
					<a class="button button-primary" target="_blank" href="http://vmthemes.com/support/"><?php esc_html_e('Theme Support','andorra') ?></a><br><br>
					<a class="button button-primary" target="_blank" href="http://vmthemes.com/preview/andorra/"><?php esc_html_e('View Theme Demo','andorra') ?></a><br><br>
					<a class="button button-primary" target="_blank" href="http://vmthemes.com/andorra/#theme-pricing"><?php  esc_html_e('Upgrade to Pro','andorra') ?></a>
				</p>
        	<?php	
		}
	}
    
	// Google Fonts
	$google_fonts = array(
		__('Open Sans','andorra')	=> __('Open Sans','andorra'),
	);
						
	// Opacity
	$opacity = array(
		'1' => '1',
		'0.9'	=> '0.9',
		'0.8'	=> '0.8',
		'0.7'	=> '0.7',
		'0.6'	=> '0.6',
		'0.5'	=> '0.5',
		'0.4'	=> '0.4',
		'0.3'	=> '0.3',
		'0.2'	=> '0.2',
		'0.1'	=> '0.1',
		'0'	=> '0',
	);
	
	// Sidebar Position
	$theme_layout = array('col1' => __('No Sidebars','andorra'), 'col2-l' => __('Right Sidebar','andorra'), 'col2-r' => __('Left Sidebar','andorra'));
	
	// Blog Content
	$blog_content = array('excerpt' => __('Excerpt','andorra'),'full' => __('Full Content','andorra'));
	
	// Post Navigation Links Location
	$post_nav_array = array(
		'disable' => __('Disable', 'andorra'),
		'sidebar' => __('Main Sidebar', 'andorra'),
		'below' => __('Below Content', 'andorra'),

	);
	
	// Post Info Location
	$post_info_array = array(
		'disable' => __('Disable', 'andorra'),
		'above' => __('Above Content', 'andorra'),

	);
	
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
		
	//  =============================
    //  = Theme Options Panel       =
    //  =============================
	$wp_customize->add_panel( 'andorra_theme_options', array(
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Andorra Theme Options', 'andorra' ),
	));
	
	//  =============================
    //  = 1. Theme Info Section     =
    //  =============================					
	$wp_customize->add_section( 'andorra_theme_settings', array(
    	'title'          => __( 'Theme Information', 'andorra' ),
    	'priority'       => 999, 
		'panel' => 'andorra_theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[theme_info]', array(
    	'default'        => '',
		'sanitize_callback' => 'sanitize_text_field',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new Andorra_WP_Customize_Info_Control($wp_customize, 'theme_info', array(
        'label'    => __(' ', 'andorra'),
        'section'  => 'andorra_theme_settings',
        'settings' => 'andorra_theme_options[theme_info]',
    )));

	//  =============================
    //  = 2. General Section        =
    //  =============================					
	$wp_customize->add_section( 'andorra_general_settings', array(
    	'title'          => __( 'General Settings', 'andorra' ),
    	'priority'       => 1000,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[theme_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'theme_color', array(
        'label'    => __('Theme Color', 'andorra'),
        'section'  => 'andorra_general_settings',
        'settings' => 'andorra_theme_options[theme_color]',
    )));
	//===============================    
	$wp_customize->add_setting('andorra_theme_options[breadcrumbs]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('breadcrumbs', array(
        'settings' => 'andorra_theme_options[breadcrumbs]',
        'label'    => __('Display Breadcrumbs', 'andorra'),
        'section'  => 'andorra_general_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[animation]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('animation', array(
        'settings' => 'andorra_theme_options[animation]',
        'label'    => __('Enable Animation', 'andorra'),
        'section'  => 'andorra_general_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[responsive_design]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('responsive_design', array(
        'settings' => 'andorra_theme_options[responsive_design]',
        'label'    => __('Enable Responsive Design', 'andorra'),
        'section'  => 'andorra_general_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[scrollup]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('scrollup', array(
        'settings' => 'andorra_theme_options[scrollup]',
        'label'    => __('Enable Scrollup', 'andorra'),
        'section'  => 'andorra_general_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[scrollup_color]', array(
    	'default'        => '#888888',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'scrollup_color', array(
        'label'    => __('ScrollUp Color', 'andorra'),
        'section'  => 'andorra_general_settings',
        'settings' => 'andorra_theme_options[scrollup_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[scrollup_hover_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'scrollup_hover_color', array(
        'label'    => __('ScrollUp Hover Color', 'andorra'),
        'section'  => 'andorra_general_settings',
        'settings' => 'andorra_theme_options[scrollup_hover_color]',
    )));

	//  =============================
    //  = 3. Logo Section           =
    //  =============================

	$wp_customize->add_section( 'andorra_logo_settings', array(
    	'title'          => __( 'Logo Settings', 'andorra' ),
    	'priority'       => 1001,
		'panel' => 'andorra_theme_options',
		'description' => __('To upload custom logo image - go to Appearance > Customize > Site Identity', 'andorra'),
	) );
	//===============================    
    $wp_customize->add_setting( 'andorra_theme_options[logo_width]', array(
        'default'        => '300',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_width', array(
        'label'      => __('Logo Width (px)', 'andorra'),
        'section'    => 'andorra_logo_settings',
        'settings'   => 'andorra_theme_options[logo_width]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[logo_height]', array(
        'default'        => '30',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_height', array(
        'label'      => __('Logo Height (px)', 'andorra'),
        'section'    => 'andorra_logo_settings',
        'settings'   => 'andorra_theme_options[logo_height]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[logo_top_margin]', array(
        'default'        => '12',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_top_margin', array(
        'label'      => __('Logo Top Margin (px)', 'andorra'),
        'section'    => 'andorra_logo_settings',
        'settings'   => 'andorra_theme_options[logo_top_margin]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[logo_left_margin]', array(
        'default'        => '0',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_left_margin', array(
        'label'      => __('Logo Left Margin (px)', 'andorra'),
        'section'    => 'andorra_logo_settings',
        'settings'   => 'andorra_theme_options[logo_left_margin]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[logo_bottom_margin]', array(
        'default'        => '0',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_bottom_margin', array(
        'label'      => __('Logo Bottom Margin (px)', 'andorra'),
        'section'    => 'andorra_logo_settings',
        'settings'   => 'andorra_theme_options[logo_bottom_margin]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[logo_right_margin]', array(
        'default'        => '25',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_right_margin', array(
        'label'      => __('Logo Right Margin (px)', 'andorra'),
        'section'    => 'andorra_logo_settings',
        'settings'   => 'andorra_theme_options[logo_right_margin]',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[logo_uppercase]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('logo_uppercase', array(
        'settings' => 'andorra_theme_options[logo_uppercase]',
        'label'    => __('Logo Uppercase', 'andorra'),
        'section'  => 'andorra_logo_settings',
        'type'     => 'checkbox',
    ));
	//===============================
     $wp_customize->add_setting('andorra_theme_options[google_font_logo]', array(
		'sanitize_callback' => 'andorra_sanitize_font_style',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'Open Sans',
 
    ));

    $wp_customize->add_control( 'google_font_logo', array(
        'settings' => 'andorra_theme_options[google_font_logo]',
        'label'   => __('Select logo font family','andorra'),
        'section' => 'andorra_logo_settings',
        'type'    => 'select',
        'choices'    => $google_fonts,
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[logo_font_size]', array(
        'default'        => '28',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_font_size', array(
        'label'      => __('Logo Font Size (px)', 'andorra'),
        'section'    => 'andorra_logo_settings',
        'settings'   => 'andorra_theme_options[logo_font_size]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[logo_font_weight]', array(
        'default'        => '700',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_font_weight', array(
        'label'      => __('Logo Font Weight', 'andorra'),
        'section'    => 'andorra_logo_settings',
        'settings'   => 'andorra_theme_options[logo_font_weight]',
    ));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[text_logo_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'text_logo_color', array(
        'label'    => __('Logo Color', 'andorra'),
        'section'  => 'andorra_logo_settings',
        'settings' => 'andorra_theme_options[text_logo_color]',
    )));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[enable_logo_tagline]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('enable_logo_tagline', array(
        'settings' => 'andorra_theme_options[enable_logo_tagline]',
        'label'    => __('Display Tagline Underneath Logo', 'andorra'),
        'section'  => 'andorra_logo_settings',
        'type'     => 'checkbox',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[tagline_font_size]', array(
        'default'        => '13',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('tagline_font_size', array(
        'label'      => __('Tagline Font Size (px)', 'andorra'),
        'section'    => 'andorra_logo_settings',
        'settings'   => 'andorra_theme_options[tagline_font_size]',
    ));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[tagline_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'tagline_color', array(
        'label'    => __('Tagline Color', 'andorra'),
        'section'  => 'andorra_logo_settings',
        'settings' => 'andorra_theme_options[tagline_color]',
    )));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[tagline_uppercase]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('tagline_uppercase', array(
        'settings' => 'andorra_theme_options[tagline_uppercase]',
        'label'    => __('Tagline Uppercase', 'andorra'),
        'section'  => 'andorra_logo_settings',
        'type'     => 'checkbox',
    ));
	//  =============================
    //  = 4. Navigation Section     =
    //  =============================

	$wp_customize->add_section( 'andorra_navigation_settings', array(
    	'title'          => __( 'Navigation Settings', 'andorra' ),
    	'priority'       => 1002,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
	$wp_customize->add_setting('andorra_theme_options[menu_sticky]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('menu_sticky', array(
        'settings' => 'andorra_theme_options[menu_sticky]',
        'label'    => __('Sticky Menu', 'andorra'),
        'section'  => 'andorra_navigation_settings',
        'type'     => 'checkbox',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[menu_top_margin]', array(
        'default'        => '0',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('menu_top_margin', array(
        'label'      => __('Menu Top Margin (px)', 'andorra'),
        'section'    => 'andorra_navigation_settings',
        'settings'   => 'andorra_theme_options[menu_top_margin]',
    ));
	//===============================
     $wp_customize->add_setting('andorra_theme_options[google_font_menu]', array(
		'sanitize_callback' => 'andorra_sanitize_font_style',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'Open Sans',
 
    ));

    $wp_customize->add_control( 'google_font_menu', array(
        'settings' => 'andorra_theme_options[google_font_menu]',
        'label'   => __('Select Menu Font Family','andorra'),
        'section' => 'andorra_navigation_settings',
        'type'    => 'select',
        'choices'    => $google_fonts,
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[nav_font_size]', array(
        'default'        => '13',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('nav_font_size', array(
        'label'      => __('Menu Font Size (px)', 'andorra'),
        'section'    => 'andorra_navigation_settings',
        'settings'   => 'andorra_theme_options[nav_font_size]',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[menu_uppercase]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('menu_uppercase', array(
        'settings' => 'andorra_theme_options[menu_uppercase]',
        'label'    => __('Menu Uppercase', 'andorra'),
        'section'  => 'andorra_navigation_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[nav_font_color]', array(
    	'default'        => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_font_color', array(
        'label'    => __('Navigation Menu Font Color', 'andorra'),
        'section'  => 'andorra_navigation_settings',
        'settings' => 'andorra_theme_options[nav_font_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[nav_sub_font_color]', array(
    	'default'        => '#f7f7f7',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_sub_font_color', array(
        'label'    => __('Navigation Sub Menu Font Color', 'andorra'),
        'section'  => 'andorra_navigation_settings',
        'settings' => 'andorra_theme_options[nav_sub_font_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[nav_border_color]', array(
    	'default'        => '#f7f7f7',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_border_color', array(
        'label'    => __('Navigation Menu Border Color', 'andorra'),
        'section'  => 'andorra_navigation_settings',
        'settings' => 'andorra_theme_options[nav_border_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[nav_bg_color]', array(
    	'default'        => '#312450',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_bg_color', array(
        'label'    => __('Navigation Menu Background Color', 'andorra'),
        'section'  => 'andorra_navigation_settings',
        'settings' => 'andorra_theme_options[nav_bg_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[nav_bg_sub_color]', array(
    	'default'        => '#312450',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_bg_sub_color', array(
        'label'    => __('SubMenu Background Color', 'andorra'),
        'section'  => 'andorra_navigation_settings',
        'settings' => 'andorra_theme_options[nav_bg_sub_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[nav_hover_font_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_hover_font_color', array(
        'label'    => __('Menu Hover Font Color', 'andorra'),
        'section'  => 'andorra_navigation_settings',
        'settings' => 'andorra_theme_options[nav_hover_font_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[nav_bg_hover_color]', array(
    	'default'        => '#312450',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_bg_hover_color', array(
        'label'    => __('Menu Background Hover Color', 'andorra'),
        'section'  => 'andorra_navigation_settings',
        'settings' => 'andorra_theme_options[nav_bg_hover_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[nav_cur_item_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_cur_item_color', array(
        'label'    => __('Selected Menu Color', 'andorra'),
        'section'  => 'andorra_navigation_settings',
        'settings' => 'andorra_theme_options[nav_cur_item_color]',
    )));
	//  =============================
    //  = 5. Typography Section     =
    //  =============================
	$wp_customize->add_section( 'andorra_typography_settings', array(
    	'title'          => __( 'Typography Settings', 'andorra' ),
    	'priority'       => 1003,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
     $wp_customize->add_setting('andorra_theme_options[google_font_body]', array(
		'sanitize_callback' => 'andorra_sanitize_font_style',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'Open Sans',
 
    ));

    $wp_customize->add_control( 'google_font_body', array(
        'settings' => 'andorra_theme_options[google_font_body]',
        'label'   => __('Select Body Font Family','andorra'),
        'section' => 'andorra_typography_settings',
        'type'    => 'select',
        'choices'    => $google_fonts,
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[body_font_size]', array(
        'default'        => '15',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('body_font_size', array(
        'label'      => __('Body Font Size (px)', 'andorra'),
        'section'    => 'andorra_typography_settings',
        'settings'   => 'andorra_theme_options[body_font_size]',
    ));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[body_font_color]', array(
    	'default'        => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_font_color', array(
        'label'    => __('Body Font Color', 'andorra'),
        'section'  => 'andorra_typography_settings',
        'settings' => 'andorra_theme_options[body_font_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[a_link_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'a_link_color', array(
        'label'    => __('A Link Color', 'andorra'),
        'section'  => 'andorra_typography_settings',
        'settings' => 'andorra_theme_options[a_link_color]',
    )));
	//  =============================
    //  = 6. Header Section         =
    //  =============================
	$wp_customize->add_section( 'andorra_header_settings', array(
    	'title'          => __( 'Header Settings', 'andorra' ),
    	'priority'       => 1004,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[header_bg_color]', array(
    	'default'        => '#312450',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
        'label'    => __('Header Background Color', 'andorra'),
        'section'  => 'andorra_header_settings',
        'settings' => 'andorra_theme_options[header_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[header_opacity]', array(
        'default'        => '1',
		'sanitize_callback' => 'andorra_sanitize_opacity',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('header_opacity', array(
        'label'      => __('Header Background Color Opacity', 'andorra'),
        'section'    => 'andorra_header_settings',
        'settings'   => 'andorra_theme_options[header_opacity]',
        'type'    => 'select',
        'choices'    => $opacity,
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[header_top_enable]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('header_top_enable', array(
        'settings' => 'andorra_theme_options[header_top_enable]',
        'label'    => __('Display Top Header Section', 'andorra'),
        'section'  => 'andorra_header_settings',
        'type'     => 'checkbox',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[header_address]', array(
        'default'        => __('1234 Street Name, City Name, United States','andorra'),
		'sanitize_callback' => 'andorra_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('header_address', array(
        'label'      => __('Address', 'andorra'),
        'section'    => 'andorra_header_settings',
        'settings'   => 'andorra_theme_options[header_address]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[header_phone]', array(
        'default'        => __('(123) 456-7890','andorra'),
		'sanitize_callback' => 'andorra_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('header_phone', array(
        'label'      => __('Phone Number', 'andorra'),
        'section'    => 'andorra_header_settings',
        'settings'   => 'andorra_theme_options[header_phone]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[header_email]', array(
        'default'        => __('info@yourdomain.com','andorra'),
		'sanitize_callback' => 'sanitize_email',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('header_email', array(
        'label'      => __('Email', 'andorra'),
        'section'    => 'andorra_header_settings',
        'settings'   => 'andorra_theme_options[header_email]',
    ));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[address_color]', array(
    	'default'        => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'address_color', array(
        'label'    => __('Top Section Font Color', 'andorra'),
        'section'  => 'andorra_header_settings',
        'settings' => 'andorra_theme_options[address_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[top_head_color]', array(
    	'default'        => '#5e42a6',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'top_head_color', array(
        'label'    => __('Top Section Color', 'andorra'),
        'section'  => 'andorra_header_settings',
        'settings' => 'andorra_theme_options[top_head_color]',
    )));
	//  =============================
    //  = 7. Home Page Section      =
    //  =============================
	$wp_customize->add_section( 'andorra_home_settings', array(
    	'title'          => __( 'Static Home Page Settings', 'andorra' ),
    	'priority'       => 1005,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
	$wp_customize->add_setting('andorra_theme_options[image_slider_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => true,
    ));
 
    $wp_customize->add_control('image_slider_on', array(
        'settings' => 'andorra_theme_options[image_slider_on]',
        'label'    => __('Enable Image Slider', 'andorra'),
        'section'  => 'andorra_home_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[featured_page_section_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => true,
    ));
 
    $wp_customize->add_control('featured_page_section_on', array(
        'settings' => 'andorra_theme_options[featured_page_section_on]',
        'label'    => __('Display Featured Page Section', 'andorra'),
        'section'  => 'andorra_home_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[getin_home_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('getin_home_on', array(
        'settings' => 'andorra_theme_options[getin_home_on]',
        'label'    => __('Display Get In Touch Section', 'andorra'),
        'section'  => 'andorra_home_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[services_section_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('services_section_on', array(
        'settings' => 'andorra_theme_options[services_section_on]',
        'label'    => __('Display Services Section', 'andorra'),
        'section'  => 'andorra_home_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[features_section_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('features_section_on', array(
        'settings' => 'andorra_theme_options[features_section_on]',
        'label'    => __('Display Features Section', 'andorra'),
        'section'  => 'andorra_home_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[blog_section_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => true,
    ));
 
    $wp_customize->add_control('blog_section_on', array(
        'settings' => 'andorra_theme_options[blog_section_on]',
        'label'    => __('Display Latest News Section', 'andorra'),
        'section'  => 'andorra_home_settings',
        'type'     => 'checkbox',
    ));
	//  =============================
    //  = 8. Image Slider Section   =
    //  =============================
	$wp_customize->add_section( 'andorra_slider_settings', array(
    	'title'          => __( 'Image Slider Settings', 'andorra' ),
    	'priority'       => 1006,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[slider_height]', array(
        'default'        => '500',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('slider_height', array(
        'label'      => __('Image Slider Height (px)', 'andorra'),
        'section'    => 'andorra_slider_settings',
        'settings'   => 'andorra_theme_options[slider_height]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[image_slider_cat]', array(
        'default'        => '',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('image_slider_cat', array(
        'label'      => __('Image Slider Category', 'andorra'),
        'section'    => 'andorra_slider_settings',
        'settings'   => 'andorra_theme_options[image_slider_cat]',
        'type'    => 'select',
        'choices'    => $options_categories,
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[slideshow_speed]', array(
        'default'        => '5000',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('slideshow_speed', array(
        'label'      => __('Slideshow Interval', 'andorra'),
        'section'    => 'andorra_slider_settings',
        'settings'   => 'andorra_theme_options[slideshow_speed]',
		'description' => __('1000 = 1 second, default value: 5000', 'andorra'),
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[animation_speed]', array(
        'default'        => '800',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('animation_speed', array(
        'label'      => __('Animation Speed', 'andorra'),
        'section'    => 'andorra_slider_settings',
        'settings'   => 'andorra_theme_options[animation_speed]',
		'description' => __('1000 = 1 second, default value: 800', 'andorra'),
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[slider_num]', array(
        'default'        => '3',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('slider_num', array(
        'label'      => __('Number of Slides', 'andorra'),
        'section'    => 'andorra_slider_settings',
        'settings'   => 'andorra_theme_options[slider_num]',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[captions_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('captions_on', array(
        'settings' => 'andorra_theme_options[captions_on]',
        'label'    => __('Enable Slider Captions', 'andorra'),
        'section'  => 'andorra_slider_settings',
        'type'     => 'checkbox',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[captions_pos_top]', array(
        'default'        => '180',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('captions_pos_top', array(
        'label'      => __('Caption Position Top (px)', 'andorra'),
        'section'    => 'andorra_slider_settings',
        'settings'   => 'andorra_theme_options[captions_pos_top]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[captions_width]', array(
        'default'        => '80',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('captions_width', array(
        'label'      => __('Caption Width %', 'andorra'),
        'section'    => 'andorra_slider_settings',
        'settings'   => 'andorra_theme_options[captions_width]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[captions_title_size]', array(
        'default'        => '44',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('captions_title_size', array(
        'label'      => __('Caption Title Font Size px', 'andorra'),
        'section'    => 'andorra_slider_settings',
        'settings'   => 'andorra_theme_options[captions_title_size]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[captions_text_size]', array(
        'default'        => '14',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('captions_text_size', array(
        'label'      => __('Caption Text Font Size px', 'andorra'),
        'section'    => 'andorra_slider_settings',
        'settings'   => 'andorra_theme_options[captions_text_size]',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[captions_box]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('captions_box', array(
        'settings' => 'andorra_theme_options[captions_box]',
        'label'    => __('Enable Captions Background', 'andorra'),
        'section'  => 'andorra_slider_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[captions_box_color]', array(
    	'default'        => '#f6f6f6',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'captions_box_color', array(
        'label'    => __('Captions Background Color', 'andorra'),
        'section'  => 'andorra_slider_settings',
        'settings' => 'andorra_theme_options[captions_box_color]',
    )));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[captions_box_opacity]', array(
        'default'        => '1',
		'sanitize_callback' => 'andorra_sanitize_opacity',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('captions_box_opacity', array(
        'label'      => __('Captions Background Color Opacity', 'andorra'),
        'section'    => 'andorra_slider_settings',
        'settings'   => 'andorra_theme_options[captions_box_opacity]',
        'type'    => 'select',
        'choices'    => $opacity,
    ));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[captions_title_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'captions_title_color', array(
        'label'    => __('Caption Title Color', 'andorra'),
        'section'  => 'andorra_slider_settings',
        'settings' => 'andorra_theme_options[captions_title_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[captions_text_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'captions_text_color', array(
        'label'    => __('Captions Text Color', 'andorra'),
        'section'  => 'andorra_slider_settings',
        'settings' => 'andorra_theme_options[captions_text_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[captions_button_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'captions_button_color', array(
        'label'    => __('Captions Button Color', 'andorra'),
        'section'  => 'andorra_slider_settings',
        'settings' => 'andorra_theme_options[captions_button_color]',
    )));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[captions_button]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('captions_button', array(
        'settings' => 'andorra_theme_options[captions_button]',
        'label'    => __('Enable Captions Button', 'andorra'),
        'section'  => 'andorra_slider_settings',
        'type'     => 'checkbox',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[caption_button_text]', array(
        'default'        => __('Read More','andorra'),
		'sanitize_callback' => 'andorra_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('caption_button_text', array(
        'label'      => __('Captions Button Text', 'andorra'),
        'section'    => 'andorra_slider_settings',
        'settings'   => 'andorra_theme_options[caption_button_text]',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[slider_dots]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('slider_dots', array(
        'settings' => 'andorra_theme_options[slider_dots]',
        'label'    => __('Enable Slider Dots', 'andorra'),
        'section'  => 'andorra_slider_settings',
        'type'     => 'checkbox',
    ));
	//  =============================
    //  = 9. Footer Section         =
    //  =============================
	$wp_customize->add_section( 'andorra_footer_settings', array(
    	'title'          => __( 'Footer Settings', 'andorra' ),
    	'priority'       => 1007,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[footer_bg_color]', array(
    	'default'        => '#5e42a6',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', array(
        'label'    => __('Footer Background Color', 'andorra'),
        'section'  => 'andorra_footer_settings',
        'settings' => 'andorra_theme_options[footer_bg_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[copyright_bg_color]', array(
    	'default'        => '#312450',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'copyright_bg_color', array(
        'label'    => __('Copyright Section Background Color', 'andorra'),
        'section'  => 'andorra_footer_settings',
        'settings' => 'andorra_theme_options[copyright_bg_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[footer_widget_title_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_widget_title_color', array(
        'label'    => __('Footer Widget Title Color', 'andorra'),
        'section'  => 'andorra_footer_settings',
        'settings' => 'andorra_theme_options[footer_widget_title_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[footer_widget_text_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_widget_text_color', array(
        'label'    => __('Footer Widget Text Color', 'andorra'),
        'section'  => 'andorra_footer_settings',
        'settings' => 'andorra_theme_options[footer_widget_text_color]',
    )));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[footer_widgets]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('footer_widgets', array(
        'settings' => 'andorra_theme_options[footer_widgets]',
        'label'    => __('Enable Footer Widgets', 'andorra'),
        'section'  => 'andorra_footer_settings',
        'type'     => 'checkbox',
    ));
	//  =============================
    //  = 10. Layout Section        =
    //  =============================
	$wp_customize->add_section( 'andorra_layout_settings', array(
    	'title'          => __( 'Layout Settings', 'andorra' ),
    	'priority'       => 1008,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
     $wp_customize->add_setting('andorra_theme_options[layout_settings]', array(
		'sanitize_callback' => 'andorra_sanitize_theme_layout',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'col2-l',
 
    ));

    $wp_customize->add_control( 'layout_settings', array(
        'settings' => 'andorra_theme_options[layout_settings]',
        'label'   => __('Theme Layout','andorra'),
        'section' => 'andorra_layout_settings',
        'type'    => 'radio',
        'choices'    => $theme_layout,
    ));
	//  =============================
    //  = 11. Blog Section          =
    //  =============================
	$wp_customize->add_section( 'andorra_blog_settings', array(
    	'title'          => __( 'Blog Settings', 'andorra' ),
    	'priority'       => 1009,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[blog_posts_home_color]', array(
    	'default'        => '#312450',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_posts_home_color', array(
        'label'    => __('Background Color', 'andorra'),
        'section'  => 'andorra_blog_settings',
        'settings' => 'andorra_theme_options[blog_posts_home_color]',
    )));
	//===============================
    $wp_customize->add_setting('andorra_theme_options[blog_posts_home_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'blog_posts_home_image', array(
        'label'    => __('Background Image', 'andorra'),
        'section'  => 'andorra_blog_settings',
        'settings' => 'andorra_theme_options[blog_posts_home_image]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[blog_posts_top_color]', array(
    	'default'        => '#5e42a6',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_posts_top_color', array(
        'label'    => __('Top Section Background Color', 'andorra'),
        'section'  => 'andorra_blog_settings',
        'settings' => 'andorra_theme_options[blog_posts_top_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[blog_posts_top_font_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_posts_top_font_color', array(
        'label'    => __('Top Section Font Color', 'andorra'),
        'section'  => 'andorra_blog_settings',
        'settings' => 'andorra_theme_options[blog_posts_top_font_color]',
    )));
	//===============================
    $wp_customize->add_setting('andorra_theme_options[blog_posts_top_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'blog_posts_top_image', array(
        'label'    => __('Top Section Image', 'andorra'),
        'section'  => 'andorra_blog_settings',
        'settings' => 'andorra_theme_options[blog_posts_top_image]',
    )));

	//===============================
     $wp_customize->add_setting('andorra_theme_options[blog_content]', array(
		'sanitize_callback' => 'andorra_sanitize_blog_content',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'excerpt',
 
    ));

    $wp_customize->add_control( 'blog_content', array(
        'settings' => 'andorra_theme_options[blog_content]',
        'label'   => __('Blog Content','andorra'),
        'section' => 'andorra_blog_settings',
        'type'    => 'radio',
        'choices'    => $blog_content,
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[blog_excerpt]', array(
        'default'        => '50',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('blog_excerpt', array(
        'label'      => __('Blog Excerpt Length', 'andorra'),
        'section'    => 'andorra_blog_settings',
        'settings'   => 'andorra_theme_options[blog_excerpt]',
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[simple_paginaton]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('simple_paginaton', array(
        'settings' => 'andorra_theme_options[simple_paginaton]',
        'label'    => __('Use Simple Pagination', 'andorra'),
        'section'  => 'andorra_blog_settings',
        'type'     => 'checkbox',
    ));
	//===============================
     $wp_customize->add_setting('andorra_theme_options[post_navigation]', array(
		'sanitize_callback' => 'andorra_sanitize_post_nav',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'below',
 
    ));

    $wp_customize->add_control( 'post_navigation', array(
        'settings' => 'andorra_theme_options[post_navigation]',
        'label'   => __('Post Navigation Links','andorra'),
        'section' => 'andorra_blog_settings',
        'type'    => 'radio',
        'choices'    => $post_nav_array,
    ));
	//===============================
     $wp_customize->add_setting('andorra_theme_options[post_info]', array(
		'sanitize_callback' => 'andorra_sanitize_post_info',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'above',
 
    ));

    $wp_customize->add_control( 'post_info', array(
        'settings' => 'andorra_theme_options[post_info]',
        'label'   => __('Post Info Position','andorra'),
        'section' => 'andorra_blog_settings',
        'type'    => 'radio',
        'choices'    => $post_info_array,
    ));
	//===============================
	$wp_customize->add_setting('andorra_theme_options[featured_img_post]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'andorra_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('featured_img_post', array(
        'settings' => 'andorra_theme_options[featured_img_post]',
        'label'    => __('Featured Image Inside the Post', 'andorra'),
        'section'  => 'andorra_blog_settings',
        'type'     => 'checkbox',
    ));
	//  ==============================
    //  = 12. Featured Page Settings =
    //  ==============================
	$wp_customize->add_section( 'andorra_featured_page_settings', array(
    	'title'          => __( 'Featured Page Section', 'andorra' ),
    	'priority'       => 1012,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[featured_page_page]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('featured_page_page', array(
	        'label'      => __('Featured Page', 'andorra'),
	        'section'    => 'andorra_featured_page_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'andorra_theme_options[featured_page_page]',
			'description' => __('Select Page to Display in Featured Page Section', 'andorra'),
    	));	
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[featured_page_bg_color]', array(
    	'default'        => '#312450',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'featured_page_bg_color', array(
        'label'    => __('Background Color', 'andorra'),
        'section'  => 'andorra_featured_page_settings',
        'settings' => 'andorra_theme_options[featured_page_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting('andorra_theme_options[featured_page_bg_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'featured_page_bg_image', array(
        'label'    => __('Background Image', 'andorra'),
        'section'  => 'andorra_featured_page_settings',
        'settings' => 'andorra_theme_options[featured_page_bg_image]',
    )));
	//===============================
	for ( $count = 1; $count <= 3; $count++ ) {	
		$wp_customize->add_setting( 'andorra_theme_options[featured_icon_'. $count .']', array(
        	'default'        => '',
			'sanitize_callback' => 'andorra_sanitize_cb',
    	    'capability'     => 'edit_theme_options',
        	'type'           => 'option',
 
    	));
 
    	$wp_customize->add_control('featured_icon_'.$count, array(
        	'label'      => __('Icon # ', 'andorra').$count. __(' to Display in the Section','andorra'),
	        'section'    => 'andorra_featured_page_settings',
    	    'settings'   => 'andorra_theme_options[featured_icon_'.$count.']',
			'description' => sprintf( __( 'Enter Font Awesome icon name. For example: fa-coffee. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'andorra' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
    	));
	}
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[featured_page_header_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'featured_page_header_color', array(
        'label'    => __('Title Color', 'andorra'),
        'section'  => 'andorra_featured_page_settings',
        'settings' => 'andorra_theme_options[featured_page_header_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[featured_page_text_color]', array(
    	'default'        => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'featured_page_text_color', array(
        'label'    => __('Text Color', 'andorra'),
        'section'  => 'andorra_featured_page_settings',
        'settings' => 'andorra_theme_options[featured_page_text_color]',
    )));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[featured_page_button_text]', array(
        'default'        => __('Read More','andorra'),
		'sanitize_callback' => 'andorra_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('featured_page_button_text', array(
        'label'      => __('Button Text', 'andorra'),
        'section'    => 'andorra_featured_page_settings',
        'settings'   => 'andorra_theme_options[featured_page_button_text]',
    ));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[featured_page_button_color]', array(
    	'default'        => '#b74e91',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'featured_page_button_color', array(
        'label'    => __('Button Color', 'andorra'),
        'section'  => 'andorra_featured_page_settings',
        'settings' => 'andorra_theme_options[featured_page_button_color]',
    )));
	//  =============================
    //  = 13. Features Settings     =
    //  =============================
	$wp_customize->add_section( 'andorra_features_settings', array(
    	'title'          => __( 'Features Section', 'andorra' ),
    	'priority'       => 1016,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[features_bg_color]', array(
    	'default'        => '#5e42a6',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'features_bg_color', array(
        'label'    => __('Background Color', 'andorra'),
        'section'  => 'andorra_features_settings',
        'settings' => 'andorra_theme_options[features_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting('andorra_theme_options[features_bg_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'features_bg_image', array(
        'label'    => __('Background Image', 'andorra'),
        'section'  => 'andorra_features_settings',
        'settings' => 'andorra_theme_options[features_bg_image]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[features_title_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'features_title_color', array(
        'label'    => __('Title Color', 'andorra'),
        'section'  => 'andorra_features_settings',
        'settings' => 'andorra_theme_options[features_title_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[features_text_color]', array(
    	'default'        => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'features_text_color', array(
        'label'    => __('Text Color', 'andorra'),
        'section'  => 'andorra_features_settings',
        'settings' => 'andorra_theme_options[features_text_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[features_icons_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'features_icons_color', array(
        'label'    => __('Incons Color', 'andorra'),
        'section'  => 'andorra_features_settings',
        'settings' => 'andorra_theme_options[features_icons_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[features_circle_color]', array(
    	'default'        => '#312450',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'features_circle_color', array(
        'label'    => __('Circles Color', 'andorra'),
        'section'  => 'andorra_features_settings',
        'settings' => 'andorra_theme_options[features_circle_color]',
    )));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[feature_icon_size]', array(
        'default'        => '32',
		'sanitize_callback' => 'andorra_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('feature_icon_size', array(
        'label'      => __('Icons Size (px)', 'andorra'),
        'section'    => 'andorra_features_settings',
        'settings'   => 'andorra_theme_options[feature_icon_size]',
    ));

	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[features_page_1]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('features_page_1', array(
	        'label'      => __('Feature #1', 'andorra'),
	        'section'    => 'andorra_features_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'andorra_theme_options[features_page_1]',
			'description' => __('Select Page to Display as One of the Features', 'andorra'),
    	));	
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[feature_icon_1]', array(
        'default'        => 'fa-tablet',
		'sanitize_callback' => 'andorra_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('feature_icon_1', array(
        'label'      => __('Feature #1 Icon', 'andorra'),
        'section'    => 'andorra_features_settings',
        'settings'   => 'andorra_theme_options[feature_icon_1]',
		'description' => sprintf( __( 'Enter Font Awesome icon name. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'andorra' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
    ));
	//===============================
    $wp_customize->add_setting('andorra_theme_options[feature_image_1]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'feature_image_1', array(
        'label'    => __('Feature #1 Image', 'andorra'),
        'section'  => 'andorra_features_settings',
        'settings' => 'andorra_theme_options[feature_image_1]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[features_page_2]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('features_page_2', array(
	        'label'      => __('Feature #2', 'andorra'),
	        'section'    => 'andorra_features_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'andorra_theme_options[features_page_2]',
			'description' => __('Select Page to Display as One of the Features', 'andorra'),
    	));	
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[feature_icon_2]', array(
        'default'        => 'fa-tint',
		'sanitize_callback' => 'andorra_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('feature_icon_2', array(
        'label'      => __('Feature #2 Icon', 'andorra'),
        'section'    => 'andorra_features_settings',
        'settings'   => 'andorra_theme_options[feature_icon_2]',
		'description' => sprintf( __( 'Enter Font Awesome icon name. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'andorra' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
    ));
	//===============================
    $wp_customize->add_setting('andorra_theme_options[feature_image_2]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'feature_image_2', array(
        'label'    => __('Feature #2 Image', 'andorra'),
        'section'  => 'andorra_features_settings',
        'settings' => 'andorra_theme_options[feature_image_2]',
    )));


	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[features_page_3]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('features_page_3', array(
	        'label'      => __('Feature #3', 'andorra'),
	        'section'    => 'andorra_features_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'andorra_theme_options[features_page_3]',
			'description' => __('Select Page to Display as One of the Features', 'andorra'),
    	));	
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[feature_icon_3]', array(
        'default'        => 'fa-html5',
		'sanitize_callback' => 'andorra_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('feature_icon_3', array(
        'label'      => __('Feature #3 Icon', 'andorra'),
        'section'    => 'andorra_features_settings',
        'settings'   => 'andorra_theme_options[feature_icon_3]',
		'description' => sprintf( __( 'Enter Font Awesome icon name. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'andorra' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
    ));
	//===============================
    $wp_customize->add_setting('andorra_theme_options[feature_image_3]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'feature_image_3', array(
        'label'    => __('Feature #3 Image', 'andorra'),
        'section'  => 'andorra_features_settings',
        'settings' => 'andorra_theme_options[feature_image_3]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[features_page_4]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('features_page_4', array(
	        'label'      => __('Feature #4', 'andorra'),
	        'section'    => 'andorra_features_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'andorra_theme_options[features_page_4]',
			'description' => __('Select Page to Display as One of the Features', 'andorra'),
    	));	
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[feature_icon_4]', array(
        'default'        => 'fa-shopping-cart',
		'sanitize_callback' => 'andorra_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('feature_icon_4', array(
        'label'      => __('Feature #4 Icon', 'andorra'),
        'section'    => 'andorra_features_settings',
        'settings'   => 'andorra_theme_options[feature_icon_4]',
		'description' => sprintf( __( 'Enter Font Awesome icon name. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'andorra' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
    ));
	//===============================
    $wp_customize->add_setting('andorra_theme_options[feature_image_4]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'feature_image_4', array(
        'label'    => __('Feature #4 Image', 'andorra'),
        'section'  => 'andorra_features_settings',
        'settings' => 'andorra_theme_options[feature_image_4]',
    )));
	//  =============================
    //  = 14. Services Settings     =
    //  =============================
	$wp_customize->add_section( 'andorra_services_settings', array(
    	'title'          => __( 'Services Section', 'andorra' ),
    	'priority'       => 1015,
		'panel' => 'andorra_theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[services_bg_color]', array(
    	'default'        => '#312450',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'services_bg_color', array(
        'label'    => __('Background Color', 'andorra'),
        'section'  => 'andorra_services_settings',
        'settings' => 'andorra_theme_options[services_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting('andorra_theme_options[services_bg_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'services_bg_image', array(
        'label'    => __('Background Image', 'andorra'),
        'section'  => 'andorra_services_settings',
        'settings' => 'andorra_theme_options[services_bg_image]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[services_title_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'services_title_color', array(
        'label'    => __('Title Color', 'andorra'),
        'section'  => 'andorra_services_settings',
        'settings' => 'andorra_theme_options[services_title_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[services_text_color]', array(
    	'default'        => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'services_text_color', array(
        'label'    => __('Section Text Color', 'andorra'),
        'section'  => 'andorra_services_settings',
        'settings' => 'andorra_theme_options[services_text_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[services_icon_color]', array(
    	'default'        => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'services_icon_color', array(
        'label'    => __('Section Icons Color', 'andorra'),
        'section'  => 'andorra_services_settings',
        'settings' => 'andorra_theme_options[services_icon_color]',
    )));
	//===============================
	for ( $count = 1; $count <= 6; $count++ ) {
    	$wp_customize->add_setting( 'andorra_theme_options[service_page_'.$count.']', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('service_page_'.$count, array(
	        'label'      => __('Service #', 'andorra') .$count,
	        'section'    => 'andorra_services_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'andorra_theme_options[service_page_'.$count.']',
			'description' => __('Select Page to Display as One of the Services', 'andorra'),
    	));
		//===============================	
		$wp_customize->add_setting( 'andorra_theme_options[service_icon_'. $count .']', array(
        	'default'        => '',
			'sanitize_callback' => 'andorra_sanitize_cb',
    	    'capability'     => 'edit_theme_options',
        	'type'           => 'option',
 
    	));
 
    	$wp_customize->add_control('service_icon_'.$count, array(
        	'label'      => __('Icon to Display in Box #','andorra') . $count,
	        'section'    => 'andorra_services_settings',
    	    'settings'   => 'andorra_theme_options[service_icon_'.$count.']',
			'description' => sprintf( __( 'Enter Font Awesome icon name. For example: fa-coffee. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'andorra' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
    	));
	}
	//  =============================
    //  = 15. Get In Touch Settings =
    //  =============================
	$wp_customize->add_section( 'andorra_git_settings', array(
    	'title'          => __( 'Get In Touch Section', 'andorra' ),
    	'priority'       => 1014,
		'panel' => 'andorra_theme_options',
	));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[getin_page]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('getin_page', array(
	        'label'      => __('Get In Touch Page', 'andorra'),
	        'section'    => 'andorra_git_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'andorra_theme_options[getin_page]',
			'description' => __('Select Page to Display in Get In Touch Section', 'andorra'),
    	));	
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[getin_bg_color]', array(
    	'default'        => '#5e42a6',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'getin_bg_color', array(
        'label'    => __('Background Color', 'andorra'),
        'section'  => 'andorra_git_settings',
        'settings' => 'andorra_theme_options[getin_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting('andorra_theme_options[getin_bg_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'getin_bg_image', array(
        'label'    => __('Background Image', 'andorra'),
        'section'  => 'andorra_git_settings',
        'settings' => 'andorra_theme_options[getin_bg_image]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[getin_header_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'getin_header_color', array(
        'label'    => __('Title Color', 'andorra'),
        'section'  => 'andorra_git_settings',
        'settings' => 'andorra_theme_options[getin_header_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[getin_text_color]', array(
    	'default'        => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'getin_text_color', array(
        'label'    => __('Subtitle Color', 'andorra'),
        'section'  => 'andorra_git_settings',
        'settings' => 'andorra_theme_options[getin_text_color]',
    )));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[getin_button_text]', array(
        'default'        => __('Learn More','andorra'),
		'sanitize_callback' => 'andorra_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('getin_button_text', array(
        'label'      => __('Button Text', 'andorra'),
        'section'    => 'andorra_git_settings',
        'settings'   => 'andorra_theme_options[getin_button_text]',
    ));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[getin_button_color]', array(
    	'default'        => '#b74e91',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'getin_button_color', array(
        'label'    => __('Button Color', 'andorra'),
        'section'  => 'andorra_git_settings',
        'settings' => 'andorra_theme_options[getin_button_color]',
    )));
	//  =============================
    //  = 16. Latest News Settings  =
    //  =============================
	$wp_customize->add_section( 'andorra_news_settings', array(
    	'title'          => __( 'Latest News Section', 'andorra' ),
    	'priority'       => 1017,
		'panel' => 'andorra_theme_options',
	));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[blog_bg_color]', array(
    	'default'        => '#312450',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_bg_color', array(
        'label'    => __('Background Color', 'andorra'),
        'section'  => 'andorra_news_settings',
        'settings' => 'andorra_theme_options[blog_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting('andorra_theme_options[blog_bg_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'blog_bg_image', array(
        'label'    => __('Background Image', 'andorra'),
        'section'  => 'andorra_news_settings',
        'settings' => 'andorra_theme_options[blog_bg_image]',
    )));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[blog_cat]', array(
        'default'        => '',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('blog_cat', array(
        'label'      => __('Latest News Category', 'andorra'),
        'section'    => 'andorra_news_settings',
        'settings'   => 'andorra_theme_options[blog_cat]',
        'type'    => 'select',
        'choices'    => $options_categories,
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[num_posts]', array(
        'default'        => '3',
		'sanitize_callback' => 'andorra_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('num_posts', array(
        'label'      => __('Number of Posts', 'andorra'),
        'section'    => 'andorra_news_settings',
        'settings'   => 'andorra_theme_options[num_posts]',
    ));
	//===============================
    $wp_customize->add_setting( 'andorra_theme_options[blog_section_title]', array(
        'default'        => __('Latest News','andorra'),
		'sanitize_callback' => 'andorra_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('blog_section_title', array(
        'label'      => __('Title Text', 'andorra'),
        'section'    => 'andorra_news_settings',
        'settings'   => 'andorra_theme_options[blog_section_title]',
    ));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[blog_title_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_title_color', array(
        'label'    => __('Title Color', 'andorra'),
        'section'  => 'andorra_news_settings',
        'settings' => 'andorra_theme_options[blog_title_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[blog_post_color]', array(
    	'default'        => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_post_color', array(
        'label'    => __('Post Title Color', 'andorra'),
        'section'  => 'andorra_news_settings',
        'settings' => 'andorra_theme_options[blog_post_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[blog_button_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_button_color', array(
        'label'    => __('Button Color', 'andorra'),
        'section'  => 'andorra_news_settings',
        'settings' => 'andorra_theme_options[blog_button_color]',
    )));
	//  =============================
    //  = 17. Social Settings       =
    //  =============================
	$wp_customize->add_section( 'andorra_social_settings', array(
    	'title'          => __( 'Social Links', 'andorra' ),
    	'priority'       => 1018,
		'panel' => 'andorra_theme_options',
	));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[footer_social_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_social_color', array(
        'label'    => __('Social Icons Color', 'andorra'),
        'section'  => 'andorra_social_settings',
        'settings' => 'andorra_theme_options[footer_social_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[footer_social_bg_color]', array(
    	'default'        => '#312450',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_social_bg_color', array(
        'label'    => __('Social Icons Background Color', 'andorra'),
        'section'  => 'andorra_social_settings',
        'settings' => 'andorra_theme_options[footer_social_bg_color]',
		'description' => __("Applies to footer section","andorra"),
    )));
	//===============================
	$wp_customize->add_setting( 'andorra_theme_options[footer_social_bgh_color]', array(
    	'default'        => '#b74e91',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_social_bgh_color', array(
        'label'    => __('Social Icons Background Hover Color', 'andorra'),
        'section'  => 'andorra_social_settings',
        'settings' => 'andorra_theme_options[footer_social_bgh_color]',
    )));
}
 
add_action('customize_register', 'andorra_customize_register');


/**
 * Sets up theme custom styling
 * 
 */
function andorra_theme_custom_styling() {
	$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
	/**
	 * General Settings 
	 */	
	$theme_color = $andorra_theme_options['theme_color'];
	$scrollup_color = $andorra_theme_options['scrollup_color'];
	$scrollup_hover_color = $andorra_theme_options['scrollup_hover_color'];
	/**
	 * Logo Settings 
	 */		
	$logo_width = $andorra_theme_options['logo_width'];
	$logo_height = $andorra_theme_options['logo_height'];
	$logo_top_margin = $andorra_theme_options['logo_top_margin'];
	$logo_left_margin = $andorra_theme_options['logo_left_margin'];
	$logo_bottom_margin = $andorra_theme_options['logo_bottom_margin'];
	$logo_right_margin = $andorra_theme_options['logo_right_margin'];
	$logo_uppercase = $andorra_theme_options['logo_uppercase'];
	$google_font_logo = $andorra_theme_options['google_font_logo'];
	$logo_font_size = $andorra_theme_options['logo_font_size'];
	$logo_font_weight = $andorra_theme_options['logo_font_weight'];
	$text_logo_color = $andorra_theme_options['text_logo_color'];
	$tagline_font_size = $andorra_theme_options['tagline_font_size'];
	$tagline_color = $andorra_theme_options['tagline_color'];
	$tagline_uppercase = $andorra_theme_options['tagline_uppercase'];
	/**
	 * Navigation Settings
	 */	
	$menu_sticky = $andorra_theme_options['menu_sticky'];
	$menu_top_margin = $andorra_theme_options['menu_top_margin'];
	$google_font_menu = $andorra_theme_options['google_font_menu'];
	$nav_font_size = $andorra_theme_options['nav_font_size'];
	$menu_uppercase = $andorra_theme_options['menu_uppercase'];
	$nav_font_color = $andorra_theme_options['nav_font_color'];
	$nav_sub_font_color = $andorra_theme_options['nav_sub_font_color'];
	$nav_border_color = $andorra_theme_options['nav_border_color'];
	$nav_bg_color = $andorra_theme_options['nav_bg_color'];
	$nav_bg_sub_color = $andorra_theme_options['nav_bg_sub_color'];
	$nav_hover_font_color = $andorra_theme_options['nav_hover_font_color'];
	$nav_bg_hover_color = $andorra_theme_options['nav_bg_hover_color'];
	$nav_cur_item_color = $andorra_theme_options['nav_cur_item_color'];
	/**
	 * Typography Settings
	 */	
	$google_font_body = $andorra_theme_options['google_font_body'];
	$body_font_size = $andorra_theme_options['body_font_size'];
	$body_font_color = $andorra_theme_options['body_font_color'];
	$a_link_color = $andorra_theme_options['a_link_color'];
	/**
	 * Header Settings
	 */	
	$header_bg_color = $andorra_theme_options['header_bg_color'];
	$header_opacity = $andorra_theme_options['header_opacity'];
	$address_color = $andorra_theme_options['address_color'];
	$top_head_color = $andorra_theme_options['top_head_color'];
	/**
	 * Image Slider 
	 */	
	$slider_height = $andorra_theme_options['slider_height'];
	$captions_pos_top = $andorra_theme_options['captions_pos_top'];
	$captions_width = $andorra_theme_options['captions_width'];
	$captions_title_color = $andorra_theme_options['captions_title_color'];
	$captions_text_color = $andorra_theme_options['captions_text_color'];
	$captions_button_color = $andorra_theme_options['captions_button_color'];
	$slider_dots = $andorra_theme_options['slider_dots'];
	$captions_title_size = $andorra_theme_options['captions_title_size'];
	$captions_text_size = $andorra_theme_options['captions_text_size'];
	$captions_box = $andorra_theme_options['captions_box'];
	$captions_box_color = $andorra_theme_options['captions_box_color'];
	$captions_box_opacity = $andorra_theme_options['captions_box_opacity'];
	/**
	 * Footer Settings
	 */
	$footer_bg_color = $andorra_theme_options['footer_bg_color'];
	$copyright_bg_color = $andorra_theme_options['copyright_bg_color'];
	$footer_widget_title_color = $andorra_theme_options['footer_widget_title_color'];
	$footer_widget_text_color = $andorra_theme_options['footer_widget_text_color'];
	/**
	 * Blog Settings
	 */	
	$blog_posts_home_color = $andorra_theme_options['blog_posts_home_color'];
	$blog_bg_color = $andorra_theme_options['blog_bg_color'];
	$blog_title_color = $andorra_theme_options['blog_title_color'];
	$blog_post_color = $andorra_theme_options['blog_post_color'];
	$blog_posts_top_color = $andorra_theme_options['blog_posts_top_color'];
	$blog_posts_top_font_color = $andorra_theme_options['blog_posts_top_font_color'];
	$blog_button_color = $andorra_theme_options['blog_button_color'];
	/**
	* Featured Page Section
	*/
	$featured_page_bg_color = $andorra_theme_options['featured_page_bg_color'];
	$featured_page_header_color = $andorra_theme_options['featured_page_header_color'];
	$featured_page_text_color = $andorra_theme_options['featured_page_text_color'];
	$featured_page_button_color = $andorra_theme_options['featured_page_button_color'];
	/**
	* Features Section
	*/
	$features_bg_color = $andorra_theme_options['features_bg_color'];
	$features_text_color = $andorra_theme_options['features_text_color'];
	$features_title_color = $andorra_theme_options['features_title_color'];
	$features_icons_color = $andorra_theme_options['features_icons_color'];
	$feature_icon_size = $andorra_theme_options['feature_icon_size'];
	$features_circle_color = $andorra_theme_options['features_circle_color'];
	/**
	* Our Services Section
	*/
	$services_bg_color = $andorra_theme_options['services_bg_color'];
	$services_title_color = $andorra_theme_options['services_title_color'];
	$services_text_color = $andorra_theme_options['services_text_color'];
	$services_icon_color = $andorra_theme_options['services_icon_color'];
	/**
	* Get in Touch Section
	*/
	$getin_header_color = $andorra_theme_options['getin_header_color'];
	$getin_text_color = $andorra_theme_options['getin_text_color'];
	$getin_button_color = $andorra_theme_options['getin_button_color'];
	$getin_bg_color = $andorra_theme_options['getin_bg_color'];
	/**
	* Social Section
	*/
	$footer_social_color = $andorra_theme_options['footer_social_color'];
	$footer_social_bg_color = $andorra_theme_options['footer_social_bg_color'];
	$footer_social_bgh_color = $andorra_theme_options['footer_social_bgh_color'];
	
	$output = '';

	/**
	 * General Settings 
	 */
	if ( $theme_color )
	$output .= 'blockquote, address, .page-links a:hover, .post-format-wrap, .sidebar .widget .widget-separator-holder .widget-separator {border-color:' . esc_html($theme_color) . '}' . "\n";
	$output .= '.meta span i, .more-link, .post-title h3:hover, #main .standard-posts-wrapper .posts-wrapper .post-single .text-holder-full .post-format-wrap p.link-text a:hover, .breadcrumbs .breadcrumbs-wrap ul li a:hover, #article p a, .link-post i.fa, .quote-post i.fa, #article .link-post p.link-text a:hover, .link-post p.link-text a:hover, .quote-post span.quote-author, .post-single ul.link-pages li a strong, .post-info span i, .footer-widget-col ul li a:hover, .sidebar ul.link-pages li.next-link a span, .sidebar ul.link-pages li.previous-link a span, .sidebar ul.link-pages li i, .btn-default:hover, .post-tags a, .post-title h2:hover, a:hover {color:' . esc_html($theme_color) . '}' . "\n";
	$output .= 'button, .page-links a:hover {background:' . esc_html($theme_color) . '}' . "\n";
	$output .= '.search-submit,.wpcf7-form-control,.main-navigation ul ul, .content-boxes .circle, .section-title-right:after, .section-title:after, .content-btn, #comments .form-submit #submit, .post-button, .simple-pagination span, .pagination span, .pagination a {background-color:' . esc_html($theme_color) . '}' . "\n";
	
	if ( $scrollup_color )
	$output .= '.back-to-top {color:' . esc_html($scrollup_color) . '}' . "\n";
	
	if ( $scrollup_hover_color )
	$output .= '.back-to-top i.fa:hover {color:' . esc_html($scrollup_hover_color) . '}' . "\n";

	/**
	 * Logo Settings 
	 */	
	if ( $logo_width )
	$output .= '#logo, .logo {width:' . esc_html($logo_width) . 'px }' . "\n";
	
	if ( $logo_height )
	$output .= '#logo, .logo {height:' . esc_html($logo_height) . 'px }' . "\n";
	
	if ( $logo_top_margin )
	$output .= '#logo { margin-top:' . esc_html($logo_top_margin) . 'px }' . "\n";
	
	if ( $logo_left_margin )
	$output .= '#logo { margin-left:' . esc_html($logo_left_margin) . 'px }' . "\n";
	
	if ( $logo_bottom_margin )
	$output .= '#logo { margin-bottom:' . esc_html($logo_bottom_margin) . 'px }' . "\n";
	
	if ( $logo_right_margin )
	$output .= '#logo { margin-right:' . esc_html($logo_right_margin) . 'px }' . "\n";
	
	if ( $logo_uppercase == '1' )
	$output .= '#logo, .logo {text-transform: uppercase }' . "\n";
	
	if ( $google_font_logo )
	$output .= '#logo, .logo {font-family:' . esc_html($google_font_logo) . '}' . "\n";
	
	if ( $logo_font_size )
	$output .= '#logo, .logo {font-size:' . esc_html($logo_font_size) . 'px }' . "\n";
	
	if ( $logo_font_weight )
	$output .= '#logo, .logo {font-weight:' . esc_html($logo_font_weight) . '}' . "\n";

	if ( $text_logo_color )
	$output .= '#logo a, .logo a {color:' . esc_html($text_logo_color) . '}' . "\n";
	
	if ( $tagline_font_size )
	$output .= '#logo h5.site-description, .sidebar-footer .site-description {font-size:' . esc_html($tagline_font_size) . 'px }' . "\n";
	
	if ( $tagline_color )
	$output .= '#logo .site-description, .sidebar-footer .site-description {color:' . esc_html($tagline_color) . '}' . "\n";
	
	if ( $tagline_uppercase == '0' )
	$output .= '#logo .site-description, .sidebar-footer .site-description {text-transform: none}' . "\n";

	if ( $tagline_uppercase == '1' )
	$output .= '#logo .site-description, .sidebar-footer .site-description {text-transform: uppercase}' . "\n";

	/**
	 * Navigation Settings
	 */	
	if ( $menu_top_margin )
	$output .= '#navbar {margin-top:'. esc_html($menu_top_margin) .'px}' . "\n";
	
	if ( $google_font_menu )
	$output .= '#navbar ul li a {font-family:' . esc_html($google_font_menu) . '}' . "\n";
	
	if ( $nav_font_size )
	$output .= '#navbar ul li a {font-size:' . esc_html($nav_font_size) . 'px}' . "\n";
	
	if ( $menu_uppercase == '1' )
	$output .= '#navbar ul li a {text-transform: uppercase;}' . "\n";
	
	if ( $nav_font_color )
	$output .= '.navbar-nav li a {color:' . esc_html($nav_font_color) . '}' . "\n";
	
	if ( $nav_sub_font_color )
	$output .= '.navbar-nav .dropdown-menu li a {color:' . esc_html($nav_sub_font_color) . '}' . "\n";
	
	if ( $nav_border_color )
	$output .= '.dropdown-menu {border-bottom: 5px solid ' . esc_html($nav_border_color) . '}' . "\n";
	
	if ( $nav_bg_color )
	$output .= '.navbar-nav {background-color:' . esc_html($nav_bg_color) . '}' . "\n";
	
	if ( $nav_bg_sub_color )
	$output .= '.dropdown-menu { background:'. esc_html($nav_bg_sub_color) . '}' . "\n";
	
	if ( $nav_hover_font_color )
	$output .= '.navbar-nav li a:hover {color:' . esc_html($nav_hover_font_color) . '}' . "\n";
	
	if ( $nav_bg_hover_color )
	$output .= '.navbar-nav ul li a:hover, .navbar-nav ul li a:focus, .navbar-nav ul li a.active, .navbar-nav ul li a.active-parent, .navbar-nav ul li.current_page_item a, #menu-navmenu li a:hover { background:' . esc_html($nav_bg_hover_color) . '}' . "\n";
	
	if ( $nav_cur_item_color )
	$output .= '.active a { color:' . esc_html($nav_cur_item_color) . ' !important}' . "\n";
	/**
	 * Typography Settings
	 */	
	if ( $google_font_body != 'None' )
	$output .= 'body {font-family:' . esc_html($google_font_body) . '}' . "\n";
	
	if ( $body_font_size )
	$output .= 'body, p {font-size:' . esc_html($body_font_size) . 'px}' . "\n";
	
	if ( $body_font_color )
	$output .= 'body {color:' . esc_html($body_font_color) . '}' . "\n";
	
	if ($a_link_color)
	$output .= 'a {color:' . esc_html($a_link_color) . '}' . "\n";
	/**
	 * Header Settings
	 */
	if ( $header_bg_color )
	$output .= '#header-holder { background-color: ' . esc_html($header_bg_color) . '}' . "\n";
	
	if ( $header_opacity )
	$output .= '#header-holder {opacity:'. esc_html($header_opacity) .'}' . "\n";
	
	if ( $address_color )
	$output .= '#header-top .top-phone, #header-top p, #header-top a, #header-top i, .top-address { color:' . esc_html($address_color) . '}' . "\n";
	
	if ( $top_head_color )
	$output .= '#header-top { background-color: ' . esc_html($top_head_color) . '}' . "\n";
	
	/**
	 * Image Slider 
	 */	
	if ( $slider_height )
	$output .= '.banner ul li { height:' . esc_html($slider_height) . 'px;}' . "\n";

	if ( $captions_title_color )
	$output .= '.banner .inner h1 { color:' . esc_html($captions_title_color) . '}' . "\n";
	$output .= '.iis-caption-title a { color:' . esc_html($captions_title_color) . '}' . "\n";
	
	if ( $captions_text_color )
	$output .= '.banner .inner p { color: ' . esc_html($captions_text_color) . '}' . "\n";
	$output .= '.iis-caption-content p { color: ' . esc_html($captions_text_color) . '}' . "\n";
	
	if ( $captions_button_color )
	$output .= '.banner .btn { color: ' . esc_html($captions_button_color) . '}' . "\n";
	$output .= '.banner .btn { border-color: ' . esc_html($captions_button_color) . '}' . "\n";	
	
	if ( $captions_pos_top )
	$output .= '.banner .inner { padding-top: ' . esc_html($captions_pos_top) . 'px}' . "\n";
	$output .= '.iis-caption { margin-top: ' . esc_html($captions_pos_top) . 'px}' . "\n";
	
	if ( $captions_width )
	$output .= '.banner .inner { width: ' . esc_html($captions_width) . '%}' . "\n";
	$output .= '.iis-caption { max-width: ' . esc_html($captions_width) . '%}' . "\n";
	
	if ( $slider_dots == false )
	$output .= '.banner ol.dots { display: none;}' . "\n";
	
	if ( $captions_title_size )
	$output .= '.ideal-image-slider .iis-caption .iis-caption-title a { font-size: ' . esc_html($captions_title_size) . 'px}' . "\n";
	$output .= '.ideal-image-slider .iis-caption .iis-caption-title a { line-height: ' . esc_html($captions_title_size) . 'px}' . "\n";
	
	if ( $captions_text_size )
	$output .= '.iis-caption-content p { font-size: ' . esc_html($captions_text_size) . 'px}' . "\n";
	
	if ( $captions_box == true )
	$output .= '.iis-caption { background: ' . esc_html($captions_box_color) . '}' . "\n"; 
	
	if ( $captions_box_opacity )
	$output .= '.iis-caption { opacity: ' . esc_html($captions_box_opacity) . '}' . "\n";
	 
	/**
	 * Footer Settings
	 */
	if ( $footer_bg_color )
	$output .= '#footer { background-color:' . esc_html($footer_bg_color) . '}' . "\n";

	if ( $copyright_bg_color )
	$output .= '#copyright { background-color:' . esc_html($copyright_bg_color) . '}' . "\n";
	
	if ( $footer_widget_title_color )
	$output .= '.footer-widget-col h4 { color:' . esc_html($footer_widget_title_color) . '}' . "\n";
	
	if ( $footer_widget_text_color )
	$output .= '.footer-widget-col a, .footer-widget-col { color:' . esc_html($footer_widget_text_color) . '}' . "\n";
	
	/**
	 * Blog Settings 
	 */
	if ($blog_posts_home_color)
	$output .= '.home-blog {background: none repeat scroll 0 0 ' . esc_html($blog_posts_home_color) . '}' . "\n";

	if ($blog_post_color)
	$output .= '.from-blog h3 {color:' . esc_html($blog_post_color) . ';}' . "\n";
	
	if ($blog_title_color)
	$output .= '.from-blog h2 {color:' . esc_html($blog_title_color) . ';}' . "\n";
	
	if ($blog_bg_color)
	$output .= '.from-blog {background: none repeat scroll 0 0 ' . esc_html($blog_bg_color) . ';}' . "\n";
	
	if ($blog_posts_top_color)
	$output .= '.blog-top-image {background: none repeat scroll 0 0 ' . esc_html($blog_posts_top_color) . ';}' . "\n";
	
	if ($blog_posts_top_font_color)
	$output .= '.blog-top-image h1.section-title, .blog-top-image h1.section-title-right {color:' . esc_html($blog_posts_top_font_color) . ';}' . "\n";
	
	if ($blog_button_color)
	$output .= '.from-blog a.blog-read-more {background-color: ' . esc_html($blog_button_color) . ';}' . "\n";	
	/**
	* Featured Page Section
	*/
	if ($featured_page_bg_color)
	$output .= '.featured-page {background: none repeat scroll 0 0 ' . esc_html($featured_page_bg_color) . ';}' . "\n";
	
	if ($featured_page_header_color)
	$output .= '.featured-page h1, .featured-page h1 a {color:' . esc_html($featured_page_header_color) . ';}' . "\n";
	
	if ($featured_page_text_color)
	$output .= '.featured-page p {color:' . esc_html($featured_page_text_color) . ';}' . "\n";
	
	if ($featured_page_button_color)
	$output .= '.featured-page a.featured-page-link {background-color: ' . esc_html($featured_page_button_color) . ';}' . "\n";
	/**
	* Features Section
	*/
	if ( $features_bg_color )
	$output .= '#features { background-color:' . esc_html($features_bg_color) . ';}' . "\n";
	
	if ( $features_text_color )
	$output .= 'h4.sub-title, #features p { color:' . esc_html($features_text_color) . ';}' . "\n";
	
	if ( $features_title_color )
	$output .= '#features .section-title, #features h3 { color:' . esc_html($features_title_color) . ';}' . "\n";
	
	if ( $features_icons_color )
	$output .= '#features .feature i.fa { color:' . esc_html($features_icons_color) . ';}' . "\n";
	
	if ( $feature_icon_size)
	$output .= '#features .feature .circle i.fa { font-size:' . esc_html($feature_icon_size) . 'px;}' . "\n";
	
	if ( $features_circle_color)
	$output .= '#features .feature .circle { background-color:' . esc_html($features_circle_color) . ';}' . "\n";
	/**
	* Our Services Section
	*/
	if ( $services_bg_color )
	$output .= '#services { background-color:' . esc_html($services_bg_color) . ';}' . "\n";
	
	if ( $services_title_color )
	$output .= '#services h3, #services h3 a, .services-left .service .service-head h3 a { color:' . esc_html($services_title_color) . ';}' . "\n";
	
	if ( $services_text_color )
	$output .= '#services p { color:' . esc_html($services_text_color) . ';}' . "\n";
	
	if ($services_icon_color)
	$output .= '.services i.fa, .services-left .circle i.fa { color:' . esc_html($services_icon_color) . ';}' . "\n";
	/**
	* Get in Touch Section
	*/
	if ($getin_bg_color)
	$output .= '.get-in-touch { background-color: ' . esc_html($getin_bg_color) . '}' . "\n";
	
	if ($getin_header_color)
	$output .= '.get-in-touch h2.boxtitle, .get-in-touch h2.boxtitle a {color:' . esc_html($getin_header_color) . ';}' . "\n";
	
	if ($getin_text_color)
	$output .= '.get-in-touch h4.sub-title, .get-in-touch p {color:' . esc_html($getin_text_color) . ';}' . "\n";
	
	if ( $getin_button_color )
	$output .= '.git-link { background-color: ' . esc_html($getin_button_color) . '}' . "\n";
	/**
	* Social Section
	*/
	if ( $footer_social_color )
	$output .= '#menu-social li a { color:' . esc_html($footer_social_color) . '}' . "\n";
	
	if ( $footer_social_bg_color )
	$output .= '#social-bar ul li a { background-color:' . esc_html($footer_social_bg_color) . '}' . "\n";
	
	if ( $footer_social_bgh_color )
	$output .= '#menu-social li a:hover { background-color:' . esc_html($footer_social_bgh_color) . '}' . "\n";
			
	// Output styles
	if ( isset( $output ) && $output != '' ) {
		$output = strip_tags( $output );
		$output = "<!--Custom Styling-->\n<style media=\"screen\" type=\"text/css\">\n" . $output . "</style>\n";
		echo $output;
	}
}
add_action('wp_head','andorra_theme_custom_styling');

/**
 * Sanitization for checkbox input
 *
 * @param $input string (1 or empty) checkbox state
 * @return $output '1' or false
 */
function andorra_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}

/**
 * Sanitization for font style
 */
function andorra_sanitize_font_style( $value ) {
	$recognized = andorra_font_styles();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'andorra_font_style', current( $recognized ) );
}

/**
 * Sanitization for opacity value
 */
function andorra_sanitize_opacity( $value ) {
	$recognized = andorra_opacity();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'andorra_opacity', current( $recognized ) );
}

/**
 * Sanitization for layout value
 */
function andorra_sanitize_theme_layout( $value ) {
	$recognized = andorra_layout();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'andorra_layout', current( $recognized ) );
}

/**
 * Sanitization for navigation position
 */
function andorra_sanitize_post_nav( $value ) {
	$recognized = andorra_post_nav();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'andorra_post_nav', current( $recognized ) );
}

/**
 * Sanitization for post info position
 */
function andorra_sanitize_post_info( $value ) {
	$recognized = andorra_post_info();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'andorra_post_info', current( $recognized ) );
}

/**
 * Sanitization for blog content value
 */
function andorra_sanitize_blog_content( $value ) {
	$recognized = andorra_blog_content();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'andorra_blog_content', current( $recognized ) );
}

function andorra_sanitize_cat ( $input, $option ) {
	$output = '';
	if ( array_key_exists( $input, $option ) ) {
		$output = $input;
	}
	return $output;
}

/**
 * Sanitization callback function
 */
function andorra_sanitize_cb( $input ) {     
	return wp_kses_post( $input );
}

/**
 * Sanitization to validate that the input value is an integer
 */
function andorra_sanitize_number( $input ) {
	return absint( $input );
}

/**
 * Sanitization for image position
*/
function andorra_sanitize_image_pos( $input ) {
	$valid = array(
       'left' => 'left',
        'right' => 'right',
        'center' => 'center',
	);
	
	if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function andorra_sanitize_image_repeat( $input ) {
	$valid = array(
		'no-repeat' => 'no-repeat',
		'repeat' => 'repeat',
		'repeat-x' => 'repeat-x',
		'repeat-y' => 'repeat-y',
	);
	
	if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function andorra_font_styles() {
	$default = array(
		'Open Sans' => 'Open Sans',
		);
	return apply_filters( 'andorra_font_styles', $default );
}

function andorra_opacity() {
	$default = array(
		'1' => '1',
		'0.9'	=> '0.9',
		'0.8'	=> '0.8',
		'0.7'	=> '0.7',
		'0.6'	=> '0.6',
		'0.5'	=> '0.5',
		'0.4'	=> '0.4',
		'0.3'	=> '0.3',
		'0.2'	=> '0.2',
		'0.1'	=> '0.1',
		'0'	=> '0',
	);
	return apply_filters( 'andorra_opacity', $default );
}

function andorra_layout() {
	$default = array(
	'col1' => 'col1', 
	'col2-l' => 'col2-l', 
	'col2-r' =>'col2-r',
	);
	return apply_filters( 'andorra_layout', $default );
}

function andorra_blog_content() {
	$default = array(
	'excerpt' => 'excerpt', 
	'full' => 'full', 
	);
	return apply_filters( 'andorra_blog_content', $default );
}

function andorra_post_nav() {
	$default = array(
		'disable' => 'disable',
		'sidebar' => 'sidebar',
		'below' => 'below',
	);
	return apply_filters( 'andorra_post_nav', $default );
}

function andorra_post_info() {
	$default = array(
		'disable' => 'disable',
		'above' => 'above',
	);
	return apply_filters( 'andorra_post_info', $default );
}

function andorra_get_option_defaults() {
	$defaults = array(
		'theme_color' => '#ffffff',
		'breadcrumbs' => '1',
		'animation' => false,
		'responsive_design' => '1',
		'scrollup' => '1',
		'scrollup_color' => '#888888',
		'scrollup_hover_color' => '#ffffff',
		'logo_width' => '300',
		'logo_height' => '30',
		'logo_top_margin' => '12',
		'logo_left_margin' => '0',
		'logo_bottom_margin' => '0',
		'logo_right_margin' => '25',
		'logo_uppercase' => '1',
		'google_font_logo' => __('Open Sans','andorra'),
		'logo_font_size' => '28',
		'logo_font_weight' => '700',
		'text_logo_color' => '#ffffff',
		'enable_logo_tagline' => false,
		'tagline_font_size' => '13',
		'tagline_color' => '#ffffff',
		'tagline_uppercase' => '1',
		'menu_sticky' => '1',
		'menu_top_margin' => '0',
		'google_font_menu' => __('Open Sans','andorra'),
		'nav_font_size' => '13',
		'menu_uppercase' => '1',
		'nav_font_color' => '#cccccc',
		'nav_sub_font_color' => '#f7f7f7',
		'nav_border_color' => '#f7f7f7',
		'nav_bg_color' => '#312450',
		'nav_bg_sub_color' => '#312450',
		'nav_hover_font_color' => '#ffffff',
		'nav_bg_hover_color' => '#312450',
		'nav_cur_item_color' => '#ffffff',
		'google_font_body' => 'Open Sans',
		'body_font_size' => '15',
		'body_font_color' => '#cccccc',
		'a_link_color' => '#ffffff',
		'header_bg_color' => '#312450',
		'header_opacity' => '1',
		'header_top_enable' => false,
		'header_address' => __('1234 Street Name, City Name, United States','andorra'),
		'header_phone' => __('(123) 456-7890','andorra'),
		'header_email' => __('info@yourdomain.com','andorra'),
		'address_color' => '#cccccc',
		'top_head_color' => '#5e42a6',
		'image_slider_on' => true,
		'featured_page_section_on' => true,
		'features_section_on' => false,
		'services_section_on' => false,
		'getin_home_on' => false,
		'blog_section_on' => true,
		'slider_height' => '500',
		'image_slider_cat' => '',
		'slideshow_speed' => '5000',
		'animation_speed' => '800',
		'slider_num' => '3',
		'captions_on' => false,
		'captions_box' => false,
		'captions_box_color' => '#f6f6f6',
		'captions_box_opacity' => '1',
		'captions_pos_top' => '180',
		'captions_width' => '80',
		'captions_title_size' => '44',
		'captions_text_size' => '14',
		'captions_title_color' => '#ffffff',
		'captions_text_color' => '#ffffff',
		'captions_button_color' => '#ffffff',
		'captions_button' => '1',
		'caption_button_text' => __('Read More','andorra'),
		'slider_dots' => '1',
		'footer_bg_color' => '#5e42a6',
		'copyright_bg_color' => '#312450',
		'footer_widget_title_color' => '#ffffff',
		'footer_widget_text_color' => '#ffffff',
		'footer_widgets' => '1',
		'layout_settings' => 'col2-l',
		'blog_posts_home_color' => '#312450',
		'blog_posts_home_image' => '',
		'blog_posts_top_color' => '#5e42a6',
		'blog_posts_top_font_color' => '#ffffff',
		'blog_posts_top_image' => '',
		'blog_content' => 'excerpt',
		'blog_excerpt' => '50',
		'simple_paginaton' => false,
		'post_navigation' => 'below',
		'post_info' => 'above',
		'featured_page_page' => '',
		'featured_page_bg_color' => '#312450',
		'featured_page_bg_image' => '',
		'featured_icon_1' => 'fa-diamond',
		'featured_icon_2' => 'fa-heart-o',
		'featured_icon_3' => 'fa-code',
		'featured_page_header_color' => '#ffffff',
		'featured_page_text_color' => '#cccccc',
		'featured_page_button_text' => __('Read More','andorra'),
		'featured_page_button_color' => '#b74e91',
		'featured_img_post' => '1',
		'features_bg_color' => '#5e42a6',
		'features_bg_image' => '',
		'features_title_color' => '#ffffff',
		'features_text_color' => '#cccccc',
		'features_icons_color' => '#ffffff',
		'features_circle_color' => '#312450',
		'feature_icon_size' => '32',
		'features_page_1' => '',
		'features_page_2' => '',
		'features_page_3' => '',
		'features_page_4' => '',
		'feature_icon_1' => 'fa-tablet',
		'feature_image_1' => '',
		'feature_icon_2' => 'fa-tint',
		'feature_image_2' => '',
		'feature_icon_3' => 'fa-html5',
		'feature_image_3' => '',
		'feature_icon_4' => 'fa-shopping-cart',
		'feature_image_4' => '',
		'services_bg_color' => '#312450',
		'services_bg_image' => '',
		'services_title_color' => '#ffffff',
		'services_text_color' => '#cccccc',
		'services_icon_color' => '#cccccc',
		'service_page_1' =>'',
		'service_page_2' =>'',
		'service_page_3' =>'',
		'service_page_4' =>'',
		'service_page_5' =>'',
		'service_page_6' =>'',
		'service_icon_1' => 'fa-anchor',
		'service_icon_2' => 'fa-cog',
		'service_icon_3' => 'fa-tachometer',
		'service_icon_4' => 'fa-paper-plane',
		'service_icon_5' => 'fa-code',
		'service_icon_6' => 'fa-umbrella',
		'getin_bg_color' => '#5e42a6',
		'getin_bg_image' => '',
		'getin_header_color' => '#ffffff',
		'getin_page' =>'',
		'getin_text_color' => '#cccccc',
		'getin_button_text' => __('Learn More','andorra'),
		'getin_button_color' => '#b74e91',
		'blog_bg_color' => '#312450',
		'blog_bg_image' => '',
		'blog_cat' => '',
		'num_posts' => '3',
		'blog_section_title' => __('Latest News','andorra'),
		'blog_title_color' => '#ffffff',
		'blog_post_color' => '#cccccc',
		'blog_button_color' => '#ffffff',
		'footer_social_color' => '#ffffff',
		'footer_social_bg_color' => '#312450',
		'footer_social_bgh_color' => '#b74e91',
	);
	return apply_filters( 'andorra_get_option_defaults', $defaults );
}

function andorra_get_options() {
    // Options API
    return wp_parse_args( 
        get_option( 'andorra_theme_options', array() ), 
        andorra_get_option_defaults() 
    );
}