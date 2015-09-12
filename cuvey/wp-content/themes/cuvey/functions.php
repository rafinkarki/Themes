<?php
/**
 * cuvey functions file.
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();}

global $cuvey_options;


if ( !class_exists( 'ReduxFramework' ) && file_exists( get_template_directory() . '/inc/ReduxCore/framework.php' ) ) {
    require_once( get_template_directory()  . '/inc/ReduxCore/framework.php' );
}
if ( !isset( $cuvey_options ) && file_exists( get_template_directory()  . '/themeoption-config.php' ) ) {
    require_once( get_template_directory() . '/themeoption-config.php' );
}

if ( file_exists( get_template_directory() . '/inc/panels-lite/panels-lite.php' ) ) {
    require_once( get_template_directory() . '/inc/panels-lite/panels-lite.php' );
}
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
require_once( ABSPATH . 'wp-admin/includes/template.php' );
require( trailingslashit( get_template_directory() ) . 'inc/aquaresizer.php' );
require( trailingslashit( get_template_directory() ) . 'inc/widgets.php' );
require( trailingslashit( get_template_directory() ) . 'inc/helpers.php' );
require( trailingslashit( get_template_directory() ) . 'inc/static.php' );

/*********************************************************************
* THEME SETUP
*/

function cuvey_setup() {

    global $cuvey_options;

    // Translations support. Find language files in cuvey/languages
    load_theme_textdomain('cuvey', get_template_directory().'/languages');
    $locale = get_locale();
    $locale_file = get_template_directory()."/languages/{$locale}.php";
    if(is_readable($locale_file)) { require_once($locale_file); }

    // Set content width
    global $content_width;
    if (!isset($content_width)) $content_width = 720;

    // Editor style (editor-style.css)
    add_editor_style(array('assets/css/editor-style.css'));

    // Load plugin checker
    require(get_template_directory() . '/inc/plugin-activation.php');

    //Include all post types
    require(get_template_directory() . '/inc/metabox.php');

   

    // Nav Menu (Custom menu support)
    if (function_exists('register_nav_menu')) :
        global $cuvey_options;
        register_nav_menu('primary', __('cuvey Primary Menu', 'cuvey'));
       
    endif;

    // Theme Features: Automatic Feed Links
    add_theme_support('automatic-feed-links');

  
    // Theme Features: Dynamic Sidebar
    add_post_type_support( 'post', 'simple-page-sidebars' );


    // Theme Features: Post Thumbnails and custom image sizes for post-thumbnails
    add_theme_support('post-thumbnails', array('post', 'page','product','portfolio','team','event','menu'));

    // Theme Features: Post Formats
    add_theme_support('post-formats', array( 'gallery', 'image', 'link', 'quote', 'video', 'audio'));


    
}
add_action('after_setup_theme', 'cuvey_setup');


function cuvey_widgets_setup() {

    global $cuvey_options;
    // Widget areas
    if (function_exists('register_sidebar')) :
        // Sidebar right
        register_sidebar(array(
            'name' => "Blog Sidebar",
            'id' => "cuvey-widgets-sidebar",
            'description' => __('Widgets placed here will display in the right sidebar', 'cuvey'),
            'before_widget' => '<div id="%1$s" class="widget  %2$s cate">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4><hr>'
        ));

       
        // Footer Block 1
        register_sidebar(array(
            'name' => "Footer Block 1",
            'id' => "cuvey-widgets-footer-block-1",
            'description' => __('Widgets placed here will display in the first footer block', 'cuvey'),
            'before_widget' => '<div id="%1$s" class="widget wow fadeIn %2$s featured-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>'
        ));
        // Footer Block 2
        register_sidebar(array(
            'name' => "Footer Block 2",
            'id' => "cuvey-widgets-footer-block-2",
            'description' => __('Widgets placed here will display in the second footer block', 'cuvey'),
            'before_widget' => '<div id="%1$s" class="widget wow fadeIn %2$s featured-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>'
        ));
        // Footer Block 3
        if(isset($cuvey_options['footer-layout']) && esc_attr($cuvey_options['footer-layout'])>5) {
       register_sidebar(array(
            'name' => "Footer Block 3",
            'id' => "cuvey-widgets-footer-block-3",
            'description' => __('Widgets placed here will display in the third footer block', 'cuvey'),
            'before_widget' => '<div id="%1$s" class="widget wow fadeIn %2$s featured-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>'
        ));
        }

        // Footer Block 4
        if(isset($cuvey_options['footer-layout']) && esc_attr($cuvey_options['footer-layout'])>9) {
       register_sidebar(array(
            'name' => "Footer Block 4",
            'id' => "cuvey-widgets-footer-block-4",
            'description' => __('Widgets placed here will display in the third footer block', 'cuvey'),
            'before_widget' => '<div id="%1$s" class="widget wow fadeIn %2$s featured-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>'
        ));
        }
        
       
    endif;
   
}
add_action('widgets_init', 'cuvey_widgets_setup');


