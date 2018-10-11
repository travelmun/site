<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Andorra
 */
$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
get_header(); ?>
	<div id="main" class="<?php echo esc_attr($andorra_theme_options['layout_settings']); ?>">
	<?php 
		if ( is_front_page() && ! is_home() ) {
		

				get_template_part( 'content-posts', 'home' );
					
		
		} else {
		
			get_template_part( 'content', 'posts' );
		
		} ?>
	</div><!--main-->
<?php get_footer();