<!---- Template Parts / Entry / Comments - Default --->
<?php 
	if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
		return; 
	}
?>
<section id="comments" class="tregenza_one_block tregenza_one_block_comments">
	<?php 
		if ( have_comments() ) { 
			global $comments_by_type;
			$comments_by_type = separate_comments( $comments );
			if ( ! empty( $comments_by_type['comment'] ) ) { 
		?>
			<section id="comments-list" class="comments">
				<h3 class="comments-title">
				<?php 
					comments_number(); 
				?>
				</h3>
				<?php
		 			if ( get_comment_pages_count() > 1 ) { 
				?>
						<nav id="comments-nav-above" class="comments-navigation" role="navigation">
							<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
						</nav>
				<?php 
					} 
				?>
				<ul>
					<?php 
						wp_list_comments( 'type=comment' ); 
					?>
				</ul>
				<?php 
					if ( get_comment_pages_count() > 1 ) { 
				?>
				<nav id="comments-nav-below" class="comments-navigation" role="navigation">
					<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
				</nav>
				<?php 
				} 
				?>
			</section>
	<?php 
		} 
		if ( ! empty( $comments_by_type['pings'] ) ) { 
			$ping_count = count( $comments_by_type['pings'] ); 
		?>
		<section id="trackbacks-list" class="comments">
			<h3 class="comments-title"><?php echo '<span class="ping-count">' . $ping_count . '</span> ' . ( $ping_count > 1 ? __( 'Trackbacks', 'blankslate' ) : __( 'Trackback', 'blankslate' ) ); ?></h3>
			<ul>
			<?php 
				wp_list_comments( 'type=pings&callback=blankslate_custom_pings' ); 
			?>
			</ul>
		</section>
		<?php 
			}
		}
		if ( comments_open() ) {
			comment_form();
		}
		?>
</section>