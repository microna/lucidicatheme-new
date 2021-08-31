<?php
/*
Template Name: Homepage template
*/

get_header();
?>


<section>
<div class="container"> 



<div>

		<?php if(have_posts(  )) : while(have_posts( )) :the_post();?>

		<?php get_template_part('partials/content')  ?>
		
		<?php endwhile;
		
			?>
			<div class="pagination">
				<?php echo paginate_links(); ?>
			</div>
			<?php

		else : ?>

			<?php get_template_part('partials/content', 'none')  ?>

		<?php endif; ?>

	</div>

    <!-- <div class = 'cars'>
	<?php 
	$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	$args = array(
		'post_type' => 'car',
		'posts_per_page' => 2,
		'paged' => $paged
	);
	$cars = new WP_Query($args); ?>

		<?php if($cars->have_posts(  )) : while($cars->have_posts( )) :$cars->the_post();?>
		<?php get_template_part('partials/content', 'car')  ?>

		<?php endwhile; lucidicatheme_paginate($cars); else : ?>
			
			<?php get_template_part('partials/content', 'none')  ?>
			<?php wp_reset_postdata() ?>
		<?php endif; ?>
	</div>

	<hr>

	<?php 
	unset($args2);
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1,
	);
	$blogpost = new WP_Query($args); ?>

		<?php if($blogpost->have_posts(  )) : while($blogpost->have_posts( )) :$blogpost->the_post();?>
		<?php get_template_part('partials/content')  ?>
		<?php endwhile; else : ?>
			<?php get_template_part('partials/content', 'none')  ?>
			<?php wp_reset_postdata() ?>
		<?php endif; ?> -->

		
			</div>
		</div>
	</section>



<?php
get_footer();
// get_sidebar();