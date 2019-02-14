<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*****************
*	Array for template strings
*	v 1.0.0
*	Fevrier 2019
*	Author La Drome Laboratoire
*
*
******************/

$strings["pattern"][] = "/site_title/";
$strings["pattern"][] = "/site_url/";
$strings["pattern"][] = "/logo_url/";

$strings["repl"][] = get_bloginfo('name');
$strings["repl"][] = get_bloginfo('url');
$strings["repl"][] = OB_get_logouri();

?>