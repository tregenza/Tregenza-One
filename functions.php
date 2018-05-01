<?php
/*  
	Tregenza-One Functions.php

	Some code originally from BlankSlate 

*/

/********* START - Original BlankSlate Functions *********/

add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}

function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
/* $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) ); */
$comments_basic = get_comments( 'status=approve&post_id=' . $id ) ;
$comments_by_type = separate_comments( $comments_basic );

return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

/********* END - Original BlankSlate Functions *********/



/*

	Tregenza-One 

*/ 

/********* START - Wordpress Config *********/


/**** WARNING - Uncommeting this line will reset all theme customisation *****/
/* remove_theme_mods(); */


	/* ---------- Hide the wpadminbar ----------- */
	add_filter('show_admin_bar', '__return_false');


	/* ---------- Add Theme Support ----------- */
	
	function theme_support() {
		/*  Add support for woocommerce */
	    add_theme_support( 'woocommerce' );
	
		/* Wordpress Features */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 100,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( '',  ),
		) );
	
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'theme_support' );


	/* ---------- Load standard Javascript ----------- */
	function load_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-accordion');
		wp_enqueue_script( 'tregenzaOneJS', get_template_directory_uri() . '/tregenzaOne.js');	

	}
	add_action( 'wp_enqueue_scripts', 'load_scripts' );
	
	/* ---------- Load CSS Files ----------- */
	function tregenza_one_queue_css() {
		/* Jquery */
		wp_register_style('wpb-jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/humanity/jquery-ui.css', false, null);
		wp_enqueue_style('wpb-jquery-ui-style');

		/* Tregenza One */
	    wp_enqueue_style( 'tregenza-one-style-css',  get_template_directory_uri() .'/style.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-customise',  get_template_directory_uri() .'/style-customise-defaults.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-wordpress',  get_template_directory_uri() .'/style-wordpress-default.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-structure',  get_template_directory_uri() .'/style-structure.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-page-header-footer',  get_template_directory_uri() .'/style-page-header-footer.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-navigation',  get_template_directory_uri() .'/style-navigation.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-basic-elements',  get_template_directory_uri() .'/style-basic-elements.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-content-elements',  get_template_directory_uri() .'/style-content-elements.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-woocommmerce-elements',  get_template_directory_uri() .'/style-woocommerce.css', array(), null, 'all' );
	    wp_enqueue_style( 'tregenza-one-style-css-jquery',  get_template_directory_uri() .'/style-jqueryui.css', array(), null, 'all' );
	
		if ( is_child_theme() ) {
			/* load child style.css to overwrite parent styling */
	    	wp_enqueue_style( 'tregenza-one-child-style-css',  get_stylesheet_directory_uri() .'/style.css', array(), null, 'all' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'tregenza_one_queue_css' );


	/* User Logged In Shortcode for optional content */	
	function loggedInOnly ($params, $content = null){
		//check tha the user is logged in
		if ( is_user_logged_in() ){
		    //user is logged in so show the content
		    return do_shortcode($content);
		} else{
			//user is not logged in so hide the content
	    	return;
		}
	}
	add_shortcode('loggedinonly', 'loggedInOnly' );

	/* User NOT Logged In Shortcode for optional content */	
	function loggedOutOnly ($params, $content = null){
		//check tha the user is logged in
		if ( ! is_user_logged_in() ){
		    //user is NOT logged in so show the content
		    return do_shortcode($content);
		} else{
			//user is not logged in so hide the content
	    	return;
		}
	}
	add_shortcode('loggedoutonly', 'loggedOutOnly' );


/*********  END - Wordpress Config *********/

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
		    'default'   => '#f0f0f0',
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
		$customBackgroundColour= get_theme_mod('backgroundcolour', '#f0f0f0');
	
		$brand = get_theme_mod('brandcolour', '#77aadd');

		$linkText = get_theme_mod('linktextcolour', '#0c0c0c');
		$linkUnderlineColour = get_theme_mod('linkunderlinecolour', '#403f4c');

	
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

	/* Link Colours */
		.linkTextColour {
			color: $linkText; 
		}
		.linkUnderlineColour {
			color: $linkUnderlineColour; 
		}
		.navHoverColour {
			background-color: $navHoverColour; 
		}

	/* Nav Colours */
		.navTextColour {
			color: $navTextColour; 
		}
		.navBackgroundColour {
			color: $navBackgroundColour; 
		}
		.navHoverColour {
			background-color: $navHoverColour; 
		}

	/* Action / Button Colours */
		.buttonTextColour {
			color: $buttonText; 
		}
		.buttonBackgroundColour {
			color: $buttonBackgroundColour; 
		}
		.buttonHoverColour {
			background-color: $buttonHoverColour; 
		}





	/* Hamburger Menu Colours */

		.hamburgerMenucontainer > ul.menu  a {
			color: $navTextColour; /* navTextColour */
			background-color: $navBackgroundColour; /* navBackgroundColour */
		}
		.hamburgerMenucontainer > ul.menu  a:hover {
			background-color: $navHoverColour; /* navHoverColour */
		}



	/* Basic text colours */
		a, a:link, a:visited  {
			color: $linkText; /* linkTextColour */
			border-bottom-color: $linkUnderlineColour;  /* linkUnderlineColour */
			font-weight: bold;
		}
		a:hover  {
			border-bottom-color: $linkUnderlineColour;  /* linkUnderlineColour */
			color:  $linkUnderlineColour;  /* linkUnderlineColour */
			font-weight: bold;
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


	/* Add colour class to menu items */
	function tregenzaOne_menu_classes($classes, $item, $args) {
		$classes[] = 'navOne-fg';
		$classes[] = 'navTwo-bg';

		/** Don't add the hover to the hamburger menu **/
		if ( ! isset($args) || !isset($args->theme_location) || $args->theme_location !== 'hamburger' ) {
			$classes[] = 'navThree-hover';
		} 
		return $classes;
	}
//	add_filter('nav_menu_css_class','tregenzaOne_menu_classes',1,3);


	/* Add custom colour classes to body */
	function addColourClassToBody( $classes ) {
		$classes[] = 'customColour';
		$classes[] = 'customBackgroundColour';
		return $classes;
	}
	add_filter( 'body_class', 'addColourClassToBody' );



	/* Add block classes to post */
	function addBlockClassToPost( $classes ) {
		$classes[] = 'blockVariable';
		return $classes;
	}
//	add_filter( 'post_class', 'addBlockClassToPost' );


/********* END - Wordpress Customisation *********/





/********* START - Wordpress MENUS, WIDGETS & SIDEBARS *********/

	/* Register Menu Areas */
	function menu_reg() {
		register_nav_menus(
			array( 
/*				'default_toolbar' => 'Page Menu', */
				'hamburger' => 'Navigation [Logged Out]',
				'hamburgerLoggedIn' => 'Navigation [Logged In]'
			)
		);
	}
	add_action( 'after_setup_theme', 'menu_reg');
	
	/* Register Widget Areas */
	function tools_widgets_init() {
/*	
	    register_sidebar( array(
	        'name' => __( 'Page Header', 'toolbar-additional-sidebar' ),
	        'id' => 'toolbar-additional',
	        'before_widget' => '<div class="tregenzaOneAside toolbarAddtionalSidebar tregenzaOneWidget">',
	        'after_widget' => '</div>',
	        'before_title' => '<h1>',
	        'after_title' => '</h1>',
	    ) );
*/	
	    register_sidebar( array(
	        'name' => __( 'Secundus (Left Sidebar)', 'secundus_sidebar' ),
	        'id' => 'sidebar-before-content',
	        'before_widget' => '<div class="tregenzaOneAside secundusSidebar tregenzaOneWidget">',
	        'after_widget' => '</div>',
	        'before_title' => '<h1>',
	        'after_title' => '</h1>',
	    ) );
	
	    register_sidebar( array(
	        'name' => __( 'Tertius (right Sidebar)', 'tertius_sidebar' ),
	        'id' => 'sidebar-after-content',
	        'before_widget' => '<div class="tregenzaOneAside tertiusSidebar tregenzaOneWidget">',
	        'after_widget' => '</div>',
	        'before_title' => '<h1>',
	        'after_title' => '</h1>',
	    ) );
	
	    register_sidebar( array(
	        'name' => __( 'Footer', 'footer_sidebar' ),
	        'id' => 'footer-widget-bar',
	        'before_widget' => '<div class="tregenzaOneAside footerSidebar tregenzaOneWidget">',
	        'after_widget' => '</div>',
	        'before_title' => '<p>',
	        'after_title' => '<p>',
	    ) );
	}
	add_action( 'widgets_init', 'tools_widgets_init' );


	 
	/* Add widget name as class */
	function sidebar_widgets_class($params) {	 
		$class = 'class="'.sanitize_title($params[0]['widget_name']).' ';
		$params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']);	
		return $params;
	}
	add_filter('dynamic_sidebar_params','sidebar_widgets_class');



	/* Collapisble Page Header */
/*	function outputCollapsibleHeader() {
		echo '<!--- Theme functions tregenzaOnePageHeader action --->';
		echo '<div id="pageHeader" class="collapsibleWrapper">';
		do_action('tregenzaOneCollapsibleHeaderContent');
		echo '</div>';

	}
	add_action('tregenzaOnePageHeader', 'outputCollapsibleHeader', 10 );
*/ 

	/* Page level navigation block */
/*	function pageLevelNav() {

		echo '<!--- Theme functions tregenzaOnePageNav --->';
		echo '<nav class="blockCollapse pageLevelNav ">';
		echo '<p class="blockCollapseHeader">Navigation</p>';
		echo '<div class="blockCollapseContent">';
		wp_nav_menu( array( 'theme_location' => 'default_toolbar', 'container_id' => 'pageLevelNav') ); 
		echo '</div>';
		echo '</nav>';
	}
*/	add_action('tregenzaOneCollapsibleHeaderContent', 'pageLevelNav', 10 );

	
	/* Add Standard menu to page navigation block */
/*	function toolbarAdditional() {

		if (is_active_sidebar('toolbar-additional') ) {
			echo '<div class="blockCollapse">';
			echo '<p class="blockCollapseHeader">Additional</p>';
			echo '<div class="blockCollapseContent">';
			// Widget Area 
			dynamic_sidebar('toolbar-additional');
			echo '</div>';
			echo '</div>';
		}
	}
	add_action( 'tregenzaOneCollapsibleHeaderContent', 'toolbarAdditional', 50, 0 );
*/


/*
function filtertest($items, $args) {
	var_dump($items);
	var_dump($args);
die;
}
add_filter('wp_nav_menu_items', 'filtertest', 10, 2);
*/

/********* END - Wordpress MENUS, WIDGETS & SIDEBARS *********/


/********* START - Woocommerce Config *********/


	/** Remove Woocommerce breadcrumbs   */
	function tregenza_one_move_wc_breadcrumbs() {
	    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		if (! is_front_page() ) {
			/* Breadcrumbs empty on front page */
		    add_action( 'tregenzaOnePageNavContent', 'woocommerce_breadcrumb', 20, 0 );
		}
	}
//	add_action( 'wp_head', 'tregenza_one_move_wc_breadcrumbs' );


	/* Remove unwanted woocommerce style sheets */
	function tregenza_dequeue_styles( $enqueue_styles ) {

		unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
		unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout

		unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation



		return $enqueue_styles;
	}
	add_filter( 'woocommerce_enqueue_styles', 'tregenza_dequeue_styles' );

	/* Change variable price display. Instead of "$10 - $20" to "From: $10" */
	function tregenza_variable_price_format( $price, $product ) {
	 
	    $prefix = "From: ";
	 
	    $min_price_regular = $product->get_variation_regular_price( 'min', true );
	    $min_price_sale    = $product->get_variation_sale_price( 'min', true );
	    $max_price = $product->get_variation_price( 'max', true );
	    $min_price = $product->get_variation_price( 'min', true );
	 
	    $price = ( $min_price_sale == $min_price_regular ) ?
	        wc_price( $min_price_regular ) :
	        '<del>' . wc_price( $min_price_regular ) . '</del>' . '<ins>' . wc_price( $min_price_sale ) . '</ins>';
	 
	    return ( $min_price == $max_price ) ?
	        $price :
	        sprintf('%s%s', $prefix, $price);
	 
	}
	 
	add_filter( 'woocommerce_variable_sale_price_html', 'tregenza_variable_price_format', 10, 2 );
	add_filter( 'woocommerce_variable_price_html', 'tregenza_variable_price_format', 10, 2 );	


	function change_breadcrumb_delimiter( $defaults ) {
		// Change the breadcrumb delimeter from '/' to '>'
		$defaults['delimiter'] = ' &gt; ';
		return $defaults;
	}
	add_filter( 'woocommerce_breadcrumb_defaults', 'change_breadcrumb_delimiter' );


	/* Previous / Next Posts Link filter */
	function posts_link_attributes() {
	    return 'class="button"';
	}
	add_filter('next_posts_link_attributes', 'posts_link_attributes');
	add_filter('previous_posts_link_attributes', 'posts_link_attributes');

/********* END - Woocommerce Config *********/


/********* START - Woocommerce Product Pages *********/

	/* Remove Tabs  */
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

	/* Restructure single product pages */
	function tregenza_one_mod_single_product() {
	
		/* Remove all standard hooks */

		/* Before summary */
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

		/* product summary - Note there is a woocommerce action at priority 60 which sets up product data */
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );


		/* Add hooks */
		/* Summary - Everything in here so we can handle flex layout in a single div wrapper */
		add_action( 'woocommerce_before_single_product', 'tregenza_one_single_product_article_wrapper', 10 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_sales_flash'); }, 12 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 14 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 16 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_title'); }, 18 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 20 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 22 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_images'); }, 24 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_images', 26 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 28 );


		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_short_info'); }, 30 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_price', 1); }, 40 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 42 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 44 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_tags',1); }, 46 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_tags', 48 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 50 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_excerpt', 1); }, 52 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 54 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 56 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_sku', 1); }, 58 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_sku', 60 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 62 );

		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 64 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_description'); }, 70 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_description', 72 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 74 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_additional'); }, 76 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_additional', 78, 1 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 80 );
	
		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_misc'); }, 90 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_sharing' ,1); }, 92 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 94 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 96 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_category_list', 1); }, 98 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_category_list', 100 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 102 );

		add_action( 'woocommerce_single_product_summary', function() { tregenza_one_product_block_start('tregenza_one_product_meta', 1); }, 104 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 106 );
		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 108 );

		add_action( 'woocommerce_single_product_summary', 'tregenza_one_product_block_end', 110 );

		add_action( 'woocommerce_before_add_to_cart_form', 'tregenza_one_add_to_cart_wrapper_start', 5);
		add_action( 'woocommerce_after_add_to_cart_form', 'tregenza_one_add_to_cart_wrapper_end', 54 );

		add_action( 'woocommerce_after_single_product', 'tregenza_one_single_product_article_wrapper_end', 20 );

	}
	add_action( 'init', 'tregenza_one_mod_single_product', 10 );

	function tregenza_one_product_block_start($class = '', $subBlock = null ) {
		if ( isset($subBlock) && $subBlock ) {
			echo '<div class="tregenza_one_wc_product_subblock '.$class.'">';
		} else {
			echo '<div class="tregenza_one_wc_product_block '.$class.'">';
		}
	}
	function tregenza_one_product_block_end() {
		echo '</div>';
	}

	function tregenza_one_product_description() {
		woocommerce_get_template( 'single-product/tabs/description.php' );
	}

	/** Additional Information / Product Attributes - Only if there are some **/
	function tregenza_one_product_additional($product) {
		global $product; 
		$attributes = array_filter( $product->get_attributes(), 'wc_attributes_array_filter_visible' );
		$display_dimensions = apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() );
		if ( ($display_dimensions && $product->has_weight()) || ($display_dimensions && $product->has_dimensions()) || ( isset($attributes) && sizeof($attributes) >0 )  ) {
			wc_get_template( 'single-product/product-attributes.php', array(
				'product'            => $product,
				'attributes'         => $attributes,
				'display_dimensions' => $display_dimensions,
			) );
		}

	}

	/* Default template doesn't use article so add one */
	function tregenza_one_single_product_article_wrapper() {
		?>
			<article id="product-<?php the_ID(); ?>" <?php post_class(); ?> >
		<?php
	}
	function tregenza_one_single_product_article_wrapper_end() {
		echo '</article>';
	}


	function tregenza_one_product_sku() {
		global $product; 
		if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) {
			?>
				<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>
			<?php
		}
	}

	function tregenza_one_product_category_list() {
		global $product; 
		echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in"> ', '</span>' ); 
	}



	function tregenza_one_add_to_cart_wrapper_start() {
		// Wrapper only on non-composite products due to composite items not calling before_add_to_cart action
		if ( !function_exists(is_composite_product) || ! is_composite_product() ) {
			tregenza_one_product_block_start('tregenza_one_product_add_to_cart' );
		}
	}

	function tregenza_one_add_to_cart_wrapper_end() {
		// Wrapper only on non-composite products due to composite items not calling before_add_to_cart action
		if ( !function_exists(is_composite_product) || ! is_composite_product() ) {
			tregenza_one_product_block_end();
		}
	}


	/* Output a product's tags */
	function tregenza_one_product_tags() {
		$tags = get_the_terms( get_the_ID(), 'product_tag' );
		echo '<ul class="tregenzaOneTagList">';
		if ( isset($tags) && $tags ) {
			foreach ($tags as $tag) {
				echo '<li>'.$tag->name.'</li>';
			}
		}
		echo '</ul>';	

	}

