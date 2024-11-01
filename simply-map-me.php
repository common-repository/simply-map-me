<?php

/**
 * Plugin Name: Simply Map Me
 * Plugin URI: http://faizan-ali.com/
 * Description: Avoid going on Google Maps each time and copying the embed code from there. Just wrap your location within [map] and [/map] and see your map anywhere on Wordpress. Also supports width and height.  
 * Version: 1.0
 * Author: Faizan Ali
 * Author URI: http://faizan-ali.com/
 * Tags: google maps plugin, simply map me, wordpress simple maps
 * License: GPLv2
 
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
 
//Get address through shortcode
 function simply_map_me($atts,$content= null ){
	 shortcode_atts( array(
		'width' => 425,
		'height' => 350,
	), $atts) ;
	
	 if(isset($atts['width'])) $width =  $atts['width']; else $width = 425;
	  if(isset($atts['height'])) $height =  $atts['height']; else $height = 350;
	
	return "<strong>".$content."</strong><br/><br/><p><iframe width=".$width." height=".$height." frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?oe=utf-8&amp;channel=fflb&amp;q=".$content."&amp;ie=UTF8&amp;hq=&amp;hnear=".$content."&amp;output=embed'></iframe></p><br />";
	 }
	 
	 
add_shortcode('map','simply_map_me');	


//Admin Page

 function map_page(){
	?>
    <div class="postbox" style="width:40%; height:auto; margin-left:20%; padding:15px; font-family:Verdana, Geneva, sans-serif; font-size:16px;" >
	<p>Simply wrap your location within <code>[map] and [/map]</code></p>
    <p>Example: <code>[map width="300" height="300"]New York, U.S.[/map]</code></p>
    <?php echo do_shortcode('[map width="300" height="300"]New York, U.S.[/map]') ?>
    
    <p><strong>Note:</strong>If you don't include width="desired width" height="desired height", by default width=425 and height=350 . </p>
    
    
    
	</div>
	<?php
	
}


function register_map_page(){

	$page_title  = 'Simply Map Me';
	$menu_title  = $page_title;
	$capability  = 'manage_options';
	$menu_slug   = 'simply-map-me';
	$function    =  'map_page';
	add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function );
}
	
add_action('admin_menu','register_map_page');		