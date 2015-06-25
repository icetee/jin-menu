<?php 
class jin_injection  {
	function __construct() {
	 add_action('wp_footer', array($this,'push_script'), 100);
	}
	function push_script() {	
?>
    <script type="text/javascript"> 							
	  if (typeof jQuery != 'undefined') {}else{
       var head = document.getElementsByTagName("head")[0];
       script = document.createElement('script');
	   script.id = 'jQuery';
	   script.type = 'text/javascript';
	   script.src = '//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js';
	   head.appendChild(script); 
	   alert("Jin Menu unable to detect jquery\nAutoloading...\nDone !!!!");
      }
		jQuery.noConflict();
		jQuery(document).ready(function(){
<?php
	 $m_i=1;
	 if($locations = get_nav_menu_locations()){
						// if  ( $locations = get_registered_nav_menus()){
						//foreach($locations as $key => $val){
							// if($val !=0):
			if($locations['main_nav'] != 0):
					   // $menu_items = wp_get_nav_menu_items($val);
               $menu_items = wp_get_nav_menu_items($locations['main_nav']);
			 foreach ( (array) $menu_items as $key => $menu_item ) {
			  if(isset($menu_item->jin) && $menu_item->jin !=""):
?>  
				var menuID<?php  echo $m_i; ?> = jQuery('<?php echo ".jsom".str_replace(' ', '',$menu_item->title); ?>');
				findA<?php  echo $m_i; ?> =menuID<?php  echo $m_i; ?>.find('a');
				findA<?php  echo $m_i; ?>.attr( "href", "javascript:void(0)" );
				findA<?php  echo $m_i; ?>.click(function(event){
<?php      
               echo stripslashes($menu_item->jin)." });"; 
			  endif;
			   $m_i++;
			 }
			endif;
		                // }
	 }
	  echo "});</script>";
	} //END FUNCTION			
} 
?>
