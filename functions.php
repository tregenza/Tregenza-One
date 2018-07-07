<?php
/*  
	Tregenza-One Functions.php

*/

/* Load everything from inc sub-directory */
function incLoadOnBootstrap(){
	foreach( glob(dirname(__FILE__).'/inc/*.php') as $file ) {
		require_once( $file );
	}

	if ( is_child_theme()) {
		$path = get_stylesheet_directory();
		if ( file_exists($path."/inc")) {
			/* Child template with its own includes */
			foreach( glob($path.'/inc/*.php') as $file ) {
				require_once( $file ) ;
			}
		}
	}
}
add_action('after_setup_theme', 'incLoadOnBootstrap');