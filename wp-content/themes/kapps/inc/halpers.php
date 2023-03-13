<?php
/**
 * Convert file url to path
 *
 * @param string $url Link to file
 *
 * @return bool|mixed|string
 */

function convert_url_to_path( $url ) {
    if ( ! $url ) {
        return false;
    }
    $url       = str_replace( array( 'https://', 'http://' ), '', $url );
    $home_url  = str_replace( array( 'https://', 'http://' ), '', site_url() );
    $file_part = ABSPATH . str_replace( $home_url, '', $url );
    $file_part = str_replace( '//', '/', $file_part );
    if ( file_exists( $file_part ) ) {
        return $file_part;
    }

    return false;
}

/**
 * Return/Output SVG as html
 *
 * @param array|string $img Image link or array
 * @param string $class Additional class attribute for img tag
 * @param string $size Image size if $img is array
 *
 * @return void
 */
function display_svg( $img, $class = '', $size = 'medium' ) {
    echo return_svg( $img, $class, $size );
}

function return_svg( $img, $class = '', $size = 'medium' ) {
    if ( ! $img ) {
        return '';
    }

    $file_url = is_array( $img ) ? $img['url'] : $img;

    $file_info = pathinfo( $file_url );
    if ( $file_info['extension'] == 'svg' ) {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer"      => false,
                "verify_peer_name" => false,
            ),
        );
        $image             = file_get_contents( convert_url_to_path( $file_url ), false, stream_context_create( $arrContextOptions ) );
        if ( $class ) {
            $image = str_replace( '<svg ', '<svg class="' . esc_attr( $class ) . '" ', $image );
        }
    } elseif ( is_array( $img ) ) {
        $image = '<img class="' . esc_attr( $class ) . '" src="' . esc_url( $img['sizes'][$size] ) . '" alt="' . esc_attr( $img['alt'] ) . '"/>';
    } else {
        $image = '<img class="' . esc_attr( $class ) . '" src="' . esc_url( $img ) . '" alt="' . esc_attr( $file_info['filename'] ) . '"/>';
    };

    return $image;
}
