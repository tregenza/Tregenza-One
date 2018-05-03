<?php  
/* Template Name: Splash (No Sidebars) */
?>
<!--- Splash Page Template --->
<!--- Page - get_header --->
	<?php 
		get_header(); 
	?>
<!--- Page - section --->
	<section id="content" role="main" class="tregenza-primus page-splash">
	<?php 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	?>
<!--- Page - article --->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--- Page - article header --->
<header class="header">
<!--- Page - the_post_thumbnail --->
<?php 
	if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
	} 
?>
<h1 class="entry-title">
<!--- Page - the_title --->
<?php 
	the_title(); 
?>
</h1> 
<!--- Page - article header END --->
</header>
<!--- Page - article section-entry-content --->
<section class="entry-content">
<!--- Page - the_content --->
<?php 
	the_content(); 
?>
<div class="entry-links">
<!--- Page - wp_link_pages --->
<?php 
	wp_link_pages(); 
?></div>
<!--- Page - article section END --->
</section>
<!--- Page - article END--->
</article>
<!--- Page - comments_template --->
<?php 
	if ( ! post_password_required() ) comments_template( '', true ); 
?>
<?php 
	endwhile; endif; 
?>
<!--- Page - section END --->
</section>
<!--- Page - get_footer --->
<?php 
	get_footer(); 
?>