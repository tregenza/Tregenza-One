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
		$classes[] = 'tregenza_one_block';
		return $classes;
	}
	add_filter( 'post_class', 'addBlockClassToPost' );

	/* add classes to thumbnail */
	function addThumbnailClass( $html, $post_id, $post_thumbnail_id, $size, $attr) {
		/* Wide, tall or square image */
		$addClass = 'wideThumbnail';
		$image_data = wp_get_attachment_image_src( $post_thumbnail_id, "full");
		if ($image_data[2] > $image_data[1] ){
			$addClass = 'tallThumbnail';
		} else if ($image_data[2] == $image_data[1] ){
			$addClass = 'squareThumbnail';
		}
		$html = str_replace('class="', 'class="'.$addClass.' ', $html);	
		return $html;
	}
	add_filter('post_thumbnail_html', 'addThumbnailClass', 10, 5);


/********* END - Wordpress Customisation *********/





/********* START - Wordpress MENUS, WIDGETS & SIDEBARS *********/
	/* Register Menu Areas */
	function menu_reg() {
		register_nav_menus(
			array( 
/*				'default_toolbar' => 'Page Menu', */
				'hamburger' => 'Navigation [Logged Out]',
				'hamburgerLoggedIn' => 'Navigation [Logged In]',
				'menubar' => 'Menu Bar',
				'footerMenu' => 'Footer Menu'
			)
		);
	}
	add_action( 'after_setup_theme', 'menu_reg',100); 
	
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


		/* Add classes to nav menu links */
		function addMenuAnchorClass($atts, $item, $args){
			$atts['class'] = "navTextColour navBackgroundColour navHoverColour";
			return $atts;
		}
		add_filter('nav_menu_link_attributes', 'addMenuAnchorClass', 10, 3);

		/*Add Class to post category links */
		function add_class_to_category($thelist, $separatpor, $parents) {
			$newClass = "postCatLink toMinorButton";
			return str_replace('<a href="', '<a class="'.$newClass.'" href="', $thelist);
		}
		add_filter('the_category', 'add_class_to_category', 10, 3);

		/*Add Class to post tag links */
		function add_class_to_tag($links) {
			$newClass = "postTagLink  toMinorButton";
			return str_replace('<a href="', '<a class="'.$newClass.'" href="', $links);
		}
		add_filter('term_links-post_tag', 'add_class_to_tag', 10);

		/*Add Class to post author links */
		function add_class_to_author($links) {
			$newClass = "postAuthorLink toMinorButton";
			return str_replace('<a href="', '<a class="'.$newClass.'" href="', $links);
		}
		add_filter('the_author_posts_link', 'add_class_to_author', 10);


/********* END - Wordpress MENUS, WIDGETS & SIDEBARS *********/





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