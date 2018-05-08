<!--- Home - get_header -->
<?php 
	get_header(); 
?>
<!--- Home - get_sidebar -->
<?php 
	get_sidebar(); 
?>
<!--- Home - section start -->
<section id="content" role="main">
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>
<!--- Home - get_template_part-entry -->
<?php 
	get_template_part( 'entry' ); 
?>
<!--- Home - comments_template -->
<?php 
	comments_template(); 
?>
<?php 
	endwhile; 
	endif; 
?>
<!--- Home - get_template_part-nav-below -->
<?php 
	get_template_part( 'nav', 'below' ); 
?>
<!--- Home - section-end -->
</section>
<!--- Home - get_footer -->
<?php 
	get_footer(); 
?>