// The excerpt "more" button
function cuvey_excerpt($text) {
    return str_replace('[&hellip;]', '[&hellip;]<a class="" title="'. sprintf (__('Read more on %s','cuvey'), get_the_title()).'" href="'.get_permalink().'">' . __(' Read more','cuvey') . '</a>', $text);
}
add_filter('the_excerpt', 'cuvey_excerpt');

// wp_title filter
function cuvey_title($output) {
    echo $output;
    // Add the blog name
    bloginfo('name');
    // Add the blog description for the home/front page
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) echo ' - '.$site_description;
    // Add a page number if necessary
    if (!empty($paged) && ($paged >= 2 || $page >= 2)) echo ' - ' . sprintf(__('Page %s', 'cuvey'), max($paged, $page));
}
add_filter('wp_title', 'cuvey_title');



/*********************************************************************
 * Gallery SUPPORT
 */

add_filter('post_gallery', 'cuvey_post_gallery', 10, 2);
function cuvey_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';


    // Here's your actual output, you may customize it to your need
    $output = "<div class=\"flexslider post-gallery\">\n";
    $output .= "<ul class=\"slides\">\n";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
//      $img = wp_get_attachment_image_src($id, 'medium');
//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img = wp_get_attachment_image_src($id, 'full');

        $output .= "<li>";
        $output .= "<img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" />";
        $output .= "</li>";
    }

    $output .= "</ul>\n";
    $output .= "</div>\n";

    return $output;
}

/*********************************************************************
 * RETINA SUPPORT
 */
add_filter('wp_generate_attachment_metadata', 'cuvey_retina_support_attachment_meta', 10, 2);
function cuvey_retina_support_attachment_meta($metadata, $attachment_id) {

    // Create first image @2
    cuvey_retina_support_create_images(get_attached_file($attachment_id), 0, 0, false);

    foreach ($metadata as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $image => $attr) {
                if (is_array($attr))
                    cuvey_retina_support_create_images(get_attached_file($attachment_id), $attr['width'], $attr['height'], true);
            }
        }
    }

    return $metadata;
}

function cuvey_retina_support_create_images($file, $width, $height, $crop = false) {

    $resized_file = wp_get_image_editor($file);
    if (!is_wp_error($resized_file)) {

        if ($width || $height) {
            $filename = $resized_file->generate_filename($width . 'x' . $height . '@2x');
            $resized_file->resize($width * 2, $height * 2, $crop);
        } else {
            $filename = str_replace('-@2x','@2x',$resized_file->generate_filename('@2x'));
        }
        $resized_file->save($filename);

        $info = $resized_file->get_size();

        return array(
            'file' => wp_basename($filename),
            'width' => $info['width'],
            'height' => $info['height'],
        );
    }

    return false;
}

add_filter('delete_attachment', 'cuvey_delete_retina_support_images');
function cuvey_delete_retina_support_images($attachment_id) {
    $meta = wp_get_attachment_metadata($attachment_id);
    if(is_array($meta)){
        $upload_dir = wp_upload_dir();
        $path = pathinfo($meta['file']);

        // First image (without width-height specified
        $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . wp_basename($meta['file']);
        $retina_filename = substr_replace($original_filename, '@2x.', strrpos($original_filename, '.'), strlen('.'));
        if (file_exists($retina_filename)) unlink($retina_filename);

        foreach ($meta as $key => $value) {
            if ('sizes' === $key) {
                foreach ($value as $sizes => $size) {
                    $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
                    $retina_filename = substr_replace($original_filename, '@2x.', strrpos($original_filename, '.'), strlen('.'));
                    if (file_exists($retina_filename))
                        unlink($retina_filename);
                }
            }
        }
    }
}

// Enqueue comment-reply script if comments_open and singular
function cuvey_enqueue_comment_reply() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
        }
}
add_action( 'wp_enqueue_scripts', 'cuvey_enqueue_comment_reply' );

add_filter('nav_menu_css_class' , 'cuvey_special_nav_class' , 10 , 2);
function cuvey_special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     global $cuvey_options;
     return $classes;
}

