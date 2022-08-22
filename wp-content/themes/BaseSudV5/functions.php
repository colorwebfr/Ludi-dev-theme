<?php



function basesud_assets()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', [], false, true);
    wp_enqueue_script( 'jquery-js', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '1.0', true );

    wp_enqueue_style('basesud-slick-css', get_template_directory_uri() .'/css/slick/slick.css', array(), '1.0', true);
    wp_enqueue_style('basesud-slick-theme-css', get_template_directory_uri() .'/css/slick/slick-theme.css', array(), '1.0', true);
    wp_enqueue_script( 'basesud-jquery-js', get_template_directory_uri() .'/js/slick/slick.js', array(), '1.0', true );
    wp_enqueue_script( 'basesud-slick-min-js', get_template_directory_uri() .'/js/slick/slick.min.js', array(), '1.0', true );   

    //wp_enqueue_script( 'Menu_burger', '/wp-content/themes/BaseSudV5/js/menu_burger.js', array(), '1.0', true );
    
    wp_enqueue_script( 'basesud-bootstrap-js', get_template_directory_uri() . '/js/bootstrap-5.0.2-dist/js/bootstrap.min.js', array(), _S_VERSION, true );
    wp_enqueue_style('basesud-bootstrap-css', get_template_directory_uri() . '/js/bootstrap-5.0.2-dist/css/bootstrap.min.css', array(), _S_VERSION, false);

    wp_enqueue_style( 'basesud-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'basesud-style', 'rtl', 'replace' );

    if ( is_singular() )
    {
        wp_enqueue_script( 'basesud-Lightbox-js', get_template_directory_uri() .'/js/globalFooter.js', array(), '1.0', true );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) 
    {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'basesud_assets');

show_admin_bar(false);

function basesud_supports()
{
    add_theme_support('title-tag');
    add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption','style','script',));
    add_theme_support('custom-background',apply_filters('arthes_custom_background_args',array('default-color' => 'ffffff','default-image' => '',)));
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array('height'=> 250,'width'=> 250,'flex-width'=> true,'flex-height'=> true,));
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support('menus');
    register_nav_menus( array('main' => 'Menu Principal','footer' => 'Bas de page',) );
    add_image_size('post-thumbnail');
}
add_action('after_setup_theme', 'basesud_supports');

function basesud_title_separator()
{
    return '|';
}
add_filter('document_title_separator', 'basesud_title_separator');

