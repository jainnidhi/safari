<?php
/**
 * Template Name: Column Template
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

                            <?php } else {  ?> <h1><?php esc_html_e('Column', 'safari') ?></h1>
                                     <?php } ?>
                            
                            <?php if ( get_theme_mod('single_post_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('single_post_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('Column Description Block.', 'safari') ?> </p>
                                            <?php } ?>
                </div>
    </div>
<div class="main-content">
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-lg-12">
                            <div class="four-column-block clearfix columns">
                                <div class="col-lg-3 column">
                                    <h3>1/4</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                 <div class="col-lg-3 column">
                                    <h3>1/4</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                 <div class="col-lg-3 column">
                                    <h3>1/4</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                 <div class="col-lg-3 column">
                                    <h3>1/4</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                            </div><!-- /.four-column-block -->
                            
                            <div class="two-column-block clearfix columns">
                                <div class="col-lg-6 column">
                                    <h3>1/2</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                 <div class="col-lg-6 column">
                                    <h3>1/2</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                            </div><!-- /.two-column-block -->
                            
                            <div class="three-column-block clearfix columns">
                                <div class="col-lg-4 column">
                                    <h3>1/3</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                 <div class="col-lg-4 column">
                                    <h3>1/3</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                <div class="col-lg-4 column">
                                    <h3>1/3</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                            </div><!-- /.two-column-block -->
                            
                            <div class="four-two-column-block clearfix columns">
                                <div class="col-lg-3 column">
                                    <h3>1/4</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                 <div class="col-lg-3 column">
                                    <h3>1/4</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                <div class="col-lg-6 column">
                                    <h3>1/2</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                            </div><!-- /.two-column-block -->
                            
                            <div class="six-column-block clearfix columns">
                                <div class="col-lg-2 column">
                                    <h3>1/6</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                 <div class="col-lg-2 column">
                                    <h3>1/6</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                <div class="col-lg-2 column">
                                    <h3>1/6</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                <div class="col-lg-2 column">
                                    <h3>1/6</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                 <div class="col-lg-2 column">
                                    <h3>1/6</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                                <div class="col-lg-2 column">
                                    <h3>1/6</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Curabitur gravida vel dolor mollis sollicitudin. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus volutpat lacus et, auctor tortor.</p>
                                </div>
                                
                            </div><!-- /.two-column-block -->

                    </div>
                </div>
        </div>
</div>
    
<?php get_footer(); ?>
