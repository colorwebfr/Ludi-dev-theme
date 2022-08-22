<?php
/**
 * SINGLE POST | TYPE MAGASINS
 */

$user = wp_get_current_user();

if($user && isset($user->user_login) && 'Amandine' == $user->user_login) {
        // do nothing
    } else {

    	if ( get_field("website") ) :
  //wp_safe_redirect(get_field("website"), 301);
	//exit;
endif;

    }

if ( get_field("minisite") ) {

	get_header('magasin'); 
    
    $arrayPage = array('magasin-cuisines','contact', 'realisations-cuisines', 'actualites', 'mentions-legales', 'plan-du-site', 'real-detail' , 'actus_detail', 'confirmation-rendez-vous-magasin');


    	$pagemag = get_query_var('page_mag');
    
		if ( ($pagemag !='') && in_array($pagemag,$arrayPage)) {

		    // $pagemag = $_GET['page_mag'];

		    if ($pagemag == "magasin-cuisines") { 
		    	get_template_part("templates/post-votre-magasin");

		    } if ($pagemag == "contact") {

		    	get_template_part("templates/post-rdv-sitemagasin");

		    } if ($pagemag == "confirmation-rendez-vous-magasin") {

		    	get_template_part("templates/post-rdv-confirmation-sitemagasin");

		    } if ($pagemag == "realisations-cuisines" && get_query_var('rea')!='') { //detail rea

		    	get_template_part("templates/single-real-sitemagasin");

		    } if ($pagemag == "realisations-cuisines" && get_query_var('rea') == '') {//liste rea

		    	get_template_part("templates/post-real-sitemagasin");

		    } if ($pagemag == "actualites" && get_query_var('actu')!='') { //Detail actu

		    	get_template_part("templates/single-actus-mag");

		    }  if ($pagemag == "actualites" && get_query_var('actu')=='') { //Liste actu

		    	get_template_part("templates/post-actus-mag");

		    }
            
            
            if ($pagemag == "mentions-legales") {

		    	get_template_part("templates/post-mentions-mag");

		    } if ($pagemag == "plan-du-site") {

		    	get_template_part("templates/post-plansitemag");

		    } 



		} else {
		    get_template_part("templates/post-sitemagasin");
		}

	get_footer('magasin'); 

} else {

get_header(); 
get_template_part("templates/post-magasin");
get_footer(); 


}?>

<style>
button.slick-prev.slick-arrow, button.slick-next.slick-arrow {
    display: none !important;
}
.home-mag-slider button.slick-prev.slick-arrow, .home-mag-slider button.slick-next.slick-arrow {
    display: block !important;
}
.home-mag-slider {
    position: relative;
}
.home-mag-slider button.slick-next.slick-arrow {
    top: 291px;
    right: 0;
	width: 100px;
	z-index: 0;
	background: none;
}
.home-mag-slider button.slick-prev.slick-arrow {
    top: 291px;
    width: 100px;
    left: 0;
	z-index: 1;
	background: none;
}
.home-mag-slider button:after {
	display: none;
}
.home-mag-slider .slick-next:before {
    content: ' ';
    font-size: 50px !important;
    position: absolute;
    right: 15px;
    top: 50%;
    margin-left: 24%;
    background-image: url('/wp-content/uploads/2022/05/arrow-next.png');
    background-repeat: no-repeat;
    background-size: contain;
    width: 40px;
    height: 40px;
    transform: translate(0px, -50%);
}
.home-mag-slider .slick-prev:before {
    content: ' ';
    font-size: 50px !important;
	position: absolute;
    left: 15px;
    top: 50%;
    background-image: url('/wp-content/uploads/2022/05/arrow-prev.png');
    background-repeat: no-repeat;
    background-size: contain;
    width: 40px;
    height: 40px;
    transform: translate(0px, -50%);
}

@media only screen and (max-width: 960px){
	.home-mag-slider button.slick-prev.slick-arrow, .home-mag-slider button.slick-next.slick-arrow {
    display: none !important;
}
}

@media only screen and (max-width: 480px){
#topbar a {
    color: #000000 !important;
    background: #ffffff;
    padding: 15px 15px 15px 15px;
    height: 50px;
    position: relative;
    top: 0px;
    right: 0;
}
}
</style>

<script>
    $(document).ready(function () 
    {
        var pathCurrent = window.location.pathname;
        $('.blockIntro_seoMag').after("<p class='btn_SEO' style='text-decoration:underline;'><strong>Lire la suite</strong></p>");
        $('.textCOntent_seoMag').after("<p class='btn_SEO_close' style='text-decoration:underline;'><strong>Masquer</strong></p>");

        $('.textCOntent_seoMag').slideUp();
        $('.btn_SEO_close').css('display', 'none');
        $('.btn_SEO').css('display', 'block');
        
        $('.btn_SEO').click(function () 
        { 
            $('.textCOntent_seoMag').slideDown();
            $('.btn_SEO').css('display', 'none');
            $('.btn_SEO_close').css('display', 'block');
        });

        $('.btn_SEO_close').click(function () 
        { 
            $('.textCOntent_seoMag').slideUp();
            $('.btn_SEO_close').css('display', 'none');
            $('.btn_SEO').css('display', 'block');
        });
    });
</script>