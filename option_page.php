<?php

include "controls.php";
global $wpdb,$table_prefix;

if( array_key_exists('redirect_to',$_POST) &&  $_POST['redirect_to']!='')
	{
		$newoptions['p404_redirect_to']=$_POST['redirect_to'];
		$newoptions['p404_status']=$_POST['p404_status'];
		update_my_options($newoptions);
		option_msg('Options Saved!');
		
	}
	
$options= get_my_options();
?>

<?
if(there_is_cache()!='') 
info_option_msg("You have a cache plugin installed <b>'" . there_is_cache() . "'</b>, you have to clear cache after any changes to get the changes reflected immediately! ");
?>

<div class="wrap">
<div class='procontainer'><div class='inner'>
<h2>All 404 Redirect to Homepage</h2>
<form method="POST">
	
	<br/><br/>
	404 Redirection Status: 
	<?php
		$drop = new dropdown('p404_status');
		$drop->add('Enabled','1');	
		$drop->add('Disabled','2');
		$drop->dropdown_print();
		$drop->select($options['p404_status']);
	?>
	<br/><br/>
	
	Redirect all 404 pages to: 
	<input type="text" name="redirect_to" id="redirect_to" size="30" value="<?=$options['p404_redirect_to']?>">		
	
	
	
<br/><br/><br/>
<input  class="button-primary" type="submit" value="  Update Options  " name="Save_Options"></form>  

</div></div>


<br/><br/>



<div class='procontainer'><div class='inner'>
<h3>This plugin function is included in another amazing plugin that can control the following:</h3>

<ul class="">
	<li>Build all redirect types 301,302 or 307 easily using different ways.</li>
	<li>You can redirect folders using different rules for there content and 
	sub-folders.</li>
	<li>Supports Regular Expression to build redirect custom rules.</li>
	<li>Supports wild card redirection.</li>
	<li>Can deal any post or page with published, draft or deleted status.</li>
	<li>keeps track of all 404 Error pages and fix them using 301 redirects.</li>
	<li>You can make different rules for 404 error pages redirects.</li>
	<li>Adds auto redirects when you change the Permalink of any post or page 
	and reflect the changes to the all redirects and rules.</li>
	<li>Provides full detailed history of all redirects made.</li>
	<li>Provides a list of all new discover 404 Error pages and gives you the 
	control to redirect them.</li>
	<li>keeps track of deleted items and ask to redirect them using 301 
	redirect.</li>
	<li>Advanced control panel to manage all plugin functions.</li>
	<li>Friendly and easy to use tabbed GUI.</li>
</ul>

<p>

	<map name="proFPMap0">
    <area target="_blank" href="http://codecanyon.net/item/seo-redirection-pro/7596396?ref=fakhri" shape="rect" coords="7, 5, 113, 44">
    <area target="_blank" href="http://codecanyon.net/theme_previews/7596396-seo-redirection-pro?url_name=seo-redirection-pro&ref=fakhri" shape="rect" coords="119, 5, 228, 44">
    <area target="_blank" href="http://www.clogica.com/downloads/documentation/documentation.zip" shape="rect" coords="232, 7, 352, 42">
    </map>
    <img border="0" src="<?=get_url_path()?>/images/buttons.png" width="360" height="51" usemap="#proFPMap0">
  </div></div>  
    
</div>