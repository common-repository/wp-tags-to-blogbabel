=== WP Tags to Blogbabel ===
Contributors: Davide Salerno
Tags: tags, blogbabel
Requires at least: 2.3.0
Stable tag: Trunk

This plugin will create BlogBabel tags (http://it.blogbabel.com) from native Wordpress tags. BlogBabel is equivalent to Technorati for the Italian blogosphere.

== Installation ==

1. Upload the full directory into your wp-content/plugins directory
2. Activate it in the Plugin options

(pretty simple, eh?)

== Options ==
All the options are aviable form the tab "Tags di Blogbabel" in the dashboard of Wordpress.

1. Text that appears to the left of the tags can be adjusted by 
   changing the "Etichetta tags di Blogbabel" field.

2. Enabling the "Vuoi aprire le pagine di BlogBabel in una nuova finestra?" option will cause the generated links to open in a new window.

== Advanced Usage ==

If you wish to include the BlogBabel tags in a different place on a page,
you can disable the "Include tags in post footer?" option and modify your
blogs theme to include a call to 'tags2bb_get_tags_links()' inside the
wordpress loop.

== Frequently Asked Questions == 

= Works it with all WordPress versions? =

This version works with WordPress 2.3.0 and better.  It's dependent on the new
Wordpress tagging feature.

= And with previous versions of Wordpress? =

If you have got a previous version of Wordpress than 2.3.0 or you don't want to use the new native Wordpress tags you can use Silentman's WP-Blogbabel (http://silentman.it/plugins/wp-blogbabel/).

== Credits ==

As I am not a professional PHP programmer, I relied heavily on the plug-in 
work of a few others ...

1. Midrangeman WP Tag to Technorati (http://www.geekyramblings.org/plugins/wp-tags-to-technorati/)
2. John Godley's Google Ad Wrap (http://www.urbangiraffe.com/plugins/google_ad_wrap)
3. Artur Ortega's SimpleTags (http://www.broobles.com/scripts/simpletags)

== License ==

    Copyright 2008 by Davide Salerno <davide.salerno@gmail.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

