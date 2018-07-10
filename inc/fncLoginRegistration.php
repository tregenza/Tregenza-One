<?php
/*** Functions.php INCLUDE - Login / Registration form Customisation ***/
/*  Code based on http://advent.squareonemd.co.uk/create-your-own-registration-form-in-wordpress/


	/* User Logged In Shortcode for optional content */	
	function tregenza_one_loggedInOnly ($params, $content = null){
		//check tha the user is logged in
		if ( is_user_logged_in() ){
		    //user is logged in so show the content
		    return do_shortcode($content);
		} else{
			//user is not logged in so hide the content
	    	return;
		}
	}
	add_shortcode('to_logged_in_only', 'tregenza_one_loggedInOnly' );

	/* User NOT Logged In Shortcode for optional content */	
	function tregenza_one_loggedOutOnly ($params, $content = null){
		//check tha the user is logged in
		if ( ! is_user_logged_in() ){
		    //user is NOT logged in so show the content
		    return do_shortcode($content);
		} else{
			//user is not logged in so hide the content
	    	return;
		}
	}
	add_shortcode('to_logged_out_only', 'tregenza_one_loggedOutOnly' );




	/* Shortcode to display registration form */
	/* Returns nothing unless Woocommerce installed */
	function tregenza_one_registration_form() {
			$output = "";

			if (class_exists('WooCommerce') ) {
					/* Woocommerce */
					$output	=	wc_get_template_html('myaccount/form-login.php');
			}

			/* Tweak the form so if there is an error it reloads the page at the right place */ 
			$lookfor = '<form method="post" class="woocommerce-form woocommerce-form-register register">';
			$replace = '<form action="#customer_form_reload_target" method="post" class="woocommerce-form woocommerce-form-register register">';

			$output = str_replace($lookfor, $replace, $output);

			/*  NOTE : The #customer_form_target  anchor needs to be manually added to the page
													if needed. Due to the themes fixed header, none of the hooks in WC or
													existing ids work effective as they go to the right position but any
													error messages are lost off the top of the screen.
			*/

			return $output;
	}
	add_shortcode( 'to_registration_form', 'tregenza_one_registration_form');
	
