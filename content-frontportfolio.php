<?php
/**
 * The template for displaying featured portfolio on Front Page 
 *
 * @package Tress
 * @since Tress 1.0
 */
?>

<?php
// Start a new query for displaying featured posts on Front Page

if (get_theme_mod('safari_front_featured_portfolio_check')) {
    $featured_count = intval(get_theme_mod('safari_front_featured_portfolio_count'));
    $var = get_theme_mod('safari_front_featured_portfolio_cat');
    if (get_theme_mod('safari_portfolio_count')) {
    $grid_count =intval(get_theme_mod('safari_portfolio_count'));
    }
    else {
        $grid_count = 3; 
    }

    // if no category is selected then return 0 
    $featured_cat_id = max((int) $var, 0);

    $featured_portfolio_args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $featured_count,
        'cat' => $featured_cat_id,
        'post__not_in' => get_option('sticky_posts'),
    );
    $featuredportfolio = new WP_Query($featured_portfolio_args);
    ?>
<section class="portfolio-area">
    <div class="home-portfolio-title-area" id="portfolio-title">
            <div class="home-portfolio-title section-title">
                 <?php if ( get_theme_mod('safari_portfolio_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('safari_portfolio_title')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Recent Portfolio', 'safari') ?></h3>
                           <?php } ?>
                  <?php if ( get_theme_mod('portfolio_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('portfolio_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('Portfolio description block.', 'safari') ?> </p>
                                            <?php } ?>
            </div>
    </div>
            <ul id="filters">
                    <?php
                        $terms = get_terms('portfolio_category');
                        $count = count($terms);
                            echo '<li><a href="javascript:void(0)" data-filter="all" class="filter active">All</a></li>';
                        if ( $count > 0 ){

                            foreach ( $terms as $term ) {

                                $termname = strtolower($term->name);
                                $termname = str_replace(' ', '-', $termname);
                                echo '<li><a href="javascript:void(0)" class="filter" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
                            }
                        }
                    ?>
                </ul>

            <div id="featured-portfolio">
                <div class="portfolio-wrap flush clearfix">
                
                <?php if ($featuredportfolio->have_posts()) : $i = 1; ?>

                    <?php while ($featuredportfolio->have_posts()) : $featuredportfolio->the_post(); ?>
                    <?php $containerClass = "col-lg-" . 12 / $grid_count ; 
                        
                    $terms = get_the_terms( $post->ID, 'portfolio_category' );	
                    if ( $terms && ! is_wp_error( $terms ) ) : 

                        $links = array();

                        foreach ( $terms as $term ) {
                            $links[] = $term->name;
                        }

                        $tax_links = join( " ", str_replace(' ', '-', $links));          
                        $tax = strtolower($tax_links);
                    else :	
                        $tax = '';					
                    endif; 
                     $containerClass = $containerClass.' '.$tax; 
?>
            
                        <div class="home-featured-portfolio all mix <?php echo $containerClass; ?> ">

                            <div class="featured-portfolio-content">

                                <a href="<?php the_permalink(); ?>">

                                    <?php the_post_thumbnail('portfolio_feature_thumb'); ?>
                                    
                                    
                                </a>
                               
                            </div> <!--end .featured-post-content -->

                            <span>  
                                <h4 class="home-featured-portfolio-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
                                </h4>
                                 <?php 
                                    $terms = get_the_terms( $post->ID, 'portfolio_category' );	
                                    if ( $terms && ! is_wp_error( $terms ) ) : 

                                        foreach ( $terms as $term ) {
                                           echo $term->name;
                                        }

                                        $tax = $term;
                                    else :	
                                        $tax = '';
                                    echo $tax;
                                    endif; 
                                ?>
                           </span>
                            </div><!--end .home-featured-portfolio-->
                   
                        <?php $i+=1; ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <h2 class="center"><?php esc_html_e('Not Found', 'safari'); ?></h2>
                    <p class="center"><?php esc_html_e('Sorry, but you are looking for something that is not here', 'safari'); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
           </div>         
        </div> <!-- /#featured-portfolio -->
</section>
      
<?php
} if (!get_theme_mod('safari_front_featured_portfolio_check') && !get_theme_mod('safari_hide_sample_portfolio'))
    { // end Featured portfolio query ?>
   <section class="portfolio-area">
       <div class="container">
           <div class="row">
        <div class="home-portfolio-title-area" id="portfolio-title">
            <div class="home-portfolio-title section-title">
                <h3><?php esc_html_e('Recent Portfolio', 'safari') ?></h3>
                <p><?php esc_html_e('Portfolio Description Block.', 'safari') ?> </p>
                         
            </div>
    </div>
   

            <div id="featured-portfolio" class="clearfix">
                <div class="portfolio-wrap clearfix">
                    
                        <div class="home-featured-portfolio col-sm-4">

                            <div class="featured-portfolio-content">

                                <a href="#">
                                <img alt='' width="310" height="205" src='<?php echo get_template_directory_uri(); ?>/includes/images/img5.jpg' />
                                   
                                </a>
                               
                            </div> <!--end .featured-post-content -->

                            <a href="#">

                                <h4 class="home-featured-portfolio-title">Portfolio #1</h4>

                            </a>
                           
                        </div><!--end .home-featured-portfolio-->
                        
                        <div class="home-featured-portfolio col-sm-4">

                            <div class="featured-portfolio-content">

                                <a href="#">
                                <img alt='' width="310" height="205" src='<?php echo get_template_directory_uri(); ?>/includes/images/img6.jpg' />
                                   
                                </a>
                               
                            </div> <!--end .featured-post-content -->

                            <a href="#">

                                <h4 class="home-featured-portfolio-title">Portfolio #2</h4>

                            </a>
                           
                        </div><!--end .home-featured-portfolio-->
                        
                        <div class="home-featured-portfolio col-sm-4">

                            <div class="featured-portfolio-content">

                                <a href="#">
                                <img alt='' width="310" height="205" src='<?php echo get_template_directory_uri(); ?>/includes/images/feature2.jpg' />
                                   
                                </a>
                               
                            </div> <!--end .featured-post-content -->

                            <a href="#">

                                <h4 class="home-featured-portfolio-title">Portfolio #3</h4>

                            </a>
                           
                        </div><!--end .home-featured-portfolio-->
                   
           </div>         
        </div> <!-- /#featured-portfolio -->
           </div><!-- /.row -->
       </div><!-- /.container -->
   </section>
<?php } ?>
