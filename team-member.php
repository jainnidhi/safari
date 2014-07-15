<?php

/* Template Name: Team Archive
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


get_header(); ?>

	

		<?php do_action( 'woothemes_our_team', array(
	'limit' 			=> 2,
	'display_author' 	=> false )
	); ?>

<?php get_footer(); ?>
