<?php

/**

 * The template for displaying Search Results pages.

 */
?>


<?php get_header(); ?>

        <section id="primary" class="content-area">

            <div id="content" class="site-content" role="main">



            <?php if ( have_posts() ) : ?>
            
                <!--///////////////////////////////////// Hero Archive /////////////////////////////////////-->
                <section class="hero_Apropos">
                    <div class="container HeroArchiveGlobale">
                        <div class="container leftheroPropos">
                            <h1 class="page-title"><?php printf( __( 'Les résultats : %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                        </div><div class="blockLeftArchive">
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
                                            <?php
                                            if (get_the_post_thumbnail())
                                            {
                                                the_post_thumbnail();
                                            } 
                                            else
                                            {
                                                echo '<img src="/wp-content/uploads/2022/05/cropped-Logo_LudiSFM-1.png" alt="Logo LUDI SFM">';
                                            }
                                            ?>
                                        </div>
                                        <div class="blockBottom">
                                            <?php echo wp_trim_words( get_the_content(), 20, "..." ) ?><br><br>
                                            <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
                                        </div>
                                    </a>
                                </article>
         
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

            <?php else : ?>

                <!--///////////////////////////////////// Hero Archive /////////////////////////////////////-->
                <section class="hero_Apropos" style="height: 139px;margin-top: 0px;">
                    <div class="container HeroArchiveGlobale" style="height:150px;">
                        <div class="container leftheroPropos" style="height:150px;">
                            <h1 class="page-title">Désolée, votre recherche n'a pour le moment pas de résultats</h1>
                        </div>
                        <div class="blockLeftArchive" style="height:150px;"></div>
                    </div>
                </section>
                <!--////////////////////////////////// END Hero Archive //////////////////////////////////-->

            <?php endif; ?>

            </div>

        </section>

<?php get_footer(); ?>