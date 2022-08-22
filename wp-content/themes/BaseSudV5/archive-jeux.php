<?php get_header(); ?>

<!--///////////////////////////////////// Hero Archive /////////////////////////////////////-->
<?php
$accroche_hero = get_field('titre_daccroche_jeux', 'option') ? get_field('titre_daccroche_jeux', 'option') : "LUDI SFM PRESENTE :";
$title_hero = get_field('titre_jeux', 'option') ? get_field('titre_jeux', 'option') : "Les Jeux";
?>
<section class="hero_Apropos">
    <div class="container HeroArchiveGlobale">
        <div class="container leftheroPropos">
            <h1 class="title"><?php echo $accroche_hero; ?><br><?php echo $title_hero; ?></h1>
        </div>
        <div class="blockLeftArchive">
        </div>
    </div>
</section>
<!--////////////////////////////////// END Hero Archive //////////////////////////////////-->

<div class="container contArchives">
    <div class="row">
         <?php if( have_posts() ) : ?>
                 <?php while( have_posts() ) : the_post(); ?>
         
                     <article class="col-md-4 col-xs-6">
                        <a href="<?php the_permalink(); ?>" class="linkThumb">
                            <h3><?php the_title(); ?></h3>
                            <div class="blockTop">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="blockBottom">
                                <?php echo wp_trim_words( get_the_content(), 20, "..." ) ?><br><br>
                                <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
                                <?php $terms = get_the_terms( get_the_ID(), 'Marque' );
                                foreach ($terms as $term ) {
                                    $imgHeroTaxArch = get_field('logo', $term);
                                    $urlVisuel = $imgHeroTaxArch['url'];
                                    $termName = $term->name;
                                }
                                ?>
                                <img src="<?php echo $urlVisuel; ?>" alt="<?php echo $termName; ?>" class="igtLOGOcardSlide">
                            </div>
                        </a>
                     </article>
         
                 <?php endwhile; ?>
         <?php endif; ?>
    </div>
</div>

    <div class="site__navigation container">
	    <div class="site__navigation__prev">
		    <?php previous_posts_link( 'Page Précédente' ); ?>
        </div>
        <div class="site__navigation__next">
            <?php next_posts_link( 'Page Suivante' ); ?> 
        </div>
    </div>

<?php
$color_nav = get_field('couleurs_de_navigation__page_darchives_jeux_', 'option') ? get_field('couleurs_de_navigation__page_darchives_jeux_', 'option') : "#000000";
$visuelHero = get_field('visuel_archives_jeux', 'option') ? "url('".get_field('visuel_archives_jeux', 'option')['url']."')" : "url('/wp-content/uploads/2022/05/machine-a-sous.png')"; 
$couleur_fondHero = get_field('couleur_de_fond_hero_jeux', 'option') ? get_field('couleur_de_fond_hero_jeux', 'option') : "linear-gradient(120deg, rgba(22,42,111,1) 44%, rgb(199 98 196) 100%);"; 
?>

<style>
    header {
        background: <?php echo $color_nav; ?> !important;
    }
    .post-type-archive .blockLeftArchive {
        background-image: <?php echo $visuelHero ?> !important;
    }
    .post-type-archive section.hero_Apropos::before {
        background: <?php echo $couleur_fondHero; ?> !important;
    }
</style>

<?php get_footer(); ?>