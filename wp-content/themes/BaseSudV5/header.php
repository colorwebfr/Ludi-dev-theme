<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

        <?php wp_body_open(); ?>

    <?php
    $terms = get_the_terms( $post->ID , 'Marque' ); 
    $marque_name = $terms[0]->name;
    foreach($terms as $term){
      $colorNavCustom = get_field('couleur_de_fond_de_la_navigation', $term) ? get_field('couleur_de_fond_de_la_navigation', $term) : '';
    }
    $addClassForNotLogged = !is_user_logged_in() ? "itemMenuNone" : "";
    ?>

    <header class="header" style="background: <?php echo $colorNavCustom; ?>;">
        <div class="containerNav container">
            <a href="<?php echo home_url( '/' ); ?>">
                <?php
                if ( function_exists( 'the_custom_logo' ) ) 
                {
                    the_custom_logo();
                }
                ?>
            </a>
            <div class="btnBurgerMenu">
                <span class="buger1">|</span>
                <span class="buger2">|</span>
                <span class="buger3">|</span>
            </div>

            <nav class="menuHeader <?php echo $addClassForNotLogged; ?>">
                <?php
                wp_nav_menu( array('theme_location' => 'main', 'container' => 'ul', 'menu_class' => 'menuTopBaseSud',) );
                ?>           
                <?php
                if ( is_user_logged_in())
                {
                    get_search_form(); 
                }
                ?>
            </nav>  
        </div>
    </header>

    <div class="Main_container">

    <?php if(!is_page('mentions-legales') || !is_page('privacy-policy') || !is_page('contact')): ?>
    <div class="rs_head">
        <ul>
            <li><a href="https://www.linkedin.com/company/ludisfm/" class="rs_Header_home" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UClO-k15YJXBjTpGNiklzwhQ/featured" class="rs_Header_home" target="_blank"><i class="fa-brands fa-youtube-square"></i></a></li>
        </ul>
    </div>
    <?php endif; ?>
