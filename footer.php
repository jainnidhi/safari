<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package safari
 */
?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="site-footer-inner">
                        <?php
                                // Count how many footer sidebars are active so we can work out how many containers we need
                                $footerSidebars = 0;
                                for ($x = 1; $x <= 4; $x++) {
                                    if (is_active_sidebar('sidebar-footer' . $x)) {
                                        $footerSidebars++;
                                    }
                                }

                                // If there's one or more one active sidebars, create a row and add them
                                if ($footerSidebars > 0) {
                                    ?>
                                    <footer class="site-footer" role="contentinfo">
                                        <?php
                                        // Work out the container class name based on the number of active footer sidebars
                                        $containerClass = "col-sm-" . 12 / $footerSidebars;

                                    // Display the active footer sidebars
                                    for ($x = 1; $x <= 4; $x++) {
                                        if (is_active_sidebar('sidebar-footer' . $x)) {
                                            ?>
                                            <div id="<?php echo 'footer-widget' . $x; ?>" class="<?php echo $containerClass ?>">
                                                <div class="widget-area" role="complementary">
                                            <?php dynamic_sidebar('sidebar-footer' . $x); ?>
                                          </div>
                                      </div> <!-- /.col.<?php echo $containerClass ?> -->
                              <?php }
                          }
                                }
                          ?>
				

			</div>
		</div>
	</div><!-- close .container -->
</footer><!-- close #colophon -->

        <div class="site-info">
            <div class="container">
                <div class="row">
                   <div class="site-info">
				
                                        <?php if(get_theme_mod('safari_footer_footer_text')) { ?>
                                        <?php echo esc_html(get_theme_mod('safari_footer_footer_text')); ?>
                                        <?php } else { ?>
                                        <p>
                                            <a href="<?php $safari_theme = wp_get_theme(); echo $safari_theme->get( 'ThemeURI' ); ?>">
                                                <?php _e('Safari WordPress theme by IdeaBox', 'safari'); ?>
                                            </a>
                                        </p>
                                        <?php } ?>
                                        
				</div><!-- close .site-info -->
                </div>
            </div>
        </div><!-- close .site-info -->

<?php wp_footer(); ?>

</body>
</html>