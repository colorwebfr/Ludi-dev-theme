<?php get_header(); ?>
    <!--//////////////////////////// Hero Taxonomie List ////////////////////////////////////-->
    <?php
    $listing_for = isset($wp_query->query_vars['listing_for']) ? urldecode($wp_query->query_vars['listing_for']) : "";
    $term = get_queried_object();

    $imgHeroTaxArch = get_field('logo_pour_le_hero_de_la_page_de_marque', $term);
    $imgHeroTaxArchSlide = get_field('logo', $term);
    $sloganHeroTaxArch = get_field('slogan_hero', $term);
    
    $terms = get_the_terms( $post->ID , 'Marque' ); 
    foreach($terms as $term){
        $colorNavCustom = get_field('couleur_de_fond_de_la_navigation', $term) ? get_field('couleur_de_fond_de_la_navigation', $term) : 'rgba(0,69,136,1) 59%)';
        $color_machineAdminstr = get_field('couleur_de_fond_de_la_navigation', $term) ? get_field('couleur_de_fond_de_la_navigation', $term) : 'url(#Dégradé_sans_nom_2);';
        $banniere_hero_notempty = get_field('banniere_hero', $term);
    }
    ?>

 	<section class="heroMarque" data-post-type="<?php echo $listing_for; ?>" style="<?php if($banniere_hero_notempty){ ?>background-image: url('<?php echo $banniere_hero_notempty['url']; ?>');background-size:cover;background-position:center;background-repeat:no-repeat;width:100%; <?php } ?>">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="blockLeftHeroMarque">
                <h1 class="titleMarque">
                    <span class="litle_Title">Notre Partenaire</span><br>
                    <?php echo $term->name; ?>
                </h1>
                <p class="subTitle_hero">
                    <?php echo $sloganHeroTaxArch; ?>
                </p>
                <a href="" data_post_type="machines" data_term_tax="<?php echo $term->name; ?>" style="background:<?php echo $colorNavCustom ?>;" class="btn_standartSite">Machines</a>
                <a href="" data_post_type="jeux" data_term_tax="<?php echo $term->name; ?>" style="background:<?php echo $colorNavCustom ?>;" class="btn_standartSite">Jeux</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="img-trapezoidale-custom" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 498 402.04" style="fill:<?php echo $colorNavCustom ?>;">
                    <defs>
                        <linearGradient id="linear-gradient" x1="1.486" y1="0.077" x2="0.402" y2="0.965" gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="<?php echo $colorNavCustom ?>"/>
                        <stop offset="1" stop-color="<?php echo $colorNavCustom ?>"/>
                        </linearGradient>
                        <filter id="Tracé_2427" x="0" y="0" width="498" height="402.04" filterUnits="userSpaceOnUse">
                        <feOffset dx="10" dy="10" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="15" result="blur"/>
                        <feFlood flood-opacity="0.161"/>
                        <feComposite operator="in" in2="blur"/>
                        <feComposite in="SourceGraphic"/>
                        </filter>
                    </defs>
                    <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Tracé_2427)">
                        <path id="Tracé_2427-2" data-name="Tracé 2427" d="M15.615-.171,392.307-.265c8.624,0,18.049,7.86,15.162,16.027L287.685,287.417c-3.585,8.382-9.9,24.5-21.151,24.357H15.615A15.615,15.615,0,0,1,0,296.159V15.444A15.615,15.615,0,0,1,15.615-.171Z" transform="translate(35 35.26)" fill="url(#linear-gradient)"/>
                    </g>
                </svg>
            </div>

            <div class="blockRightHero">
                <img src="<?php echo $imgHeroTaxArch['url']; ?>" alt="<?php echo $imgHeroTaxArch['alt']; ?>" class="logoMarque">
            </div>
        </div>
    </section>
    <!--///////////////////////// END HERO TAXONOMIE ////////////////////////////////////-->

    <div class="containTAX">

        <!--////////////////////////////// HERO Carrousel Tax /////////////////////////////-->
        <?php if( have_posts() ) : ?> 
            <section class="Taxonomie_archives NewsLudi">
                <div class="Taxonomie_archives container title">
                    <h3 class="Taxonomie_archives title">
                        <span class="Taxonomie_archives litle_Title">FOCUS SUR</span><br>
                         <?php echo ("LES NOUVEAUTÉS $term->name"); ?>
                    </h3>
                    <p class="Taxonomie_archives text_subTitle_carrousel">
                        <?php
                            $termObj = get_queried_object();
                            echo get_field('intro_focus_sur_les_nouveautes', $termObj); 
                         ?>
                    </p>
                </div>
    
                <!-- CARROUSEL JEUX -->
                <div class="containerCustom" style="display:block;">
                    <div class="Taxonomie_archives NewLudicenter">   
    
                    <?php while( have_posts() ) : the_post(); ?>
    
                        <?php
                        $image_id = get_post_thumbnail_id();
                        $alt = get_post_meta ( $image_id, '_wp_attachment_image_alt', true );
    
                        $refMarque = get_field('reference');
                        $shortRef = $refMarque ? substr($refMarque, 0, 20).' ...' : '';
                        $shortTitle = substr(get_the_title(), 0, 14).' ...';
                        ?>
                    
                        <div class="Taxonomie_archives block-card-carouselHome">
                            <div class="Taxonomie_archives topCARDimg">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>"  class="Taxonomie_archives imgCarrouselHome" alt="<?php echo $alt; ?>"/>
                            </div>
                            <div class="Taxonomie_archives blockCardTextSlide">
                                <h3 class="Taxonomie_archives titleSlideBottom"><?php echo $shortTitle; ?><br><span class="Taxonomie_archives litle_Title"><?php echo $shortRef; ?></span></h3>
                                <div class="Taxonomie_archives textCardSlide">
                                    <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
                                </div>
                                <div class="Taxonomie_archives row_btnLogo">
                                    <a href="<?php the_permalink(); ?>" class="Taxonomie_archives btnSlideBottom" style="background:<?php echo $colorNavCustom ?>;">Découvrir</a>
                                    <img src="<?php echo $imgHeroTaxArchSlide['url']; ?>" alt="<?php echo $imgHeroTaxArchSlide['alt']; ?>" class="Taxonomie_archives igtLOGOcardSlide">
                                </div>
                            </div>
                        </div>
    
                    <?php endwhile; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <!--////////////////////////////// END HERO Carrousel Tax /////////////////////////////-->

            <!--////////////////////////////// First Carrousel Tax /////////////////////////////-->
        <?php
        $args = array(
            'post_type' => 'jeux',
            'post_status' => 'publish',
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'Marque',
                    'field'    => 'slug',
                    'terms'    => array( $term->name )
                ),
            )
        );
        $query_jeux = new WP_Query( $args );
        ?>
        
        <?php if( $query_jeux->have_posts() ) : ?> 
            <section class="Taxonomie_archives JeuxIGTsection">
                <div class="Taxonomie_archives container title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="svg_machine" xmlns:xlink="http://www.w3.org/1999/xlink" id="Calque_1" viewBox="0 0 62 62"><defs><style>.cls-1{fill:<?php echo $color_machineAdminstr ?>}</style><linearGradient id="Dégradé_sans_nom_2" x1="0" y1="31" x2="62" y2="31" gradientTransform="matrix(1, 0, 0, 1, 0, 0)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#1e58a5"/><stop offset="1" stop-color="#183e72"/></linearGradient></defs><path class="cls-1" d="M31,0C13.88,0,0,13.88,0,31s13.88,31,31,31,31-13.88,31-31S48.12,0,31,0Zm-12.67,16.35c1.37-4.04,6.62-7.09,12.22-7.09s10.55,2.85,12.09,6.76c.14,.36-.03,.78-.39,.93h0c-.35,.14-.75-.03-.89-.39h0c-1.15-2.93-5.23-5.88-10.8-5.88s-9.9,3.16-10.9,6.13c-.09,.28-.36,.48-.66,.48-.08,0-.16-.01-.23-.04h0c-.36-.14-.55-.54-.43-.9Zm-4.02,7.84v-3.43c-.01-1.71,1.36-3.12,3.08-3.14h26.33c1.72,.02,3.09,1.42,3.08,3.14v17.99l.82,1.64c.18,.35,.04,.77-.3,.95h0c-.1,.05-.2,.08-.31,.08-.27,0-.51-.15-.62-.39l-.9-1.8c-.05-.1-.07-.21-.07-.32V20.76c0-.94-.74-1.71-1.68-1.72H17.39c-.94,.01-1.69,.78-1.68,1.72v3.42c.04,.39-.24,.74-.63,.78h-.01c-.39,.04-.72-.24-.76-.63,0-.05,0-.1,0-.14Zm2.48,16.25c.12-.37,.52-.57,.88-.44,.37,.13,.56,.53,.44,.9-.01,.03-.03,.07-.04,.1l-.03,.06h24.99l-.02-.06c-.18-.35-.04-.78,.3-.96h0c.35-.18,.77-.04,.94,.31,.02,.03,.03,.07,.04,.1l.85,2.08c.15,.36-.02,.77-.38,.93-.09,.04-.18,.05-.27,.05-.28,0-.54-.17-.65-.44l-.24-.59H17.46l-.24,.58c-.11,.26-.36,.43-.65,.44-.09,0-.18-.02-.27-.06-.36-.15-.53-.57-.38-.92l.86-2.08h0Zm26.38-2.23c.39,0,.71,.32,.71,.71,0,.39-.32,.71-.71,.71H17.94c-.39,0-.7-.32-.7-.71,0-.39,.31-.71,.7-.71h25.23Zm-24.26-3.98v-11.2h0c0-.39,.31-.71,.7-.71h21.89c.39,0,.7,.32,.7,.71v11.2c0,.39-.31,.71-.7,.71H19.61c-.39,0-.7-.32-.7-.71Zm26.71,9.68c.39,0,.71,.32,.71,.71s-.32,.71-.71,.71H15.48c-.39,0-.7-.32-.7-.71h0c0-.39,.31-.71,.7-.71h30.14Zm-28.84,6.21h-4.62c-.39,0-.7-.32-.7-.71v-4.78c0-.11,.03-.22,.08-.32l2.77-5.54v-11.02c.03-.34,.3-.6,.63-.63,.38-.04,.73,.25,.76,.63v11.2c0,.11-.03,.22-.08,.32l-2.76,5.53v3.9h3.92c.39,0,.71,.32,.71,.71s-.32,.71-.71,.71Zm32.86-.71h0c0,.39-.31,.71-.7,.71H20.56c-.39,0-.71-.32-.71-.71s.32-.71,.71-.71h27.69v-3.89l-.5-1c-.15-.36,.03-.78,.39-.93,.32-.13,.68,0,.86,.29l.57,1.14c.05,.1,.08,.21,.08,.32v4.78Zm.73-17.26c-.06,.97-.89,1.7-1.86,1.65h-.4c-.39,0-.71-.32-.71-.71,0-.39,.32-.71,.71-.71h.4c.29,0,.46-.16,.46-.23v-7.01c0-.07-.17-.23-.46-.23h-.54c-.33-.04-.59-.3-.63-.63-.04-.39,.24-.75,.63-.79h.54c.97-.05,1.79,.68,1.86,1.65v7.01Zm2.66-3.49h0c0,.39-.31,.71-.7,.71h-.93c-.39,0-.71-.32-.71-.71,0-.39,.32-.71,.71-.71h.23v-7.62c0-.39,.31-.71,.7-.71h0c.39,0,.7,.31,.7,.7v8.34Zm-.73-9.93c-1.21-.02-2.18-1.02-2.16-2.24,.02-1.21,1.02-2.18,2.24-2.16,1.2,.01,2.17,1,2.16,2.2v.04c-.02,1.21-1.02,2.18-2.24,2.16Zm-26.09,5.04h-5.89v9.77h5.89v-9.77Zm-.77,3.12l-2.11,4.51c-.12,.24-.36,.4-.63,.4-.1,0-.21-.03-.3-.07-.35-.17-.49-.6-.33-.95l1.63-3.48h-1.99c-.39,0-.71-.31-.71-.71,0-.39,.32-.71,.71-.71h3.09c.39,0,.7,.33,.7,.72,0,.1-.02,.21-.07,.3Zm15.35-3.12h-5.89v9.77h5.9v-9.77Zm-.77,3.12l-2.11,4.51c-.12,.24-.36,.4-.63,.4-.1,0-.21-.03-.3-.07-.35-.17-.5-.6-.33-.95l1.64-3.48h-1.99c-.39,0-.71-.31-.71-.71,0-.39,.32-.71,.71-.71h3.09c.39,0,.7,.33,.7,.72,0,.1-.02,.21-.07,.3Zm-6.53-3.12h-5.89v9.77h5.89v-9.77Zm-.76,3.12l-2.11,4.51c-.12,.24-.36,.4-.63,.4-.1,0-.21-.03-.3-.07-.35-.17-.5-.6-.33-.95l1.64-3.48h-1.99c-.39,0-.71-.31-.71-.71,0-.39,.32-.71,.71-.71h3.09c.39,0,.7,.33,.7,.72,0,.1-.02,.21-.07,.3Z"/></svg>
                    <h3 class="Taxonomie_archives title">
                         <?php echo ("LES JEUX $term->name"); ?>
                    </h3>
                </div>
    
                <!-- CARROUSEL JEUX -->
                <div class="containerCustom">
                    <div class="Taxonomie_archives JeuxIGT">   
    
                    <?php while( $query_jeux->have_posts() ) : $query_jeux->the_post(); ?>
    
                        <?php
                        $image_id = get_post_thumbnail_id();
                        $alt = get_post_meta ( $image_id, '_wp_attachment_image_alt', true );
                        $refMarque = get_field('reference');
                        $shortRef = $refMarque ? substr($refMarque, 0, 20).' ...' : '';
                        $shortTitle = substr(get_the_title(), 0, 14).' ...';
                        ?>
                    
                        <div class="Taxonomie_archives block-card-carouselHome">
                            <div class="Taxonomie_archives topCARDimg">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>"  class="Taxonomie_archives imgCarrouselHome" alt="<?php echo $alt; ?>"/>
                            </div>
                            <div class="Taxonomie_archives blockCardTextSlide">
                                <h3 class="Taxonomie_archives titleSlideBottom"><?php echo $shortTitle; ?><br><span class="Taxonomie_archives litle_Title"><?php echo $shortRef; ?></span></h3>
                                <div class="Taxonomie_archives textCardSlide">
                                    <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
                                </div>
                                <div class="Taxonomie_archives row_btnLogo">
                                    <a href="<?php the_permalink(); ?>" class="Taxonomie_archives btnSlideBottom" style="background:<?php echo $colorNavCustom ?>;">Découvrir</a>
                                    <img src="<?php echo $imgHeroTaxArchSlide['url']; ?>" alt="<?php echo $imgHeroTaxArchSlide['alt']; ?>" class="Taxonomie_archives igtLOGOcardSlide">
                                </div>
                            </div>
                        </div>
    
                    <?php endwhile; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <!--////////////////////////////// END First Carrousel Tax /////////////////////////////-->

        <!--////////////////////////////// Second Carrousel Tax /////////////////////////////-->
        <?php
        $args = array(
            'post_type' => 'machines',
            'post_status' => 'publish',
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'Marque',
                    'field'    => 'slug',
                    'terms'    => array( $term->name )
                ),
            )
        );
        $query = new WP_Query( $args );

        $customBackSection = $query_jeux->have_posts() ? 'background: #F6F6F6;' : 'background: #ffffff;';
        ?>
        
        <?php if( $query->have_posts() ) : ?> 
            <section class="Taxonomie_archives MachineIGTsection" style="<?php echo $customBackSection; ?>">
                <div class="Taxonomie_archives container title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="svg_machine" xmlns:xlink="http://www.w3.org/1999/xlink" id="Calque_1" viewBox="0 0 62 62"><defs><style>.cls-1{fill:<?php echo $color_machineAdminstr ?>}</style><linearGradient id="Dégradé_sans_nom_2" x1="0" y1="31" x2="62" y2="31" gradientTransform="matrix(1, 0, 0, 1, 0, 0)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#1e58a5"/><stop offset="1" stop-color="#183e72"/></linearGradient></defs><path class="cls-1" d="M31,0C13.88,0,0,13.88,0,31s13.88,31,31,31,31-13.88,31-31S48.12,0,31,0Zm-12.67,16.35c1.37-4.04,6.62-7.09,12.22-7.09s10.55,2.85,12.09,6.76c.14,.36-.03,.78-.39,.93h0c-.35,.14-.75-.03-.89-.39h0c-1.15-2.93-5.23-5.88-10.8-5.88s-9.9,3.16-10.9,6.13c-.09,.28-.36,.48-.66,.48-.08,0-.16-.01-.23-.04h0c-.36-.14-.55-.54-.43-.9Zm-4.02,7.84v-3.43c-.01-1.71,1.36-3.12,3.08-3.14h26.33c1.72,.02,3.09,1.42,3.08,3.14v17.99l.82,1.64c.18,.35,.04,.77-.3,.95h0c-.1,.05-.2,.08-.31,.08-.27,0-.51-.15-.62-.39l-.9-1.8c-.05-.1-.07-.21-.07-.32V20.76c0-.94-.74-1.71-1.68-1.72H17.39c-.94,.01-1.69,.78-1.68,1.72v3.42c.04,.39-.24,.74-.63,.78h-.01c-.39,.04-.72-.24-.76-.63,0-.05,0-.1,0-.14Zm2.48,16.25c.12-.37,.52-.57,.88-.44,.37,.13,.56,.53,.44,.9-.01,.03-.03,.07-.04,.1l-.03,.06h24.99l-.02-.06c-.18-.35-.04-.78,.3-.96h0c.35-.18,.77-.04,.94,.31,.02,.03,.03,.07,.04,.1l.85,2.08c.15,.36-.02,.77-.38,.93-.09,.04-.18,.05-.27,.05-.28,0-.54-.17-.65-.44l-.24-.59H17.46l-.24,.58c-.11,.26-.36,.43-.65,.44-.09,0-.18-.02-.27-.06-.36-.15-.53-.57-.38-.92l.86-2.08h0Zm26.38-2.23c.39,0,.71,.32,.71,.71,0,.39-.32,.71-.71,.71H17.94c-.39,0-.7-.32-.7-.71,0-.39,.31-.71,.7-.71h25.23Zm-24.26-3.98v-11.2h0c0-.39,.31-.71,.7-.71h21.89c.39,0,.7,.32,.7,.71v11.2c0,.39-.31,.71-.7,.71H19.61c-.39,0-.7-.32-.7-.71Zm26.71,9.68c.39,0,.71,.32,.71,.71s-.32,.71-.71,.71H15.48c-.39,0-.7-.32-.7-.71h0c0-.39,.31-.71,.7-.71h30.14Zm-28.84,6.21h-4.62c-.39,0-.7-.32-.7-.71v-4.78c0-.11,.03-.22,.08-.32l2.77-5.54v-11.02c.03-.34,.3-.6,.63-.63,.38-.04,.73,.25,.76,.63v11.2c0,.11-.03,.22-.08,.32l-2.76,5.53v3.9h3.92c.39,0,.71,.32,.71,.71s-.32,.71-.71,.71Zm32.86-.71h0c0,.39-.31,.71-.7,.71H20.56c-.39,0-.71-.32-.71-.71s.32-.71,.71-.71h27.69v-3.89l-.5-1c-.15-.36,.03-.78,.39-.93,.32-.13,.68,0,.86,.29l.57,1.14c.05,.1,.08,.21,.08,.32v4.78Zm.73-17.26c-.06,.97-.89,1.7-1.86,1.65h-.4c-.39,0-.71-.32-.71-.71,0-.39,.32-.71,.71-.71h.4c.29,0,.46-.16,.46-.23v-7.01c0-.07-.17-.23-.46-.23h-.54c-.33-.04-.59-.3-.63-.63-.04-.39,.24-.75,.63-.79h.54c.97-.05,1.79,.68,1.86,1.65v7.01Zm2.66-3.49h0c0,.39-.31,.71-.7,.71h-.93c-.39,0-.71-.32-.71-.71,0-.39,.32-.71,.71-.71h.23v-7.62c0-.39,.31-.71,.7-.71h0c.39,0,.7,.31,.7,.7v8.34Zm-.73-9.93c-1.21-.02-2.18-1.02-2.16-2.24,.02-1.21,1.02-2.18,2.24-2.16,1.2,.01,2.17,1,2.16,2.2v.04c-.02,1.21-1.02,2.18-2.24,2.16Zm-26.09,5.04h-5.89v9.77h5.89v-9.77Zm-.77,3.12l-2.11,4.51c-.12,.24-.36,.4-.63,.4-.1,0-.21-.03-.3-.07-.35-.17-.49-.6-.33-.95l1.63-3.48h-1.99c-.39,0-.71-.31-.71-.71,0-.39,.32-.71,.71-.71h3.09c.39,0,.7,.33,.7,.72,0,.1-.02,.21-.07,.3Zm15.35-3.12h-5.89v9.77h5.9v-9.77Zm-.77,3.12l-2.11,4.51c-.12,.24-.36,.4-.63,.4-.1,0-.21-.03-.3-.07-.35-.17-.5-.6-.33-.95l1.64-3.48h-1.99c-.39,0-.71-.31-.71-.71,0-.39,.32-.71,.71-.71h3.09c.39,0,.7,.33,.7,.72,0,.1-.02,.21-.07,.3Zm-6.53-3.12h-5.89v9.77h5.89v-9.77Zm-.76,3.12l-2.11,4.51c-.12,.24-.36,.4-.63,.4-.1,0-.21-.03-.3-.07-.35-.17-.5-.6-.33-.95l1.64-3.48h-1.99c-.39,0-.71-.31-.71-.71,0-.39,.32-.71,.71-.71h3.09c.39,0,.7,.33,.7,.72,0,.1-.02,.21-.07,.3Z"/></svg>
                    <h3 class="Taxonomie_archives title">
                         <?php echo ("LES MACHINES $term->name"); ?>
                    </h3>
                </div>
    
                <!-- CARROUSEL JEUX -->
                <div class="containerCustom">
                    <div class="Taxonomie_archives MachineIGT">   
    
                    <?php while( $query->have_posts() ) : $query->the_post(); ?>
    
                        <?php
                        $image_id = get_post_thumbnail_id();
                        $alt = get_post_meta ( $image_id, '_wp_attachment_image_alt', true );
                        $refMarque = get_field('reference');
                        $shortRef = $refMarque ? substr($refMarque, 0, 20).' ...' : '';
                        $shortTitle = substr(get_the_title(), 0, 14).' ...';
                        ?>
                    
                        <div class="Taxonomie_archives block-card-carouselHome">
                            <div class="Taxonomie_archives topCARDimg">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>"  class="Taxonomie_archives imgCarrouselHome" alt="<?php echo $alt; ?>"/>
                            </div>
                            <div class="Taxonomie_archives blockCardTextSlide">
                                <h3 class="Taxonomie_archives titleSlideBottom"><?php echo $shortTitle; ?><br><span class="Taxonomie_archives litle_Title"><?php echo $shortRef; ?></span></h3>
                                <div class="Taxonomie_archives textCardSlide">
                                    <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
                                </div>
                                <div class="Taxonomie_archives row_btnLogo">
                                    <a href="<?php the_permalink(); ?>" class="Taxonomie_archives btnSlideBottom" style="background:<?php echo $colorNavCustom ?>;">Découvrir</a>
                                    <img src="<?php echo $imgHeroTaxArchSlide['url']; ?>" alt="<?php echo $imgHeroTaxArchSlide['alt']; ?>" class="Taxonomie_archives igtLOGOcardSlide">
                                </div>
                            </div>
                        </div>
    
                    <?php endwhile; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <!--////////////////////////////// END SECOND Carrousel Tax /////////////////////////////-->

    </div>

    <!-- ///////////////// Liste dynamique ajax /////////////////////////-->
    <?php
    $slug_back_current_brand = home_url().'/marque/'.$term->slug;
    ?>
    <div class="contListDynamiqye">
        <div class="container contArchives">
            <div class="d-flex contain_Back_return_tax">
                <a href="<?php echo $slug_back_current_brand; ?>" class="back_tax">Retour ></a><h2 class="titleListTax"></h2>
            </div>
            <div class="row">
                <!-- AJAX CALL -->
            </div>
        </div>
        <!-- <div class="site__navigation container">
            <div class="site__navigation__prev">
                <?php //previous_posts_link( 'Page Précédente' ); ?>
            </div>
            <div class="site__navigation__next">
                <?php //next_posts_link( 'Page Suivante' ); ?> 
            </div>
        </div> -->
    </div>
    <!--////////////////// END Liste dynamique ajax /////////////////////////////-->

