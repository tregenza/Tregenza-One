<!---- Template Parts / Entry / Title - default --->
<!--- title - the_post_thumbnail --->
<?php 
	if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
	} 
?>
<h1 class="entry-title">
	<!--- title - the_title --->
	<?php 
		echo "<a href='".esc_url(get_permalink())."' class='postTitleLink'>";
		the_title(); 
		echo "</a>";
	?>
	</h1> 
