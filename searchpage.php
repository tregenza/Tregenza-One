<?php
/*
Template Name: Search Page
*/
?>
<!--- Page - get_header --->
	<?php 
		get_header(); 
	?>
<!--- Page - get_sidebar --->
	<?php 
		get_sidebar("secundus"); 
	?>

<!--- Page - section --->
	<section id="content" role="main" class="tregenza-primus">

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
<!--- Page - article section END --->
</section>

<?php 
	endwhile; endif; 
?>

<!--- Page - searchform --->

<?php 
	get_search_form(); 
?>

<!--- Page - searchform END --->

<!--- Page - article END--->
</article>

<!--- Page - section END --->
</section>
<!--- Page - get_footer --->
<?php 
	get_footer(); 
?>
