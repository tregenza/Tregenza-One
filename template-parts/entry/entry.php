<!--- Template Parts / Entry / Entry - Default --->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--- Entry - article header --->
	<header class="header">
		<?php 
			get_template_part('template-parts/entry/title'); 
		?>
<!--- Entry - article header END --->
	</header>
	<!--- Entry - article section-entry-content --->
	<section class="entry-content">
	<!--- Entry - the_content --->
	<?php 
		get_template_part( 'template-parts/entry/content' ); 
	?>
	<!--- Entry - content additional --->
	<div class="entry-content-additional">	
		<?php 
			get_template_part( 'template-parts/entry/contentAdditional' ); 
		?>
	</div>
	<!--- Loop Default - article section END --->
	</section>
<!--- Loop Default - article END--->
</article>
<!--- Loop Default - comments_template --->
<?php 
		comments_template( '', true ); 
?>
