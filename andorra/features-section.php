<?php
/**
 * @package Andorra
 */
$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
$features_bg_image = $andorra_theme_options['features_bg_image'];

if ($features_bg_image !='') { ?>
	<div id="features" style="background: url(<?php echo esc_url($features_bg_image); ?>) 50% 0 no-repeat fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
<?php } else { ?>
	<div id="features">
<?php } ?>
	<div id="features-wrap">
		<?php $pages = array();
					for ($count=1; $count <= 4; $count++) { 
						$feature_page = $andorra_theme_options['features_page_' . $count ];
							if ( 'page-none-selected' != $feature_page ) {
								$pages[] = $feature_page;
							}
					
					}
					
					$args = array(
						'posts_per_page' => 4,
						'post_type' => 'page',
						'post__in' => $pages,
						'orderby' => 'post__in'
					);
					
					$andorra_features_query = new WP_Query( $args );
					
					if ( $andorra_features_query->have_posts() ) :
						$count = 1;
						while ( $andorra_features_query->have_posts() ) : $andorra_features_query->the_post();
						?>
							<div class="feature feature-item-<?php echo intval($count) ?> wow bounceIn" data-wow-delay="0.2s">
								<?php if ($andorra_theme_options['feature_image_'. $count] !='') { ?>
									<a href="<?php echo esc_url(get_permalink()); ?>">
										<div class="circle">
											<img alt="<?php esc_attr_e('Featured Image', 'andorra'); ?>" src="<?php echo esc_url($andorra_theme_options['feature_image_'. $count]) ?>">
										</div><!--circle-->
									</a>
							<?php } else { ?>
									<a href="<?php echo esc_url(get_permalink()); ?>">
										<div class="circle">
											<i class="fa <?php echo esc_html($andorra_theme_options['feature_icon_'. $count]); ?>"></i>
										</div><!--circle-->
									</a>
							<?php } ?>
							<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink()) ), '</a></h3>' ); ?>
							<?php the_excerpt(); ?>
							</div><!--feature-->
						<?php	$count++;
						endwhile;
					else : ?>
						<div class="feature feature-item-1 wow bounceIn" data-wow-delay="0.2s">
							<div class="circle">
								<i class="fa fa-tablet"></i>
							</div>
							<h3><?php esc_html_e('Responsive Design', 'andorra'); ?></h3>
							<p></p>
						</div>
						<div class="feature feature-item-2 wow bounceIn" data-wow-delay="0.2s">
							<div class="circle">	
								<i class="fa fa-tint"></i>
							</div>
							<h3><?php esc_html_e('Unlimited Colors', 'andorra'); ?></h3>
							<p></p>
						</div>
						<div class="feature feature-item-3 wow bounceIn" data-wow-delay="0.2s">
							<div class="circle">	
								<i class="fa fa-html5"></i>
							</div>
							<h3><?php esc_html_e('Clean Code', 'andorra'); ?></h3>
							<p></p>
						</div>
						<div class="feature feature-item-4 wow bounceIn" data-wow-delay="0.2s">
							<div class="circle">	
								<i class="fa fa-shopping-cart"></i>
							</div>
							<h3><?php esc_html_e('eCommerce Ready', 'andorra'); ?></h3>
							<p></p>
						</div> 
					<?php
					endif; wp_reset_postdata(); ?>
	</div><!--features-wrap-->
</div><!--features-->