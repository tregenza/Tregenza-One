<!--- Template Parts / Entry / Entry - Default --->
<?php
	$args = get_query_var('to_template');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/article">
		<!--- Entry - article thumbnail --->
		<?php 
			get_template_part('template-parts/entry/thumbnail', $args['template_type']); 
		?>
		<!--- Entry - article title --->
		<?php 
			get_template_part('template-parts/entry/title', $args['template_type']); 
		?>
	<!--- Entry - the_content --->
	<?php 
		get_template_part( 'template-parts/entry/content', $args['template_type'] ); 
	?>
	<!--- Entry - entry links --->
		<?php 
			get_template_part( 'template-parts/entry/links', $args['template_type'] ); 
		?>
	<!--- Entry - entry date --->
		<?php 
			get_template_part( 'template-parts/entry/date', $args['template_type'] ); 
		?>
	<!--- Entry - entry author --->
		<?php 
			get_template_part( 'template-parts/entry/author', $args['template_type'] ); 
		?>
	<!--- Entry - entry category --->
		<?php 
			get_template_part( 'template-parts/entry/category', $args['template_type'] ); 
		?>
	<!--- Entry - entry tags --->
		<?php 
			get_template_part( 'template-parts/entry/tags', $args['template_type'] ); 
		?>

<!--- Loop Default - comments_template --->
		<?php 
			/* note: unlike get_template_part, comments_template needs the precedding slash on the path. */
			comments_template( '/template-parts/entry/comments.php', true ); 
		?>
<!--- Loop Default - article END--->
</article>