<?php get_header(); ?>
<div class="grid">
    <div class="row cells12">
        <div class="cell colspan8">
        	<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			// End the loop.
			endwhile;
		?>
        </div>

        <?php get_sidebar(); ?>

    </div>
</div>
<?php get_footer(); ?>