<?php get_footer(); ?>

<style>
svg.svg_machine {max-width: 50px;margin-right: 30px;}
@media only screen and (max-width: 580px){
    .archive.tax-Marque section.heroMarque .blockLeftHeroMarque{background: <?php echo $colorNavCustom ?>;width: 100%;}
}
</style>

<script>

// Carousel TAX Top
$('.NewLudicenter').slick({
  	centerPadding: '60px',
  	slidesToShow: 4,
  	responsive: [
    	{
      	breakpoint: 768,
      	settings: {
        	centerPadding: '40px',
        	slidesToShow: 2
      		}
    	},
    	{
      	breakpoint: 480,
      	settings: {
        centerPadding: '40px',
        slidesToShow: 1,
		centerMode: true
      	}
    	}
  	]
	});

    //JeuxIGT
    $('.JeuxIGT').slick({
  	centerPadding: '60px',
  	slidesToShow: 4,
  	responsive: [
    	{
      	breakpoint: 768,
      	settings: {
        	centerPadding: '40px',
        	slidesToShow: 2
      		}
    	},
    	{
      	breakpoint: 480,
      	settings: {
        centerPadding: '40px',
        slidesToShow: 1,
		centerMode: true
      	}
    	}
  	]
	});

    //MachineIGT
    $('.MachineIGT').slick({
  	centerPadding: '60px',
  	slidesToShow: 4,
  	responsive: [
    	{
      	breakpoint: 768,
      	settings: {
        	centerPadding: '40px',
        	slidesToShow: 2
      		}
    	},
    	{
      	breakpoint: 480,
      	settings: {
        centerPadding: '40px',
        slidesToShow: 1,
		centerMode: true
      	}
    	}
  	]
	});

</script>
<script src="/wp-content/themes/BaseSudV5/js/fonction_on_scroll.js"></script>
<script>
$(document).ready(function () 
{

    var initOffset = 70;
	var topHeader = $('.header');
	CheckoffsetTop(topHeader, initOffset, '.heroMarque', 'shortSection');
	CheckoffsetTop(topHeader, initOffset, '.containTAX', 'shortTopSection');
	CheckoffsetTop(topHeader, initOffset, '.rs_head ', 'invisible');
    
});
</script>
<script src="/wp-content/themes/BaseSudV5/js/ajax_slide_taxonomie.js"></script>

<script>
    $(document).ready(function () 
    {
        var data_posts_type = $('.heroMarque').attr('data-post-type');

        if ( (data_posts_type == 'jeux') && (data_posts_type != null) )
        {
            console.log(data_posts_type);
            $('a[data_post_type="jeux"]').trigger("click");
        }
        else if ( (data_posts_type == 'machines') && (data_posts_type != null) )
        {
            console.log(data_posts_type);
            $('a[data_post_type="machines"]').trigger("click");   
        }
    });
</script>