<article <?php post_class('custom_car_class'); ?> id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>">

    My custom template
    <h1><?php echo get_the_title(); ?></h1>
    <div><?php the_content(); ?></div>
    <div><?php the_content(); ?></div>
    <a href="<?php the_permalink(); ?>">Read more</a>
    <div><?php 
      echo get_post_meta(get_the_ID(),'custom_price', true);
    ?></div>
    <?php 
    if(has_post_thumbnail(get_the_ID())){
    //   the_post_thumbnail('car-cover');
      echo get_the_post_thumbnail(get_the_ID(), array(550,720));
    };
?>
</article>