<!---- Template Parts / Loop / Loop Default --->
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		get_template_part('template-parts/entry/entry');
?>
<!---- Loop Default Post Separator ---->
<div class="postSeparator brand-bg"></div> 
<?php 
	endwhile; endif; 
?>
