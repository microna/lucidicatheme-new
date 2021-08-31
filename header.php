<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lucidicatheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<button id="button_car" class="button-primary">Show All Car</button>
<div id="car_content" style="border: 1px solid black">
</div>

<?php 

// global $lucicidcatheme_options;

// echo $lucicidcatheme_options['phone'];
?>
 
    <!-- code for main menu -->
     <header class="header">
     <div class="container"> 
        <div class="header__inner">
                <nav class='menu'>
                    <div class="menu-burger">
                        <div class="menu-burger__line1"></div>
                        <div class="menu-burger__line2"></div>
                        <div class="menu-burger__line3"></div>
                    </div>
                    <ul class="menu-nav">
                        <li class="menu__list-item">
                            <a class="menu__list-link" href="#">First</a>
                        </li>
                        <li class="menu__list-item">
                            <a class="menu__list-link" href="#">Second</a>
                        </li>
                        <li class="menu__list-item">
                            <a class="menu__list-link" href="#">Third</a>
                        </li>
                        <li class="menu__list-item">
                            <a class="menu__list-link" href="#">Fourth</a>
                        </li>
                        <li class="menu__list-item">
                            <a class="menu__list-link" href="#">Fifth</a>
                        </li>
                    </ul>

                    <div class="menu-logo">
                         <!-- <?php the_custom_logo() ?>  -->
                        ACME
                    </div>

                    <div class="menu-button">
                        <a class="nav-action__action button-primary" href="">Action</a>
                    </div>
            </div>
            </nav> 

         </div>
    </header>  








    <!-- <?php wp_nav_menu(
  array(
    'theme_location' => 'top-menu',
    // 'menu' => 'Top bar'
    'menu_class' => 'top-bar'
  )
) ?> -->

    <body>

        <?php wp_body_open(); ?>


        <?php




?>