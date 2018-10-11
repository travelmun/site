<?php
/**
 * Template Name: Home Page
 *
 * Template to display the home page.
 *
 * @package Andorra
 */
$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
get_header(); ?>
	<div id="main" class="<?php echo esc_attr($andorra_theme_options['layout_settings']); ?>">
	<?php 
		
			if ($andorra_theme_options['image_slider_on'] == '1') {
					
				andorra_unslider_slider(); 
				
			}
			
			if ($andorra_theme_options['features_section_on'] == '1') {
			
				get_template_part( 'features', 'section' );
				
			}
			
			
			if ($andorra_theme_options['services_section_on'] == '1') {	
					
					get_template_part( 'services', 'section' );
				
			}
			
			
			if ($andorra_theme_options['getin_home_on'] == '1') {
			
				get_template_part( 'getintouch', 'section' );
				
			}
			
			if ($andorra_theme_options['blog_section_on'] == '1') {
			
				get_template_part( 'fromblog', 'section' );
				
			} ?>		
	</div><!--main-->
<?php get_footer();