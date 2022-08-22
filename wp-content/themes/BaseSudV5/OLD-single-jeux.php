<?php get_header(); ?>

  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
  <?php
  $terms = get_the_terms( $post->ID , 'Marque' ); 
  $marque_name = $terms[0]->name;
  $slug_brand = $terms[0]->slug;

  foreach($terms as $term){
    $logo_marque = get_field('logo_pour_le_hero_de_la_page_de_marque', $term);
    $logo_topTitle = get_field('logo', $term);
    $colorNavCustom = get_field('couleur_de_fond_des_fleches_de_carousel', $term) ? get_field('couleur_de_fond_des_fleches_de_carousel', $term) : '';
    $borderBTNhero = get_field('couleur_de_fond_des_fleches_de_carousel', $term) ? "border: solid 2px #ffffff;" : "";
    $banniere_hero_notempty = get_field('banniere_hero', $term);
  }
  ?>

  <!--///////////////// HERO /////////////////////-->
  <section class="heroMarque Single" data_color="<?php echo $colorNavCustom; ?>" style="<?php if($banniere_hero_notempty){ ?>background-image: url('<?php echo $banniere_hero_notempty['url']; ?>');background-size:cover;background-position:center;background-repeat:no-repeat;width:100%; <?php } ?>">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="blockLeftHeroMarque">
                <a href="<?php echo home_url().'/marque/'.$slug_brand.'?listing_for=machines' ?>" class="btn_standartSite" style="background:<?php echo $colorNavCustom; ?>;<?php echo $borderBTNhero; ?>">Machines</a>
                <a href="<?php echo home_url().'/marque/'.$slug_brand.'?listing_for=jeux' ?>" class="btn_standartSite" style="background:<?php echo $colorNavCustom; ?>;<?php echo $borderBTNhero; ?>">Jeux</a>
            </div>
            <div class="blockRightHero">
                <img src="<?php echo $logo_marque['url']; ?>" alt="<?php echo $logo_marque['alt']; ?>" class="logoMarque">
            </div>
        </div>
    </section>
  <!--///////////////// END HERO /////////////////////-->
  
  <?php
  $terms_plateforme = get_the_terms( $post->ID , 'Plateforme' );
  $Plateforme_name = $terms_plateforme[0]->name;
  $terms_Type = get_the_terms( $post->ID , 'Type' );
  $Type_name = $terms_Type[0]->name;
  $terms_Rouleaux = get_the_terms( $post->ID , 'Rouleaux' );
  $Rouleaux_name = $terms_Rouleaux[0]->name;
  $terms_Screen = get_the_terms( $post->ID , 'Screen' );
  $Screen_name = $terms_Screen[0]->name;
  $Brochure = get_field('telecharger_la_brochure');
  $oembed = get_field('flux_video');
  //print_r($terms_Screen[0]);
  ?>

  <!-- LightBox Produit -->
  <section class="Single container row d-flex flex-wrap LightBox" style="display:none !important;">
  <span class="closeBtnLightBox">x</span>
  <?php if (have_rows('galerie_produits')) : ?>
        <div class="blockLeftSingleSlide col-md-12">
          <div class="blockCurrentSlide">
            <div class="blockGalerieProduit slider-for">
              <?php while (have_rows('galerie_produits')) : the_row(); ?>
              <div class="blockimgCurrebtSlide">
                <?php
                $VisuelSlideProduit = get_sub_field('visuel_produit');
                echo '<img src="'.$VisuelSlideProduit['url'].'" alt="'.$VisuelSlideProduit['alt'].'">';
                ?>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
          <div class="blockNavSlide">
            <div class="slider-nav">
              <?php while (have_rows('galerie_produits')) : the_row(); ?>
              <div class="blockNavImgSlide">
                  <?php
                  $VisuelSlideProduit = get_sub_field('visuel_produit');
                  echo '<img src="'.$VisuelSlideProduit['url'].'" alt="'.$VisuelSlideProduit['alt'].'">';
                  ?>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
        <?php else : ?>
          <div class="blockLeftSingle col-md-12">
            <?php the_post_thumbnail(); ?>
          </div>
    <?php endif; ?>
    </section>
  <!-- END LightBox Produits -->


    <section class="Single container row d-flex flex-wrap">

    <!-- Slide produit -->
    <?php if (have_rows('galerie_produits')) : ?>
        <div class="blockLeftSingleSlide col-md-6">
          <div class="blockCurrentSlide">
            <div class="blockGalerieProduit slider-for notlightbox">
              <?php while (have_rows('galerie_produits')) : the_row(); ?>
              <div class="blockimgCurrebtSlide">
                <?php
                $VisuelSlideProduit = get_sub_field('visuel_produit');
                echo '<img src="'.$VisuelSlideProduit['url'].'" alt="'.$VisuelSlideProduit['alt'].'">';
                ?>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
          <div class="blockNavSlide">
            <div class="slider-nav">
              <?php while (have_rows('galerie_produits')) : the_row(); ?>
              <div class="blockNavImgSlide">
                  <?php
                  $VisuelSlideProduit = get_sub_field('visuel_produit');
                  echo '<img src="'.$VisuelSlideProduit['url'].'" alt="'.$VisuelSlideProduit['alt'].'">';
                  ?>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
        <?php else : ?>
          <div class="blockLeftSingle col-md-6">
            <?php the_post_thumbnail(); ?>
          </div>
      <?php endif; ?>
      <!-- END Slide produit -->
      
      <div class="blockRightSingle col-md-6">
        <div class="logoM_nameM">
          <img src="<?php echo $logo_topTitle['url']; ?>" alt="<?php echo $logo_topTitle['alt']; ?>" class="logoMarqueSingle"><br>
          <span>JEUX</span>
          <h1>
            <?php
            the_title().$multiPack = get_field('jeux_multipack') ? '<br><span class="multipackLink">Jeux Multipack</span>' : '' ; echo $multiPack; 
            ?>
          </h1> 
        </div>
        <div class="contentSingle">
          <ul>
            <?php if ($Plateforme_name)
            { ?>
              <li class="tabSingle">Plateforme :&nbsp;<?php echo $Plateforme_name; ?></li>
            <?php
            } ?>
            <?php if ($Type_name)
            { ?>
              <li class="tabSingle">Type :&nbsp;<?php echo $Type_name; ?></li>
            <?php
            } ?>
            <?php if ($Rouleaux_name)
            { ?>
              <li class="tabSingle">Rouleaux :&nbsp;<?php echo $Rouleaux_name; ?></li>
            <?php
            } ?>
            <?php if ($Screen_name)
            { ?>
              <li class="tabSingle">Screen :&nbsp;<?php echo $Screen_name; ?></li>
            <?php
            } ?>
          </ul>
          <?php the_content(); ?>

          <div class="device_related">
          <?php $related_product = get_field('machines_en_relation_avec_ce_jeux'); ?>
              <?php if( $related_product ) : ?>
                <h4 class="title_related_product">Les machines compatibles :</h4>
                <ul>
                  <?php foreach ( $related_product as $relateds ) : ?>
                    <?php $permalink = get_permalink( $relateds->ID ); ?>
                    <li class="puce_related_product"><a style="color:<?php echo $colorNavCustom ?>;" href="<?php echo $permalink; ?>"><?php echo $relateds->post_title; ?></a></li>
                  <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
          </div><br>

           <!-- Section multipack -->
          <?php
          $jeux_multipack = get_field('les_jeux_compris_dans_le_multipack');
          if( $jeux_multipack && get_field('jeux_multipack') ): ?>
          <hr class="hrSingle"/>
            <section id="contenu" class="sectionMultipack">
                <div class="container contArchives">
                  <h2>Dans ce pack sont inclus les jeux suivants :</h2>
                  <div class="row">
                    <?php foreach( $jeux_multipack as $post ): ?>
                      <article class="col-md-4 col-xs-6 cardJeuxMultispack">
                              <a href="<?php the_permalink(); ?>" class="linkThumb">
                                  <h3><?php the_title(); ?></h3>
                                  <div class="blockTop">
                                      <?php the_post_thumbnail(); ?>
                                  </div>
                              </a>
                          </article>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                  </div>
                </div>
            </section>
          <?php endif; ?>
          <!-- END Section multipack -->

          <?php if($Brochure) { ?>
            <br>
            <a href="<?php echo $Brochure; ?>" target="_blank" class="brochure" style="background:<?php echo $colorNavCustom; ?>;">Télécharger la brochure</a>
          <?php } ?> 
        </div>
      </div>
    </section>
    
    <?php if ($oembed) { ?>
      <hr class="hrSingle"/>
      <div class="container oembed">
        <?php echo $oembed; ?>
      </div>
    <?php } ?>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>

<script src="/wp-content/themes/BaseSudV5/js/Slider_single.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.20/jquery.zoom.min.js"></script>

<script>
		$(document).ready(function(){
			$('.blockNavImgSlide').zoom();
		});
</script>