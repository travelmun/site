<?php
/**
 * @package Andorra
 */  
$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
?>
<div id="copyright">
	<div class="copyright-wrap">
		<span class="left"><i class="fa fa-copyright"></i><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="<?php esc_attr_e('home','andorra')?>"><?php bloginfo( 'name' ); ?></a></span>
		<span class="right"><?php printf(__( '%1$s powered by %2$s', 'andorra' ),'<a href="'.esc_url( __( 'http://vmthemes.com/andorra/', 'andorra')).'">Andorra Theme</a>','<a href="' . esc_url( __( 'https://wordpress.org/', 'andorra' ) ) . '">WordPress</a>'); ?></span>
	</div>
</div><!--copyright-->