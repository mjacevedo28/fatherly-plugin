<?php
/*
Plugin Name: Fatherly Srcset Plugin
Version: 1.0
Description: Wordpress plugin to replace all img tags to use srcset/sizes attributes.
Author: Marcelo Acevedo
Plugin URI: https://github.com/mjacevedo28/fatherly-plugin
*/

//[add_srcset_attr]
function add_srcset_attr($atts, $content) {
    

	return "HELLO";
}
add_shortcode( 'fatherlyplugin', 'add_srcset_attr' );

?>