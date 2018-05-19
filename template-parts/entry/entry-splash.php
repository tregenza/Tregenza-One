<?php
		/* Content layout for Splash template */
$args = get_query_var('to_template');

?>
<!--- Template Parts / Entry / Entry-Splash - Default --->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/article">
	<!--- Entry-Splash - the_content --->
	<?php 
		get_template_part( 'template-parts/entry/content', $args['template_type']); 
	?>
</article>