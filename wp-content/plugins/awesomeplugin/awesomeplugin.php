<?php
/*
Plugin Name: Awesomeness Creator
Plugin URI: http://noibe.com
Description: A plugin to create awesomeness and spread joy
Version: 1.0
Author: Eduardo Barros
Author URI: http://barros.noibe.com
License: MIT
*/

add_action('admin_menu', 'a_plugin_menu');
function a_plugin_menu()
{
//	add_options_page('Do Awesomeness!', 'Do Awesomeness!', 'manage_options', 'awesomeness-options', 'awesomeness_plugin_options');
	add_menu_page('Do awesomeness!', 'Awesomeness', 'manage_options', 'awesomeplugin/awesome-admin.php', '', '', 99);
}