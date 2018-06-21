 <!-- Template Parts / Entry / Entry - Default  -->
<?php
	$args = get_query_var('to_template');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/article">
		 <!-- Entry - article thumbnail  -->
		<?php 
			get_template_part('template-parts/entry/thumbnail', $args['template_type']); 
		?>
		 <!-- Entry - article title  -->
		<?php 
			get_template_part('template-parts/entry/title', $args['template_type']); 
		?>
	 <!-- Entry - the_content  -->
	<?php 
		get_template_part( 'template-parts/entry/content', $args['template_type'] ); 
	?>
	 <!-- Entry - entry links  -->
		<?php 
			get_template_part( 'template-parts/entry/links', $args['template_type'] ); 
		?>
	 <!-- Entry - entry date  -->
		<?php 
			get_template_part( 'template-parts/entry/date', $args['template_type'] ); 
		?>
	 <!-- Entry - entry author  -->
		<?php 
			get_template_part( 'template-parts/entry/author', $args['template_type'] ); 
		?>
	 <!-- Entry - entry category  -->
		<?php 
			get_template_part( 'template-parts/entry/category', $args['template_type'] ); 
		?>
	 <!-- Entry - entry tags  -->
		<?php 
			get_template_part( 'template-parts/entry/tags', $args['template_type'] ); 
		?>

 <!-- Loop Default - comments_template  -->
		<?php 
			/* note: unlike get_template_part, comments_template needs the precedding slash on the path. */
			/* Also. Need to check file exists as comments_template fails if the exact file isn't founf and throws an error */
			$path = get_template_directory();
			$filename = '/template-parts/entry/comments'.'-'.$args['template_type'].'.php';
			if ( ! file_exists( $path.$filename ) ) {
				/* Template specific path doesn't exist, try a default Tregenza-One template part*/
				$filename = '/template-parts/entry/comments.php';
				if ( ! file_exists( $path.$filename ) ) {
					/* Can't find anything, fall back to Wordpress default */
					$filename = "";
				} 
			}
			comments_template( $filename, true ); 
		?>

 <!-- Loop Default - article END -->
</article>