<?php
/**
 * Template Name: Contact Template
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package safari
 */

get_header(); ?>
<div class="post-featured-image">
        <?php if ( get_theme_mod('single_post_featured_image')) { ?>
		<img src="<?php echo get_theme_mod('single_post_featured_image'); ?>" />
	<?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/includes/images/slider1.jpg" alt=""/>
        <?php  } ?>
                <div class="blog-content">
                     <?php if ( get_theme_mod('sinlge_post_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('sinlge_post_title')); ?></h3>

                            <?php } else {  ?> <h1><?php esc_html_e('Contact', 'safari') ?></h1>
                                     <?php } ?>
                            
                            <?php if ( get_theme_mod('single_post_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('single_post_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('Contact Description Block.', 'safari') ?> </p>
                                            <?php } ?>
                </div>
    </div>
<div class="main-content">
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12 col-md-8">
                            <div class="map-code">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3628.3373274884793!2d73.68860100000003!3d24.57755199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3967e564ac2e9c8d%3A0x87292b7f148a532d!2sIdeaBox+Creations!5e0!3m2!1sen!2sin!4v1406726113881" width="100%" height="450px" frameborder="0" style="border:0"></iframe>
                            </div>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		?>

	<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
                               </div>
                </div>
        </div>
</div>
    
<?php get_footer(); ?>
