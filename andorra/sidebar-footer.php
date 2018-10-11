<?php
/**
 * @package Andorra
 */

$andorra_theme_options = andorra_get_options( 'andorra_theme_options' ); ?>

<div id="footer-box" class="footer-v4">
	<div class="sidebar-footer">
		<div>
			<?php if (function_exists( 'has_custom_logo' ) && has_custom_logo()) {
				andorra_the_custom_logo();
			} else { ?>
				<div class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ) ?>"><?php bloginfo( 'name' ); ?></a>
				</div>
			<?php }?>
			<h5 class="site-description"><?php bloginfo('description'); ?></h5>
			<div class="social">
				<div id="social-wrap">
					<div id="social-bar">
						<?php get_template_part( 'menu', 'social' ); ?>		
					</div>
				</div>
			</div>		
		</div>
	</div>
	<div class="sidebar-footer">
		<div>
			<?php dynamic_sidebar('footer-widget-1'); ?>
		</div>
	</div>
	<div class="sidebar-footer">
		<div>	
			<?php dynamic_sidebar('footer-widget-2'); ?>
		</div>
	</div>
	<div class="sidebar-footer lastone">
		<div>
			<?php dynamic_sidebar('footer-widget-3'); ?>
		</div>
	</div>
</div>