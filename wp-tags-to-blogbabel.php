<?php
/*
Plugin Name: WP tags to BlogBabel
Plugin URI: http://www.davidesalerno.net/plugins/wp-tags-to-blogbabel/
Description: Simple plugin to convert Wordpress 2.3's tags to BlogBabel ('http://it.blogbabel.com') links.
Version: 0.1
Author: Davide Salerno
Author URI: http://www.davidesalerno.net/
*/

/*  
	Copyright 2007 by Davide Salerno <davide.salerno@gmail.com>

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
*/

/*
== English ==
Date		Rev	Modification
07/01/08	Plugin created from Midrangema's WP Tag to Technorati 
			(http://www.geekyramblings.org/plugins/wp-tags-to-technorati/)
			
== Italiano ==

Data		Modifiche
07/01/08	Creazione del plugin modificando WP Tag to Technorati di Midrangema 
			(http://www.geekyramblings.org/plugins/wp-tags-to-technorati/)
*/

$tags2bb_version = "0.1";

$tag_url = "http://it.blogbabel.com/crawler/tag/";

$tag_start = "\n<!-- start wp-tags-to-blogbabel $tags2bb_version -->\n";
$tag_end = "\n<!-- end wp-tags-to-blogbabel -->\n";

set_magic_quotes_runtime(0);

function tags2bb_content ($text) {

	$include_footer = get_option('tags2bb_footer');

	if ($include_footer) {
		return $text.tags2bb_get_tags_links();
	} else {
		return $text;
	}

}

function tags2bb_get_tags_links() {

	global $tag_start,$tag_end;

	$new_window = get_option('tags2bb_new_window');

	$tags = get_the_tags();

	$tag_text = get_option('tags2bb_label').": ";
	
	$count=0;

	$tag_count=count($tags);

	if (is_array($tags)) {
		foreach($tags as $tag) {
			$count++;
			$link = tags2bb_get_link($tag->name,$new_window);
			$tag_text = $tag_text.($count>1?', ':'').$link;
		}
		$tag_links = "\n<p class='blogbabel-tags'>".$tag_text."</p>\n";
	} elseif ($tags->name != "") {
		$tag_links = "\n<p class='blogbabel-tags'>".$tag_text.tags2bb_get_link($tags->name,$new_window)."</p>\n";
	} else {
		$tag_links = "";
	}
	return $tag_start.$tag_links.$tag_end;
}

function tags2bb_get_link($tag,$new_window = false) {
	global $tag_url;

	$encoded_tag = urlencode($tag);

	$target = $new_window?'_blank':'_self';

	$link = "<a class='blogbabel-link' href='$tag_url/$encoded_tag' rel='tag' target='$target'>$tag</a>";
	
	return $link;
}

function tags2bb_options_menu() {

	?>
	<div class="wrap">
	<h2>Impostazioni Tags di BlogBabel</h2>
	<form method="post" action="options.php">
	 <!-- <?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo attribute_escape($_GET['page']); ?>"> -->
	<?php wp_nonce_field('update-options'); ?>

        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Aggiorna Opzioni »') ?>" />
        </p>

	Etichetta tags di Blogbabel: <input type="text" name="tags2bb_label" value="<?php echo get_option('tags2bb_label'); ?>" /> <p/>
	Vuoi aprire le pagine di BlogBabel in una nuova finestra?  <input type="checkbox" name="tags2bb_new_window" <?php echo get_option('tags2bb_new_window')?'checked=checked':''; ?> /> <p/>
	Inserisci i tag alla fine di ogni post? <input type="checkbox" name="tags2bb_footer" <?php echo get_option('tags2bb_footer')?'checked=checked':''; ?> /> <p/>

        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Aggiorna Opzioni »') ?>" />
        </p>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="tags2bb_label,tags2bb_footer,tags2bb_new_window"/>
	</form>
	</div>
	<?php 

}

function tags2bb_menu(){
    add_options_page('Tags di BlogBabel', 'Tags di BlogBabel', 8, __FILE__, 'tags2bb_options_menu');
}

function tags2bb_activate()
{
        // Let's add some options
	// add_option('tags2bb_label', 'BlogBabel Tags');

}

function tags2bb_deactivate()
{
        // Clean up the options
	delete_option('tags2bb_label');
	delete_option('tags2bb_footer');
	delete_option('tags2bb_new_window');
}

add_option('tags2bb_label', 'BlogBabel Tags');
add_option('tags2bb_footer', true);
add_option('tags2bb_new_window', false);
add_filter('the_content', 'tags2bb_content');
add_action('admin_menu', 'tags2bb_menu');

add_action('activate_wp-tags-to-blogbabel/wp-tags-to-blogbabel.php',
	'tags2bb_activate');
add_action('deactivate_wp-tags-to-blogbabel/wp-tags-to-blogbabel.php',
	'tags2bb_deactivate');

?>
