<!--- Index - get_header --->
<?php 
	get_template_part('/template-parts/header/header'); 
?>
<!--- Index - get_sidebar --->
<?php 
	get_template_part('/template-parts/sidebar/secundus'); 
?>
<!--- Index - section --->
<section id="content" role="main" class="tregenza-primus">
	<?php 
		get_template_part( 'template-parts/loop/loop' ); 
	?>
<!---- Index - Archive Navigation ---->
	<?php get_template_part( '/template-parts/loop/nav', 'below' ); ?>
<!--- Index - section END --->
</section>
<!--- Index - get_sidebar --->
	<?php 
		get_template_part('/template-parts/sidebar/tertius'); 
	?>
<!--- Index - get_footer --->
<?php 
		get_template_part('/template-parts/footer/footer'); 
?>