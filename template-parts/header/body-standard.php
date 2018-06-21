 <!-- Body-Standard -->
<?php
/* Standard header area (top of html body tag ) for theme pages / posts */
?>
 <!-- Body-Standard - Header -->
<header id="header"  >
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
		 <!-- Icon Bar -->
		<?php	
			$home = get_home_url();
			$wooURL = false;
			global $woocommerce;
			if ( $woocommerce ) {
				/* Woocommerce installed */
				$wooAccount = get_option("woocommerce_myaccount_page_id");
				if ( $wooAccount ) {
					$user = get_permalink( $wooAccount );	
				}
				$wooURL = $woocommerce->cart->get_cart_url();
			} else {
				if ( is_user_logged_in() ) {
					/* Wordpress default user page */
					$user = get_edit_user_link();
				} else {
					$user = wp_login_url();
				}
			}
		?>
		<div id="iconBarWrapper" >
				<div id="iconBar">
					<div id="iconBarOptionA" class="iconBarIcon">
						<a href="<?php echo $home; ?>" class="iconBarHome" title="Home"></a>
					</div>							
					<div id="iconBarOptionB" class="iconBarIcon">
						<a href="<?php echo $user; ?>" class="iconBarUser" title="User"></a>
					</div>							
					<?php if ($wooURL) { ?>
						<div id="iconBarOptionC" class="iconBarIcon">
							<a href="<?php echo $wooURL; ?>" class="iconBarCart" title="Checkout"></a>
						</div>							
					<?php } ?>	
				</div>	
		</div>
		<div id="site-logo" class="brand-bg">
		<?php
			if ( function_exists( 'the_custom_logo' ) ) {
				if (!has_custom_logo()) {
					/* No Logo loaded */
				?>	
					<img class="logo" alt="Logo" src="<?php echo get_template_directory_uri().'/images/BlankLogo.png'; ?>"/>
				<?php
				} else {
					the_custom_logo();
				}
			} 
		?>
		</div>
	</section>

 <!-- Body-Standard - Header END -->
</header>

 <!-- Hamburger Menu -->
<?php

	echo '<nav class="hamburgerMenuWrapper " >';
		echo '<div class="hamburgerMenuBackdrop"></div>';

		if ( is_user_logged_in() ) {
			wp_nav_menu( array( 'theme_location' => 'hamburgerLoggedIn', 'container_id' => 'sidebarMenu' , 'container_class' => 'hamburgerMenucontainer' ) ); 
		} else {
			wp_nav_menu( array( 'theme_location' => 'hamburger', 'container_id' => 'sidebarMenu' , 'container_class' => 'hamburgerMenucontainer' ) ); 
		}
	echo '</nav>';
?>

 <!-- Menu Bar -->
<?php 
	if (has_nav_menu('menubar')) {
		echo '<nav class="menuBarWrapper">';
		wp_nav_menu(array( 'theme_location' => 'menubar', 'container_id' => 'menuBar' , 'container_class' => 'menuBarContainer' ) );
		echo '</nav>';
	}	
?>