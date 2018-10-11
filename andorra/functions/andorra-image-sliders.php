<?php
/**
 * Andorra functions and definitions
 *
 * @package Andorra
 */

function andorra_unslider_slider() {
	global $post;
	$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
	$slider_cat = $andorra_theme_options['image_slider_cat'];
	$num_of_slides = $andorra_theme_options['slider_num'];
	$button_text = $andorra_theme_options['caption_button_text'];

	$andorra_slider_query = new WP_Query(
		array(
			'posts_per_page' => $num_of_slides,
			'cat' 	=> $slider_cat
		)
	);?>
	<div class="clear"></div>
	<div class="banner">
		<ul>
		<?php while ( $andorra_slider_query->have_posts() ): $andorra_slider_query->the_post(); ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<li style="background: url(<?php echo esc_url($image[0]); ?>) 50% 0 no-repeat;">
			<?php if ($andorra_theme_options['captions_on'] == '1') { ?>	
				<div class="inner">
					<a class="post-title" href="<?php esc_url(the_permalink()); ?>"><h1><?php the_title(); ?></h1></a>
					<?php the_excerpt(); ?>
				</div>
				<?php if ($andorra_theme_options['captions_button'] == '1') { ?>
					<a href="<?php esc_url(the_permalink()); ?>" class="btn"><?php echo esc_html($button_text); ?></a>
				<?php }; ?>
			<?php }; ?>			
			</li>
		<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
	<div class="clear"></div>

<?php 
}

function andorra_localize_scripts_unslider(){
	wp_enqueue_script( 'andorra-slides', get_template_directory_uri() .'/js/andorra-slides.js' , array( 'jquery' ), '', true );
	$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
	$animation_speed = $andorra_theme_options['animation_speed'];
	$slideshow_speed = $andorra_theme_options['slideshow_speed'];
		$datatoBePassed = array(
        	'slideshowSpeed' => esc_attr($slideshow_speed),
        	'animationSpeed' => esc_attr($animation_speed),
    	);
	wp_localize_script( 'andorra-slides', 'php_vars', $datatoBePassed );
}

add_action( 'wp_enqueue_scripts', 'andorra_localize_scripts_unslider' );