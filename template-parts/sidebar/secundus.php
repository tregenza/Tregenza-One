<!--- Sidebar Secundus-->
	<aside class="secundus">
	<?php


		echo '<nav class="tregenzaOneAside secundusSidebar hamburgerMenuWrapperSidebar" >';
			if ( is_user_logged_in() && 	has_nav_menu('hamburgerLoggedIn')) {
				wp_nav_menu( array( 'theme_location' => 'hamburgerLoggedIn', 'container_id' => 'hamburgerMenu' , 'container_class' => 'hamburgerMenucontainer', 'fallback_cb' => 'noMenuFallback' ) ); 
			} else if (has_nav_menu('hamburger') ) {
				wp_nav_menu( array( 'theme_location' => 'hamburger', 'container_id' => 'hamburgerMenu' , 'container_class' => 'hamburgerMenucontainer', 'fallback_cb' => 'noMenuFallback' ) ); 
			}
		echo '</nav>';


		/* Widget Area */
		dynamic_sidebar('sidebar-before-content');
	?>
	</aside>