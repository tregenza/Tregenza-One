<!---- Template Parts / Entry / Content Additional - default --->		
<div class="entry-links">
<!--- Content Additional - wp_link_Indexs --->
		<?php 
			wp_link_Pages(); 
		?>
</div>
<div class="entry-meta">
	<?php
		get_template_part( 'template-parts/entry/entryMeta' );
		get_template_part( 'template-parts/entry/entryFooter' );
	?>
</div>