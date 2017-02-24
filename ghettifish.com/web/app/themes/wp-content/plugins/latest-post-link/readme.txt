=== Latest Post Link === 
Contributors: strange_attractor
Donate link: http://www.strangeattractor.ca/wp/donate/
Tags: latest, newest, recent, link, post, links, posts, permalink, title, most, query, navigation, webcomic, comic
Requires at least: 3.1.1
Tested up to: 3.5
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds commands that give you the permalink and title of the most recent post.

== Description ==

Provides a simple way to access the permalink and title of your most recent (newest) post.  You can use the functions in this plugin to link to the latest post from within your theme.  It can be useful for webcomics, welcome pages, and other places where you want this type of navigation.

== Installation ==

1. Extract the files from the archive
2. Upload the files to the wp-content/plugins folder of your Wordpress installation
3. Activate the plugin from the Wordpress Plugins Menu from an account with administrator access.

How to use:

This plugin adds two specific functions to your Wordpress installation: 
'latestpostlink_permalink' and 'latestpostlink_title'

They are similar to the 'the_permalink' and 'the_title' functions that are part of a Wordpress installation, except that they refer to only the most recent post in the blog.  

Example 1: Link with text saying "Latest >|" 
`<a href="<?php latestpostlink_permalink() ?>" title="Most Recent Post">Latest &gt;|</a>`

Example 2: Link with post title included
`<a href="<?php latestpostlink_permalink() ?>" title="Most Recent Post">Latest: <?php latestpostlink_title() ;?> &gt;|</a>`

== Screenshots ==

1. Here's an example of the plugin in use.  The red circle is around a link to the latest (newest) post.

== Changelog ==

= 0.1 = 
* The first version

== Upgrade Notice ==

= 0.1 =
No reason to upgrade yet.

== Frequently Asked Questions ==

Ask me a question, and there will be something to put in the FAQ.
