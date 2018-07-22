<?php
/*
Plugin Name: Fatherly Srcset Plugin
Version: 1.0
Description: Wordpress plugin to replace all img tags to use srcset/sizes attributes.
Author: Marcelo Acevedo
Plugin URI: https://github.com/mjacevedo28/fatherly-plugin
*/

/**
 * Gets all attributes provided by user, and builds an image tag
 * with the ability to add a srcset attribute defined by widths
 * provided by user
 * @param  $atts 
 * @return img tag built with params and srcset
 */

function build_image_tag($atts) {
	
	$imageTag = "<img ";
	// Loop through all attributes provided
	foreach ($atts as $att=>$value){
		
		// User can provide src as src or url
		if ($att=='url' || $att == 'src') {
		
			$imageTag = $imageTag . "src='" . $atts['url'] . "' ";
		
		// User can provide widths as a comma delimited list to build srcset attribute
		} elseif ($att=='width'){
			
			// Create array from string list of widths			
			$widths = array_map('trim', explode(",", $atts['width']));	
			$imageTag = $imageTag . "srcset='";
			
			// Loop through all widths and add them to srcset attribute
			// Assumes image resizing service can change widths by adding "?w="
			for($i = 0; $i < sizeof($widths); $i++){
				if($i<sizeof($widths)-1){
					$imageTag = $imageTag . "{$atts['url']}?w={$widths[$i]}  {$widths[$i]}w, ";
				} else{
					$imageTag = $imageTag . "{$atts['url']}?w={$widths[$i]}  {$widths[$i]}w' ";
				}
			}
			// Assumes all images are fullwidth
			$imageTag = $imageTag . "sizes='100vw' ";
		
		// User can provide classes as comma delimited list or more common whitespace separated list
		} elseif ($att=='class'){
		
			// If comma delimited list, create array then create the classes string attribute
			if (strpos($atts['class'], ',') !== false){
				$classes = array_map('trim', explode(",", $atts['class']));
				for($i = 0; $i < sizeof($classes); $i++){
					if($i<sizeof($classes)-1){
						$classAttr = $classAttr . "{$classes[$i]} ";
					} else {
						$classAttr = $classAttr . "{$classes[$i]}";
					}
				}	
			// If not, simply copy provided list		
			} else {
				$classAttr = $value;
			}	
			$imageTag = $imageTag . "class='{$classAttr}'";
			
		// User can provide other attributes to add to image tag
		} else {
			$imageTag = $imageTag . "{$att}='{$value}' ";
		}
	}

	// Close image tag out and return
	return $imageTag . '/>';
	

}
add_shortcode( 'fatherlyplugin', 'build_image_tag' );

?>