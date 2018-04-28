<!--- Single - get_header -->
<?php 
	get_header(); 
?>
<!--- Single - section start -->
<section id="content" role="main" class="tregenza-primus">
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>
<!--- Single - get_template_part-entry -->
<?php 
	get_template_part( 'entry' ); 
?>
<!--- Single - comments_template -->
<?php 
	if ( ! post_password_required() ) comments_template( '', true ); 
?>
<?php 
	endwhile; endif; 
?>
<!--- Single - Section - Footer -->
<footer class="footer">
<!--- Single - get_template_part-nav-below -->
<?php 
	get_template_part( 'nav', 'below-single' ); 
?>
<!--- Single - Section - Footer END-->
</footer>
<!--- Single - Section END -->
</section>
<!--- Single - get_sidebar -->
<?php 
	get_sidebar(); 
?>
<!--- Single - get_footer -->
<?php 
	get_footer(); 
?>