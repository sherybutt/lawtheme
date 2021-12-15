<?php

// Our custom post type function
function wpmd_create_customposttype() {
 
    //Getting values of checkboxes in variables
    $elReportsCheckbox = myprefix_get_theme_option( 'wpmd_elderlawreports_checkbox' );
    $generalReportsCheckbox = myprefix_get_theme_option( 'wpmd_generalreports_checkbox' );
    $staffProfilesCheckbox = myprefix_get_theme_option( 'wpmd_staffprofiles_checkbox' );
    $faqsCheckbox = myprefix_get_theme_option( 'wpmd_faqs_checkbox' );
    $educationalAlertsCheckbox = myprefix_get_theme_option( 'wpmd_educationalerts_checkbox' );
    $epPlanningCheckbox = myprefix_get_theme_option( 'wpmd_epplanning_checkbox' );
    $newslettersCheckbox = myprefix_get_theme_option( 'wpmd_newsletter_checkbox' );
    $newsAndEventsCheckbox = myprefix_get_theme_option( 'wpmd_newsandevents_checkbox' );
    $clientTestimonial = myprefix_get_theme_option( 'wpmd_testimonial_checkbox' );




    if($elReportsCheckbox == "on" ){

     	//Elder Law Reports CPT
        register_post_type( 'elder_law',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Elder Law Reports' ),
                    'singular_name' => __( 'Elder Law Report' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'elder-law-report'),
                'show_in_rest' => true,
                'publicly_queryable' => false,
    			'exclude_from_search' => true,
    			'menu_icon' => 'dashicons-media-text',
    			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes','excerpt' ),
            )
        );

    }


    if($generalReportsCheckbox == "on" ){
        //General Reports CPT
        register_post_type( 'report',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Reports' ),
                    'singular_name' => __( 'Report' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'reports'),
                'show_in_rest' => true,
                'publicly_queryable' => false,
    			'exclude_from_search' => true,
    			'menu_icon' => 'dashicons-media-text',
    			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes','excerpt' ),
            )
        );
    }


    if($staffProfilesCheckbox == "on" ){
        //Staff Profiles CPT
        register_post_type( 'staffprofile',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Staff Profiles' ),
                    'singular_name' => __( 'Staff Profile' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'staff-profile'),
                'show_in_rest' => true,
    			'menu_icon' => 'dashicons-businessman',
    			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes','excerpt' ),
            )
        ); 
    }


    if($faqsCheckbox == "on" ){
        //FAQs CPT
        register_post_type( 'faq',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'FAQs' ),
                    'singular_name' => __( 'FAQ' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'faqs'),
                'show_in_rest' => true,
                'publicly_queryable' => false,
    			'menu_icon' => 'dashicons-editor-help',
    			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes','excerpt' ),
            )
        );    
    }


    if($educationalAlertsCheckbox == "on" ){
        //Educational Alerts CPT
        register_post_type( 'ealert',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Educational Alerts' ),
                    'singular_name' => __( 'Educational Alert' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'ealert'),
                'show_in_rest' => true,
    			'menu_icon' => 'dashicons-book',
    			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes','excerpt' ),
            )
        );
    }


    if($epPlanningCheckbox == "on" ){
        //Estate Planning Articles CPT
        register_post_type( 'estate_planning',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Estate Planning Articles' ),
                    'singular_name' => __( 'Estate Planning Article' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'estate-planning-article'),
                'show_in_rest' => true,
    			'menu_icon' => 'dashicons-welcome-write-blog',
    			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes','excerpt' ),
            )
        );
    }


    if($newslettersCheckbox == "on" ){
        //Newsletter CPT
        register_post_type( 'newsletter',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Newsletters' ),
                    'singular_name' => __( 'Newsletter' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'newsletter'),
                'show_in_rest' => true,
    			'menu_icon' => 'dashicons-media-default',
    			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes','excerpt' ),
            )
        );
    }


    if($newsAndEventsCheckbox == "on" ){
        //News and Events CPT
        register_post_type( 'news_and_event',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'News & Events' ),
                    'singular_name' => __( 'News & Events' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'news-events'),
                'show_in_rest' => true,
    			'menu_icon' => 'dashicons-admin-site-alt',
    			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes','excerpt' ),
            )
        );
    }


    if($clientTestimonial == "on" ){
        //News and Events CPT
        register_post_type( 'client_testimonials',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Testimonials' ),
                    'singular_name' => __( 'Testimonial' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'testimonials'),
                'show_in_rest' => true,
                'menu_icon' => 'dashicons-testimonial',
                'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes','excerpt' ),
            )
        );
    }
        
}
// Hooking up our function to theme setup
add_action( 'init', 'wpmd_create_customposttype' );


/*FAQ taxonomies*/
add_action( 'init', 'wpmd_taxonomie_init', 0 );
function wpmd_taxonomie_init() {
	register_taxonomy(
	'categories',
	'faq',
	array(
		'labels' => array(
			'name' => 'Category',
			'add_new_item' => 'Add New Category',
			'new_item_name' => "New Category"
		),
		'show_ui' => true,
		'show_tagcloud' => false,
		'hierarchical' => true
	)
	);
}