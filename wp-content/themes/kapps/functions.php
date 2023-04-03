<?php

add_filter( 'use_block_editor_for_post', '__return_false' );

add_action('wp_enqueue_scripts','style_theme');
function style_theme(){
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('custom-google-fonts-Montserrat:wght@300;400;600;700', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap');
    wp_enqueue_style('custom-google-fonts-Libre+Franklin:wght@700', 'https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@700&display=swap');
    wp_enqueue_style('custom-google-fonts-Noto+Sans:wght@800', 'https://fonts.googleapis.com/css2?family=Noto+Sans:wght@800&display=swap');
    wp_enqueue_style('custom-google-fonts-Open+Sans&display', 'https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
}


add_action('wp_footer', 'scripts_theme');
function scripts_theme() {
    wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/4a11c97cb2.js');
    wp_enqueue_script('slick_js', get_template_directory_uri() . '/assets/js/slick_js.js');
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/main.js');

}

add_action('init', 'true_jquery_register' );
function true_jquery_register() {
    if ( !is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' ), false, null, true );
        wp_enqueue_script( 'jquery' );
    }
}

include_once get_stylesheet_directory() . '/inc/halpers.php';



// ACF Register options page
// =============================
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Theme General Settings'),
            'menu_title'    => __('Theme Settings'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}

// ================================





// Allow SVG admin upload
//=========================
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
//======================================


//==================================================
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu(){
    register_nav_menu('header_menu', 'Header menu');
    register_nav_menu('footer_menu', 'Footer menu');
}
// ====================================================




// ==================================================================
add_action('after_setup_theme', 'register_theme_support');

function register_theme_support () {
    add_theme_support( 'post-thumbnails', array( 'portfolio' ) );
    add_theme_support( 'post-thumbnails', array( 'products' ) );
    add_theme_support( 'post-thumbnails', array( 'team' ) );
    add_theme_support( 'post-thumbnails', array( 'post' ) );
}
// ==================================================================

// ==================================================================
add_image_size( 'thumb-portfolio', 553, 345, true );
add_image_size( 'thumb-slider', 400, 280, true );
add_image_size( 'thumb-team-page', 322, 360, true );
add_image_size( 'thumb-team-single', 320, 340, true );
add_image_size( 'thumb-blog-page', 257, 257, true );
add_image_size( 'thumb-blog-single', 894, 400, true );



// ==================================================================


// =========================================
/**
 * Filter the except length to 18 words.

 */
function is_blog () {
    global  $post;
    $posttype = get_post_type($post );
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

function wpdocs_custom_excerpt_length( $length ) {
    if ( is_page_template( 'template_pages/team_template.php' ) ) {
        return 12;
    } elseif (is_blog() || is_single()){
        return 30;
    } else {
        return 18;
    }
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function new_excerpt_more($more) {
    global $post;
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');
// =========================================



// AJAX products
if( wp_doing_ajax() ){
    add_action( 'wp_ajax_nextPost', 'display_post' );
    add_action( 'wp_ajax_nopriv_nextPost', 'display_post' );
}


function display_post() {

    $paged = $_POST['paged'];
    $posts_per_page = $_POST['postsPerPage'];




    $args = array(
            'posts_per_page' => $posts_per_page,
            'post_type' => 'products',
            'posts_status' => 'publish',
            'paged' => $paged
        );



    $posts = new WP_Query( $args);
    $max_pages = $posts->max_num_pages;

    echo '<span class="products__storage" id="productsStorage" data-max-pages="' . $max_pages . '"></span>';

    if ($posts->have_posts() ) :
        while ( $posts->have_posts()  ) : $posts->the_post();

            get_template_part( 'products_post_part' );

        endwhile;
    endif;
    wp_die();
}

add_action('wp_enqueue_scripts', 'my_assets');

function my_assets(){
    wp_enqueue_script('jquer', get_template_directory_uri() . '/assets/js/jquery.js', array('jquery'));
    wp_localize_script('jquer', 'ajaxData', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        )
    );
}
// =============================================================================



//===================================
//ob_start();
//$mypost = ob_get_clean();
//
//wp_send_json(array(
//    'post' => $mypost,
//    'hide' =>  $post > 8 ? true : false
//));
//====================================================