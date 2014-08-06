<?php

/* Template Name: Team Archive
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


get_header(); ?>

	<div class="main-content">
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12 col-md-8">

		<?php do_action( 'woothemes_our_team', array(
	'limit' 			=> 3,
	'display_author' 	=> false )
	); ?>
                            
                             </div>
                </div>
        </div>
</div>

<?php get_footer(); ?>
