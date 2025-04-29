<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <title><?php
 
        global $page, $paged;
     
        wp_title( '|', true, 'right' );
     
        bloginfo( 'name' );
     
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";
     
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'dwhite' ), max( $paged, $page ) );
 
    ?></title>
</head>
<?php $menu = wp_get_nav_menu_items(' main-menu '); ?>

<body <?php body_class(); ?>>
    <!-- start of NAVIGATION -->

    <header class="bgheader">
        <button class="hamburger hamburger--collapse position-fixed z-3" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></spa>
            </span>
        </button>
        <div class="container-fluid">
            <div class="row">
                <nav class="navigationMenu bg-secondary text-light p-4 position-fixed z-2 ">
                    <?php 
                        wp_nav_menu( 
                            array( 
                                'menu'              =>  'main-menu',
                                'theme_location'    =>  'main-menu',
                                'depth'             =>  3,
                                // 'container'         =>  '',
                                // 'container_class'   =>  '',
                                'menu_class'        =>  'nav display-2 d-flex flex-column text-start',
                                'fallback_cb'       =>  false
                            )  
                        );
                    ?>
                </nav>

            </div>
        </div>
        <!-- <div class="container-fluid">
            <div class="row">

            </div>
        </div> -->

    </header>
<!-- end of NAVIGATION -->