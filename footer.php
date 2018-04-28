<?php
/***
*
*		TregenzaOne Footer
*
***/
?>
	<!--- Footer -->
		<!--- Footer - get_sidebar --->
			<?php 
				get_sidebar("tertius"); 
			?>
		<!--- Footer - End of #container --->
		</div> 
		<!--- footer - dynamic_sidebar-footer-widgets -->
		<aside id="footSidebar" class="blockVariable">
			<?php
				/* Widget Area */
				dynamic_sidebar('footer-widget-bar');
			?>
		</aside>
		<footer id="footer" role="contentinfo" class="clear blockVariable">
		<!--- Footer - wp_footer -->
		<?php 
			wp_footer(); 
		?>
		<!--- Footer - wp_footer END -->
		</footer>
	
	</body>

</html>