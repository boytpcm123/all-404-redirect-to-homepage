<?php

/*
cframework v 1.0
Author: Fakhri Alsadi
Date: 16-7-2010
Contact: www.clogica.com   info@clogica.com    mobile: +972599322252
Note: Do not use this code or any part from it without permission from its author
*/


///@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
///@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
////  class tab           @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//----------------------------------------------------------
//example:
//----------------------------------------------------------
//$tab= new tab('details',32);
//$tab->add('tbl1','Features',150);
//$tab->add('tbl2','Specifications',150);
//$tab->tab_print('details');
// // here we put containers ///
//$tab->tab_js(); // just after containers 
//$tab->tab_select(0);
//
// note that you need to  define the two styles 'tab_on' and 'tab_off' in your css file
/////////////////////////////////////////////////////////////////////////////////////////

class tab{	

var $tab_name='mytab';
var $table_height=32;
var $tabs ;
var $count=0;

	function tab($tab_name='mytab',$table_height=32)
	{
	$this->tab_name = $tab_name;
	$this->table_height = $table_height;
	}
	
	
	function add($container,$title,$width)
	{
	$tmpar['container']=$container;
	$tmpar['title']=$title;
	$tmpar['width']=$width;
	$this->tabs[$this->count]=$tmpar;
	$this->count++;
	}
	
	function tab_print()
	{
	 $table_width = $this->tab_table_width();
	 if($table_width>0)
	 	{
	 	
	 		echo "<table width=\"$table_width\" id=\"table35\" cellpadding=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#E5E5E5\" height=\"32\"><tr>";
			  
			for($i=0;$i< count($this->tabs);$i++)
			{
				echo "<td onclick=\"" . $this->tab_name ."_showtab(".  ($i+1) . ");\" id='td_" . $this->tabs[$i]['container'] . "' class=\"tab_off\" width=\"150\"  align=\"center\">";
				echo "<a style=\"text-decoration: none\" href=\"javascript:" . $this->tab_name ."_showtab(".  ($i+1) . ");\">" . $this->tabs[$i]['title'] . "</a></td>";
			}		
	  
		echo "</tr></table>";
	 	
	 	}
	
	}
	
	function tab_js()
	{
	 
	
echo "<script>

var  " . $this->tab_name .  "_tab_names = [];
var " . $this->tab_name .  "_tab_widths = [];
";


for($i=0;$i< count($this->tabs);$i++){

echo $this->tab_name . "_tab_names[$i]='" . $this->tabs[$i]['container'] . "';\n";
echo $this->tab_name . "_tab_widths[$i]='" . $this->tabs[$i]['width'] . "';\n";

}


echo " function " . $this->tab_name . "_showtab(x)
{

//reset all

	for(i=0;i<" . $this->tab_name .  "_tab_names.length;i++){
		document.getElementById('td_' + " . $this->tab_name .  "_tab_names[i]).className='tab_off';
		document.getElementById(" . $this->tab_name .  "_tab_names[i]).style.display='none';
	}
 
 document.getElementById('td_' + " . $this->tab_name .  "_tab_names[x-1]).className='tab_on';
 document.getElementById(" . $this->tab_name .  "_tab_names[x-1]).style.display='';

}

</script>";

if($this->count > 0 )
$this->tab_select(1);
	}
	
	
	function tab_select($index)
	{
	 
	echo "<script>" . $this->tab_name . "_showtab($index);</script>";
	
	}
	
	function tab_table_width()
	{
	 $width=0;
	 for($i=0;$i< count($this->tabs);$i++)
	 $width+= $this->tabs[$i]['width'];
	 return $width;
	}
	
}





?>