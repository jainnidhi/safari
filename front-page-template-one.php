<?php
/**
 * Template Name: Front Page One
 * Description: Displays a full-width front page. The front page template provides an optional
 * featured section that allows for highlighting a key message. It can contain up to 2 widget areas,
 * in one or two columns. These widget areas are dynamic so if only one widget is used, it will be
 * displayed in one column. If two are used, then they will be displayed over 2 columns.
 * There are also four front page only widgets displayed just beneath the two featrued widgets. Like the
 * featured widgets, they will be displayed in anywhere from one to four columns, depending on
 * how many widgets are active.
 * 
 * The front page template also displays EDD featured products and featured posts 
 * depending on the settings from Theme Customizer 
 *
 * @package Safari
 * @since Safari 1.0
 */
get_header();
?>

<section class="slider-wrapper clearfix">
      <div class="flexslider col-sm-12"  id="main-slider">
        <ul class="slides">
            <?php 
            // check if the slider is blank.
            // if there are no slides by user then load default slides. 
            
            if ( get_theme_mod('slider_one') =='' ) {  ?>
                <li>
                <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/home-featured.jpg" alt="first-slider-image"/>
                <div class="flex-caption">
                    <div class="slider-text-container">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'safari') ?></a></h2>
                          <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'safari') ?> </p>
                          <a class="slider-button one" href="#">
                            <?php esc_html_e('Live Demo', 'safari') ?>
                        </a>
                          <a class="slider-button two" href="#">
                            <?php esc_html_e('View Work', 'safari') ?>
                        </a>
                    </div>
                </div>
                </li>
                
                <li>
                <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/home-featured.jpg" alt="second-slider-image"/>
                <div class="flex-caption">
                    <div class="slider-text-container">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'safari') ?></a></h2>
                          <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'safari') ?> </p>
                           <a class="slider-button one" href="#">
                            <?php esc_html_e('Live Demo', 'safari') ?>
                        </a>
                          <a class="slider-button two" href="#">
                            <?php esc_html_e('View Work', 'safari') ?>
                        </a>
                    </div>
                 </div>
                </li>
                
                <li>
                <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/slider2.jpg" alt=""/>
                <div class="flex-caption">
                    <div class="slider-text-container">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'safari') ?></a></h2>
                          <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'safari') ?> </p>
                           <a class="slider-button one" href="#">
                            <?php esc_html_e('Live Demo', 'safari') ?>
                        </a>
                          <a class="slider-button two" href="#">
                            <?php esc_html_e('View Work', 'safari') ?>
                        </a>
                    </div>
                 </div>
                </li>
            <?php } ?>
                
          <?php 
          // if user adds a cusotm slide then display the slides 
          // load first slide
          if ( get_theme_mod('slider_one') !='' ) {  ?>
                    <li id="slider1" class="home-slider"> 
                        <img href="<?php if ( get_theme_mod('slider_one_url') !='' ) { echo esc_url(get_theme_mod('slider_one_url')); } ?>" src="<?php echo esc_url(get_theme_mod('slider_one')); ?>" alt=""/>
                        <?php if ( get_theme_mod('slider_title_one') !='' || get_theme_mod('slider_one_url') !='' || get_theme_mod('slider_one_description') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="slider-text-container">
                                <h2 class="slider-title"><a href="<?php echo esc_url(get_theme_mod('slider_one_url')); ?>"><?php echo esc_html(get_theme_mod('slider_title_one')); ?></a></h2>
                                    <p><?php echo esc_html(get_theme_mod('slider_one_description')); ?></p>
                                
                            <?php if ( get_theme_mod('slider_one_button_one_url') !='' && get_theme_mod('slider_one_button_one_text') !=''  ) {  ?>
                                <a class="slider-button one" href="<?php echo esc_url(get_theme_mod('slider_one_button_one_url')); ?>">
                                    <?php  echo esc_html(get_theme_mod('slider_one_button_one_text')); ?>
                                </a> 
                                <?php } ?> 
                             <?php if ( get_theme_mod('slider_one_button_two_url') !='' && get_theme_mod('slider_one_button_two_text') !=''  ) {  ?>
                                <a class="slider-button two" href="<?php echo esc_url(get_theme_mod('slider_one_button_two_url')); ?>">
                                    <?php  echo esc_html(get_theme_mod('slider_one_button_two_text')); ?>
                                </a> 
                                <?php } ?> 
                            </div>
                         </div>
                         <?php } ?>
                    </li>
                    
                     <?php 
                     // load second slide
                     if ( get_theme_mod('slider_two') !='' ) {  ?>
                    <li id="slider2" class="home-slider"> 
                        <img href="<?php if ( get_theme_mod('slider_two_url') !='' ) { echo esc_url(get_theme_mod('slider_two_url')); } ?>" src="<?php echo esc_url(get_theme_mod('slider_two')); ?>" alt=""/>
                       
                     <?php if ( get_theme_mod('slider_title_two') !='' || get_theme_mod('slider_two_url') !='' || get_theme_mod('slider_two_description') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="<?php echo esc_url(get_theme_mod('slider_two_url')); ?>"><?php echo esc_html(get_theme_mod('slider_title_two')); ?></a></h2>
                                <p><?php echo esc_html(get_theme_mod('slider_two_description')); ?></p>
                                
                            <?php if ( get_theme_mod('slider_two_button_one_url') !='' && get_theme_mod('slider_two_button_one_text') !=''  ) {  ?>
                          <a class="slider-button one" href="<?php echo esc_url(get_theme_mod('slider_two_button_one_url')); ?>">
                              <?php  echo esc_html(get_theme_mod('slider_two_button_one_text')); ?>
                          </a> 
                          <?php } ?> 
                       <?php if ( get_theme_mod('slider_two_button_two_url') !='' && get_theme_mod('slider_two_button_two_text') !=''  ) {  ?>
                          <a class="slider-button two" href="<?php echo esc_url(get_theme_mod('slider_two_button_two_url')); ?>">
                              <?php  echo esc_html(get_theme_mod('slider_two_button_two_text')); ?>
                          </a> 
                          <?php } ?> 
                            </div>
                         </div>
                         <?php } ?>
                    </li>
                     <?php } ?>
                    
                    <?php
                    // load third slide
                    if ( get_theme_mod('slider_three') !='' ) {  ?>
                    <li id="slider3" class="home-slider">  
                        <img href="<?php if ( get_theme_mod('slider_three_url') !='' ) { echo esc_url(get_theme_mod('slider_three_url')); } ?>" src="<?php echo esc_url(get_theme_mod('slider_three')); ?>" alt=""/>
                       
                   <?php if ( get_theme_mod('slider_title_three') !='' || get_theme_mod('slider_three_url') !='' || get_theme_mod('slider_three_description') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="<?php echo esc_url(get_theme_mod('slider_three_url')); ?>"><?php echo esc_html(get_theme_mod('slider_title_three')); ?></a></h2>
                              <p><?php echo esc_html(get_theme_mod('slider_three_description')); ?></p>
                              
                        <?php if ( get_theme_mod('slider_three_button_one_url') !='' && get_theme_mod('slider_three_button_one_text') !=''  ) {  ?>
                        <a class="slider-button one" href="<?php echo esc_url(get_theme_mod('slider_three_button_one_url')); ?>">
                            <?php  echo esc_html(get_theme_mod('slider_three_button_one_text')); ?>
                        </a> 
                        <?php } ?> 
                     <?php if ( get_theme_mod('slider_three_button_two_url') !='' && get_theme_mod('slider_three_button_two_text') !=''  ) {  ?>
                        <a class="slider-button two" href="<?php echo esc_url(get_theme_mod('slider_three_button_two_url')); ?>">
                            <?php  echo esc_html(get_theme_mod('slider_three_button_two_text')); ?>
                        </a> 
                        <?php } ?> 
                            </div>
                         </div>
                   <?php } ?>
                    </li>
                     <?php } ?>
                    
                    <?php 
                    // load fourth slide
                    if ( get_theme_mod('slider_four') !='' ) {  ?>
                    <li id="slider4" class="home-slider"> 
                        <img href="<?php if ( get_theme_mod('slider_four_url') !='' ) { echo esc_url(get_theme_mod('slider_four_url')); } ?>" src="<?php echo esc_url(get_theme_mod('slider_four')); ?>" alt=""/>
                       
                    <?php if ( get_theme_mod('slider_title_four') !='' || get_theme_mod('slider_four_url') !='' || get_theme_mod('slider_four_description') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="<?php echo esc_url(get_theme_mod('slider_four_url')); ?>"><?php echo esc_html(get_theme_mod('slider_title_four')); ?></a></h2>
                                <p><?php echo esc_html(get_theme_mod('slider_four_description')); ?></p>
                                
                            <?php if ( get_theme_mod('slider_four_button_one_url') !='' && get_theme_mod('slider_four_button_one_text') !=''  ) {  ?>
                          <a class="slider-button one" href="<?php echo esc_url(get_theme_mod('slider_four_button_one_url')); ?>">
                              <?php  echo esc_html(get_theme_mod('slider_four_button_one_text')); ?>
                          </a> 
                          <?php } ?> 
                       <?php if ( get_theme_mod('slider_four_button_two_url') !='' && get_theme_mod('slider_four_button_two_text') !=''  ) {  ?>
                          <a class="slider-button two" href="<?php echo esc_url(get_theme_mod('slider_four_button_two_url')); ?>">
                              <?php  echo esc_html(get_theme_mod('slider_four_button_two_text')); ?>
                          </a> 
                          <?php } ?> 
                            </div>
                        </div>
                    <?php } ?>
                    </li>
                     <?php } ?>
                         
                    <?php
                    // load fifth slide
                    if ( get_theme_mod('slider_five') !='' ) {  ?>
                    <li id="slider5" class="home-slider">  
                                <img href="<?php if ( get_theme_mod('slider_five_url') !='' ) { echo esc_url(get_theme_mod('slider_five_url')); } ?>" src="<?php echo esc_url(get_theme_mod('slider_five')); ?>" alt=""/>
                         
                    <?php if ( get_theme_mod('slider_title_five') !='' || get_theme_mod('slider_five_url') !='' || get_theme_mod('slider_five_description') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="<?php echo esc_url(get_theme_mod('slider_five_url')); ?>"><?php echo esc_html(get_theme_mod('slider_title_five')); ?></a></h2>
                              <p><?php echo esc_html(get_theme_mod('slider_five_description')); ?></p>
                              
                        <?php if ( get_theme_mod('slider_five_button_one_url') !='' && get_theme_mod('slider_five_button_one_text') !=''  ) {  ?>
                        <a class="slider-button one" href="<?php echo esc_url(get_theme_mod('slider_five_button_one_url')); ?>">
                            <?php  echo esc_html(get_theme_mod('slider_five_button_one_text')); ?>
                        </a> 
                        <?php } ?> 
                     <?php if ( get_theme_mod('slider_five_button_two_url') !='' && get_theme_mod('slider_five_button_two_text') !=''  ) {  ?>
                        <a class="slider-button two" href="<?php echo esc_url(get_theme_mod('slider_five_button_two_url')); ?>">
                            <?php  echo esc_html(get_theme_mod('slider_five_button_two_text')); ?>
                        </a> 
                        <?php } ?> 
                            </div>
                         </div>
                    <?php } ?>
                    </li>
                     <?php } ?>
           <?php } ?>
        </ul>
      </div>
