<!--- Page - get_header --->
	<?php 
	get_template_part('/template-parts/header/header'); 
	?>
<!--- Page - get_sidebar --->
	<?php 
	get_template_part('/template-parts/sidebar/secundus'); 
	?>
<!--- Page - section --->
<section id="content" role="main" class="tregenza-primus">
	<?php 
		get_template_part( 'template-parts/loop/loop' ); 
	?>
<!---- Page - Archive Navigation ---->
	<?php get_template_part( '/template-parts/loop/nav', 'below' ); ?>
<!--- Page - section END --->
</section>
		<!--- Page - get_sidebar --->
			<?php 
		get_template_part('/template-parts/sidebar/tertius'); 
			?>


<!--- Page - get_footer --->
<?php 
		get_template_part('/template-parts/footer/footer'); 
?>