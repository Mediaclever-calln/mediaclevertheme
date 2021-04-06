<?php
/*
Author: Media Clever
Author URI: http://mediaclever.se/
*/

if ( ! function_exists( 'ecttheme_setup' ) ) :
    
    function ecttheme_setup() {
     
        load_theme_textdomain( 'ecttheme', get_template_directory() . '/languages' );
     
        add_theme_support( 'automatic-feed-links' );
     
        add_theme_support( 'post-thumbnails' );
     
     	add_theme_support( 'title-tag' );
     
        add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

            $defaults = array(
                'height'               => 30,
                'width'                => 200,
                'flex-height'          => true,
                'flex-width'           => true,
                'header-text'          => array( 'site-title', 'site-description' ),
                'unlink-homepage-logo' => true, 
            );
         
        add_theme_support( 'custom-logo', $defaults );

        add_image_size( 'custom-size', 220, 180 );

        add_theme_support( 'featured-image' );
    }
    endif; 
    add_action( 'after_setup_theme', 'ecttheme_setup' );


function ecttheme_register_styles() {

wp_register_style( 'ecttheme-styles', get_template_directory_uri(). "/style.css", array(), false, 'all' );
wp_enqueue_style( 'ecttheme-styles' );

}

add_action( 'wp_enqueue_scripts', 'ecttheme_register_styles' );
/*
function ecttheme_register_scripts() {

    wp_register_style( 'ecttheme-script', get_template_directory_uri(). "/assets/js-nav.css", array(), false, 'all' );
    wp_enqueue_style( 'ecttheme-script' );
    
}

add_action( 'wp_enqueue_scripts', 'ecttheme_register_scripts' );
*/
function ecttheme_menus() {

	$locations = array(
		'primary'  => __( 'Top Menu', 'ecttheme' ),
		'footer'   => __( 'Footer Menu', 'ecttheme' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'ecttheme_menus' );


function ecttheme_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'ecttheme' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'ecttheme' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #3.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #3', 'ecttheme' ),
				'id'          => 'sidebar-3',
				'description' => __( 'Widgets in this area will be displayed in the thrid column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #4.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #4', 'ecttheme' ),
				'id'          => 'sidebar-4',
				'description' => __( 'Widgets in this area will be displayed in the forth column in the footer.', 'twentytwenty' ),
			)
		)
	);

}

add_action( 'widgets_init', 'ecttheme_sidebar_registration' );


function ecttheme_add_meta_box() {
	add_meta_box( 'sub_header', 'Subheader text ', 'ecttheme_callback', 'page');
}

function ecttheme_callback( $post ) {
	wp_nonce_field( 'ecttheme_save_subheader_data', 'ecttheme_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_subheader_value_key', true );
	
	echo '<label for="ecttheme_subheader_field">Text: </lable>';
	echo '<input type="email" id="ecttheme_subheader_field" name="ecttheme_subheader_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function ecttheme_save_subheader_data( $post_id ) {
	
	if( ! isset( $_POST['ecttheme_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['ecttheme_meta_box_nonce'], 'ecttheme_save_subheader_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['ecttheme_subheader_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['ecttheme_subheader_field'] );
	
	update_post_meta( $post_id, '_subheader_value_key', $my_data );
	
}

add_action( 'add_meta_boxes', 'ecttheme_add_meta_box' );
add_action( 'save_post', 'ecttheme_save_subheader_data');

function ww_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons');
