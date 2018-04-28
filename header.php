<?php
/***
*
*		TregenzaOne - header.php - Top level HTML structure 
*
***/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<!--- header - head --->
	<head>
		<!--- header - get_template_part - head-standard --->
		<?php
			get_template_part('template-parts/header/head', 'standard');
		?>
		<!--- header - head END --->
	</head>
	<!--- header - body --->
	<body <?php body_class(); ?>>
		<!--- header - wrapper --->
		<div id="wrapper" class="hfeed">
			<!--- header - template-part body-standard --->
			<?php
				get_template_part('template-parts/header/body', 'standard');
			
			?>
			<!--- header - div-container --->
			<div id="container">