<section class="entry-summary">
	<div class="summary-thumbnail"><?php the_post_thumbnail(); ?></div>
	<div class="summary-excerpt"><?php the_excerpt(); ?></div>
	<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>
</section>