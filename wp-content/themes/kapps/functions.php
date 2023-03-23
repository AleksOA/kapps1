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
//    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.js');
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
}
// ==================================================================

// ==================================================================
add_image_size( 'thumb-portfolio', 553, 345, true );
add_image_size( 'thumb-slider', 400, 280, true );



// ==================================================================




// Breadcrumbs
function custom_breadcrumbs() {
//    global $myseparator;
    // Settings
    $separator        =  '<span class="serv-tech__breadcrumbs-separator"></span>';
    $breadcrums_id    = 'breadcrumbs';
    $breadcrums_class = 'breadcrumbs';
    $home_title       = 'Homepage';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy = 'product_cat';

    // Get the query & post information
    global $post, $wp_query;

    // Do not display on the homepage
    if ( ! is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
//        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
//        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && ! is_tax() && ! is_category() && ! is_tag() ) {

//            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title( $prefix, false ) . '</strong></li>';

//           =========== My code start=============
            if( !empty($prefix) ) {
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title( $prefix, false ) . '</strong></li>';
            }
            if( empty($prefix) ) {
                $prefix = '';
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title( $prefix, false ) . '</strong></li>';
            }
//           =========== My code finish =============

        } else if ( is_archive() && is_tax() && ! is_category() && ! is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if ( $post_type != 'post' ) {

                $post_type_object  = get_post_type_object( $post_type );
                $post_type_archive = get_post_type_archive_link( $post_type );

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if ( $post_type != 'post' ) {

                $post_type_object  = get_post_type_object( $post_type );
                $post_type_archive = get_post_type_archive_link( $post_type );

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if ( ! empty( $category ) ) {

                // Get last category post is in
                $last_category = end( array_values( $category ) );

                // Get parent any categories and create array
                $get_cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
                $cat_parents     = explode( ',', $get_cat_parents );

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach ( $cat_parents as $parents ) {
                    $cat_display .= '<li class="item-cat">' . $parents . '</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists( $custom_taxonomy );
            if ( empty( $last_category ) && ! empty( $custom_taxonomy ) && $taxonomy_exists ) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link( $taxonomy_terms[0]->term_id, $custom_taxonomy );
                $cat_name       = $taxonomy_terms[0]->name;

            }


            // Check if the post is in a category
            if ( ! empty( $last_category ) ) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

                // Else if post is in a custom taxonomy
            } else if ( ! empty( $cat_id ) ) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title( '', false ) . '</strong></li>';

        } else if ( is_page() ) {

            // Standard page
            if ( $post->post_parent ) {

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );


                // Get parents in the right order
                $anc = array_reverse( $anc );


                // Parent page loop
                if ( ! isset( $parents ) ) {
                    $parents = null;
                }
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink( $ancestor ) . '" title="' . get_the_title( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
//                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id       = get_query_var( 'tag_id' );
            $taxonomy      = 'post_tag';
            $args          = 'include=' . $term_id;
            $terms         = get_terms( $taxonomy, $args );
            $get_term_id   = $terms[0]->term_id;
            $get_term_slug = $terms[0]->slug;
            $get_term_name = $terms[0]->name;


            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time( 'Y' ) . '"><a class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time( 'Y' ) . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time( 'm' ) . '"><a class="bread-month bread-month-' . get_the_time( 'm' ) . '" href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time( 'm' ) . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time( 'j' ) . '"><strong class="bread-current bread-' . get_the_time( 'j' ) . '"> ' . get_the_time( 'jS' ) . ' ' . get_the_time( 'M' ) . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time( 'Y' ) . '"><a class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time( 'Y' ) . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time( 'm' ) . '"><strong class="bread-month bread-month-' . get_the_time( 'm' ) . '" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time( 'Y' ) . '"><strong class="bread-current bread-current-' . get_the_time( 'Y' ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var( 'paged' ) ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var( 'paged' ) . '"><strong class="bread-current bread-current-' . get_query_var( 'paged' ) . '" title="Page ' . get_query_var( 'paged' ) . '">' . __( 'Page' ) . ' ' . get_query_var( 'paged' ) . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';
    }
}
// ==================================


// =========================================
/**
 * Filter the except length to 18 words.

 */
function wpdocs_custom_excerpt_length( $length ) {
    return 18;
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
//    wp_enqueue_script('jquer', get_template_directory_uri() . '/assets/js/jquer.js', array('jquery'));
    wp_enqueue_script('jquer', get_template_directory_uri() . '/assets/js/jquery.js', array('jquery'));
    wp_localize_script('jquer', 'ajaxData', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        )
    );
}
// =============================================================================