/********* END - Woocommerce Product Pages *********/


/********* START - Woocommerce Product Lists *********/

	/* Restructure product list See woocommerce template contents-product.php  */
	function tregenza_one_mod_product_list() {
		/* Remove all the old hooks */
		remove_action(  'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	

		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

		/* Add hooks */
	
		/* Summary - Everything in here so we can handle flex layout in a single div wrapper */
		add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 1 );


		add_action( 'woocommerce_before_shop_loop_item_title', function() { tregenza_one_product_block_start('tregenza_one_product_sales_flash'); }, 10 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_sale_flash', 12 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'tregenza_one_product_block_end', 14 );

		add_action( 'woocommerce_before_shop_loop_item_title', function() { tregenza_one_product_block_start('tregenza_one_product_images'); }, 20 );

		add_action( 'woocommerce_before_shop_loop_item_title', function() { tregenza_one_product_block_start('tregenza_one_product_thumbnail', 1); }, 22 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 24 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'tregenza_one_product_block_end', 26 );

		add_action( 'woocommerce_before_shop_loop_item_title', 'tregenza_one_product_block_end', 28 );

		add_action( 'woocommerce_shop_loop_item_title', function() { tregenza_one_product_block_start('tregenza_one_product_title'); }, 10 );
		add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 12 );
		add_action( 'woocommerce_shop_loop_item_title', 'tregenza_one_product_block_end', 14 );

		add_action( 'woocommerce_after_shop_loop_item', function() { tregenza_one_product_block_start('tregenza_one_product_short_info'); }, 10 );
	
		add_action( 'woocommerce_after_shop_loop_item', function() { tregenza_one_product_block_start('tregenza_one_product_price',1); }, 12 );
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 14 );
		add_action( 'woocommerce_after_shop_loop_item', 'tregenza_one_product_block_end', 16 );


		add_action( 'woocommerce_after_shop_loop_item', function() { tregenza_one_product_block_start('tregenza_one_product_sku', 1); }, 20 );
		add_action( 'woocommerce_after_shop_loop_item', 'tregenza_one_product_sku', 22 );
		add_action( 'woocommerce_after_shop_loop_item', 'tregenza_one_product_block_end', 24 );

		add_action( 'woocommerce_after_shop_loop_item', 'tregenza_one_product_block_end', 30 );

		add_action( 'woocommerce_after_shop_loop_item_title', function() { tregenza_one_product_block_start('tregenza_one_product_tags'); }, 10 );
		add_action( 'woocommerce_after_shop_loop_item_title', 'tregenza_one_product_tags', 12 );
		add_action( 'woocommerce_after_shop_loop_item_title', 'tregenza_one_product_block_end', 14 );



