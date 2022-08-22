<?php
/*
* Displaying for page 404
*/
?>

<?php get_header(); ?>

<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$link_parsePath = parse_url( $actual_link, PHP_URL_PATH);
$link_explode = explode('/', trim($actual_link, '/'));
?>

<section class="block404">
    <div class="container">
        <h1 class="title404">ERROR 404</h1><br>
        <p class="text404">Désolé il semblerait que la page " <?php echo end($link_explode); ?> " n'existe pas !</p>
    </div>
</section>
<?php get_footer(); ?>