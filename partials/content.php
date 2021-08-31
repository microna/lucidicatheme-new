<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>">
    <h1><?php echo get_the_title(); ?></h1>
    <div><?php the_content(); ?></div>
    <a href="<?php the_permalink(); ?>">Read more</a>
</article>