function basesud_widgets_init() 
{
    register_sidebar(
		array( 'name'          => esc_html__( 'Sidebar', 'basesud' ),
                'id'            => 'sidebar-1',
                'description'   => esc_html__( 'Add widgets here.', 'basesud' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
    );

}
add_action( 'widgets_init', 'basesud_widgets_init' );

//AJAX
wp_enqueue_script( 'menu-burger-js', get_template_directory_uri() . '/js/menu_burger.js', array('jquery'), '20151215', true );
wp_localize_script( 'menu-burger-js', 'ajaxvars', array('url'=> admin_url('admin-ajax.php')) );

function font_family_GG(){
    echo '
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&display=swap" rel="stylesheet">';
}
add_action('wp_enqueue_scripts', 'font_family_GG');

function cdn_asset_font_awesome(){
    echo '
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
}
add_action('wp_enqueue_scripts', 'cdn_asset_font_awesome');

// Files customize Login page
function custom_login_page() 
{
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/login-style-perso.css" />';
}
add_action('login_head', 'custom_login_page');

//Customize URL logo login
function login_logo_url_page() {
    return 'https://www.ludi-sfm.com/wp-login.php';
    }
add_filter( 'login_headerurl', 'login_logo_url_page' );

//Customize name LOGO login
function login_logo_url_title_page() {
    return get_bloginfo( 'name' );
    }
add_filter( 'login_headertext', 'login_logo_url_title_page' );

//Redirect to login page
add_action( 'template_redirect', 'ft_redirect_user' );
function ft_redirect_user() 
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
    if ( (strpos($actual_link, "jeux") && !is_user_logged_in()) || (strpos($actual_link, "machines") && !is_user_logged_in()) || (strpos($actual_link, "regles-de-jeux") && !is_user_logged_in()) ) 
    {
        $return_url = esc_url( home_url( '/wp-login.php/' ) ); 
        wp_redirect( $return_url );
        exit;
    } 
}

//Si rôle différent d'admin redirect home
// function wpm_admin_redirection() {
//     if ( is_admin() && current_user_can( 'subscriber' ) ) 
//     {
//         wp_redirect( home_url() );
//     }
// }
// add_action( 'admin_init', 'wpm_admin_redirection' );

/* Bloquer accès aux non-admins */
function wpc_block_dashboard() {
	$file = basename($_SERVER['PHP_SELF']);
	if (is_user_logged_in() && is_admin() && !current_user_can('edit_posts') && $file != 'admin-ajax.php') {
		wp_redirect( home_url() );
		exit();
	}
}
add_action('init', 'wpc_block_dashboard');

// Ajuoter un rôle
add_role('user_modulus', 'Abonnement', array(
    'read' => true, // true : aurtorise la lecture des page et article
    'edit_posts' => false, // false : Interdit d'ajouter des articles ou des pages
    'delete_posts' => false, // false : Interdit de supprimer des articles ou des pages
));

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

// AJAX LISTING TAXONOME
add_action('wp_ajax_listing_tax_marque','listing_tax_marque');
add_action('wp_ajax_nopriv_listing_tax_marque','listing_tax_marque');

function listing_tax_marque() {
    $data_post_type = $_POST['data_post_type'];
    $data_term_tax = $_POST['data_term_tax'];
    $tabResults = array();

    $args = array(
        'post_type' => $data_post_type,
        'post_status' => 'publish',
        'orderby' => 'id',
    	'order' => 'DESC',
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'OR',
            array(
            'taxonomy' => 'Marque',
            'field'    => 'slug',
            'terms'    => array( $data_term_tax )
                ),)
            );
    $query = new WP_Query( $args );
    $results = array();
    if($query->have_posts())
    {
        while($query->have_posts())
        {
            $query->the_post();
            $tabResults[] = array(
                "title" => get_the_title(), 
                "lien" => get_the_permalink(), 
                "visuel" =>  get_the_post_thumbnail(),
                "content" => wp_trim_words( get_the_content(), 20, "..." )
                ); 
        }   
    
         echo json_encode($tabResults);
    }
    die();
};



/**
 * Zip all documents and trigger download
 */
add_action('wp_ajax_downloadzip_ajax','fn_downloadzip_ajax');
add_action('wp_ajax_nopriv_downloadzip_ajax','fn_downloadzip_ajax');

function fn_downloadzip_ajax() {
    if (isset($_POST['data1'])) {
        $eventID = time();
        $files_to_zip = array();
        //$event_documents = get_field('documents', $eventID);
        foreach ($_POST['data1'] as $document){
            $files_to_zip[] .= 'https://www.ludi-sfm.com/wp-content/uploads/rules-pdf/'.$document['id'];
        };
        //print_r($files_to_zip);
        $zip = new ZipArchive();
        $destination = wp_upload_dir();
        $destination_path = $destination['basedir'];
        $DelFilePath = "document_{$eventID}.zip";
        $zip_destination_path = $destination_path . "/zip/" . $DelFilePath;
        if (file_exists($zip_destination_path)) {
            unlink($zip_destination_path);
        }
        if ($zip->open($zip_destination_path, ZIPARCHIVE::CREATE) != TRUE) {
            die ("Could not open archive");
        }
        if ($files_to_zip) {
            foreach ($files_to_zip as $row):
                $explode = explode('uploads', $row);
                $explodes = end($explode);
                $index_files = array($destination_path, $explodes);
                $index_file = implode("", $index_files);
                $new_index_file = basename($index_file);
                $zip->addFile($index_file, $new_index_file);
            endforeach;
        }
        $zip->close();
        if (file_exists($zip_destination_path)) {
            $zip_destination_paths = explode('wp-content', $zip_destination_path);
            echo get_site_url() . "/wp-content" . end($zip_destination_paths);
        }
    }
    die();
}

//Add Variable d'url for WP
function add_query_vars($aVars) 
{
    $aVars[] = "listing_for";
    return $aVars;
}
add_filter('query_vars', 'add_query_vars');

//Init Page d'option ACF
if( function_exists('acf_add_options_page') ) 
{
	acf_add_options_page();
}