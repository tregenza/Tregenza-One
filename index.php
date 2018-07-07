<?php
/*
			Default layout for all content without superceeding templates
*/

$args = array(
								'template_type' => ''
							);
set_query_var( 'to_template', $args);

?>

<!-- Index - get_header -->
<?php 
	get_template_part('/template-parts/header/header', $args['template_type']); 
?>
<!-- Index - get_sidebar -->
<?php 
	get_template_part('/template-parts/sidebar/secundus', $args['template_type']); 
?>
<!-- Index - section -->
<section id="content" role="main" class="tregenza_one_block tregenza_one_column">
	<?php 
		get_template_part( 'template-parts/loop/loop' , $args['template_type']); 
	?>
<!-- Index - Archive Navigation -->
	<?php get_template_part( '/template-parts/loop/nav', 'below' ); ?>
<!-- Index - section END -->
</section>
<!-- Index - get_sidebar -->
	<?php 
		get_template_part('/template-parts/sidebar/tertius', $args['template_type']); 
	?>
<!-- Index - get_footer -->
<?php 
		get_template_part('/template-parts/footer/footer', $args['template_type']); 
?>