<?php
/**
 * @package Andorra
 */
$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
$services_bg_image = $andorra_theme_options['services_bg_image'];

if ($services_bg_image !='') { ?>
	<div id="services" style="background: url(<?php echo esc_url($services_bg_image); ?>) 50% 0 no-repeat fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
<?php } else { ?>
	<div id="services">
<?php } ?>
	<div id="services-wrap">
			<div class="services">
				<div class="row no-margin">
					<?php $pages = array();
					for ($count=1; $count <= 6; $count++) { 
						$service_page = $andorra_theme_options['service_page_' . $count ];
							if ( 'page-none-selected' != $service_page ) {
								$pages[] = $service_page;
							}
					
					} 
				
					$args = array(
						'posts_per_page' => 6,
						'post_type' => 'page',
						'post__in' => $pages,
						'orderby' => 'post__in'
					);
				
					$andorra_services_query = new WP_Query( $args );
				
					if ( $andorra_services_query->have_posts() ) :
						$count = 1;
						while ( $andorra_services_query->have_posts() ) : $andorra_services_query->the_post();
						?>
							<div class="row-item row-item-<?php echo esc_html($count) ?>">
								<div class="service wow bounceIn" data-wow-delay="0.2s">
									<div class="item-wrapper">
										<div class="icon-holder">
											<i class="fa <?php echo esc_html($andorra_theme_options['service_icon_' . $count ]); ?>"></i>
										</div>
										<div class="content-holder">
											<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
											<?php the_excerpt(); ?>
										</div>
									</div><!--item-wrapper-->
								</div><!--service-->
							</div><!--row-item-->

				<?php	$count++;
						endwhile;
					else : ?>
						<div class="row-item">
							<div class="service wow bounceIn" data-wow-delay="0.2s">
								<div class="item-wrapper">
									<div class="icon-holder">
										<i class="fa fa-diamond"></i>

									</div>
									<div class="content-holder">
										<h3><?php esc_html_e('Easy to Use', 'andorra'); ?></h3>
										<p></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row-item">
							<div class="service wow bounceIn" data-wow-delay="0.2s">
								<div class="item-wrapper">
									<div class="icon-holder">
										<i class="fa fa-television"></i>

									</div>
									<div class="content-holder">
										<h3><?php esc_html_e('Creative Elements', 'andorra'); ?></h3>
										<p></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row-item">
							<div class="service wow bounceIn" data-wow-delay="0.2s">
								<div class="item-wrapper">
									<div class="icon-holder">
										<i class="fa fa-tablet"></i>

									</div>
									<div class="content-holder">
										<h3><?php esc_html_e('Responsive Design', 'andorra'); ?></h3>
										<p></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row-item">
							<div class="service wow bounceIn" data-wow-delay="0.2s">
								<div class="item-wrapper">
									<div class="icon-holder">
										<i class="fa fa-cogs"></i>

									</div>
									<div class="content-holder">
										<h3><?php esc_html_e('Powerful Customizer', 'andorra'); ?></h3>
										<p></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row-item">
							<div class="service wow bounceIn" data-wow-delay="0.2s">
								<div class="item-wrapper">
									<div class="icon-holder">
										<i class="fa fa-key"></i>


									</div>
									<div class="content-holder">
										<h3><?php esc_html_e('Security Standards', 'andorra'); ?></h3>
										<p></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row-item">
							<div class="service wow bounceIn" data-wow-delay="0.2s">
								<div class="item-wrapper">
									<div class="icon-holder">
										<i class="fa fa-paper-plane-o"></i>

									</div>
									<div class="content-holder">
										<h3><?php esc_html_e('Stellar Support', 'andorra'); ?></h3>
										<p></p>
									</div>
								</div>
							</div>
						</div>
					<?php 	
					endif; wp_reset_postdata(); ?>
				</div><!--row-->
			</div><!--services-left-->
	</div><!--services-wrap-->
</div><!--services-->