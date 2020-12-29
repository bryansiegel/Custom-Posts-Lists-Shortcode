<?php 
/*
Plugin Name: Custom Post List Shortcode
Description: Wordpress simple custom post list shortcode. (posts_per_page and orderby parameters)
Plugin URI: https://bryansiegel.com
Author: Bryan Siegel
Version: 1.0
*/

//deny direct access
if( ! defined('ABSPATH')) { exit; }

//get dependencies
require_once plugin_dir_path(__FILE__) . 'includes/core-functions.php';
