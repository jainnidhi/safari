<?php
/**
 * The Template for displaying all single posts.
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

                            <?php } else {  ?> <h1><?php esc_html_e(' Blog Single', 'safari') ?></h1>
                                     <?php } ?>
                            
                            <?php if ( get_theme_mod('single_post_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('single_post_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('This is the Sinlge post description block.', 'safari') ?> </p>
                                            <?php } ?>
                </div>
    </div>
<div class="main-content">
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12 col-md-8">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>
                            <?php safari_content_nav( 'nav-below' ); ?>

                <?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		?>
                           

	<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
    
<?php get_footer(); ?>