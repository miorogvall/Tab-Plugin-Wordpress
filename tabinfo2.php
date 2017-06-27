<?php
/**
* Plugin Name: Invise Tabs
* Plugin URI: -
* Description: Segment information with tabs!
* Version: 1.0
* Author: Mio Rogvall
* Author URI: Author's website
* License: GPL12
*/
?>

    <?

//register css for admin panel.
function admin_register_head() {
    $siteurl = get_option('siteurl');
    $url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/css/tabinfo.css';
    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
    echo '<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">';
}
add_action('admin_head', 'admin_register_head');

// register post type
function wpt_tabs_posttype() {
	register_post_type( 'tabs',
		array(
			'labels' => array(
				'name' => __( 'Tabs' ),
				'singular_name' => __( 'Tabs' ),
				'add_new' => __( 'Add New Tabs' ),
				'add_new_item' => __( 'Add New Tab' ),
				'edit_item' => __( 'Edit Tabs' ),
				'new_item' => __( 'Add New Tab' ),
				'view_item' => __( 'View Tabs' ),
				'search_items' => __( 'Search Tabs' ),
				'not_found' => __( 'No Tabs found' ),
				'not_found_in_trash' => __( 'No Tabs found in trash' )
			),
			'public' => true,
			'supports' => array( 'title' ),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "Tabs"), // Permalinks format
			'menu_position' => 5,
             'menu_icon'    => 'dashicons-exerpt-view',
			'register_meta_box_cb' => 'add_tabs_metabox1'
		)
	);
}

add_action( 'init', 'wpt_tabs_posttype' );



// add a meta box
function add_tabs_metabox1() {
	add_meta_box('tab1', 'Tab Fields', 'tab1', 'tabs', 'advanced', 'default');



}

// include metabox-html for smaller doc
function tab1($post) {
	global $post;
	
	include "metabox.php";

}

 // save data from meta boxes
function save_tabs_metadata( $post_id ) {
 
    // verify if auto save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
 
    //check permission
    if ( !current_user_can( 'publish_posts' ) ) {
        wp_die( 'Insufficient Privileges: Sorry, you do not have the capabilities access to this page. Please go back.' );
    }
 
    // check if correct nonce
    // verify it came from user
    if ( !isset( $_POST['it_tabs_check'] )  || !wp_verify_nonce(  $_POST['it_tabs_check'], 'it_submit_tabs' ) ) {
        return;
    }
 
    // save data if data is set
    if ( isset( $_POST['tabs_name1'] ) && isset( $_POST['tabs_content1']) && isset( $_POST['tabs_name2']) && isset( $_POST['tabs_content2']) && isset( $_POST['tabs_name3'])  && isset( $_POST['tabs_content3']) ) {
        update_post_meta( $post_id, '_tabs_name1', strip_tags( $_POST['tabs_name1'] ) );
        update_post_meta( $post_id, '_tabs_content1', strip_tags( $_POST['tabs_content1'] ) );
        update_post_meta( $post_id, '_tabs_name2', strip_tags( $_POST['tabs_name2'] ) );
        update_post_meta( $post_id, '_tabs_content2', strip_tags( $_POST['tabs_content2'] ) );
        update_post_meta( $post_id, '_tabs_name3', strip_tags( $_POST['tabs_name3'] ) );
        update_post_meta( $post_id, '_tabs_content3', strip_tags( $_POST['tabs_content3'] ) );
        
    }
}

// hook the save function
add_action('save_post', 'save_tabs_metadata');

// set appropriate scripts
add_action('init', 'register_scripts');
add_action('wp_footer', 'print_script');

// target scripts to load
function register_scripts() {
    wp_register_script('tabinfo', plugins_url('/js/tabinfo.js', __FILE__), array('jquery'), '1.0', true);
    wp_register_style( 'tabinfo', plugins_url( 'TabInfo/css/tabinfo.css' ) );
	wp_enqueue_style( 'tabinfo' );
    
}

// if shortcode is present/global is set, print script and css
function print_script() {
    global $add_my_script;

    if ( ! $add_my_script )
        return;
    wp_print_scripts('tabinfo');
    wp_print_styles('tabinfo');
}

//include shortcode logic for better readability
include "shortcode_handler.php";

// create shortcode
add_shortcode('it_tabs', 'tabs_shortcode');

?>