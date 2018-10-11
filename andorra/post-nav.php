<?php
/**
 *
 * @package Andorra
 */
if ( is_single() ): ?>
	<ul class="link-pages">
		<li class="next-link"><?php next_post_link('%link', '<i class="fa fa-chevron-right"></i><strong>'.esc_html__('Next', 'andorra').'</strong> <span>%title</span>'); ?></li>
		<li class="previous-link"><?php previous_post_link('%link', '<i class="fa fa-chevron-left"></i><strong>'.esc_html__('Previous', 'andorra').'</strong> <span>%title</span>'); ?></li>
	</ul>
<?php 
endif;