Class Description_Walker extends Walker_Nav_Menu {

    function start_lvl( &$output , $depth = 0 , $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"dropdown-menu \" role=\"menu\">\n"; 
    }

    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        // check, whether there are children for the given ID and append it to the element with a (new) ID
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);

        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

   function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
          
           $class_names = ' '. esc_attr( $class_names ) . '';
           
           $output .= $indent . '<li >';
           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
           $prepend='';
          
           $append = '';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
          

            $item_output = $args->before;
            if($item->hasChildren){
                $item_output .='<li class="dropdown">';
                $item_output .= '<a class="dropdown-toggle '.esc_attr( $class_names ).'" data-hover="dropdown" data-delay="100"'. $attributes .'>';
                $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
                $item_output .='<b class="caret"></b>';
            } else {
                $item_output .= '<a class="'.esc_attr( $class_names ).'" '. $attributes .'>';
                $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            }
            
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
       
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );



            }

}


function cuvey_body_classes( $classes ) {
    if (!is_page_template('cuvey-page-builder.php') ) :
    $classes[] = 'multipage';
    endif;  
    $classes[]='headerstyle1 headerfixed';
    return $classes;
}
add_filter( 'body_class', 'cuvey_body_classes' );



add_action( 'tgmpa_register', 'cuvey_register_required_plugins' );

function cuvey_register_required_plugins() {
 

    $plugins = array(
 
        array(
            'name'               => __('SiteOrigin Panels', 'cuvey'),// The plugin name.
            'slug'               => __('siteorigin-panels','cuvey'), // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/plugins/siteorigin-panels.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'SiteOrigin Bundles', // The plugin name.
            'slug'               => 'so-widgets-bundle', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/plugins/so-widgets-bundle.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => __('Theme Addons', 'cuvey'),// The plugin name.
            'slug'               => __('cuvey-addons','cuvey'), // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/plugins/cuvey-addons.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ), 
        array(
          'name'      => 'MailChimp for WordPress',
          'slug'      => 'mailchimp-for-wp',
          'required'  => false,
        ), 
        array(
            'name'      => 'Contact Form Plugin ', 
            'slug'       => 'contact-form-7', 
            'required'    => true,
        ),      
        array(
            'name'      => 'Woocommerce - Shop Plugin', 
            'slug'      => 'woocommerce', 
            'required'   => true,
        ),
       
        array(
            'name'               => 'Revolution Slider', // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/plugins/revslider.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ), 
        
    );
 
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'cuvey' ),
            'menu_title'                      => __( 'Install Plugins', 'cuvey' ),
            'installing'                      => __( 'Installing Plugin: %s', 'cuvey' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'cuvey' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ,'cuvey'), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ,'cuvey'), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ,'cuvey'), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ,'cuvey'), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ,'cuvey'), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ,'cuvey'), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ,'cuvey'), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ,'cuvey'), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ,'cuvey'),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ,'cuvey'),
            'return'                          => __( 'Return to Required Plugins Installer', 'cuvey' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'cuvey' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'cuvey' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
 
    tgmpa( $plugins, $config );
 
}


