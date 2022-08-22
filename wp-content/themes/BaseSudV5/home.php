<?php get_header(); ?>

<div class="container contArchives">
<h1>Toutes l'actus <?php bloginfo('name'); ?></h1>
    <div class="row">
         <?php if( have_posts() ) : ?>
                 <?php while( have_posts() ) : the_post(); ?>
         
                     <article class="col-md-4 col-xs-6">
                        <h3><?php the_title(); ?></h3>
                        <div class="blockTop">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="blockBottom">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
                        </div>
                     </article>
         
                 <?php endwhile; ?>
         <?php endif; ?>
    </div>
</div>

    <div class="site__navigation">
	    <div class="site__navigation__prev">
		    <?php previous_posts_link( 'Page Précédente' ); ?>
        </div>
        <div class="site__navigation__next">
            <?php next_posts_link( 'Page Suivante' ); ?> 
        </div>
    </div>

<?php get_footer(); ?>