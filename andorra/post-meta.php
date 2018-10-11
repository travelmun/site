<?php 
/**
 * @package Andorra
 */
?>
<?php if (!is_single()) { ?>
	<div class="clear"></div>
	<div class="meta">
		<span><i class="fa fa-calendar"></i><a class="p-date" title="<?php the_time(); ?>" href="<?php the_permalink(); ?>"><span class="post_date date updated"><?php the_time('F j, Y'); ?></span></a></span>
		<span class="separator"> / </span>
		<span><i class="fa fa-comments-o"></i><a href="<?php comments_link(); ?>"><?php comments_number( __('No Comments','andorra'), __('1 Comment','andorra'), __('% Comments','andorra')); ?></a></span>
		<span class="separator"> / </span>
		<span><i class="fa fa-arrow-circle-o-right"></i><a href="<?php the_permalink(); ?>"><?php esc_html_e('More','andorra'); ?></a></span>
	</div>
<?php }