<?php
/**
 * The template for displaying featured team members on Front Page 
 *
 * @package Passion
 * @since Passion 1.0
 */
?>

<?php
	
if (get_theme_mod('safari_front_team_members_check')) {
    $featured_count = intval(get_theme_mod('safari_front_team_members_count'));
    if (get_theme_mod('safari_team_members_count')) {
    $grid_count =intval(get_theme_mod('safari_team_members_count'));
    }
    else {
        $grid_count = 3; 
    }
    $featured_team_args = array(
        'post_type' => 'team-member',
        'posts_per_page' => $featured_count,
    );
    $featuredteam = new WP_Query($featured_team_args);
    ?>
<section class="team-member-area">
    <div class="container">
                <div class="row">
    <div class="team-member-title-area" id="team-title">
            <div class="team-member-title section-title">
                 <?php if ( get_theme_mod('safari_team_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('safari_team_title')); ?></h3>
                  <?php } else {  ?> <h3 class="title"><?php esc_html_e('Team', 'safari') ?></h3>
                           <?php } ?>
                  
                   <?php if ( get_theme_mod('team_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('team_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('Members', 'safari') ?> </p>
                                            <?php } ?>
            </div>
    </div>
   

            <div id="featured-team-members" class="clearfix">
                <div class="members-wrap clearfix">
                
                <?php if ($featuredteam->have_posts()) : $i = 1; ?>

                    <?php while ($featuredteam->have_posts()) : $featuredteam->the_post(); ?>

                        <?php 
// Start a new query for displaying team members on Front Page
   
	$team_member_email 	= esc_attr( get_post_meta( $post->ID, '_gravatar_email', true ) );
	$user 				= esc_attr( get_post_meta( $post->ID, '_user_id', true ) );
	$user_search 		= esc_attr( get_post_meta( $post->ID, '_user_search', true ) );
	$twitter 			= esc_attr( get_post_meta( $post->ID, '_twitter', true ) );
	$role 				= esc_attr( get_post_meta( $post->ID, '_byline', true ) );
	$url 				= esc_attr( get_post_meta( $post->ID, '_url', true ) );
        $facebook                         = esc_attr( get_post_meta( $post->ID, '_facebook', true ) );
        ?>
                    
                    <?php $containerClass = "grid_" . 12 / $grid_count . "_of_12"; ?>
                        <div class="home-featured-team col <?php echo $containerClass ?>">

                            <div class="featured-team-content clearfix">

                               <?php if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} elseif ( isset( $team_member_email ) && ( '' != $team_member_email ) ) {
					echo '<div itemprop="image">' .  get_avatar( $team_member_email, 250 ) . '</div>';
				} ?>
                                
                                <h4 class="home-team-member-title">
                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                                </h4>
                                <p class="team-member-role">
                                    <?php if($role) {
                                        echo $role;
                                    } ?>
                                    
                                </p>
                                
                                 <div class="team-meta">
                                        <?php
                                        echo '<ul class="author-details">';
 
				
 
				if ( apply_filters( 'woothemes_our_team_member_user_id', true ) ) {
					if ( 0 == $user && '' != $user_search ) {
						$user = get_user_by( 'slug', $user_search );
						if ( $user ) {
							$user = $user->ID;
						}
					}
 
					
						echo '<li class="our-team-author-archive" itemprop="url"><a href="' . get_author_posts_url( $user ) . '">' . sprintf( __( 'Read posts by %1$s', 'woothemes' ), get_the_title() ) . '</a></li>' . "\n";
					
				}
 
				if ( '' != $twitter && apply_filters( 'woothemes_our_team_member_twitter', true ) ) {
					echo '<li class="our-team-twitter twitter" itemprop="contactPoint"><a href="//twitter.com/' . esc_html( $twitter ) . '"class="our-team-twitter" ><span>' . esc_html( $twitter ) . '</span></a></li>'  . "\n";
				}
 
                                if ( '' != $facebook ) {
					echo '<li class="our-team-facebook facebook" itemprop="contactPoint"><a href="//facebook.com/' . esc_html( $facebook ) . '" class="our-team-facebook" > <span>' . esc_html( $facebook ) . '</span></a></li>'  . "\n";
				}
				// $author .= apply_filters( 'woothemes_our_member_fields_display', $member_fields );
 
				echo '</ul>';
 
                                        
                                ?>
                            </div><!-- .team-meta -->
                            </div> <!--end .featured-post-content -->
                           
                           
                        </div><!--end .home-featured-team-->
                  
                        <?php $i+=1; ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <h2 class="center"><?php esc_html_e('Not Found', 'safari'); ?></h2>
                    <p class="center"><?php esc_html_e('Sorry, but you are looking for something that is not here', 'safari'); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
           </div>         
        </div> <!-- /#featured-team-members -->
     </div><!-- /.row -->
        </div><!-- /.container -->
</section>
      
<?php
} else { // end Featured team query ?>
  <section class="team-member-area">
      <div class="container">
                <div class="row">
    <div class="team-member-title-area" id="team-title">
            <div class="team-member-title section-title">
                <h3 class="title"><?php esc_html_e('Team', 'safari') ?></h3>
                    <p><?php esc_html_e('Members', 'safari') ?> </p>
                                         
            </div>
    </div>
   

            <div id="featured-team-members" class="clearfix">
                <div class="members-wrap clearfix">
               
                        <div class="home-featured-team col-sm-4" id="member-one">

                            <div class="featured-team-content">
                                <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/team1.jpg" alt=""/>
                                   
                                        <h4 class="home-team-member-title">John</h4>
                                    <p class="team-member-role">
                                    Developer                                 
                                </p>
                                <div class="team-meta">
                                <ul>
                                    <li class="twitter">
                                        <a href="twitter.com">
                                            <span> Twitter</span>
                                        </a>
                                    </li>
                                    <li class="facebook">
                                        <a href="facebook.com">
                                            <span> Facebook</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            </div> <!--end .featured-post-content -->
                            
                        </div><!--end .home-featured-team-->
                        
                        <div class="home-featured-team col-sm-4" id="member-two">

                            <div class="featured-team-content">
                                <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/team2.jpg" alt=""/>
                                   
                                        <h4 class="home-team-member-title">Johny</h4>
                                    <p class="team-member-role">Designer  </p>
                                    <div class="team-meta">
                                <ul>
                                    <li class="twitter">
                                        <a href="twitter.com">
                                            <span> Twitter</span>
                                        </a>
                                    </li>
                                    <li class="facebook">
                                        <a href="facebook.com">
                                            <span> Facebook</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            </div> <!--end .featured-post-content -->
                            
                        </div><!--end .home-featured-team-->
                        
                        <div class="home-featured-team col-sm-4" id="member-three">

                            <div class="featured-team-content">
                                <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/team3.jpg" alt=""/>
                                   <h4 class="home-team-member-title">Bob</h4>
                                   <p class="team-member-role">
                                    Developer                                   
                                </p>
                                
                                <div class="team-meta">
                                <ul>
                                    <li class="twitter">
                                        <a href="twitter.com">
                                            <span> Twitter</span>
                                        </a>
                                    </li>
                                    <li class="facebook">
                                        <a href="facebook.com">
                                            <span> Facebook</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            </div> <!--end .featured-post-content -->
                            
                        </div><!--end .home-featured-team-->
                  
                </div>         
            </div> <!-- /#featured-team-members -->
      </div><!-- /.row -->
        </div><!-- /.container -->
</section>
<?php } ?>
