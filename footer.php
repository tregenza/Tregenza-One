<?php
/*
			Default footer - Not really needed but some plugins expect it (woocommerce)
			Also loads RHS sidebar
*/
?>
<!-- Footer - get_sidebar -->
	<?php 
		get_template_part('/template-parts/sidebar/tertius'); 
	?>
<!-- Footer - get_footer -->
<?php 
		get_template_part('/template-parts/footer/footer'); 
?>