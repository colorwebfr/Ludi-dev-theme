<?php get_header(); ?>

<?php
	$visu_linkedin = get_field('visuel_linkedin');
	$title_linkedin = get_field('titre_linkedin');
	$lien_linkedin = get_field('lien_linkedin');

	$visu_youtube = get_field('visuel_youtube');
	$title_youtube = get_field('titre_youtube');
	$lien_youtube = get_field('lien_youtube');
?>

<!-- ///////////////////////////// Section Hero ////////////////////////////////////////////////-->
<div class="hero HomeHero carousel slide carousel-fade" id="slide_LUDI_01" data-bs-ride="carousel">

	<div class="container carousel-inner">
		<?php
		$i = 0;
		while( have_rows('slider_home_top') ) : the_row(); 
		$data_id_slide = $i++ < 1 ? 'active': '';
		?>
		<div data-id-slide ="<?php echo $i; ?>" class="row carousel-item <?php echo $data_id_slide; ?> d-flex">
			<div class="blockLeft leftSlideHero col-md-6 col-sm-6 col-xs-12">
				<div class="textLeftSlideHomehero">
					<h1 class="titleHero"><span class="litle_Title"><?php echo get_sub_field('accroche_du_titre'); ?></span><br><?php echo get_sub_field('titre'); ?></h1>
					<p class="subTitle_hero"><?php echo get_sub_field('paragraphe_1'); ?></p>
					<?php echo get_sub_field('paragraphe_2'); ?>
					<a href="<?php echo get_sub_field('lien_du_bouton_decouvrir'); ?>" class="btn_standartSite">Découvrir</a>
				</div>
				<?php
				$imgLeftHeroHome = get_sub_field('visuel_de_gauche');
				$imageRightHeroHome = get_sub_field('visuel_de_droite');
				?>
				<div class="imgLeftSlideHeroHome">
					<img src="<?php echo $imgLeftHeroHome['url']; ?>" alt="<?php echo $imgLeftHeroHome['alt']; ?>" class="labelImgSlide">
				</div>
			</div>
			<div class="blockRight rightSlideHero col-md-6 col-sm-6 col-xs-12">
				<img src="<?php echo $imageRightHeroHome['url']; ?>" alt="<?php echo $imageRightHeroHome['alt']; ?>" class="slideImg">
			</div>
		</div>
		<?php endwhile; ?>

	</div>
	<div class="arrowSlideTopHome">
		<button class="carousel-control-prev" type="button" data-bs-target="#slide_LUDI_01" data-bs-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="visually-hidden">Previous</span>
  		</button>
  		<button class="carousel-control-next" type="button" data-bs-target="#slide_LUDI_01" data-bs-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="visually-hidden">Next</span>
  		</button>
	</div>
</div>
<!-- ///////////////////////////// END Section Hero ////////////////////////////////////////////////-->

<!-- ///////////////////////////// Section Pastille Sous Hero //////////////////////////////////////-->
<?php
$terms = get_terms( array(
  'taxonomy' => 'Marque',
  'parent'   => 0,
  'hide_empty' => false,
) );
?>
<div class="subHero">
	<div class="container row">
		<?php foreach ($terms as $term)
		{
			$termLinkConditionnal = $term->count < 1 ? '' : get_term_link($term->term_id); 
			$termLinkDisabled = $term->count < 1 ? 'disabledLink' : '';
			$imgHeroTaxArch = get_field('logo_en_forme_de_cercle_pour_la_home', $term);
			$urlVisuel = $imgHeroTaxArch['url'];
			?>
			<a href="<?php echo $termLinkConditionnal; ?>" class="col-md-3 col-xs-6 <?php echo $termLinkDisabled; ?>">
				<img src="<?php echo $urlVisuel ?>" alt="Logo <?php echo $term->name ?>" class="pastille" >
			</a>
		<?php
		}
		?>
	</div>
</div>
<!-- ///////////////////////////// END  Section Pastille Sous Hero /////////////////////////////////-->

<!-- ///////////////////////////// Section Découvrez toute notre gamme //////////////////////////-->
<section class="DiscoveryAllGamme">
	<div class="container row">
		<div class="blockLeft col-md-4 col-xs-12">
			<h3><?php if(get_field('accroche')){ the_field('accroche'); } ?></h3>
		</div>
		<div class="blockRight col-md-8 col-xs-12">
			<?php
			$VisuelDiscover = get_field('visuel_de_droite'); 
			?>
			<img src="<?php if($VisuelDiscover){ echo $VisuelDiscover['url']; } ?>" alt="<?php if($VisuelDiscover){ echo $VisuelDiscover['alt']; } ?>" class="DiscoveryImg">
		</div>
	</div>
