<?php 
/**
 * @package Andorra
 */
?>
<div class="post-info">
	<span><i class="fa fa-user"></i><?php esc_html_e('by ','andorra'); the_author_posts_link(); ?> </span>
	<span class="separator"> / </span>
	<span><i class="fa fa-calendar"></i><?php printf( get_the_date()); ?> </span>
</div>