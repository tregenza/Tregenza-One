<?php
/*
			Standard Page (not post) layout
*/

$args = array(
								'template_type' => 'page'
							);
set_query_var( 'to_template', $args);

?>

<!--- Page - get_header --->
	<?php 
	get_template_part('/template-parts/header/header', $args['template_type']); 
	?>
<!--- Page - get_sidebar --->
	<?php 
	get_template_part('/template-parts/sidebar/secundus', $args['template_type']); 
	?>
<!--- Page - section --->
<section id="content" role="main" class="tregenza-primus">
	<?php 
		get_template_part( 'template-parts/loop/loop', $args['template_type'] ); 
	?>
<!---- Page - Archive Navigation ---->
	<?php get_template_part( '/template-parts/loop/nav', 'below', $args['template_type'] ); ?>
<!--- Page - section END --->
</section>
		<!--- Page - get_sidebar --->
			<?php 
		get_template_part('/template-parts/sidebar/tertius', $args['template_type']); 
			?>
<!--- Page - get_footer --->
<?php 
		get_template_part('/template-parts/footer/footer'); 
?>