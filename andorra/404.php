<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Andorra
 */
$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
get_header(); ?>
<div id="main" class="<?php echo esc_attr($andorra_theme_options['layout_settings']);?>">
	<div class="content-posts-wrap">
		<div id="content-box">
			<div id="post-body">
				<h1><?php esc_html_e('Error 404 - Page not found!', 'andorra'); ?></h1>
				<div class="sorry"><?php esc_html_e('Sorry! It seems that the page you are looking for is not here.', 'andorra'); ?></div>
			</div><!--post-body-->
		</div><!--content-box-->
		<div class="sidebar-frame">
			<div class="sidebar">
				<?php get_sidebar(); ?>
			</div><!--sidebar-->
		</div><!--sidebar-frame-->
	</div><!--content-posts-wrap-->
</div><!--main-->
<?php get_footer();