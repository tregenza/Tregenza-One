<!---- Template Parts / Entry / Title - default --->
<div class="tregenza_one_block tregenza_one_block_title">
	<h1 class="entry-title" itemprop="headline">
		<!--- title - the_title --->
		<?php 
			echo "<a href='".esc_url(get_permalink())."' class='postTitleLink'>";
			the_title(); 
			echo "</a>";
		?>
		</h1>
</div> 