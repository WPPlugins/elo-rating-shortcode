<?php
/*
Plugin Name: Elo Rating Shortcode
Plugin URI: http://zenoweb.nl
Description: Add a Calculator for Elo Rating to your website with a simple shortcode.
Version: 1.0.0
Author: Marcel Pol
Author URI: http://zenoweb.nl
Text Domain: elo-rating-shortcode
Domain Path: /lang/
*/


/*
	Copyright 2015 - 2016  Marcel Pol (email: marcel@zenoweb.nl)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Plugin Version
define('ELO_RATING_SHORTCODE_VER', '1.0.0');


/*
 * Really only load this when our shortcode runs.
 */
function elo_rating_shortcode_init() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('elo-rating-shortcode-js', plugins_url('elo-rating-shortcode.js', __FILE__), array('jquery'), ELO_RATING_SHORTCODE_VER, true);

	//wp_enqueue_style( 'elo-rating-shortcode-css', plugins_url('elo-rating-shortcode.css', __FILE__), false, ELO_RATING_SHORTCODE_VER, 'all' );
}


/*
 * Load Language files for frontend and backend.
 */
function elo_rating_shortcode_load_lang() {
        load_plugin_textdomain( 'elo-rating-shortcode', false, plugin_basename(dirname(__FILE__)) . '/lang' );
}
add_action('plugins_loaded', 'elo_rating_shortcode_load_lang');


/* Include the shortcodes. */
include('shortcodes.php');