</section><!-- /.slider-wrapper -->
       
    <section class="home-featured-area">
        <div class="container">
                <div class="row">
            <div class="home-featured col-sm-12">
                <div class="home-featured-one col-sm-3">
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

                <div class="home-featured-two  col-sm-3">
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
                          <p><?php esc_html_e('Show your multiple services that will explore your website among the audience.', 'safari') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_two_link_url') !='' ) { echo esc_url(get_theme_mod('home_two_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_two_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_two_link_text')); ?>

                  <?php } else {  ?> <?php esc_html_e('Read More', 'safari') ?>
                           <?php } ?></a>
                </div>


                <div class="home-featured-three col-sm-3">
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
                
                <div class="home-featured-four col-sm-3">
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
          </div><!-- /.row -->
        </div><!-- /.container -->
     </section><!-- end home featured area -->
     
     <?php get_template_part('content','frontportfolio'); ?>
     
  
     <!-- Home testimonial slider starts here --> 
 <section class="testimonial-area">
   <div class="container">
    <div class="row"> 
        <div class="home-testimonial-title-area" id="post-title">
            <div class="home-testimonial-title section-title">
                 <?php if ( get_theme_mod('safari_testimonial_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('safari_testimonial_title')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Testimonial', 'safari') ?></h3>
                           <?php } ?>
                  
                   <?php if ( get_theme_mod('testimonial_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('testimonial_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('Testimonial Description Block.', 'safari') ?> </p>
                                            <?php } ?>
            </div>
        </div>
  <div class="testimonial-slider">
    <div class="flexslider" id="reviewslider">
      
        <ul class="slides">
            <?php if ( get_theme_mod('tslider_one_description') =='' ) {  ?>
                <li id="tslider1">
                <div class="flex-caption">
                    <div class="client-testimonial">
                        <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'safari') ?> </p>
                    </div>
                    <div class="client-name">
                         <a class="client" href="#">
                            <?php esc_html_e('-John', 'safari') ?>
                        </a>
                    </div>
               </div>
            </li>

            <li id="tslider2">
                <div class="flex-caption">
                    <div class="client-testimonial">
                       <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'safari') ?> </p>                  
                    </div>
                    <div class="client-name">
                         <a class="client" href="#">
                            <?php esc_html_e('-John', 'safari') ?>
                        </a>
                    </div>
                </div>
            </li>

             <li id="tslider3">
                <div class="flex-caption">
                    <div class="client-testimonial">
                        <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'safari') ?> </p>
                    </div>
                    <div class="client-name">
                         <a class="client" href="#">
                            <?php esc_html_e('-John', 'safari') ?>
                        </a>
                    </div>
                </div>
            </li>

            <li id="tslider4">
                <div class="flex-caption">
                    <div class="client-testimonial">
                        <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'safari') ?> </p>
                    </div>
                    <div class="client-name">
                         <a class="client" href="#">
                            <?php esc_html_e('-John', 'safari') ?>
                        </a>
                    </div>
                </div>
            </li>

            <li id="tslider5">
                <div class="flex-caption">
                    <div class="client-testimonial">
                        <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'safari') ?> </p>
                    </div>
                    <div class="client-name">
                         <a class="client" href="#">
                            <?php esc_html_e('-John', 'safari') ?>
                        </a>
                    </div>
                </div>
            </li>
            <?php } ?>

             <?php if ( get_theme_mod('tslider_one_description') !='' ) {  ?>
            <li id="tslider1">
              <?php if (get_theme_mod('client_name_url_one') !='' || get_theme_mod('client_name_one') !='' ) {  ?>
                <div class="flex-caption">
                    <div class="client-testimonial">
                        <?php echo wpautop(esc_html(get_theme_mod('tslider_one_description'))); ?>
                    </div>
                    <div class="client-name">
                         <a href="<?php echo esc_url(get_theme_mod('client_name_url_one')); ?>">
                             <?php echo esc_html(get_theme_mod('client_name_one')); ?>
                         </a>
                    </div>
               </div>
              <?php } ?>
            </li>

            <?php if ( get_theme_mod('tslider_two_description') !='' ) {  ?>
            <li id="tslider2">
             <?php if ( get_theme_mod('client_name_url_two') !='' || get_theme_mod('client_name_two') !='' ) {  ?>
                <div class="flex-caption">
                    <div class="client-testimonial">
                        <?php echo wpautop(esc_html(get_theme_mod('tslider_two_description'))); ?>
                    </div>
                    <div class="client-name">
                         <a href="<?php echo esc_url(get_theme_mod('client_name_url_two')); ?>">
                             <?php echo esc_html(get_theme_mod('client_name_two')); ?>
                         </a>
                    </div>
                </div>
             <?php } ?>
            </li>
            <?php } ?>

             <?php if ( get_theme_mod('tslider_three_description') !='' ) {  ?>
             <li id="tslider3"> 
             <?php if (get_theme_mod('client_name_url_three') !='' || get_theme_mod('client_name_three') !='' ) {  ?>
                <div class="flex-caption">
                    <div class="client-testimonial">
                        <?php echo wpautop(esc_html(get_theme_mod('tslider_three_description'))); ?>
                    </div>
                    <div class="client-name">
                         <a href="<?php echo esc_url(get_theme_mod('client_name_url_three')); ?>">
                             <?php echo esc_html(get_theme_mod('client_name_three')); ?>
                         </a>
                    </div>
                 </div>
             <?php } ?>
            </li>
             <?php } ?>

             <?php if ( get_theme_mod('tslider_four_description') !='' ) {  ?>
             <li id="tslider4"> 
              <?php if ( get_theme_mod('client_name_url_four') !='' || get_theme_mod('client_name_four') !='' ) {  ?>
                <div class="flex-caption">
                    <div class="client-testimonial">
                        <?php echo wpautop(esc_html(get_theme_mod('tslider_four_description'))); ?>
                    </div>
                    <div class="client-name">
                         <a href="<?php echo esc_url(get_theme_mod('client_name_url_four')); ?>">
                             <?php echo esc_html(get_theme_mod('client_name_four')); ?>
                         </a>
                    </div>
               </div>
              <?php } ?>
            </li>
             <?php } ?>

             <?php if ( get_theme_mod('tslider_five_description') !='' ) {  ?>
             <li id="tslider5"> 
                <?php if ( get_theme_mod('client_name_url_five') !='' || get_theme_mod('client_name_five') !='' ) {  ?>
                <div class="flex-caption">
                    <div class="client-testimonial">
                        <?php echo wpautop(esc_html(get_theme_mod('tslider_five_description'))); ?>
                    </div>
                    <div class="client-name">
                         <a href="<?php echo esc_url(get_theme_mod('client_name_url_five')); ?>">
                             <?php echo esc_html(get_theme_mod('client_name_five')); ?>
                         </a>
                    </div>
                 </div>
                <?php } ?>
            </li>
                <?php } ?>
         <?php } ?>

       </ul>
      
    </div>
    </div><!-- /.testimonial-slider -->
   </div><!-- /.row -->
   </div><!-- /.container -->
 </section><!-- /.testimonial-area -->

         <span class="top"><a class="back-to-top"><i class="fa fa-arrow-up"></i></a></span>
            
  
<?php
get_footer();
?>