</section>
<!-- ///////////////////////// END Section Découvrez toute notre gamme //////////////////////////-->

<!-- ///////////////////// Section Les nouveautés LUDI ////////////////////////////////-->
<section class="NewsLudi">
	<div class="container title">
		<h3 class="title">
			<span class="litle_Title">FOCUS SUR</span><br>
			LES NOUVEAUTÉS LUDI SFM
		</h3>
		<p class="text_subTitle_carrousel"><?php if (get_field('texte_sous_titre')){ the_field('texte_sous_titre'); } ?></p>
		<a href="" class="btn_Jeux" data_btn_query="jeux">Jeux</a>
		<a href="" class="btn_Machines" data_btn_query="machines">Machines</a>
	</div>

	<!-- CARROUSEL JEUX -->
	<div class="containerCustom" style="display:block;">
		<div class="NewLudicenter">   
		<?php
		$args = array(
            'post_type' => 'jeux',
            'post_status' => 'publish',
			'posts_per_page' => 5,
			'orderby' => 'id',
    		'order' => 'DESC',
        	);
		$loop = new WP_Query($args);
		?>

		<?php while($loop->have_posts()) : $loop->the_post();?>	
				<?php
                $image_id = get_post_thumbnail_id();
                $alt = get_post_meta ( $image_id, '_wp_attachment_image_alt', true );
                $refMarque = get_field('reference');
				$shortRef = $refMarque ? substr($refMarque, 0, 20).' ...' : '';
				$shortTitle = substr(get_the_title(), 0, 14).' ...';
                ?>
			<div class="block-card-carouselHome">
				<div class="topCARDimg">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>"  class="<?php echo $alt; ?>"/>
				</div>
				<div class="blockCardTextSlide">
					<h3 class="titleSlideBottom"><?php echo $shortTitle; ?><br><span class="litle_Title"><?php echo $shortRef; ?></span></h3>
					<div class="textCardSlide">
						<?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
					</div>
					<div class="row_btnLogo">
						<a href="<?php the_permalink(); ?>" class="btnSlideBottom">Découvrir</a>
						<?php 
						$terms = get_the_terms( get_the_ID(), 'Marque' );
						if(!empty($terms)){
							foreach($terms as $term){
								$imgHeroTaxArch = get_field('logo', $term);
								$urlVisuel = $imgHeroTaxArch['url'];
								$termName = $term->name;
							}
						}
						?>
						<img src="<?php echo $urlVisuel; ?>" alt="<?php echo $termName; ?>" class="igtLOGOcardSlide">
					</div>
				</div>
			</div>

		<?php endwhile; ?>
		<?php $loop->wp_reset_postdata(); ?>

		</div>
	</div>
	<!-- END CARROUSEL JEUX -->

	<!-- CARROUSEL Machines -->
	<div class="containerCustom Machines" style="display:none;">
		<div class="NewLudicenter_Machines"> 
		<?php
		$args = array(
            'post_type' => 'machines',
            'post_status' => 'publish',
			'posts_per_page' => 5,
			'orderby' => 'id',
    		'order' => 'DESC',
        	);
		$loop_machines = new WP_Query($args);
		?>

			<?php while($loop_machines->have_posts()) : $loop_machines->the_post();?>	
				<?php
                $image_id = get_post_thumbnail_id();
                $alt = get_post_meta ( $image_id, '_wp_attachment_image_alt', true );
                $refMarque = get_field('reference');
				$shortRef = $refMarque ? substr($refMarque, 0, 20).' ...' : '';
				$shortTitle = substr(get_the_title(), 0, 14).' ...';
                ?>

			<div class="block-card-carouselHome">
				<div class="topCARDimg">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>"  class="<?php echo $alt; ?>"/>
				</div>
				<div class="blockCardTextSlide">
					<h3 class="titleSlideBottom"><?php echo $shortTitle; ?><br><span class="litle_Title"><?php echo $shortRef; ?></span></h3>
					<div class="textCardSlide">
						<?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
					</div>
					<div class="row_btnLogo">
						<a href="<?php the_permalink(); ?>" class="btnSlideBottom">Découvrir</a>
						<?php 
						$terms = get_the_terms( get_the_ID(), 'Marque' );
						if(!empty($terms)){
							foreach($terms as $term){
								$imgHeroTaxArch = get_field('logo', $term);
								$urlVisuel = $imgHeroTaxArch['url'];
								$termName = $term->name;
							}
						}
						?>
						<img src="<?php echo $urlVisuel; ?>" alt="<?php echo $termName; ?>" class="igtLOGOcardSlide">
					</div>
				</div>
			</div>

			<?php endwhile; ?>
			<?php $loop_machines->wp_reset_postdata(); ?>
		
		</div>
	</div>
	<!-- END CARROUSEL Machines -->

