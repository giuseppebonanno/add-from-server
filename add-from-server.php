<?php
namespace dd32\WordPress\AddFromServer;
/*
 * Plugin Name: Add From Server
 * Version: 3.4
 * Plugin URI: https://dd32.id.au/wordpress-plugins/add-from-server/
 * Description: Plugin to allow the Media Manager to add files from the webservers filesystem. <strong>Note:</strong> All files are copied to the uploads directory.
 * Author: Dion Hulse
 * Author URI: https://dd32.id.au/
 * Text Domain: add-from-server
 */

if ( !is_admin() ) {
	return;
}

const MIN_WP  = '5.0';
const MIN_PHP = '7.0';
const PLUGIN  = plugin_basename( __FILE__ );
const VERSION = '3.4';

// Old versions of WordPress or PHP
if (
	version_compare( $GLOBALS['wp_version'], MIN_WP, '<' )
	||
	version_compare( phpversion(), MIN_PHP, '<' )
) {
	include dirname( __FILE__ ) . '/old-versions.php';
} else {
	include __DIR__ . '/class.add-from-server.php';
}

Plugin::instance();
