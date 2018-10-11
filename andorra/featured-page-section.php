<?php
/**
 * @package Andorra
 */
$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
$featured_page_bg_image = $andorra_theme_options['featured_page_bg_image'];

if ($featured_page_bg_image != '') { ?>
	<div class="about" style="background: url(<?php echo esc_url($featured_page_bg_image); ?>) 50% 0 no-repeat fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"> 
<?php } else { ?>
	<div class="featured-page">
<?php } ?>
	<div id="featured-page-wrap">
		<div class="featured-page-div">
			<?php $page = array();
			$featured_page = $andorra_theme_options['featured_page_page'];
			if ( 'page-none-selected' != $featured_page ) {
				$page[] = $featured_page;
			} 
			
			$args = array(
				'posts_per_page' => 1,
				'post_type' => 'page',
				'post__in' => $page,
				'orderby' => 'post__in'
			);
			
			$andorra_featured_page_query = new WP_Query( $args );
			
			if ( $andorra_featured_page_query->have_posts() ) :
				while ( $andorra_featured_page_query->have_posts() ) : $andorra_featured_page_query->the_post(); 
					the_title( sprintf( '<h1 class="boxtitle wow bounceInLeft" data-wow-delay="0.1s"><a href="%s" rel="bookmark">', esc_url( get_permalink()) ), '</a></h1>' ); 
					the_content(); ?>
					<ul class="icons major">
						<li><span class="icon <?php echo esc_html($andorra_theme_options['featured_icon_1']); ?> major style1"><span class="label"></span></span></li>
						<li><span class="icon <?php echo esc_html($andorra_theme_options['featured_icon_2']); ?> major style2"><span class="label"></span></span></li>
						<li><span class="icon <?php echo esc_html($andorra_theme_options['featured_icon_3']); ?> major style3"><span class="label"></span></span></li>
					</ul>
					<a href="<?php echo esc_url(get_permalink()); ?>" class="featured-page-link"><?php echo esc_html($andorra_theme_options['featured_page_button_text']); ?></a>

				<?php 
				endwhile;
			else : ?>
				<h1 class="boxtitle wow bounceInLeft" data-wow-delay="0.1s"><?php bloginfo('name'); ?></h1>
				<p></p>
				<ul class="icons major">
					<li><span class="icon fa-diamond major style1"><span class="label"></span></span></li>
					<li><span class="icon fa-heart-o major style2"><span class="label"></span></span></li>
					<li><span class="icon fa-code major style3"><span class="label"></span></span></li>
				</ul>
				<a href="<?php echo esc_url( home_url( '/' )) ?>" class="featured-page-link"><?php echo esc_html($andorra_theme_options['featured_page_button_text']); ?></a>
				<?php
			endif; wp_reset_postdata(); ?>	
		</div>
	</div>
</div>