<?php get_header();?>

<div class="grid">
    <div class="row cells12">
        <div class="cell colspan8">
        	<?php if (have_posts()) : ?>
        	<?php while (have_posts()) : the_post(); $do_not_duplicate = $post->ID; $excerpt=get_the_excerpt(); ?>
        	<div class="putih padding5" style="margin-bottom:10px;" id="post-<?php the_ID(); ?>">
        		<div class="grid">
        			<div class="row cells12">
        				<div class="cell colspan3">
        					<?php 
							if (has_post_thumbnail()) {
								the_post_thumbnail(); 
							}
							else{
							?>
								<img src="<?php echo esc_url( get_template_directory_uri() );?>/screenshot.png" alt="default image post" height="120" width="120"/>
							<?php
							}
							?>
        				</div>
        				<div class="cell colspan9">
        					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permalink to <?php the_title_attribute(); ?>"><h4><b><?php the_title(); ?></b></h4></a>
        					<p><?php $article =  substr($excerpt,0,100);$short = substr($article, 0, strrpos($article, " "));echo $short . "...";?></p>
        					<p><?php the_author() ?> / <?php the_time('l, F d, Y') ?> / <?php comments_popup_link( 'No Comments', '1 Comment', '% Comments' ); ?></p>
        				</div>
        			</div>
        		</div>
        	</div>
        	<?php endwhile; ?>
        	<div class="place-left"><?php next_posts_link('&laquo; Artikel Sebelumnya') ?></div>
        	<div class="place-right"><?php previous_posts_link('Artikel Selanjutnya &raquo;') ?></div>
        	<?php else :
                get_template_part( 'content', 'none' );
            endif; ?>
        </div>

        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer();?> 