/*		add_action( 'woocommerce_after_shop_loop_item', function() { tregenza_one_product_block_start('tregenza_one_product_add_to_cart'); }, 40 );
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 50 );
		add_action( 'woocommerce_after_shop_loop_item', 'tregenza_one_product_block_end', 60 );
*/



		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 99 );



	}
	add_action( 'init', 'tregenza_one_mod_product_list', 10 );


/********* END - Woocommerce Product Lists *********/



/********* START - Woocommerce Category Lists *********/

	function tregenza_one_mod_category_list() {
		/** Category list, e.g. on shop pages use a combination of both product display hooks and its own. */
		add_action( 'woocommerce_after_subcategory', 'tregenza_one_subcat_list', 100 );

		remove_action('woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10);
		add_action( 'woocommerce_before_subcategory_title', 'tregenza_one_category_image', 10 );

	}


	function tregenza_one_subcat_list($category) {
		$args = array(
			'hierarchical' => 1,
			'show_option_none' => '',
			'hide_empty' => 0,
			'parent' => $category->term_id,
			'taxonomy' => 'product_cat'
		);
		$subcats = get_categories($args);
		echo '<ul class="wc_subcats">';
		foreach ($subcats as $sc) {
			$link = get_term_link( $sc->slug, $sc->taxonomy );
  			echo '<li><a href="'. $link .'">'.$sc->name;
			echo '<mark class="count">(' . $sc->count . ')</mark>'; 
			echo '</a></li>';
		}
		echo '</ul>';
	}
	add_action( 'init', 'tregenza_one_mod_category_list', 10 );

	/* Get a full image for a category not a thumbnail */
	function tregenza_one_category_image($category) {
		$thumbnail_id  			= get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );

		if ( $thumbnail_id ) {
			$image        = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size );
			$image        = $image[0];
		} else {
			$image        = wc_placeholder_img_src();
		}

		echo '<img src="' . $image . '" alt="' . $category->name . '" />';

	}

