<?php get_header(); ?>
<div class="grid">
    <div class="row cells12">
        <div class="cell colspan8">
        	<main id="main" class="site-main" role="main">
	        	<?php if ( have_posts() ) : ?>

	        	<div class="archive-description">
					<h1 class="archive-title"><?php printf( __( 'Search Results for: %s', 'jumal' ), get_search_query() ); ?></h1>	
				</div>

				<?php
				// Start the loop.
				while ( have_posts() ) : the_post(); ?>

					<?php
					/*
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'content', 'search' );

				// End the loop.
				endwhile;

				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'jumal' ),
					'next_text'          => __( 'Next page', 'jumal' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'jumal' ) . ' </span>',
				) );

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'content', 'none' );

				endif;
				?>
			</main>
        </div>

        <?php get_sidebar(); ?>

    </div>
</div>
<?php get_footer(); ?>