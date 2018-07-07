<?php
/*** Functions.php INCLUDE - Load JS ***/

	/* ---------- Load standard Javascript ----------- */
	function load_scripts() {
		wp_enqueue_script( 'comment-reply' );

//		wp_enqueue_script( 'jquery' );
//		wp_enqueue_script( 'jquery-ui-accordion');
//		wp_enqueue_script( 'tregenzaOneJS', get_template_directory_uri() . '/tregenzaOne.js');	

	}
	add_action( 'wp_enqueue_scripts', 'load_scripts' );
	
?>