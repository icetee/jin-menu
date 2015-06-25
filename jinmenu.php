<?php 
/*
Plugin Name: JinMenu
Plugin URI: http://buffernow.com/
Description: Put Javascript In WP MENU
Version: 1.3.0
Author: Rohit Chowdhary
Author URI: http://buffernow.com/about-me/
*/
class jin {
public static $dir, $url;
   function __construct(){	
	JIN::$dir = WP_PLUGIN_DIR.'/jin-menu/';
	JIN::$url = WP_PLUGIN_URL."/jin-menu/";
	add_filter('nav_menu_css_class' , array($this,'jsom_menu_class'), 10 , 2);
	$this->init();
   }
   
	function jsom_menu_class($classes, $item){
	            	    if($item->url =="#" && $item->jin !="" ){
						$classes[] = "jsom".str_replace(' ', '',$item->title);  
                      }	                             
					 
					 return $classes;
				}
  	
	function init(){
		require_once (JIN::$dir . 'class.draw.php');
		require_once (JIN::$dir . 'class.injection.php');
		$draw = new draw();
		$injection = new jin_injection();
	}	
}	
$Lets_Start = new jin();
?>
