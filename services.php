<?php
/**
 * Template Name: Service Template
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

                            <?php } else {  ?> <h1><?php esc_html_e('Services', 'safari') ?></h1>
                                     <?php } ?>
                            
                            <?php if ( get_theme_mod('single_post_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('single_post_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('Services Description Block.', 'safari') ?> </p>
                                            <?php } ?>
                </div>
    </div>
<div class="main-content">
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-lg-12">
                          
            <div class="home-featured col-sm-12">
                <div class="home-featured-one col-sm-3" data-scroll-reveal="enter from the top after 0.2s">
                    <?php if ( get_theme_mod('home_featured_one') !='' ) {  ?>
                     <div class="featured-image"><?php echo esc_url(get_theme_mod('home_featured_one')); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class="fa fa-bars"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_one') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_one')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Products', 'safari') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_one') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_one')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Showcase your best quality products on home page to grab visitor&rsquo;s attention.', 'safari') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_one_link_url') !='' ) { echo esc_url(get_theme_mod('home_one_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_one_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_one_link_text')); ?>

                  <?php } else {  ?> <?php esc_html_e('Read More', 'safari') ?>
                           <?php } ?></a>
                </div>

                <div class="home-featured-two  col-sm-3" data-scroll-reveal="enter from the top after 0.2s">
                    <?php if ( get_theme_mod('home_featured_two') !='' ) {  ?>
                     <div class="featured-image"><?php echo esc_url(get_theme_mod('home_featured_two')); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class="fa fa-home"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_two') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_two')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Services', 'safari') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_two') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_two')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Show your multiple services that will explore your website among audience.', 'safari') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_two_link_url') !='' ) { echo esc_url(get_theme_mod('home_two_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_two_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_two_link_text')); ?>

                  <?php } else {  ?> <?php esc_html_e('Read More', 'safari') ?>
                           <?php } ?></a>
                </div>


                <div class="home-featured-three col-sm-3" data-scroll-reveal="enter from the top after 0.2s">
                    <?php if ( get_theme_mod('home_featured_three') !='' ) {  ?>
                     <div class="featured-image"><?php echo esc_url(get_theme_mod('home_featured_three')); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class="fa fa-pencil"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_three') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_three')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Clients', 'safari') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_three') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_three')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Show testimonials of your clients that will build the trust among the audience.', 'safari') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_three_link_url') !='' ) { echo esc_url(get_theme_mod('home_three_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_three_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_three_link_text')); ?>

                    <?php } else {  ?> <?php esc_html_e('Read More', 'safari') ?>
                           <?php } ?></a>
                </div>
                
                <div class="home-featured-four col-sm-3" data-scroll-reveal="enter from the top after 0.2s">
                    <?php if ( get_theme_mod('home_featured_four') !='' ) {  ?>
                     <div class="featured-image"><?php echo esc_url(get_theme_mod('home_featured_four')); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class="fa fa-folder"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_four') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_four')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Services', 'safari') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_four') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_four')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Show testimonials of your clients that will build the trust among the audience.', 'safari') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_four_link_url') !='' ) { echo esc_url(get_theme_mod('home_four_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_four_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_four_link_text')); ?>

                    <?php } else {  ?> <?php esc_html_e('Read More', 'safari') ?>
                           <?php } ?></a>
                </div>
            </div>
         
                    </div>
                </div>
        </div>
</div>
    
<?php get_footer(); ?>
