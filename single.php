<?php get_header();?>

<div class="grid">
    <div class="row cells12">
        <div class="cell colspan8">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); $do_not_duplicate = $post->ID; $excerpt=get_the_excerpt(); ?>
        	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
                <h3 class="story-cat"><?php the_category(', ') ?></h3>
                <header class="entry-header">
                    <?php
                        if ( is_single() ) :
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                            the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                        endif;
                    ?>
                </header><!-- .entry-header -->
                <div class="post-info">
                    By <?php the_author_posts_link(); ?> | <?php the_time('F d, Y') ?>
                </div>
                <?php jumal_post_thumbnail(); ?>
      			<?php the_content(); ?>
        	</article>
        	<?php
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'jumal' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'jumal' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'jumal' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'jumal' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
            
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>

			<?php
             endwhile; endif; ?>
        </div>

        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer();?>