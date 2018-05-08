<?php
/*** Functions.php INCLUDE - WooCommerce Customisation ***/

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

