<?php 
add_action( 'init', function() {

    register_extended_post_type( 'project', array(

        # Add the post type to the site's main RSS feed:
        'show_in_feed' => true,
        'has_archive' => false,
        'supports' => array('title', 'revisions'),
        'menu_icon' => 'dashicons-hammer',

        
    ), array(

        # Override the base names used for labels:
        'singular' => 'Project',
        'plural'   => 'Projects',
        'slug'     => 'project'

    ) );

} );

?>
