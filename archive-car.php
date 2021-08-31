<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lucidicatheme
 */

get_header();
?>



	<div>
    Template for custom post type car
			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		<?php 
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;		$cars = new WP_Query(array(
			'post_type' => 'car',
			'posts_per_page' => 2,
			'paged' => $paged
		));
		if($cars->have_posts()) : while($cars->have_posts()) : $cars->the_post();?>

		<?php get_template_part('partials/content', 'car')  ?>
		<hr>
		<?php endwhile; ?>
		<div class="pagination">
		<?php  lucidicatheme_paginate($cars); ?>
	</div>
		
	<?php
		else : ?>

			<?php get_template_part('partials/content', 'none')  ?>

		<?php endif; ?>

	</div>  

<?php
get_sidebar('car');
get_footer();
