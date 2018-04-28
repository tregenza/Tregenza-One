/* Theme specific JavaScript */




	/* Hamburger Menu */
	function toggleFullMenu() {
		if ( ! jQuery('.hamburgerMenuWrapper').is(":visible") ) {
		    jQuery('html,body').animate({
		        scrollTop: jQuery("body").offset().top},
		        'slow');
		}

		jQuery('.hamburgerMenuWrapper').toggle("slow");

	}


	/** Doucment READY - Automaticly run */ 
	jQuery( document ).ready(function() {

		cleanTables();

		/** Monitor WooCommerce Ajax functions for table cleaning **/
		jQuery( document ).ajaxComplete(function( event, xhr, settings ) {
		
/*			console.log( settings.url ); */
			  
			// settings.url tells us what event this is, so we can choose what code we need to run
			if( settings.url.indexOf('update_order_review') > -1 ) {
				/* Order review has been updated so run clean tables */	
				cleanTables();
			} 
		
		});


	} );

	
	/* Strip thead & tbody tags from article content as they make responive tables almost impossible */
	function cleanTables() {

		var tHeadRows = jQuery('article table thead tr');
		var tBodyRows = jQuery('article table tbody tr');
		var tFootRows = jQuery('article table tfoot tr');

		var colNames = new Array();
		var maxCols = tHeadRows.children('th, td').length;

		/** add classes for columns */
		jQuery.each( tHeadRows, function (rowCount, row) {
			jQuery.each(jQuery(row).children('th, td') , function( colCount, column ) {
				colNames.push(jQuery(column).text());
				jQuery(column).attr( 'data-colnumber', colCount);
				jQuery(column).attr('data-colname', colNames[colCount]);
			} );
		} ) ;

		jQuery.each( tBodyRows , function (rowCount, row) {
			jQuery.each(jQuery(row).children('th, td') , function( colCount = 0, column ) {
				jQuery(column).attr( 'data-colnumber', colCount);
				if ( colCount <= maxCols ) {
					jQuery(column).attr('data-colname', colNames[colCount]);
				}
			} );
		} ) ;

		jQuery.each( tFootRows , function (rowCount, row) {
			jQuery.each(jQuery(row).children('th, td') , function( colCount = 0, column ) {
				jQuery(column).attr( 'data-colnumber', colCount);
				if ( colCount <= maxCols ) {
					jQuery(column).attr('data-colname', colNames[colCount]);
				}
			} );
		} ) ;

		tHeadRows.addClass('theadChild');
		tHeadRows.unwrap();
		tBodyRows.addClass('tbodyChild');
		tBodyRows.unwrap();
		tFootRows.addClass('tfootChild');
		tFootRows.unwrap();

/*
throw new Error("my error message");
*/

	}

	
