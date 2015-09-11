<?php

/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('Redux_Framework_sample_config')) {

    class Redux_Framework_sample_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {


            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();
            +
            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
            
            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);
            
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            
            // Dynamically add a section. Can be also used to modify sections/fields
            //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field   set with compiler=>true is changed.

         * */
        function compiler_action($options, $css, $changed_values) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r($changed_values); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'cuvey'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'cuvey'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'cuvey'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                <?php endif; ?>

                <h4><?php echo $this->theme->display('Name'); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'cuvey'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'cuvey'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'cuvey') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
            <?php
            if ($this->theme->parent()) {
                printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'cuvey'), $this->theme->parent()->display('Name'));
            }
            ?>

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                Redux_Functions::initWpFilesystem();
                
                global $wp_filesystem;

                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }

            // ACTUAL DECLARATION OF SECTIONS
            $this->sections[] = array(
                'title'     => __('General Options', 'cuvey'),
                'icon'      => 'el-icon-home',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array( 
                    array(
                        'id'        => 'custom_color_primary',
                        'type'      => 'color',
                        'title'     => __('Theme Color', 'cuvey'),
                        'subtitle'  => __('Choose a color for your theme.', 'cuvey'),                            
                        ),
                    array(
                        'id'        => 'logo',
                        'type'      => 'media',
                        'title'     => __('Logo Normal', 'cuvey'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'subtitle'  => __('Upload header logo for your website', 'cuvey'),
                        'std'       =>get_template_directory_uri().'/assets/images/logo.png',
                        
                    ),                  
                   

                    array(
                        'id'        => 'blog_title',
                        'type'      => 'switch',
                        'title'     => __('Logo Text', 'cuvey'),
                        'subtitle'  => __('Display Site Title from WP General Settings', 'cuvey'),
                        'default'   => '1',
                    ),                   

                    array(
                        'id'        => 'preloader',
                        'type'      => 'switch',
                        'title'     => __('Activate preloader', 'cuvey'),
                        'subtitle'  => __('Display loader for your site', 'cuvey'),
                        'default'   => '1',
                    ),  
                                

                    array(
                        'id'        => 'favicon',
                        'type'      => 'media',
                        'title'     => __('Favicon', 'cuvey'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'subtitle'  => __('Upload favicon for your website', 'cuvey'),
                        
                    ),
                ),
            );
            
            $this->sections[] = array(
                'icon'      => 'el-icon-website',
                'title'     => __('Menu/Header Options', 'cuvey'),
                'fields'    => array(
                    array(
                        'id'        => 'header_section',
                        'type'      => 'switch',
                        'title'     => __('Display top header', 'cuvey'),
                        'subtitle'  => __('Turn header section on/off.', 'cuvey'),
                        'default'   => '1',
                    ), 
                   
                     array(
                        'id'        => 'header_image',
                        'type'      => 'media',
                        'title'     => __('Header Image', 'cuvey'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'subtitle'  => __('Upload image for heading section for your website', 'cuvey'),
                        
                    ),
                    array(
                        'id'        => 'header_copyright',
                        'type'      => 'switch',
                        'title'     => __('Display copyright text in header', 'cuvey'),
                        'subtitle'  => __('Copyright text will be displayed in left side header style only.', 'cuvey'),
                        'default'   => '1',
                    ),  
                   
                    array(
                        'id'        => 'search',
                        'type'      => 'switch',
                        'title'     => __('Show Search', 'cuvey'),
                        'subtitle'  => __('Show serach button on the header', 'cuvey'),
                        'default'   => '1',
                    ),

                          
                    
                )
            );
            $this->sections[] = array(
                    'icon'      => 'el-icon-credit-card',
                    'title'     => __('Breadcrumb Options', 'cuvey'),
                    'desc'      => __('<p class="description">You can change breadcrumbs layout and attributes.</p>', 'cuvey'),
                    'fields'    => array(
                        array(
                            'id'        => 'breadcrumb_option',
                            'type'      => 'select',
                            'title'     => __('Breadcrumb Options', 'cuvey'),
                            'options'   => array(
                                'normal' =>'Normal Breadcrumb',
                                'breadcrumb_bg' =>'Breadcrumb Background Image',                            
                            ), 
                            'default' =>'normal',
                        ),
                        array(
                            'id'        => 'breadcrumb_nav',
                            'type'      => 'switch',
                            'title'     => __('Show breadcrumb navigation', 'cuvey'),
                            'subtitle'  => __('Switch to hide/show breadcrumb navigation.', 'cuvey'),
                            'default'   => '1',
                        ),
                        array(
                            'id'        => 'breadcrumb_image',
                            'type'      => 'media',
                            'title'     => __('Upload breadcrumb background image', 'cuvey'),
                            'subtitle'  => __('Upload backgrond image of breadcrumb section.Same image will be displayed utill particular image for a page been given.', 'cuvey'),                        
                        ),
                        array(
                            'id'        => 'breadcrumb_title',
                            'type'      => 'select',
                            'title'     => __('Breadcrumb Title Options', 'cuvey'),
                            'subtitle'  => __('Use title options when Breadcrumb Options is \'Breadcrumb Background Image\'','cuvey'),
                            'options'   => array(
                                'normal' =>'Normal Style',
                                'alt' =>'Title Italic Style',
                                'boxed' =>'Title Boxed Style',                             
                            ), 
                            'default' =>'normal',
                        ),
                        array(
                            'id'        => 'breadcrumb_subtitle',
                            'type'      => 'switch',
                            'title'     => __('Show subtitle in breadcrumb', 'cuvey'),
                            'subtitle'  => __('Switch to hide/show subtitle in breadcrumb section.', 'cuvey'),
                            'default'   => '1',
                        ),
                        array(
                            'id'        => 'subtitle_text',
                            'type'      => 'text',
                            'title'     => __('Subtitle Text', 'cuvey'), 
                            'subtitle'  => __('Text here will be displayed below page title in breadcrumb as default subtitle text.', 'cuvey'), 
                            'default'   =>'A cuveye agency that builds awesome stuff all day, every day',
                        ),
                        
                    ),
                );
            $this->sections[] = array(
                    'icon'      => 'el-icon-eye-open',
                    'title'     => __('Pages Options', 'cuvey'),
                    'desc'      => __('<p class="description">You can change pages layout and attributes.</p>', 'cuvey'),
                    'fields'    => array( 
                         array( 
                            'id'      => 'template_color', 
                            'title'    => __( 'Page Section Background Option','cuvey'), 
                            'desc' => __('Choose a background color option for section of archive,page and single pages.', 'cuvey') ,
                            'type'    => 'select', 
                            'options' => array(                    
                                'white' => 'White Background', 
                                'gray'   => 'Gray Background',                   
                            ),
                            'default' =>'white',
                        ),                      
                        array(
                            'id'        => 'single_blog',
                            'type'      => 'select',
                            'title'     => __('Single Blog Page Layout', 'cuvey'),
                            'options'   => array(
                                'left' =>'Single Blog with Left Sidebar',
                                'right' =>'Single Blog with Right Sidebar',
                                'fullwidth' =>'Single Blog Fullwidth',                                       
                            ), 
                            'default' =>'left',
                        ),
                        array(
                            'id'        => 'archive_layout',
                            'type'      => 'select',
                            'title'     => __('Archive Blog Page Layout', 'cuvey'),
                            'options'   => array(
                                '1' =>'One Column',
                                '1l' =>'One Column Left Sidebar',
                                '1r' =>'One Column Right Sidebar',
                                '2' =>'Two Column',
                                '2l' =>'Two Column Left Sidebar',
                                '2r' =>'Two Column Right Sidebar',                                
                                '3' =>'Three Column',
                                '3l' =>'Three Column Left Sidebar',
                                '3r' =>'Three Column Right Sidebar', 
                                'm1' =>'Masonry One Column',
                                'm2' =>'Masonry Two Column',
                                'm3' =>'Masonry Three Column',
                                't' =>'Timeline View',
                                'tl' =>'Timeline Left Sidebar',
                                'tr' =>'Timeline Right Sidebar',                                     
                            ), 
                            'default' =>'1',
                        ),
                        array(
                            'id'        => 'shop_layout',
                            'type'      => 'select',
                            'title'     => __('Shop Page Layout', 'cuvey'),
                            'description'     => __('Choose layout for product page and single product page.', 'cuvey'),
                            'options'   => array(
                                'fullwidth' =>'Page Fullwidth',
                                'left' =>'Page with Left Sidebar',
                                'right' =>'Page with Right Sidebar',                                                                   
                            ), 
                            'default' =>'fullwidth',
                        ),
                        array(
                            'id'        => 'portfolio_number',
                            'type'      => 'text',
                            'title'     => __('Number of Projects', 'cuvey'), 
                            'default'   =>'5',
                        ),
                        array(
                            'id'        => 'single_portfolio',
                            'type'      => 'select',
                            'title'     => __('Single Portfolio Page Layout', 'cuvey'),
                            'description'     => __('Choose layout for portfolio single page.', 'cuvey'),
                            'options'   => array(
                                'fullwidth' =>'Page Fullwidth',
                                'left' =>'Page with Left Sidebar',
                                'right' =>'Page with Right Sidebar', 
                                'alternate' =>'Page View Alternate',                                                                  
                            ), 
                            'default' =>'fullwidth',
                        ),
                        
                        array(
                            'id'        => 'portfolio_related',
                            'type'      => 'switch',
                            'title'     => __('Show Related Projects', 'cuvey'),
                            'subtitle'  => __('Display related portfolio projects', 'cuvey'), 
                            'default'   =>'1',
                        ),
                        array(
                            'id'        => 'related_title',
                            'type'      => 'text',
                            'title'     => __('Related Projects Title', 'cuvey'), 
                            'default'   =>'PORTFOLIO SHOWCASE',
                        ),
                        array(
                            'id'        => 'related_subtitle',
                            'type'      => 'text',
                            'title'     => __('Related Projects Text', 'cuvey'), 
                            'default'   =>'Curabitur eu adipiscing lacus, a iaculis diam. Nullam placerat blandit auctor. Nulla accumsan ipsum et nibh rhoncus, eget tempus sapien
ultricies. Donec mollis lorem vehicula.',
                        ),

                        array(
                            'id'        => '404_image',
                            'type'      => 'media',
                            'title'     => __('404 Page Background Image', 'cuvey'),
                            'compiler'  => 'true',
                            'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                            'subtitle'  => __('Upload background image for 404 image', 'cuvey'),
                            
                        ),

                        array(
                            'id'        => '404_color',
                            'type'      => 'color',
                            'title'     => __('404 Heading Color', 'cuvey'),
                            'subtitle'  => __('Choose a color for title in 404 page.', 'cuvey'),
                            
                        ),
                        array(
                            'id'        => '404_footer',
                            'type'      => 'switch',
                            'title'     => __('Social Icons in 404 Page', 'cuvey'),
                            'subtitle'  => __('Display social icons in footer', 'cuvey'),
                            'default'   =>'1',
                            
                        ),
                        array(
                            'id'        => 'comingsoon_image',
                            'type'      => 'media',
                            'title'     => __('Coming Soon Page Background Image', 'cuvey'),
                            'compiler'  => 'true',
                            'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                            'subtitle'  => __('Upload background image for Coming Soon image', 'cuvey'),
                            
                        ),
                    )
                );
                        
            $this->sections[] = array(
                'icon'      => 'el-icon-th',
                'title'     => __('Footer Options', 'cuvey'),
                'fields'    => array(
                    array(
                        'id'        => 'f_contact',
                        'type'      => 'text',
                        'title'     => __('Contact form', 'cuvey'),
                        'subtitle'  => __('Use contact form shortcodes here', 'cuvey'),
                        'default'   => '1',
                    ),
                    array(
                        'id'        => 'footer_address',
                        'type'      => 'switch',
                        'title'     => __('Display Address Info', 'cuvey'),
                        'subtitle'  => __('You can hide/show footer address info.', 'cuvey'),
                        'default'   => '1',
                    ),
                    array(
                        'id'        => 'f_email',
                        'type'      => 'text',
                        'title'     => __('Email', 'cuvey'),
                        'subtitle'  => __('Give email address', 'cuvey'),
                        'default'   => __('hello@domain.com', 'cuvey'),
                    ),
                    array(
                        'id'        => 'f_phone',
                        'type'      => 'text',
                        'title'     => __('Phone', 'cuvey'),
                        'subtitle'  => __('Give phone number', 'cuvey'),
                        'default'   => __('+1 234 567890', 'cuvey'),
                    ),
                    
                    array(
                        'id'        => 'f_location',
                        'type'      => 'editor',
                        'title'     => __('Location', 'cuvey'),
                        'subtitle'  => __('Give location details', 'cuvey'),
                        'default'   => __('Level 13, 2 Elizabeth ST, Melbourne,Victoria 3000, Australia', 'cuvey'),
                    ),
                   array(
                        'id'        => 'f_image',
                        'type'      => 'media',
                        'title'     => __('Footer Image', 'cuvey'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'subtitle'  => __('Upload footer image to display in footer', 'cuvey'),
                        
                    ),
                    array(
                        'id'        => 'f_icons',
                        'type'      => 'switch',
                        'title'     => __('Footer Icons', 'cuvey'),
                        'subtitle'  => __('Hide/Show social icons in footer', 'cuvey'),
                        'default'   => '1',
                    ),
                    
                    array(
                        'id'        => 'footer_text',
                        'type'      => 'editor',
                        'title'     => __('Footer Text', 'cuvey'),
                        'subtitle'  => __('The text written here will be display in footer', 'cuvey'),
                        'default'   => '© 2014 CUVEY BY ENFUSIONTHEMES. All rights reserved.',
                    ),
                   
                    
                )
            );
            
            
            $this->sections[] = array(
                'icon'      => 'el-icon-bullhorn',
                'title'     => __('Social Icons', 'cuvey'),
                'desc'      => __('<p class="description">You need to provide social details to display the social icons on footer.</p>', 'cuvey'),
                'fields'    => array(
                    array(
                        'id'        => 'social_facebook',
                        'type'      => 'text',
                        'title'     => __('Facebook URL', 'cuvey'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social_twitter',
                        'type'      => 'text',
                        'title'     => __('Twitter URL', 'cuvey'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social_googlep',
                        'type'      => 'text',
                        'title'     => __('Google Plus URL', 'cuvey'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social_youtube',
                        'type'      => 'text',
                        'title'     => __('Youtube URL', 'cuvey'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social_linkedin',
                        'type'      => 'text',
                        'title'     => __('LinkedIn URL', 'cuvey'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social_behance',
                        'type'      => 'text',
                        'title'     => __('Behance URL', 'cuvey'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social_skype',
                        'type'      => 'text',
                        'title'     => __('Skype URL', 'cuvey'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social_instagram',
                        'type'      => 'text',
                        'title'     => __('Instagram URL', 'cuvey'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social_dribbble',
                        'type'      => 'text',
                        'title'     => __('Dribbble URL', 'cuvey'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social_flickr',
                        'type'      => 'text',
                        'title'     => __('Flickr URL', 'cuvey'),
                        'validate'  => 'url',
                    ),
                   
                )
            );

            $this->sections[] = array(
                'icon'      => 'el-icon-signal',
                'title'     => __('SEO options', 'cuvey'),
                'desc'      => __('<p class="description">We consider your online presense.</p>', 'cuvey'),
                'fields'    => array(
                    
                    array(
                        'id'        => 'meta_javascript',
                        'type'      => 'textarea',
                        'title'     => __('Tracking Code', 'cuvey'),
                        'subtitle'  => __('Paste your <b>Google Analytics</b> (or other) tracking code here. This will be added into the footer template of your theme.', 'cuvey'),
                           
                    ),
                    
                    array(
                        'id'        => 'meta_head',
                        'type'      => 'textarea',
                        'title'     => __('Meta Heading', 'cuvey'),
                        'validate'  => 'no_html',

                    ),
                    array(
                        'id'        => 'meta_author',
                        'type'      => 'text',
                        'title'     => __('Meta Author', 'cuvey'),

                    ),

                    array(
                        'id'        => 'meta_desc',
                        'type'      => 'textarea',
                        'title'     => __('Meta Description', 'cuvey'),
                        'validate'  => 'no_html',

                    ),

                    array(
                        'id'        => 'meta_keyword',
                        'type'      => 'textarea',
                        'title'     => __('Meta Keyword', 'cuvey'),
                        'validate'  => 'no_html',
                        'subtitle'  => __('Enter the wordpress seperated by comma.', 'cuvey'),

                    ),

                    

                )
            );



            $this->sections[] = array(
                'icon'      => 'el-icon-check',
                'title'     => __('Custom CSS', 'cuvey'),
                'desc'      => __('<p class="description">You can add custom CSS to override existing theme design.</p>', 'cuvey'),
                'fields'    => array(
                   array(
                        'id'        => 'extra-css',
                        'type'      => 'ace_editor',
                        'title'     => __('CSS Code', 'cuvey'),
                        'subtitle'  => __('Paste your CSS code here.', 'cuvey'),
                        'mode'      => 'css',
                        'theme'     => 'monokai',
                        'desc'      => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
                    ),
                 

                )
            );
            
        
           

            $this->sections[] = array(
                'title'     => __('Import / Export', 'cuvey'),
                'desc'      => __('Import and Export your Redux Framework settings from file, text or URL.', 'cuvey'),
                'icon'      => 'el-icon-refresh',
                'fields'    => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => 'Import Export',
                        'subtitle'      => 'Save and restore your Redux options',
                        'full_width'    => false,
                    ),
                ),
            );                     

            

        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'cuvey'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'cuvey')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'cuvey'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'cuvey')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'cuvey');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'cuvey_options',            // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => 'cuvey',     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'menu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => true,                    // Show the sections below the admin menu item or not
                'menu_title'        => __('Theme Options', 'cuvey'),
                'page_title'        => __('Theme Options', 'cuvey'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '', // Must be defined to add google fonts to the typography module
                
                'async_typography'  => false,                    // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                // OPTIONAL -> Give you extra features
                'page_priority'     => null,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => '',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => '_options',              // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,                   // Shows the Import/Export panel when not used as a field.
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                 'footer_credit'     => ' Theme Optional Panel',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => 'Visit us on GitHub',
                'icon'  => 'el-icon-github'
                //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon'  => 'el-icon-linkedin'
            );


            // Add content after the form.
            $this->args['footer_text'] = __('<p>Please get to us if you have any suggestions.</p>', 'cuvey');
        }

    }
    
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}

