<?php global $metaboxes;
$metaboxes = array(
    'link' => array(
        'title' => __('Link Settings', 'cuvey'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-link',
        'priority' => 'high',
        'fields' => array(
            'link_title' => array(
                'title' => __('Link Title:', 'cuvey'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            ),
            'link_url' => array(
                'title' => __('link url:', 'cuvey'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            )
        )
    ),
    
    'video_code' => array(
        'title' => __('Video Settings', 'cuvey'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-video',
        'priority' => 'high',
        'fields' => array(
            'video_id' => array(
                'title' => __('Video url:', 'cuvey'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            )
        )
    ),
    
    'audio_code' => array(
        'title' => __('Audio Settings', 'cuvey'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-audio',
        'priority' => 'high',
        'fields' => array(
            'audio_id' => array(
                'title' => __('Audio url:', 'cuvey'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            )
        )
    ),

    'quote_author' => array(
        'title' => __('Quote Settings', 'cuvey'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-quote',
        'priority' => 'high',
        'fields' => array(

            'q_content' => array(
                'title' => __('Quote content:', 'cuvey'),
                'type' => 'textarea',
                'description' => '',
                'size' => 20
            ),

            'q_author' => array(
                'title' => __('quote author:', 'cuvey'),
                'type' => 'text',
                'description' => '',
                'size' => 20
            )
        )
    )
);

add_action( 'add_meta_boxes', 'cuvey_add_post_format_metabox' );
 
function cuvey_add_post_format_metabox() {
    global $metaboxes;
 
    if ( ! empty( $metaboxes ) ) {
        foreach ( $metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'cuvey_show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}

function cuvey_show_metaboxes( $post, $args ) {
    global $metaboxes;
 
    $custom = get_post_custom( $post->ID );
    $fields = $tabs = $metaboxes[$args['id']]['fields'];
 
    /** Nonce **/
    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
 
    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {
            switch ( $field['type'] ) {
                default:
                case "text":
                    if(isset($custom[$id][0])) {
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><input id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" size="' . $field['size'] . '" />';
                    } else {
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><input id="' . $id . '" type="text" name="' . $id . '" value="" size="' . $field['size'] . '" />';
                    }
                    break;
            }
        }
    }
 
    echo $output;
}


add_action( 'save_post', 'cuvey_save_metaboxes' );
 
function cuvey_save_metaboxes( $post_id ) {
    global $metaboxes;
 
    // verify nonce
    
    if(isset($_POST['post_format_meta_box_nonce'])){
    if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
        return $post_id;
    }

    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;
 
    // check permissions
    if ( isset( $_POST['post_type'] ) &&  'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
 
    $post_type = get_post_type();

    // loop through fields and save the data
    foreach ( $metaboxes as $id => $metabox ) {
        // check if metabox is applicable for current post type
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $metaboxes[$id]['fields'];
 
            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                if(isset($_POST[$id])) {
                    $new = $_POST[$id];
     
                    if ( $new && $new != $old ) {
                        update_post_meta( $post_id, $id, $new );
                    }
                    elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                        delete_post_meta( $post_id, $id, $old );
                    }
                }
            }
        }
    }
}


add_action( 'admin_print_scripts', 'cuvey_display_metaboxes', 1000 );
function cuvey_display_metaboxes() {
    global $metaboxes;
    if ( get_post_type() == "post" ) :
        ?>
        <script type="text/javascript">// <![CDATA[
            $ = jQuery;
 
            <?php
            $formats = $ids = array();
            foreach ( $metaboxes as $id => $metabox ) {
                array_push( $formats, "'" . $metabox['display_condition'] . "': '" . $id . "'" );
                array_push( $ids, "#" . $id );
            }
            ?>
 
            var formats = { <?php echo implode( ',', $formats );?> };
            var ids = "<?php echo implode( ',', $ids ); ?>";
             function displayMetaboxes() {
                // Hide all post format metaboxes
                $(ids).hide();
                // Get current post format
                var selectedElt = $("input[name='post_format']:checked").attr("id");
 
                // If exists, fade in current post format metabox
                if ( formats[selectedElt] )
                    $("#" + formats[selectedElt]).fadeIn();
            }
 
            $(function() {
                // Show/hide metaboxes on page load
                displayMetaboxes();
 
                // Show/hide metaboxes on change event
                $("input[name='post_format']").change(function() {
                    displayMetaboxes();
                });
            });
 
        // ]]></script>
        <?php
    endif;
}

function be_attachment_field_credit( $form_fields, $post ) {
    $form_fields['destination_url'] = array(
        'label' => 'Destination',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'destination_url', true ),
        'helps' => 'Add destination URL',
    );
    return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'be_attachment_field_credit', 10, 2 );

function be_attachment_field_credit_save( $post, $attachment ) {
    if( isset( $attachment['destination_url'] ) )
    update_post_meta( $post['ID'], 'destination_url', esc_url( $attachment['destination_url'] ) );
    return $post;
}
add_filter( 'attachment_fields_to_save', 'be_attachment_field_credit_save', 10, 2 );


add_filter( 'cmb_meta_boxes', 'cuvey_cmb_metaboxes' );
function cuvey_cmb_metaboxes( array $meta_boxes ) {

    $prefix = 'cuvey_';

     $meta_boxes['page_metabox'] = array(
        'id'         => 'page_metabox',
        'title'      => __( 'Cuvey Page Settings', 'cuvey' ),
        'pages'      => array( 'page'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
           
           
            array(
                'name' => 'Title',
                'desc' => 'You can set custom page title.',
                'id' => $prefix . 'pagetitle_title',
                'type' => 'text'
            ),
            array( 
                'id'      => $prefix . 'title_align', 
                'name'    => __( 'Title align','cuvey'),
                'desc' => __('Alignment of header title.', 'cuvey') , 
                'type'    => 'select', 
                'options' => array(
                    'left'   => 'Left',
                    'right' => 'Right', 
                    'center'=>'Center'                   
                )
            ),                      
           
        )
    );
     $meta_boxes['menu_metabox'] = array(
            'id'         => 'menu_metabox',
            'title'      => __( 'Menu Option', 'cuvey' ),
            'pages'      => array( 'page', ), // Post type
            'context'    => 'side',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(
                array(
                    'name'     => __( 'Menus', 'cuvey' ),
                    'desc'     => __( 'Select menu for this page', 'cuvey' ),
                    'id'       => $prefix . 'menu_select',
                    'type'     => 'taxonomy_select',
                    'taxonomy' => 'nav_menu', // Taxonomy Slug
                    'default' => 'cuvey-main-menu',
                ),
            )
        );
    
    

     $meta_boxes['portfolio_metabox'] = array(
        'id'         => 'portfolio_metabox',
        'title'      => __( 'Custom Portfolio Options', 'cuvey' ),
        'pages'      => array( 'portfolio' ), 
        'context'    => 'normal',
        'normal'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
             
            array(
                'name'    => 'Featured Project',
                'id'      => $prefix . 'featured_project',
                'type'    => 'radio',
                'options' => array(
                    'yes' => __( 'Yes', 'cuvey' ),
                    'no'   => __( 'No', 'cuvey' ),
                ),
            ),
            array(
                'name' => 'Client name',
                'desc' => 'Please enter the client\'s name seperated by comma',
                'id' => $prefix . 'portfolio_name',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Project Date',
                'desc' => 'Please enter the date of project',
                'id' => $prefix . 'portfolio_date',
                'type' => 'text_date_timestamp',
                'date_format' => 'M-d-y'
            ),
            array(
                'name' => 'Project Intro',
                'desc' => 'Please enter the short intro of project',
                'id' => $prefix . 'portfolio_intro',
                'type' => 'textarea_small'
            ),
        )
    ); 
    $meta_boxes['event_metabox'] = array(
            'id'         => 'event_metabox',
            'title'      => __( 'Custom Event Options', 'cuvey' ),
            'pages'      => array( 'event' ), 
            'context'    => 'normal',
            'normal'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(
                array(
                    'name'    => 'Featured Event',
                    'id'      => $prefix . 'event',
                    'type'    => 'radio',
                    'options' => array(
                        'yes' => __( 'Yes', 'cuvey' ),
                        'no'   => __( 'No', 'cuvey' ),
                    ),
                ),               
                array(
                    'name' => 'Event Start Date',
                    'desc' => 'Give event starting date',
                    'id' => $prefix . 's_date',
                    'type' => 'text_date'
                ),
                array(
                    'name' => 'Event End Date',
                    'desc' => 'Give event ending date',
                    'id' => $prefix . 'e_date',
                    'type' => 'text_date'
                ),
               
            )
        );
     $meta_boxes['menu_metabox'] = array(
            'id'         => 'menu_metabox',
            'title'      => __( 'Custom Menu Options', 'cuvey' ),
            'pages'      => array( 'menu' ), 
            'context'    => 'normal',
            'normal'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(
                array(
                    'name'    => 'Featured Menu',
                    'id'      => $prefix . 'featured',
                    'type'    => 'radio',
                    'options' => array(
                        'yes' => __( 'Yes', 'cuvey' ),
                        'no'   => __( 'No', 'cuvey' ),
                    ),
                    'default' =>'no',
                ),               
                array(
                    'name' => 'Item Price',
                    'desc' => 'Give menu item price. Eg: $60',
                    'id' => $prefix . 'price',
                    'type' => 'text_medium'
                ),
               
            )
        );
     $meta_boxes['team_metabox'] = array(
            'id'         => 'team_metabox',
            'title'      => __( 'Custom Team Page Options', 'cuvey' ),
            'pages'      => array( 'team' ), 
            'context'    => 'normal',
            'normal'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(
                
                array(
                    'name' => 'Personal Facebook Url',
                    'desc' => 'Please enter the client\'s facebook url',
                    'id' => $prefix . 'facebook',
                    'type' => 'text_medium'
                ),
                 array(
                    'name' => 'Personal Twitter Url',
                    'desc' => 'Please enter the client\'s twitter url',
                    'id' => $prefix . 'twitter',
                    'type' => 'text_medium'
                ),
                array(
                    'name' => 'Personal Google Url',
                    'desc' => 'Please enter the client\'s google url',
                    'id' => $prefix . 'google',
                    'type' => 'text_medium'
                ), 
                array(
                    'name' => 'Personal Linkedin Url',
                    'desc' => 'Please enter the client\'s linkedin url',
                    'id' => $prefix . 'linkedin',
                    'type' => 'text_medium'
                ),           
          

            )
        );

    return $meta_boxes;
}
 

?>