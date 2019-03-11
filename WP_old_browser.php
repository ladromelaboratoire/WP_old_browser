<?php
defined( 'ABSPATH' ) or die();
/**
 * Plugin Name: WP Old Browser
 * Plugin URI:  https://github.com/ladromelaboratoire/WP_old_browser
 * Description: Redirect old browsers to a simple HTML page helping visitor to upgrade its browser
 * Version:     1.2.0
 * Author:      La Drome Laboratoire
 * Author URI:  https://www.ladromelaboratoire.fr
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: WP_old_browser
 * Domain Path:
 */
 
 define("OB_VERSION", "1.2.0");
 define("OB_BROWSER_ARRAY", "includes/browsers.php");
 define("OB_STRINGS_ARRAY", "includes/strings.php");
 define("OB_REDIRECT_PATH", "not_supported");
 define("OB_PLUGIN_PATH", "wp_old_browser/");
 
 //========== Plugin activation =================
 
 function OB_activate() {
	 //template_redirect - old one
	 add_action('send_headers', 'OB_headers', 1 );
 }
 register_activation_hook( __FILE__, 'OB_activate');
 
 
 function OB_deactivate() {
	 //template_redirect - old one
	 remove_action('send_headers', 'OB_headers', 1 );
 }
 register_deactivation_hook( __FILE__, 'OB_deactivate');
 
 //============= Plugin work force ===============
 
/*
 *	Check if the user has a proper browser
 *	Check if the query string is a redirect to not_supported
 *	Serve page or redirect
 */
function OB_headers () {
	if (OB_need_redirect()) {
		if (OB_query_string()) {
			OB_send_page();
			exit;
		}
		else {
			wp_redirect(get_bloginfo('url')."/".OB_REDIRECT_PATH);
			exit;
		}
	}
}
add_action('send_headers', 'OB_headers', 1 );

/*
 *	Check browser requirements
 *	
 */
function OB_need_redirect() {
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

/*
 *	Get browser main language
 *	
 */
function OB_get_lang() {
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

/*
 *	Get URI logo to adapt into HTML template
 *	
 */
function OB_get_logouri() {
	if (defined('WP_CONTENT_URL')) {
		//easiest way
		return WP_CONTENT_URL . "/plugins/" . OB_PLUGIN_PATH . "public/logo/logo.png";
	}
	else if (defined ('WP_CONTENT_DIR')){
		//try to rebuild the public path
		return get_bloginfo( $show = 'url', $filter = 'raw' ) . WP_CONTENT_DIR . "/plugins/" . OB_PLUGIN_PATH . "public/logo/logo.png";
	}
	else {
		//leave empty overwise
		return "";
	}
}

/*
 *	Get HTML template on local path
 *	
 */
function OB_get_page() {
	return file_get_contents(plugin_dir_path( __FILE__ ) . "/public/" .  OB_get_lang() . "/index.htm");
}

/*
 *	Send page
 *	
 */
function OB_send_page() {
	require_once(plugin_dir_path( __FILE__ ) . OB_STRINGS_ARRAY);
	echo preg_replace($strings["pattern"], $strings["repl"], OB_get_page());
	exit;
}

/*
 *	Search query string to detect not_supported redirection
 *	
 */
function OB_query_string() {
	$uri = $_SERVER['REQUEST_URI'];
	
	if (preg_match("/".OB_REDIRECT_PATH."/", $uri) == 1) {
		//we are on a redirect case
		return true;
	}
	else {
		return false;
	}
}
?>