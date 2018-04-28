<!--- Index - get_header -->
<?php 
	get_header(); 
?>
<!--- Index - get_sidebar -->
<?php 
	get_sidebar(); 
?>
<!--- Index - section start -->
<section id="content" role="main">
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>
<!--- Index - get_template_part-entry -->
<?php 
	get_template_part( 'entry' ); 
?>
<!--- Index - comments_template -->
<?php 
	comments_template(); 
?>
<?php 
	endwhile; 
	endif; 
?>
<!--- Index - get_template_part-nav-below -->
<?php 
	get_template_part( 'nav', 'below' ); 
?>
<!--- Index - section-end -->
</section>
<!--- Index - get_footer -->
<?php 
	get_footer(); 
?>