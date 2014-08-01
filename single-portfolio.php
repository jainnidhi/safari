<?php
/**
 * The Template for displaying all single portfolio items.
 *
 * @package Safari
 * @since Safari 1.0
 */

get_header(); ?>
<div class="post-featured-image">
        <?php if ( get_theme_mod('single_portfolio_featured_image')) { ?>
		<img src="<?php echo get_theme_mod('single_portfolio_featured_image'); ?>" />
	<?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/includes/images/slider1.jpg" alt=""/>
        <?php  } ?>
                <div class="blog-content">
                     <?php if ( get_theme_mod('single_portfolio_page_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('single_portfolio_page_title')); ?></h3>

                            <?php } else {  ?> <h1><?php esc_html_e(' Single Portfolio', 'safari') ?></h1>
                                     <?php } ?>
                            
                            <?php if ( get_theme_mod('single_portfolio_page_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('single_portfolio_page_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('This is the portfolio description block.', 'safari') ?> </p>
                                            <?php } ?>
                </div>
    </div>
     
    <div class="main-content">
        <div class="portfolio-image">
         <div class="container">
             <div class="row">
                    <?php if (has_post_thumbnail() && is_single() && !is_search()) { ?>
                    <?php the_post_thumbnail(); ?>
                        <?php } ?>
             </div>    
         </div></div>
	<div class="container">
		<div class="row">
                   
			<div id="content" class="main-content-inner col-sm-12 col-md-8">        
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'portfolio' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template( '', true );
					}
					?>

					<?php safari_content_nav( 'nav-below' ); ?>

				<?php endwhile; // end of the loop. ?>
                            <?php get_sidebar() ?>
                            </div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->
                           
<?php get_footer(); ?>
