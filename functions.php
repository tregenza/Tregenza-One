<?php
/*  
	Tregenza-One Functions.php

	Some code originally from BlankSlate 

*/

/* Load everything from inc sub-directory */
function incLoadOnBootstrap(){
	foreach( glob(dirname(__FILE__).'/inc/*.php') as $file ) {
		include $file;
	}
}
add_action('after_setup_theme', 'incLoadOnBootstrap');

