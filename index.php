<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package safari
 */

get_header(); ?>

    <div class="post-featured-image">
        <?php if ( get_theme_mod('blog_featured_image')) { ?>
		<img src="<?php echo esc_url(get_theme_mod('blog_featured_image')); ?>" />
	<?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/includes/images/slider1.jpg" alt=""/>
        <?php  } ?>
                <div class="blog-content">
                     <?php if ( get_theme_mod('blog_page_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('blog_page_title')); ?></h3>

                            <?php } else {  ?> <h1><?php esc_html_e(' Our Blog', 'safari') ?></h1>
                                     <?php } ?>
                            
                            <?php if ( get_theme_mod('blog_page_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('blog_page_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('This is the blog description block.', 'safari') ?> </p>
                                            <?php } ?>
                </div>
    </div>
<div class="main-content">
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12 col-md-8">
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
			?>

		<?php endwhile; ?>

		<?php safari_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'index' ); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>
                        </div>
                </div>
        </div>
</div>
<?php get_footer(); ?>