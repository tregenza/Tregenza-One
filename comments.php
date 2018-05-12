<?php 
	/*  Comments.php is a required file but the Tregenza_One theme 
				places the required code in the template-parts/entry directory.
				Call the template directory. This /comments.php file should only be
				used as a last resort. 
*/ 
			/* note: unlike get_template_part, comments_template needs the precedding slash on the path. */
			comments_template( '/template-parts/entry/comments.php', true ); 
?>