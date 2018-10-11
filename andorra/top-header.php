<?php
/**
 * @package Andorra
 */
$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
?>
<div id="header-top">
	<div class="pagetop-inner clearfix">
		<div class="top-left left">
			<div id="social-top">
				<?php get_template_part( 'menu', 'social' ); ?>		
			</div>
		</div>
		<div class="top-right right">
			<span class="top-address"><i class="fa fa-home"></i><?php echo esc_html($andorra_theme_options['header_address']); ?></span>
			<span class="top-phone"><i class="fa fa-phone"></i><?php echo esc_html($andorra_theme_options['header_phone']); ?></span>
			<span class="top-email"><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_html($andorra_theme_options['header_email']); ?>"><?php echo esc_html($andorra_theme_options['header_email']); ?></a></span>
		</div>
	</div>
</div>