<?php
/*
* Template Name: Page de contact
*/
?>

<?php get_header(); ?>

<!-- ///////////////////////// Hero /////////////////////////// -->
<section class="hero_Contact">
    <div class="container leftheroContact">
        <h1 class="title">SERVICE CLIENT<br>CONTACTEZ-NOUS</h1>
    </div>
</section>
<!-- ////////////// END HERO //////////////////////////////// -->

<section class="formContact">
    <div class="container_custom">
        <?php echo do_shortcode('[contact-form-7 id="4" title="Formulaire de contact 1"]'); ?>
    </div>
</section>

<section class="localizeSiege">
    <div class="container_custom LocalizContanct d-flex justify-content-between">
        <div class="blockLeftBottomContact">
            <h2 class="titleContact">Siège administratif et technique :</h2><br>
            <p class="adress">LUDI SFM<br>
            11, avenue Emmanuel Pontremoli<br>
            "Nice la Plaine 1", Bâtiment F4<br>
            06200 NICE<br>
            FRANCE<br>
            Tél : 04 92 41 50 00</p>
            <img src="/wp-content/uploads/2022/05/ludi-siege.jpg" alt="" class="SUBinfosContact">
        </div>
        <div class="blockRightBottomContact">
            <img class="visuel1Contact" src="/wp-content/uploads/2022/06/LUDI_SFM_Contact-scaled.jpg" alt="Établissement Ludi SFM">
        </div>
    </div>
</section>

<div class="iframeGmap container-fluid">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2885.154516589439!2d7.199011415723781!3d43.68655095829118!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cdc27b4bf25d35%3A0x834cd7ab5896e7c8!2sLudi%20SFM!5e0!3m2!1sen!2sfr!4v1654267302134!5m2!1sen!2sfr" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<?php get_footer(); ?>