<?php
/*
			Default footer - largely unneeded but some woocommerce pages and other plugins expect it  

		Note - also loads righthand sidebar	

*/
?>

<!--- Footer - get_sidebar --->
	<?php 
		get_template_part('/template-parts/sidebar/tertius'); 
	?>
<!--- Footer - get_footer --->
<?php 
		get_template_part('/template-parts/footer/footer'); 
?>