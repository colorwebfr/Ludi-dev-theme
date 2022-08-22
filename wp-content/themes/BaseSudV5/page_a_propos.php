<?php
/*
* Template Name: Page A propos
*/
?>

<?php get_header(); ?>
<?php
$visuel_hero = get_field('visuel_hero');
$color_header = get_field('couleur_de_navigation') ? get_field('couleur_de_navigation') : "#0A5CA8";
?>
<!-- ///////////////////////// Hero /////////////////////////// -->
<section class="hero_Apropos">
    <div class="container leftheroPropos">
        <h1 class="title"><span class="litle_Title">À PROPOS de</span><br>LUDI SFM</h1>
    </div>
</section>
<!-- ////////////// END HERO //////////////////////////////// -->

<!--//////////////////// Paragraphe 1 ///////////////////// -->
<section class="paragraphe1_a_propos">
    <div class="container_custom_md">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <?php the_content() ?>
        <?php endwhile; endif;  ?>
    </div>
</section>
<!--//////////////////// END Paragraphe 1 ///////////////////// -->

<!--/////////////////// Section le siège social ////////////// -->
<?php
$titre_1 = get_field('titre');
$contenu_1 = get_field('contenu');
$visuel_1 = get_field('visuel');
?>
<section class="siegeSocial">
    <div class="container_custom_md d-flex justify-content-between align-items-center flex-wrap">
        <div class="SiegeSocial-left">
        <h2 class="title"><?php echo $titre_1; ?></h2>
            <?php echo $contenu_1; ?>
        </div>
        <div class="SiegeSocial-right">
            <img src="<?php echo $visuel_1['url']; ?>" alt="Vue sur le siège Ludi SFM de Nice">
        </div>
    </div>
</section>
<!--/////////////////// Section le siège social /////////////////// -->

<!-- ////////////////// Section Le bâtiment technique ///////////////// -->
<section class="BatTEch">
    <div class="container_custom_md d-flex justify-content-between align-items-center flex-column">
        <?php
        $titre_2 = get_field('titre_troisieme_section');
        $contenu_2 = get_field('contenu_troisieme_section');
        $visuel_2 = get_field('visuel_troisieme_section');
        ?>
        <div class="SiegeSocial-top">
            <h2 class="title"><?php echo $titre_2; ?></h2>
            <?php echo $contenu_2; ?>
        </div>
        <div class="SiegeSocial-bottom">
            <img src="<?php echo $visuel_2['url']; ?>" alt="Bannière Ludi SFM mettant en avant la marque Link Zone">
        </div>
    </div>
</section>
<!-- ////////////// END Section Le bâtiment technique ///////////////// -->

 <style>
    .page-template-page_a_propos section.hero_Apropos {
        background-image: url("<?php echo $visuel_hero['url']; ?>");
    }
    header {
        background: <?php echo $color_header; ?> !important;
    }
 </style>

<?php get_footer(); ?>