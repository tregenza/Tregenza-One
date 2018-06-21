<?php
/* 		Default loop handling   */
$args = get_query_var('to_template');

?>
<!-- Template Parts / Loop / Loop Default -->
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		get_template_part('template-parts/entry/entry', $args['template_type']);
?>
<!-- Loop Default Post Separator -->
<div class="postSeparator brand-bg"></div> 
<?php 
	endwhile; endif; 
?>