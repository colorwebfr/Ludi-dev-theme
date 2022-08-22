<?php get_header(); ?>

<?php 
    if ( is_category() ) 
    {
        $title = "Catégorie : " . single_tag_title( '', false );
    }

    elseif ( is_tag() ) 
    {
        $title = "Étiquette : " . single_tag_title( '', false );
    }

    elseif ( is_search() ) 
    {
        $title = "Vous avez recherché : " . get_search_query();
    }
    else 
    {
        $title = "Toutes l'actus ".bloginfo('name');
    }
?>

 	<h1><?php echo $title ?></h1>

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<article class="post">
            <a href="<?php the_permalink(); ?>" class="linkThumb">
                <h3><?php the_title(); ?></h3>
                <div class="blockTop">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="blockBottom">
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
                </div>
            </a>
		</article>

	<?php endwhile; endif; ?>

    <div class="site__navigation">
	    <div class="site__navigation__prev">
		    <?php previous_posts_link( 'Page Précédente' ); ?>
        </div>
        <div class="site__navigation__next">
            <?php next_posts_link( 'Page Suivante' ); ?> 
        </div>
    </div>

<?php get_footer(); ?>