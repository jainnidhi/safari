<?php
/**
 * The template for displaying portfolio content. 
 *
 * @package Passion
 * @since Passion 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <?php if (is_single()) { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php } else {
            ?>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail(); ?> 

            </a>
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(esc_html__('Permalink to %s', 'safari'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h2>
        <?php } // is_single() ?>
        
    </header> <!-- /.entry-header -->
  
    <div class="entry-content">
        <?php
        the_content(wp_kses(__('Read more ', 'safari'), array('span' => array(
                'class' => array())))
        );
        ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'safari'),
            'after' => '</div>',
            'link_before' => '<span class="page-numbers">',
            'link_after' => '</span>'
        ));
        ?>
    </div> <!-- /.entry-content -->
    
    <footer class="entry-meta">
        <?php
        if (is_singular()) {
            // Only show the tags on the Single Post page
            safari_entry_meta();
        }
        ?>

<?php
if (is_singular() && get_the_author_meta('description') && is_multi_author()) {
    // If a user has filled out their description and this is a multi-author blog, show their bio
    get_template_part('author-bio');
}
?>
    </footer> <!-- /.entry-meta -->

</article> <!-- /#post -->