// How comments are displayed
function avada_comment($comment, $args, $depth) { ?>
    <?php $add_below = ''; ?>
    <div <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

        <div class="media">
            <div class="pull-left">
                <?php echo get_avatar($comment, 90); ?>
            </div>

            <div class="media-body">                
                <h5 class="media-heading"><?php echo get_comment_author_link() ?></h5>
                <?php printf( __( '%1$s at %2$s', 'Avada' ), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link(__(' - Edit', 'Avada'),'  ','') ?><?php comment_reply_link(array_merge( $args, array('reply_text' => __(' - Reply', 'Avada'), 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
          
                <?php if ($comment->comment_approved == '0') : ?>
                <em><?php echo __('Your comment is awaiting moderation.', 'Avada') ?></em>
                <br />
                <?php endif; ?>
                <?php comment_text() ?>              

            </div>

        </div>

<?php }

function removeDemoModeLink() {
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}

add_action( 'init', 'cuvey_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cuvey_initialize_cmb_meta_boxes() {

    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once 'inc/cmb/init.php';

}




//Builder functions

function cuvey_row_style_fields($fields) {
    
$fields['row_id'] = array(
      'name'        => __('Row ID', 'siteorigin-panels'),
      'type'        => 'text',
      'group'       => 'attributes',
      'description' => __('Please give an id(without #)', 'siteorigin-panels'),
      'priority'    => 10,
);
$fields['row_stretch'] = array(
      'name'        => __('', 'siteorigin-panels'),
      'type'        => 'hidden',
      'group'       => 'layout',   
      
);
$fields['row_container'] = array(
      'name'        => __('Row Styles', 'siteorigin-panels'),
      'type'        => 'select',
      'group'       => 'layout',
      'description' => __('Choose between contained or full row stle', 'siteorigin-panels'),
      'priority'    => 10,
      'options'     => array(
            'container'        => __('Container', 'siteorigin-panels'),
            'container-row'        => __('Container with row', 'siteorigin-panels'),
            'full-width'        => __('Full-Width', 'siteorigin-panels'),
            
            ),
);
$fields['overlay'] = array(
      'name'        => __('Overlay Effect', 'siteorigin-panels'),
      'type'        => 'checkbox',
      'group'       => 'design',
      'description' => __('If enabled, the background color will have gradient effect.', 'siteorigin-panels'),
      'priority'    => 8,
);
$fields['parallax'] = array(
      'name'        => __('Parallax', 'siteorigin-panels'),
      'type'        => 'checkbox',
      'group'       => 'design',
      'description' => __('If enabled, the background image will have a parallax effect.', 'siteorigin-panels'),
      'priority'    => 8,
);

$fields['parallax_rate'] = array(
      'name'        => __('Parallax Rate', 'siteorigin-panels'),
      'type'        => 'text',
      'group'       => 'design',
      'description' => __('Enter value such as 0.1,0.2 etc to control parallax speed', 'siteorigin-panels'),
      'priority'    => 9,
);

  return $fields;
}

add_filter( 'siteorigin_panels_row_style_fields', 'cuvey_row_style_fields');


function cuvey_panels_row_container_start( $grid, $attributes ) {
     
    if(isset($grid['style']['row_id']) && $grid['style']['row_id']!='' )
    echo '<div id="'.$grid['style']['row_id'].'">';
    if(isset($grid['style']['overlay'])&& $grid['style']['overlay']==1)
        echo '<div class="overlay">';
    if(isset($grid['style']['row_container']) && $grid['style']['row_container']!='container-row')
    echo '<div class="'.$grid['style']['row_container'].'">';
    if(isset($grid['style']['row_container']) && $grid['style']['row_container']=='container-row'){
    echo '<div class="container">';
    echo '<div class="row">';
    } 

}

add_filter('siteorigin_panels_row_container_start', 'cuvey_panels_row_container_start', 10, 2);


function cuvey_panels_row_container_end( $grid, $attributes ) { 
    
    if(isset($grid['style']['row_id']) && $grid['style']['row_id']!='' )
    echo '</div>'; 
    if(isset($grid['style']['overlay'])&& $grid['style']['overlay']==1)
        echo '</div>';
     if(isset($grid['style']['row_container'])&& $grid['style']['row_container']!='container-row')
    echo '</div>';
    if(isset($grid['style']['row_container']) && $grid['style']['row_container']=='container-row'){
    echo '</div>';
    echo '</div>';
    }
    

}
add_filter('siteorigin_panels_row_container_end', 'cuvey_panels_row_container_end', 10, 2);


function cuvey_row_style_attributes( $attributes, $args ) {

    if( !empty( $args['parallax'] ) ) {               
        $attributes['data-stellar-background-ratio']=$args['parallax_rate'];
        $attributes['data-stellar-vertical-offset']='true';
    }

    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'cuvey_row_style_attributes', 10, 2);


// BY Rafin
//For excerpt
function cuvey_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'cuvey_excerpt_more');

function cuvey_excerpt_length( $length ) {
    return 80;
}
add_filter( 'excerpt_length', 'cuvey_excerpt_length', 999 );

// Woocommerce
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb' , 20); 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count' , 20); 
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating' , 5);  
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price' , 10);  

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

add_filter( 'woocommerce_checkout_fields' , 'cuvey_addBootstrapToCheckoutFields1' );

function cuvey_addBootstrapToCheckoutFields1($fields) {
foreach ($fields as &$fieldset) {
  foreach ($fieldset as &$field) {
    // if you want to add the form-group class around the label and the input
    $field['class'][] = 'billing-form'; 

    // add form-control to the actual input
    $field['input_class'][] = 'form-control';
    
  }
}
return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'cuvey_alter_woocommerce_checkout_fields' );
function cuvey_alter_woocommerce_checkout_fields( $fields ) {
   
    $fields['order']['order_comments']['placeholder'] = 'Notes about your order, e.g. special notes for delivery.';
    $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
    $fields['billing']['billing_email']['placeholder'] = 'Email address';
    $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
    $fields['billing']['billing_phone']['placeholder'] = 'Phone number';
    $fields['billing']['billing_city']['placeholder'] = 'Enter your city';
    $fields['billing']['billing_postcode']['placeholder'] = 'Enter a zip';
    $fields['billing']['billing_company']['placeholder'] = 'Enter a company name';
    
    // for shipping field
    $fields['shipping']['shipping_first_name']['placeholder'] = 'First Name';   
    $fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name';
    $fields['shipping']['shipping_city']['placeholder'] = 'Enter your city';
    $fields['shipping']['shipping_postcode']['placeholder'] = 'Enter a zip';
    $fields['shipping']['shipping_company']['placeholder'] = 'Enter a company name';
   
     return $fields;
}
add_action( 'woocommerce_before_my_page', 'wc_print_notices', 10 );