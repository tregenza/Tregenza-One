<?php  
/* Template Name: Splash (No Sidebars or Post Title) */

$args = array(
								'template_type' => 'splash'
							);
set_query_var( 'to_template', $args);

?>
<!--- Splash Full - get_header --->
<?php 
	get_template_part('/template-parts/header/header', $args['template_type']); 
?>
<!--- Splash Full - section --->
<section id="content" role="main" class="tregenza_one_block_max tregenza_one_column">
	<?php 
		get_template_part( 'template-parts/loop/loop', $args['template_type'] ); 
	?>
<!---- Splash Full - Archive Navigation ---->
	<?php get_template_part( '/template-parts/loop/nav', 'below' ); ?>
<!--- Splash Full - section END --->
</section>
<!--- Splash Full - get_footer --->
<?php 
		get_template_part('/template-parts/footer/footer'); 
?>