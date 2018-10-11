<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Andorra
 */
$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
get_header(); ?>
	<div id="main" class="<?php echo esc_attr($andorra_theme_options['layout_settings']);?>">
	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'single');
		
		endwhile;
	?>
	</div><!--main-->
<?php get_footer();