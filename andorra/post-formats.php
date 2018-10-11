<?php 
/**
 * @package Andorra
 *
 *
 * Check for featured images 
 */ 
$andorra_theme_options = andorra_get_options( 'andorra_theme_options' ); 

if ( $andorra_theme_options['blog_content'] == 'excerpt') {
	if (has_post_format( 'gallery' )) {
	
		andorra_gallery_post();
	
	} else {
		if ( has_post_thumbnail() ) { ?>
			<div class="image-holder">
				<div class="thumb-wrapper imgLiquidFill imgLiquid">
					<?php the_post_thumbnail('full'); ?>
				</div>
			</div>
		<?php 
		}

	} 
}

if ( $andorra_theme_options['blog_content'] == 'excerpt') { ?>
	<div class = "text-holder">
		<a class="post-title" href="<?php the_permalink(); ?>"><h2 <?php post_class('entry-title'); ?>><?php the_title(); ?></h2></a>
		<?php if ($andorra_theme_options['post_info'] == 'above') { get_template_part('post','info');}
			 
			the_excerpt(); 
		  	?>
			<?php the_tags('<p class="post-tags"><span>'.esc_html__('Tagged:','andorra').'</span> ','','</p>'); ?>
			<a class="post-button" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','andorra'); ?></a> 
	</div>
<?php } else { ?>
	<div class = "text-holder-full">
		<?php 			
			if (has_post_format( 'gallery' )) {
				andorra_gallery_post();
			} else { 
				if (has_post_format( 'video' )) {
				} else {
					if ( has_post_thumbnail() ) { ?>
						<div class="thumb-wrapper">
							<?php the_post_thumbnail('full'); ?>
						</div><!--thumb-wrapper-->
					<?php 
					} 		
				}	
			}
			
			the_content( esc_html__( 'Continue Reading...', 'andorra' ) ); ?> 
			<?php the_tags('<p class="post-tags"><span>'.esc_html__('Tagged:','andorra').'</span> ','','</p>'); ?>
			<a class="post-button" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','andorra'); ?></a>
	</div>	
<?php } 