/********* END - Woocommerce Category Lists *********/


/********* START - Woocommerce Archive Pages (includes Shop Page) *********/
	function tregenza_one_mod_wc_archive()  {
		remove_action(  'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

/*		add_action( 'woocommerce_before_main_content', 'outputCollapsibleHeader', 20 ); */
	}
//	add_action( 'init', 'tregenza_one_mod_wc_archive', 10 );


/*** Woocommerce Shortcodes ***/

	function wcURL_shop() {
		return '<a href="$shop_page_url"></a>';
	}
	add_shortcode('wcurl_shop', 'wcURL_shop' );




/* --------- Placeholder Hooks ----------- */

/* Update Dingles Games tables with order information */
function tregenza_one_woocommerce_payment_complete( $order_id ) {
	error_log( "----------------- ORDER ----------------- ");
    error_log( "Payment has been received for order $order_id" );
//	error_log( "----------------- ORDER DETAILS ----------------- ");

	/* Get the order details */
//	$order = new WC_Order( $order_id );
//    $items = $order->get_items();

//	error_log( var_export($order, true));
	
	foreach ( $items as $item ) {
	 
//		error_log( "----------------- ITEM ----------------- ");
//		error_log( var_export($item, true));
//	    $product = wc_get_product( $item['product_id'] );
	 
	}

	$result = true; 

	return $result;

}
add_action( 'woocommerce_payment_complete', 'tregenza_one_woocommerce_payment_complete', 10, 1 );
