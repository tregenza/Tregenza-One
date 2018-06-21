<?php
/*** Functions.php INCLUDE - Set-up Basic Wordpress Features ***/

/**** WARNING - Uncommeting this line will reset all theme customisation *****/
/* remove_theme_mods(); */


	/* ---------- Hide the wpadminbar ----------- */
 	add_filter('show_admin_bar', '__return_false'); 


	/* ---------- Add Theme Support ----------- */
	
	function theme_support() {
		/*  Add support for woocommerce */
	    add_theme_support( 'woocommerce' );
	
		/* Wordpress Features */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 100,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( '',  ),
		) );
	
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'theme_support' );

?>