<?php
/*
Plugin Name: All 404 Redirect  to Homepage
Plugin URI: http://www.clogica.com
Description: a plugin to redirect 404 pages to home page or any custom page
Author: Fakhri Alsadi
Version: 1.0
Author URI: http://www.clogica.com
*/

session_start();

define( 'OPTIONS404', 'options-404-redirect-group' );
require_once ('functions.php');

add_action('admin_menu', 'p404_admin_menu');
add_action('admin_head', 'p404_header_code');
add_action('wp', 'p404_redirect');

register_activation_hook( __FILE__ , 'p404_install' );
register_deactivation_hook( __FILE__ , 'p404_uninstall' );


function p404_redirect()
{
	if(is_404()) 
	{
	 	
	 	$options= get_my_options();
	 	if($options['p404_status']=='1'){
		 	header ('HTTP/1.1 301 Moved Permanently');
			header ("Location: " . $options['p404_redirect_to']);
			exit(); 
		}
	}
}

//---------------------------------------------------------------

function p404_header_code()
{
	$css=get_url_path() . "style.css";
	echo '<link type="text/css" rel="stylesheet" href="'. $css .'"/>';
	
}

//---------------------------------------------------------------

function p404_admin_menu() {
	add_options_page('All 404 Redirect to Homepage', 'All 404 Redirect to Homepage', 10, basename(__FILE__), 'p404_options_menu'  );
}

//---------------------------------------------------------------
function p404_options_menu() {
	
	if (!current_user_can('manage_options'))  {
			wp_die( __('You do not have sufficient permissions to access this page.') );
		}
		
	include "option_page.php";
}
//---------------------------------------------------------------

function p404_install(){

}


//---------------------------------------------------------------

function p404_uninstall(){
	delete_option(OPTIONS404);
}

//---------------------------------------------------------------

?>