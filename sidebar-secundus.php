<!--- Sidebar Secundus-->
	<aside class="secundus">
	<?php

		function noMenuFallback() {
			echo "<h4>No Menu Defined</h4><p>Please set the Navigation Logged In and Navigation Logged Out menu locations";			
		}

		echo '<div class="tregenzaOneAside secundusSidebar hamburgerMenuWrapperSidebar" >';
			if ( is_user_logged_in() ) {
				wp_nav_menu( array( 'theme_location' => 'hamburgerLoggedIn', 'container_id' => 'hamburgerMenu' , 'container_class' => 'hamburgerMenucontainer', 'fallback_cb' => 'noMenuFallback' ) ); 
			} else {
				wp_nav_menu( array( 'theme_location' => 'hamburger', 'container_id' => 'hamburgerMenu' , 'container_class' => 'hamburgerMenucontainer', 'fallback_cb' => 'noMenuFallback' ) ); 
			}
		echo '</div>';


		/* Widget Area */
		dynamic_sidebar('sidebar-before-content');
	?>
	</aside>