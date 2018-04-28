<!--- Search.php --->
<!--- Search - get_header --->
	<?php 
		get_header(); 
	?>
<!--- Search - get_sidebar --->
	<?php 
		get_sidebar("secundus"); 
	?>
<!--- Search - section --->
	<section id="content" role="main" class="tregenza-primus">

		<?php get_search_form(); ?>

		<?php if ( have_posts() ) : ?>
			<header class="header">
			</header>
			<div class="searchResults">
			<?php 
				while ( have_posts() ) : the_post(); 
					switch (get_post_type()) {
						case 'product':
							wc_get_template_part( 'content', 'product' ); 
							break;
						default:
							get_template_part( 'entry' );
							break; 
					}
				?>
			<?php endwhile; ?>		
			</div>
			<?php get_template_part( 'nav', 'below' ); ?>

		<?php else : ?>
			<article id="post-0" class="post no-results not-found">
				<header class="header">
				<h4 class="entry-title"><?php _e( 'Nothing Found', 'blankslate' ); ?></h4>
				</header>
				<section class="entry-content">
					<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
				</section>
			
			<!--- Search - article END--->
			</article>
		<?php endif; ?>
	
	<!--- Search - section END --->
	</section>
<!--- Search - get_footer --->
<?php 
	get_footer(); 
?>