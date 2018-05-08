<!---- Template Parts / Entry / Entry Meta - default ---->
<section class="entry-meta">
	<span class="entry-date">
	<?php 
		the_time( get_option( 'date_format' ) ); 
	?>
</span>
	<span class="entry-author">
	<?php 
		the_author_posts_link(); 
	?>
</span>
</section>