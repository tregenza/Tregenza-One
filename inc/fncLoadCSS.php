<?php
/*** Functions.php INCLUDE - Load CSS ***/

	/* ---------- Load CSS Files ----------- */
	function tregenza_one_queue_css() {
		/* Jquery */
		wp_register_style('wpb-jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/humanity/jquery-ui.css', false, null);
		wp_enqueue_style('wpb-jquery-ui-style');

		/* Tregenza One */
	    wp_enqueue_style( 'tregenza-one-style-css',  get_template_directory_uri() .'/style.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-customise',  get_template_directory_uri() .'/css/style-customise-defaults.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-wordpress',  get_template_directory_uri() .'/css/style-wordpress-default.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-structure',  get_template_directory_uri() .'/css/style-structure.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-page-header-footer',  get_template_directory_uri() .'/css/style-page-header-footer.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-navigation',  get_template_directory_uri() .'/css/style-navigation.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-basic-elements',  get_template_directory_uri() .'/css/style-basic-elements.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-content-elements',  get_template_directory_uri() .'/css/style-content-elements.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-woocommmerce-elements',  get_template_directory_uri() .'/css//style-woocommerce.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-jquery',  get_template_directory_uri() .'/css/style-jqueryui.css', array(), null, 'all' );
	
		if ( is_child_theme() ) {
			/* load child style.css to overwrite parent styling */
	    	wp_enqueue_style( 'tregenza-one-child-style-css',  get_stylesheet_directory_uri() .'/style.css', array(), null, 'all' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'tregenza_one_queue_css' );

