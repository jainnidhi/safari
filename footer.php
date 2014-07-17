<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package safari
 */
?>
<?php if(!is_front_page()) { ?>
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->
<?php } ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="site-footer-inner col-sm-12">
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
                                    <footer class="site-footer row" role="contentinfo">
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
                    <?php do_action( 'safari_credits' ); ?>
                    <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'safari' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'safari' ), 'WordPress' ); ?></a>
                    <span class="sep"> | </span>
                    <?php printf( __( 'Theme: %1$s by %2$s.', 'safari' ), 'safari', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
                </div>
            </div>
        </div><!-- close .site-info -->

<?php wp_footer(); ?>

</body>
</html>