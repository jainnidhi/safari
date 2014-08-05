<?php
/**
 * The Template for displaying all single portfolio items.
 *
 * @package Safari
 * @since Safari 1.0
 */
get_header();
?>
<div class="post-featured-image">
    <?php if (get_theme_mod('single_portfolio_featured_image')) { ?>
        <img src="<?php echo get_theme_mod('single_portfolio_featured_image'); ?>" />
    <?php } else { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/includes/images/slider1.jpg" alt=""/>
    <?php } ?>
    <div class="blog-content">
        <?php if (get_theme_mod('single_portfolio_page_title') != '') { ?><h3><?php echo esc_html(get_theme_mod('single_portfolio_page_title')); ?></h3>

        <?php } else { ?> <h1><?php esc_html_e(' Single Portfolio', 'safari') ?></h1>
        <?php } ?>

        <?php if (get_theme_mod('single_portfolio_page_description') != '') { ?>
            <p><?php echo esc_html(get_theme_mod('single_portfolio_page_description')); ?></p>
        <?php } else { ?>
            <p><?php esc_html_e('This is the portfolio description block.', 'safari') ?> </p>
        <?php } ?>
    </div>
</div>

<div class="main-content">

    <div class="container">
        <div class="row">
            <div class="portfolio-image">

                <?php if (has_post_thumbnail() && is_single() && !is_search()) { ?>
                    <?php the_post_thumbnail('single_portfolio_thumb'); ?>
                <?php } ?>
            </div>
            <div id="content" class="main-content-inner col-lg-12"> 
                <div class="portfolio-content col-lg-8">
                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('content', 'portfolio'); ?>

                        <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if (comments_open() || '0' != get_comments_number()) {
                            comments_template('', true);
                        }
                        ?>

                    <?php endwhile; // end of the loop. ?>
                </div>
                <div class="portfolio-sidebar sidebar col-lg-4">
                    <aside id="recent-posts-2" class="widget widget_recent_entries">
                        <h3 class="widget-title">Recent Posts</h3>		
                        <ul>
                            <li>Client: <a href="#">Toppers of Hackney</a></li>
                            <li>Date: <a href="#">8 July 2014</a></li>
                            <li>Skills: <a href="#">Design</a></li>
                        </ul>
                    </aside>
                </div>
            </div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
            <div class="portfolio-related-products clearfix">
                <?php
                //Get array of terms
                $terms = get_the_terms($post->ID, 'portfolio_category', 'string');
             //Pluck out the IDs to get an array of IDS
                $term_ids = wp_list_pluck($terms, 'term_id');

                    //Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
                    //Chose 'AND' if you want to query for posts with all terms
                $related_portfolio_query = new WP_Query(array(
                    'post_type' => 'portfolio',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'portfolio_category',
                            'field' => 'id',
                            'terms' => $term_ids,
                            'operator' => 'IN' //Or 'AND' or 'NOT IN'
                        )),
                    'posts_per_page' => 3,
                    'ignore_sticky_posts' => 1,
                    'orderby' => 'rand',
                    'post__not_in' => array($post->ID)
                        ));

        //Loop through posts and display...
                if ($related_portfolio_query->have_posts()) {
                    while ($related_portfolio_query->have_posts()) : $related_portfolio_query->the_post();
                        ?>
                        <div id="post-<?php the_ID(); ?>" class="single_related col-lg-3 related-portfolio">

                    <div class="portfolio-image">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('post_feature_thumb'); ?>
                           
                        </a>
                      <div class="portfolio-inner">
                         <h2 class="home-featured-portfolio-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
                                </h2>
                            <?php safari_custom_post_category(); ?>
                      </div>
                          
                    </div>
                      
                       
          
                </div><!--end .product-->
                    <?php
                    endwhile;
                    wp_reset_query();
                }
                ?>
            </div>
        </div><!-- close .row -->
    </div><!-- close .container -->
</div><!-- close .main-content -->

<?php get_footer(); ?>
