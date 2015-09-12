<?php

/*

Plugin Name: cuvey Addons

Plugin URI: http://tuchuk.com/wordpress-free-plugins/cuvey-addons

Description: This is addon for cuvey theme to generate custom post types and widgets

Version: 1.0

Author: Rafin Karki

Author URI: http://andmine.com

Text Domain: cuvey-addons

*/

// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) exit;



class cuveyAddons{

 

    public function __construct() {

 

        load_plugin_textdomain( 'cuvey-addons', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );

        add_filter( 'init', array( $this, 'cuvey_addons_posttypes' ) );

        add_action( 'init', array( $this, 'custom_post_type' ) );

        add_action( 'init', array( $this, 'create_portfolio_taxonomies' ));

        add_filter( 'init', array( $this, 'cuvey_addons_shortcode' ) );

 

    }



    public function cuvey_addons_posttypes() {



    }



    public function cuvey_addons_shortcode() {

      add_shortcode( 'portfolio', array($this, 'portfolio_shortcode') );

    }



    function portfolio_shortcode( $atts ) {
      $test=extract( shortcode_atts(
              array(
                 
                  'category' => '',
                  
                  'excerpt' => 'false',
              ), $atts )
      );  $output = '';
     
    return $output;
    }    

    public function custom_post_type() {

    $labels = array(
        'name'                => _x( 'Teams', 'Post Type General Name', 'cuvey' ),
        'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'cuvey' ),
        'menu_name'           => __( 'Team', 'cuvey' ),
        'parent_item_colon'   => __( 'Parent Team:', 'cuvey' ),
        'all_items'           => __( 'All Teams', 'cuvey' ),
        'view_item'           => __( 'View Team', 'cuvey' ),
        'add_new_item'        => __( 'Add New Team', 'cuvey' ),
        'add_new'             => __( 'Add New', 'cuvey' ),
        'edit_item'           => __( 'Edit Team', 'cuvey' ),
        'update_item'         => __( 'Update Team', 'cuvey' ),
        'search_items'        => __( 'Search Team', 'cuvey' ),
        'not_found'           => __( 'Not found', 'cuvey' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cuvey' ),
    );
    $args = array(
        'label'               => __( 'team_member', 'cuvey' ),
        'description'         => __( 'You can add the team members from here with their posts.', 'cuvey' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor','thumbnail'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 60,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'team', $args );

    $labels = array(
        'name'                => _x( 'Projects', 'Post Type General Name', 'cuvey' ),
        'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'cuvey' ),
        'menu_name'           => __( 'Project', 'cuvey' ),
        'parent_item_colon'   => __( 'Parent Project:', 'cuvey' ),
        'all_items'           => __( 'All Projects', 'cuvey' ),
        'view_item'           => __( 'View Project', 'cuvey' ),
        'add_new_item'        => __( 'Add New Project', 'cuvey' ),
        'add_new'             => __( 'Add New', 'cuvey' ),
        'edit_item'           => __( 'Edit Project', 'cuvey' ),
        'update_item'         => __( 'Update Project', 'cuvey' ),
        'search_items'        => __( 'Search Project', 'cuvey' ),
        'not_found'           => __( 'Not found', 'cuvey' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cuvey' ),
    );
    $args = array(
        'label'               => __( 'portfolio_type', 'cuvey' ),
        'description'         => __( 'You can create portfolios slider from here.', 'cuvey' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor','thumbnail'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 60,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'portfolio', $args );
    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name', 'cuvey' ),
        'singular_name'       => _x( 'Events', 'Post Type Singular Name', 'cuvey' ),
        'menu_name'           => __( 'Event', 'cuvey' ),
        'parent_item_colon'   => __( 'Parent Event:', 'cuvey' ),
        'all_items'           => __( 'All Events', 'cuvey' ),
        'view_item'           => __( 'View Event', 'cuvey' ),
        'add_new_item'        => __( 'Add New Event', 'cuvey' ),
        'add_new'             => __( 'Add New', 'cuvey' ),
        'edit_item'           => __( 'Edit Event', 'cuvey' ),
        'update_item'         => __( 'Update Event', 'cuvey' ),
        'search_items'        => __( 'Search Event', 'cuvey' ),
        'not_found'           => __( 'Not found', 'cuvey' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cuvey' ),
    );
    $args = array(
        'label'               => __( 'event_type', 'cuvey' ),
        'description'         => __( 'You can create events and camps from here.', 'cuvey' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor','thumbnail'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 60,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'event', $args );

    $labels = array(
        'name'                => _x( 'Menu Items', 'Post Type General Name', 'cuvey' ),
        'singular_name'       => _x( 'Menu Item', 'Post Type Singular Name', 'cuvey' ),
        'menu_name'           => __( 'Menu Item', 'cuvey' ),
        'parent_item_colon'   => __( 'Parent Menu Item:', 'cuvey' ),
        'all_items'           => __( 'All Menu Items', 'cuvey' ),
        'view_item'           => __( 'View Menu Item', 'cuvey' ),
        'add_new_item'        => __( 'Add New Menu Item', 'cuvey' ),
        'add_new'             => __( 'Add New', 'cuvey' ),
        'edit_item'           => __( 'Edit Menu Item', 'cuvey' ),
        'update_item'         => __( 'Update Menu Item', 'cuvey' ),
        'search_items'        => __( 'Search Menu Item', 'cuvey' ),
        'not_found'           => __( 'Not found', 'cuvey' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cuvey' ),
    );
    $args = array(
        'label'               => __( 'menu_type', 'cuvey' ),
        'description'         => __( 'You can create menus and camps from here.', 'cuvey' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor','thumbnail'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 60,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'menu', $args );

    }



    public function create_portfolio_taxonomies()

    {
    $labels = array(
        'name'                       => _x( 'Designations', 'Taxonomy General Name', 'cuvey' ),
        'singular_name'              => _x( 'Designation', 'Taxonomy Singular Name', 'cuvey' ),
        'menu_name'                  => __( 'Designation', 'cuvey' ),
        'all_items'                  => __( 'All Items', 'cuvey' ),
        'parent_item'                => __( 'Parent Item', 'cuvey' ),
        'parent_item_colon'          => __( 'Parent Item:', 'cuvey' ),
        'new_item_name'              => __( 'New Item Name', 'cuvey' ),
        'add_new_item'               => __( 'Add New Item', 'cuvey' ),
        'edit_item'                  => __( 'Edit Item', 'cuvey' ),
        'update_item'                => __( 'Update Item', 'cuvey' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'cuvey' ),
        'search_items'               => __( 'Search Items', 'cuvey' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'cuvey' ),
        'choose_from_most_used'      => __( 'Choose from the most used items', 'cuvey' ),
        'not_found'                  => __( 'Not Found', 'cuvey' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'team_post', array( 'team' ), $args );
       
    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'cuvey' ),
        'singular_name'              => _x( 'Filter', 'Taxonomy Singular Name', 'cuvey' ),
        'menu_name'                  => __( 'Filter', 'cuvey' ),
        'all_items'                  => __( 'All Items', 'cuvey' ),
        'parent_item'                => __( 'Parent Item', 'cuvey' ),
        'parent_item_colon'          => __( 'Parent Item:', 'cuvey' ),
        'new_item_name'              => __( 'New Item Name', 'cuvey' ),
        'add_new_item'               => __( 'Add New Item', 'cuvey' ),
        'edit_item'                  => __( 'Edit Item', 'cuvey' ),
        'update_item'                => __( 'Update Item', 'cuvey' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'cuvey' ),
        'search_items'               => __( 'Search Items', 'cuvey' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'cuvey' ),
        'choose_from_most_used'      => __( 'Choose from the most used items', 'cuvey' ),
        'not_found'                  => __( 'Not Found', 'cuvey' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'portfolio_filter', array( 'portfolio' ), $args );
       
    $labels = array(
        'name'                       => _x( 'Types', 'Taxonomy General Name', 'cuvey' ),
        'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'cuvey' ),
        'menu_name'                  => __( 'Type', 'cuvey' ),
        'all_items'                  => __( 'All Items', 'cuvey' ),
        'parent_item'                => __( 'Parent Item', 'cuvey' ),
        'parent_item_colon'          => __( 'Parent Item:', 'cuvey' ),
        'new_item_name'              => __( 'New Item Name', 'cuvey' ),
        'add_new_item'               => __( 'Add New Item', 'cuvey' ),
        'edit_item'                  => __( 'Edit Item', 'cuvey' ),
        'update_item'                => __( 'Update Item', 'cuvey' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'cuvey' ),
        'search_items'               => __( 'Search Items', 'cuvey' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'cuvey' ),
        'choose_from_most_used'      => __( 'Choose from the most used items', 'cuvey' ),
        'not_found'                  => __( 'Not Found', 'cuvey' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'event_type', array( 'event' ), $args );
     $labels = array(
        'name'                       => _x( 'Meals', 'Taxonomy General Name', 'cuvey' ),
        'singular_name'              => _x( 'Meals', 'Taxonomy Singular Name', 'cuvey' ),
        'menu_name'                  => __( 'Meals', 'cuvey' ),
        'all_items'                  => __( 'All Items', 'cuvey' ),
        'parent_item'                => __( 'Parent Item', 'cuvey' ),
        'parent_item_colon'          => __( 'Parent Item:', 'cuvey' ),
        'new_item_name'              => __( 'New Item Name', 'cuvey' ),
        'add_new_item'               => __( 'Add New Item', 'cuvey' ),
        'edit_item'                  => __( 'Edit Item', 'cuvey' ),
        'update_item'                => __( 'Update Item', 'cuvey' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'cuvey' ),
        'search_items'               => __( 'Search Items', 'cuvey' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'cuvey' ),
        'choose_from_most_used'      => __( 'Choose from the most used items', 'cuvey' ),
        'not_found'                  => __( 'Not Found', 'cuvey' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'menu_meal', array( 'menu' ), $args );

}
}
 
$addons = new cuveyAddons();