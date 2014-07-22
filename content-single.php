<?php
/**
 * @package safari
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-image">
            <?php if (get_the_post_thumbnail() && !is_search() ) { ?>
                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( the_title_attribute( 'echo=0' ) ) ); ?>">
                            <?php the_post_thumbnail( 'post_feature_full_width' ); ?>
                      
                    </a>
            <?php } ?>
        </div>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php safari_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'safari' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			safari_entry_meta();
		?>

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
