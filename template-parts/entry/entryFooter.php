<!---- Template Parts / Entry / Entry Footer - Default ----->
<footer class="entry-footer">
	<!--- Entery Footer - the_category --->
	<div class="cat-links">
		<?php 
			the_category( '', ' ', '' ); 
		?>
	</div>
	<div class="tag-links">
		<?php 
			the_tags( '', ' ', '');
		?>
		</div>
</footer> 