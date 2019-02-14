=== Old Browser ===
Contributors: La Drome laboratoire
Tags: redirection, older browsers, IE9, IE10
Requires at least: 4.9.9
Tested up to: 5.0.3
Stable tag: 1.0.1
Requires PHP: 7.2

Redirection wordpress plugin to address older browsers properly giving the visitor an helpful message. The page suggest the user to upgrade its browser if possible giving the links.

== Description ==

= Old Browser =

This plugin deliver a basic HTML page to visitors using old browsers. The rules are matched against user agent. It uses regexp to recover browser name and version. The plugin has been developped using the KISS principle : do the job efficiently, simply and silently. That means no admin page, no database use.

At this time, is able to deliver French and English (default).

= How it works ? =

If the browser does not meet the minimum requirements set, the plugin serves the a very simple HTML page and quit the wordpress process. This allows almost any browser to parse it.

= Credits =

[La Drome Laboratoire](https://www.ladromelaboratoire.fr) developped it for its need and propose it to anyone.

= What's Next =

To update the behavior, you need to dig into the code.
To modify your messages and logo, you need is modifying files in ./public folder
To support more language, you need to add the files in ./public and modify the OB_get_lang() function in main PHP file
To modify the redirect rules, you need to update ./include/browsers.php

== Installation ==

1. The installation is manual, please refer to public tutorials at this time

== Changelog ==

## [1.0.0] - 2019-02-12
* Inital release

## [1.0.1] - 2019-02-14
* Update old_browser_get_logouri() to support non standard content path, update template fill-in to work on any wordpress instance, create a template

## [1.1.0] - 2019-02-14
* Modify Old browsers handling by 1/ redirecting to a specific path and 2/ serve the simple HTML to visitor. This alows usage with caching system
* Normalize functions naming