<!--- Body-Standard --->
<?php
/* Standard header area (top of html body tag ) for theme pages / posts */
?>
<!--- Body-Standard - Header --->
<header id="header" role="banner" >
	<section id="branding" class="customColour brand-bg">
		<div id="hamburger" onclick="toggleFullMenu();">
			  <div class="hamburger-bar"></div>
			  <div class="hamburger-bar"></div>
			  <div class="hamburger-bar"></div>
		</div>
		<div id="site-title">
			<?php 
				if ( is_front_page() || is_home() || is_front_page() && is_home() ) { 
				//	echo '<h1>'; 
				} 
			?>
			<span class="site-title-text">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
			</span>
			<?php 
				if ( is_front_page() || is_home() || is_front_page() && is_home() ) { 
				//	echo '</h1>'; 
				} 
			?>
		</div>
		<!--- Icon Bar --->
		<div id="iconBarWrapper" >
				<div id="iconBar">
					<div id="iconBarOptionA" class="iconBarIcon">
						<a href="/" class="iconBarHome" title="Home"></a>
					</div>							
					<div id="iconBarOptionB" class="iconBarIcon">
						<a href="/" class="iconBarUser" title="User"></a>
					</div>							
					<div id="iconBarOptionC" class="iconBarIcon">
						<a href="/" class="iconBarCart" title="Checkout"></a>
					</div>							

				</div>	
		</div>
		<div id="site-logo" class="brand-bg">
		<?php
			if ( function_exists( 'the_custom_logo' ) ) {
				if (!has_custom_logo()) {
					/* No Logo loaded */
				?>	
					<img class="logo" src="<?php echo get_template_directory_uri().'/images/BlankLogo.png'; ?>"/>
				<?php
				} else {
					the_custom_logo();
				}
			} 
		?>
		</div>
	</section>

<!--- Body-Standard - Header END--->
</header>

<!--- Hamburger Menu --->
<?php

	echo '<nav class="hamburgerMenuWrapper " >';
		echo '<div class="hamburgerMenuBackdrop"></div>';

		if ( is_user_logged_in() ) {
			wp_nav_menu( array( 'theme_location' => 'hamburgerLoggedIn', 'container_id' => 'hamburgerMenu' , 'container_class' => 'hamburgerMenucontainer' ) ); 
		} else {
			wp_nav_menu( array( 'theme_location' => 'hamburger', 'container_id' => 'hamburgerMenu' , 'container_class' => 'hamburgerMenucontainer' ) ); 
		}
	echo '</nav>';
?>

<!--- Menu Bar --->
<?php 
	if (has_nav_menu('menubar')) {
		echo '<nav class="menuBarWrapper">';
		wp_nav_menu(array( 'theme_location' => 'menubar', 'container_id' => 'menuBar' , 'container_class' => 'menuBarContainer' ) );
		echo '</nav>';
	}	
?>

