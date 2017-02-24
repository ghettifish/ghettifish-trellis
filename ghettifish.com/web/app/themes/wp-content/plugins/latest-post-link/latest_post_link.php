<?php
/*
Plugin Name: Latest Post Link
Plugin URI: http://www.strangeattractor.ca/wp/latest-post-link/
Description: Adds commands that give you the permalink and title of the most recent post.
Version: 0.1
Author: Ellen Kaye-Cheveldayoff
Author URI: http://www.strangeattractor.ca/wp/
License: GPLv2
*/
function latestpostlink_permalink() {

    // Query the database for the most recent post
    $mostrecentpost = new WP_Query();
    $mostrecentpost->query('showposts=1');

    if ($mostrecentpost->have_posts()) {

        $mostrecentpost->the_post(); 
        $latestlink=the_permalink();
        echo $latestlink;
    }

    // Prevent the loop in this function from interfering with other loops.
    wp_reset_postdata();

}

function  latestpostlink_title() {
		
    // Query the database for the most recent post
    $mostrecentpost = new WP_Query('showposts=1');

    if ($mostrecentpost->have_posts()) {

        $mostrecentpost->the_post(); 
        $latesttitle = the_title();		
        echo $latesttitle;
    }

    // Prevent the loop in this function from interfering with other loops.
    wp_reset_postdata();
}
?>
<?php
/*  Copyright 2011  Ellen Kaye-Cheveldayoff  (email : ellen-wp@strangeattractor.ca)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
