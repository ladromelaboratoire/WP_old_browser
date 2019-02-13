<?php
defined( 'ABSPATH' ) or die();
/**
 * Plugin Name: Old Browser
 * Plugin URI:  https://github.com/ladromelaboratoire/old_browser
 * Description: Redirect old browsers to a simple HTML page helping visitor to upgrade its browser
 * Version:     1.0.0
 * Author:      La Drome Laboratoire
 * Author URI:  https://www.ladromelaboratoire.fr
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: old_browser
 * Domain Path:
 */
 
 define("OB_VERSION", "1.0.0");
 define("OB_BROWSER_ARRAY", "includes/browsers.php");
 
 //========== Plugin activation =================
 
 function activate_old_browser() {
	 
	 add_action('template_redirect', 'old_browser_headers', 1 );
 }
 register_activation_hook( __FILE__, 'activate_old_browser');
 
 
 function deactivate_old_browser() {
	 
	 remove_action('template_redirect', 'old_browser_headers', 1 );
 }
 register_deactivation_hook( __FILE__, 'deactivate_old_browser');
 
 //============= Plugin work force ===============
 

function old_browser_headers () {
	if (old_browser_need_redirect()) {
		old_browser_send_page();
		exit;
	}
}
add_action('template_redirect', 'old_browser_headers', 1 );


function old_browser_need_redirect() {
	require_once(plugin_dir_path( __FILE__ ) . OB_BROWSER_ARRAY);
	
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	
	foreach($browsers as $browser) {
		$matches =array();
		if (preg_match($browser["UA-regexp"], $useragent, $matches)) {
			//return values
			//true : redirect as browser is not allowed or version lower than minimum required 
			//false : browser identified and allowed
			return ( !(bool) $browser["Allowed"] || version_compare($browser["version-min"],$matches[2], ">")); 
		}
		//go to next browser in array
	}
	return false;
}

function old_browser_get_lang() {
	$lang_string = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	switch($lang_string) {
		case 'fr':
			return "fr_FR";
			break;
		default:
			return "en_EN";
			break;
	}
	//more languages to be added
}

function old_browser_get_logouri() {
	return get_bloginfo( $show = 'url', $filter = 'raw' ) . "/wp-content/plugins/old_browser/public/logo/logo.png";
}
function old_browser_get_page() {
	return file_get_contents(plugin_dir_path( __FILE__ ) . "/public/" .  old_browser_get_lang() . "/index.htm");
}

function old_browser_send_page() {
	echo preg_replace('/img_uri/', old_browser_get_logouri(), old_browser_get_page());
	exit;
}
?>