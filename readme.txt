=== Old Browser ===
Contributors: La Drome laboratoire
Tags: redirection, older browsers, IE9, IE10
Requires at least: 4.9.9
Tested up to: 5.0.3
Stable tag: 1.0.0
Requires PHP: 7.2

One usefull redirection plugin for wordpress to address older browsers properly giving the visitor an helpfull message. This ask th user to upgrade its browser if possible giving the links.

== Description ==

= Old Browser =

This plugin deliver a simple basic HTML page to visitors using old browsers. The rules are matches against user agent. It uses regexp to recover browser name and version. 

At this time, is able to deliver French and English (default).

= How it works ? =

If the browser does not meet the minimum requirements set, the plugin serves the a very simple HTML page and quit the wordpress process. This allows almost any browser to parse it.

= Credits =

[La Drome Laboratoire](https://www.ladromelaboratoire.fr) developped it for its need and propose it to anyone.

= What's Next =

This plugin does not have any admin page. To update the behavior, you need to dig into the code. Sorry for that.
To modify your messages and logo, you need is modifying files in ./public folder
To support more language, you need to add the files in ./public and modify the old_browser_get_lang() function in main PHP file
To modify the redirect rules, you need to update ./include/browsers.php

== Installation ==

1. The installation is manual, please refer to public tutorials at this time

== Changelog ==

## [1.0.0] - 2019-02-12
* Inital release
