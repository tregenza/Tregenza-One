<!--- Sidebar Secundus-->
	<aside class="secundus">
	<?php

		echo '<div class="tregenzaOneAside secundusSidebar hamburgerMenuWrapperSidebar" >';
			if ( is_user_logged_in() ) {
				wp_nav_menu( array( 'theme_location' => 'hamburgerLoggedIn', 'container_id' => 'hamburgerMenu' , 'container_class' => 'hamburgerMenucontainer' ) ); 
			} else {
				wp_nav_menu( array( 'theme_location' => 'hamburger', 'container_id' => 'hamburgerMenu' , 'container_class' => 'hamburgerMenucontainer' ) ); 
			}
		echo '</div>';


		/* Widget Area */
		dynamic_sidebar('sidebar-before-content');
	?>
	</aside>