</section>
<!-- ///////////////////// END Section Les nouveautés LUDI ////////////////////////////-->

<!-- ////////////////// SECTION L'actualité LUDI SFM ///////////////////////////////-->
<section class="ActuLudiSfm">

	<div class="container title">
		<h3 class="title">
			<span class="litle_Title">ZOOM LINKEDIN - YOUTUBE</span><br>
			L'ACTUALITÉ LUDI SFM
		</h3>
		<p class="text_subTitle_carrousel">
			<?php
			$objTerm = get_queried_object();
			 echo get_field('texte_sous_lactus', $objTerm); 
			 ?>
		</p>
	</div>
	
	
	<div class="container d-flex justify-content-evenly PostActusX3">
		<div class="blockPostActus">
			<a href="<?php echo $lien_linkedin; ?>" target="_blank" class="link_rs_home">
				<div class="imgActuBottomHome">
					<img src="<?php echo $visu_linkedin['url']; ?>" alt="<?php echo $visu_linkedin['alt']; ?>">
				</div>
				<div class="containPostActuHome  d-flex flex-column">
					<div class="date_logo d-flex justify-content-between">
						<i class="fa-brands fa-linkedin"></i>
					</div>
					<div class="contentPostActus d-flex flex-column">
						<h4 class="titlePostActu"><?php echo $title_linkedin; ?></h4>
						<a href="<?php echo $lien_linkedin; ?>" target="_blank" class="voirPlus">Voir plus</a>
					</div>
				</div>
			</a>
		</div>	
		<div class="blockPostActus">
			<a href="<?php echo $lien_youtube; ?>" target="_blank" class="link_rs_home">
				<div class="imgActuBottomHome">
					<?php echo $visu_youtube ?>
				</div>
				<div class="containPostActuHome  d-flex flex-column">
					<div class="date_logo d-flex justify-content-between">
						<i class="fa-brands fa-youtube"></i>
					</div>
					<div class="contentPostActus d-flex flex-column">
						<h4 class="titlePostActu"><?php echo $title_youtube; ?></h4>
						<a href="<?php echo $lien_youtube; ?>" target="_blank" class="voirPlus">Voir plus</a>
					</div>
				</div>
			</a>
		</div>
	</div>

</section>
<!-- ////////////////// END SECTION L'actualité LUDI SFM ///////////////////////////-->

<style>
    .carousel-fade .active.carousel-item-end, .carousel-fade .active.carousel-item-start {transition: opacity 0s .1s !important;}
</style>

<?php get_footer(); ?>
<script>
	var myCarousel = document.querySelector('#slide_LUDI_01');
	var carousel = new bootstrap.Carousel(myCarousel, {
  		interval: 4000,
  		wrap: true,
  		touch: true,
  		infinite: true
		});
	
	// Carousel News Ludi
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

	//CARROUSEL Machines
	$('.NewLudicenter_Machines').slick({
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
<script src="/wp-content/themes/BaseSudV5/js/preventDefaultClicked.js"></script>
<script>

	$(document).ready(function () 
	{

		//Top nav Change Background	
		var initOffset = 0;
		var topHeader = $('.header');
		CheckoffsetTop(topHeader, initOffset, 'header', 'headerScroll');

		//Changement des slide sur le click
		$('.home a.btn_Jeux').click(function(e) {
			e.preventDefault();
			$('.home a.btn_Jeux').attr('style', 'color: #ffffff;background: #FC7F00;');
			$('.home a.btn_Machines').attr('style', 'color: #FC7F00;background: #ffffff;border: solid 1px;');
			$('.containerCustom').attr('style', 'display: block;');
			$('.containerCustom.Machines').attr('style', 'display: none;');
			$('button.slick-next.slick-arrow').trigger("click");
		});
		$('.home a.btn_Machines').click(function(e) {
			e.preventDefault();
			$('.home a.btn_Machines').attr('style', 'color: #ffffff;background: #FC7F00;');
			$('.home a.btn_Jeux').attr('style', 'color: #FC7F00;background: #ffffff;border: solid 1px;');
			$('.containerCustom').attr('style', 'display: none;');
			$('.containerCustom.Machines').attr('style', 'display: block;');
			$('button.slick-prev.slick-arrow').trigger("click");
		});

		//Disabled link for value Null of Brands
		//Args Possible (Class du btn cliquer, la class rechercher dans hasClass)
		LinkDisabled($('.subHero .container a'), "disabledLink");

	});
	
</script>

