<!-- Template Parts / Entry / Thumbnail - default -->
<!-- Thumbnail - the_post_thumbnail -->
<div class="tregenza_one_block  tregenza_one_block_thumbnail">
	<?php 
		if ( has_post_thumbnail() ) { 
			the_post_thumbnail('full'); 
		} 
	?>
</div>