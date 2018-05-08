<?php
/*** Functions.php INCLUDE - Load Theme / CSS Customisation  ***/

/********* START - Wordpress Customisation *********/

	/* ---------- Add Theme Customisaton ----------- */
	
	function tregenza_one_customize_register( $wp_customize ) {
	   //All our sections, settings, and controls will be added here
	
	
		/* Creating sections may not be necessary by there might be a WP issues with US / UK spellings */
		$wp_customize->add_section( 'tregenza-one-colours' , array(
		    'title'      => __('Colours','tregenzaOne'),
		    'priority'   => 41,
		) );
	
		$wp_customize->add_setting( 'textcolour' , array(
		    'default'   => '#111111',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );
	
		$wp_customize->add_setting( 'backgroundcolour' , array(
		    'default'   => '#ffffff',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );
		$wp_customize->add_setting( 'additional' , array(
		    'default'   => '#777777',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );
	
		$wp_customize->add_setting( 'brandcolour' , array(
		    'default'   => '#77aadd',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );

		$wp_customize->add_setting( 'linktextcolour' , array(
		    'default'   => '#0c0c0c',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );
	
		$wp_customize->add_setting( 'linkunderlinecolour' , array(
		    'default'   => '#90c2e7',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );
	
	
		$wp_customize->add_setting( 'navtextcolour' , array(
		    'default'   => '#ffffff',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );
	
		$wp_customize->add_setting( 'navbackgroundcolour' , array(
		    'default'   => '#403f4c',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );
		$wp_customize->add_setting( 'navhovercolour' , array(
		    'default'   => '#90c2e7',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );
	

		$wp_customize->add_setting( 'buttontextcolour' , array(
		    'default'   => '#90c2e7',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );
	
		$wp_customize->add_setting( 'buttonbackgroundcolour' , array(
		    'default'   => '#172a3a',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );
		$wp_customize->add_setting( 'buttonhovercolour' , array(
		    'default'   => '#00a9a5',
		    'transport' => 'refresh',
		    'type' => 'theme_mod'
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'textcolour', 
			array(
				'label'      => __( 'Text Colour', 'tregenza-one' ),
				'section'    => 'tregenza-one-colours',
				'settings'   => 'textcolour'
			) 
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'backgroundcolour', 
			array(
				'label'      => __( 'Background Colour', 'tregenza-one' ),
				'section'    => 'tregenza-one-colours',
				'settings'   => 'backgroundcolour'
			) 
		) );


		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'brand_one_textcolour', 
			array(
				'label'      => __( 'Brand Colour', 'tregenza-one' ),
				'section'    => 'tregenza-one-colours',
				'settings'   => 'brandcolour'
			) 
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'link_one_colour', 
			array(
				'label'      => __( 'Link Text Colour', 'tregenza-one' ),
				'section'    => 'tregenza-one-colours',
				'settings'   => 'linktextcolour'
			) 
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'link_two_colour', 
			array(
				'label'      => __( 'Link Underline Colour', 'tregenza-one' ),
				'section'    => 'tregenza-one-colours',
				'settings'   => 'linkunderlinecolour'
			) 
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'nav_one_colour', 
			array(
				'label'      => __( 'Navigation Text Colour', 'tregenza-one' ),
				'section'    => 'tregenza-one-colours',
				'settings'   => 'navtextcolour'
			) 
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'nav_two_colour', 
			array(
				'label'      => __( 'Navigation Background Colour', 'tregenza-one' ),
				'section'    => 'tregenza-one-colours',
				'settings'   => 'navbackgroundcolour'
			) 
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'nav_three_colour', 
			array(
				'label'      => __( 'Navigation Hover Colour', 'tregenza-one' ),
				'section'    => 'tregenza-one-colours',
				'settings'   => 'navhovercolour'
			) 
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'button_one_colour', 
			array(
				'label'      => __( 'Button Text Colour', 'tregenza-one' ),
				'section'    => 'tregenza-one-colours',
				'settings'   => 'buttontextcolour'
			) 
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'button_two_colour', 
			array(
				'label'      => __( 'Button Background Colour', 'tregenza-one' ),
				'section'    => 'tregenza-one-colours',
				'settings'   => 'buttonbackgroundcolour'
			) 
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'button_three_colour', 
			array(
				'label'      => __( 'button Hover Colour', 'tregenza-one' ),
				'section'    => 'tregenza-one-colours',
				'settings'   => 'buttonhovercolour'
			) 
		) );	
	}
	add_action( 'customize_register', 'tregenza_one_customize_register' );
	

	/** ----- THEME CUSTOMISATION custom logo ---- **/
	add_theme_support( 'custom-logo' );
	
	
	/** ----- THEME CUSTOMISATION CSS ---- **/
	
	function tregenza_one_customize_css()
	{
		/* Set up CSS for colours */
	
		$customColour = get_theme_mod('textcolour', '#111111');
		$customBackgroundColour= get_theme_mod('backgroundcolour', '#ffffff');
	
		$brand = get_theme_mod('brandcolour', '#77aadd');

		$linkText = get_theme_mod('linktextcolour', '#0c0c0c');
		$linkUnderlineColour = get_theme_mod('linkunderlinecolour', '#90c2e7');

	
		$navTextColour = get_theme_mod('navtextcolour', '#ffffff');
		$navBackgroundColour = get_theme_mod('navbackgroundcolour', '#403f4c');
		$navHoverColour = get_theme_mod('navhovercolour', '#90c2e7');

		$buttonText = get_theme_mod('buttontextcolour', '#90c2e7');
		$buttonBackgroundColour = get_theme_mod('buttonbackgroundcolour', '#172a3a');
		$buttonHoverColour = get_theme_mod('buttonhovercolour', '#00a9a5');
	
		/** Build the CSS **/
		$crlf = PHP_EOL;
		$crlf = "\r\n";
		$baseClasses = <<<EOT
	

	/* Theme Colours */
		.customColour {					/* Main Text Colour */
			color: $customColour; 
		}
		.customBackgroundColour {					/* Main Background Colour */
			background-color: $customBackgroundColour; 
		}


	/* Brand Colours */
		.brand-fg {
			color: $brand; 
		}
		.brand-bg {
			background-color: $brand; 			/* Branding Bar Background Colour */
		}


	/* Nav Colours */
		nav a.navTextColour {
			color: $navTextColour; 
		}
		nav a.navBackgroundColour {
			background-color: $navBackgroundColour; 
		}
		nav a.navHoverColour:background {
			background-color: $navHoverColour; 
		}

	/* Action / Button Colours */
		.buttonTextColour {
			color: $buttonText; 
		}
		.buttonBackgroundColour {
			color: $buttonBackgroundColour; 
		}
		a.buttonHoverColour:hover {
			background-color: $buttonHoverColour; 
		}


	/* Menubar Colours */
	nav.menuBarWrapper {
		background: linear-gradient(to bottom, rgba(0, 0, 0, 0.25), rgba( 0,0,0, 0.25)), $brand;  /* Brand Colour */
	}



	/* Hamburger Menu Colours */

		.hamburgerMenucontainer > ul.menu  a {
/*			color: $navTextColour; /* navTextColour */
/*			background-color: $navBackgroundColour; /* navBackgroundColour */
		}
		.hamburgerMenucontainer > ul.menu  a:hover {
/*			background-color: $navHoverColour; /* navHoverColour */
		}



	/* Basic text colours */
		a, a:link, a:visited  {
			color: $linkText; /* linkTextColour */
			border-bottom-color: $linkUnderlineColour;  /* linkUnderlineColour */
		}
		a:hover  {
			background-color: $navHoverColour;  /* Nav Hover Colour */
			color:  $navTextColour;  /* Nav Text Colour */
		}
		
		table   {
		}
		
		table > thead > tr > th   {
			color: $customBackgroundColour;	/* customBackgroundColour */
			background-color: $customColour; /* customColour */
		}
	
		table :not(thead) tr {
			border-bottom-color: ; /* ??? */
	
		}

	/*** Forms ***/	
	
		button, input[type="button"], input[type="submit"], input[type="reset"], a.button   	{
			color: $buttonText; /* buttonTextColour */
			background-color: $buttonBackgroundColour; /* buttonBackgroundColour */
		}
		
		button:hover, input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover, a.button:hover {
			background-color: $buttonHoverColour; /* buttonHoverColour */
		}
		
	
			
	
		input, textarea, input[type="number"], select {
			color: $customBackgroundColour;				
			background-color: $customColour;
		}
		
		select:hover {
			border-bottom-color: $buttonHoverColour;		/* buttonHoverColour */
		}
	
	
		label {
			color: $customColour;					/* Custom Text */
		}
	




	/* Woocommerce */
	
		.woocommerce a.button, article .woocommerce a.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {
				color: $buttonText; /* navTextColour */
				background-color: $buttonBackgroundColour; /* buttonBackgroundColour */
		}


		.woocommerce a.button:hover ,article .woocommerce a.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover  {
				background-color: $buttonHoverColour; /* buttonHoverColour */
		}


	
EOT;
		
		$css = "<!--- Generated by Tregenza-one functions --->";
	    $css .= $crlf;
		$css .= "<style type='text/css'>";
	    $css .= $crlf;
		$css .= $baseClasses;
	    $css .= $crlf;
//		$css .= $bodyElements;
//	    $css .= $crlf;
		$css .= "</style>";
		$css .= "<!--- Generated by Tregenza-one functions END --->";
	
		echo $css;
	}
	add_action( 'wp_head', 'tregenza_one_customize_css');


?>