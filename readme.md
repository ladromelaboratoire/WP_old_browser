# WP Old Browser

This plugins helps managing older browsers while visiting a Wordpress prowered web-site.
It delivers to visitor a proper web page which explain the incompatibility and the process to upgrade the the web-browser through useful links.
The simple HTML served may be supported by any browser.

It has been developped to do the job simply, efficiently, silently. That means no admin page, no database use.

# Plugin description

## Revision history
	v1.0.0	2019-02-12	First release of the plugin
	v1.0.1	2019-02-14	Update old_browser_get_logouri() to support non standard content path, update template fill-in to work on any wordpress instance, create a template
	v1.1.0	2019-02-14	Modify Old browsers handling by 1/ redirecting to a specific path and 2/ serve the simple HTML to visitor. This alows usage with caching system - Normalize functions naming
	v1.2.0	2019-03-11	Rename plugin for management effectiveness on Git, Modify browsers altenatives
	v1.2.1	2019-03-11	Change index.php files to redirect script kiddies
	
	
## Features
The following features are included
 - Filters on the User-Agent basis
 - Filters by Browser & by version
 - Delivers message in French or English
 - Support caching by redirecting first to a "not_supported" path

The following features are not included
 - Admin page


## To do

 - Add support for more languages

# Dependencies

	PHP >= 7.1.0 (should be working from 5.4 but untested)
	Wordpress >= 4.9.9 (untested with earlier version)

# Authors
Provided by [La Drôme Laboratoire](https://github.com/ladromelaboratoire)

