<?php
/***
*
*		TregenzaOne - head-standard.php - Standard head / meta for theme pages / posts 
*
***/
?>
<!-- Head-Standard -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 

<title><?php wp_title(',', 'true', 'right'); ?><?php bloginfo('name'); ?></title>

<!-- Head-Standard wp_head -->
<?php wp_head(); ?>