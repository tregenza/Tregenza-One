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
			return $output;
	}
	add_shortcode( 'to_registration_form', 'tregenza_one_registration_form');


	function tregenza_one_register_redirect() {
			if (class_exists('WooCommerce') 
							&& isset($_POST['register']) 
							&& $_POST['register'] == "Register" 
							&& isset($_POST['woocommerce-register-nonce']) /* just check its a woocommerce reg */
			
							) {
								/* Woocommerce registration*/
								$url =  wc_get_page_permalink( 'myaccount' );
		
							exit(wp_redirect($url));
			}
			
	}
//	add_action('init', 'tregenza_one_register_redirect');
