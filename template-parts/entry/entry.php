<!--- Template Parts / Entry / Entry - Default --->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/article">
		<!--- Entry - article thumbnail --->
		<?php 
			get_template_part('template-parts/entry/thumbnail'); 
		?>
		<!--- Entry - article title --->
		<?php 
			get_template_part('template-parts/entry/title'); 
		?>
	<!--- Entry - the_content --->
	<?php 
		get_template_part( 'template-parts/entry/content' ); 
	?>
	<!--- Entry - entry links --->
		<?php 
			get_template_part( 'template-parts/entry/links' ); 
		?>
	<!--- Entry - entry date --->
		<?php 
			get_template_part( 'template-parts/entry/date' ); 
		?>
	<!--- Entry - entry author --->
		<?php 
			get_template_part( 'template-parts/entry/author' ); 
		?>
	<!--- Entry - entry category --->
		<?php 
			get_template_part( 'template-parts/entry/category' ); 
		?>
	<!--- Entry - entry tags --->
		<?php 
			get_template_part( 'template-parts/entry/tags' ); 
		?>

<!--- Loop Default - comments_template --->
		<?php 
			/* note: unlike get_template_part, comments_template needs the precedding slash on the path. */
			comments_template( '/template-parts/entry/comments.php', true ); 
		?>
<!--- Loop Default - article END--->
</article>