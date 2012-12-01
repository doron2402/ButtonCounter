<?php
/*

	Author	:	Doron Segal
	Date	:	November 2012
	AddEventCounterAjax.php
	
*/
if(isset($_POST['Hash']) && $_POST['Hash'] > 1000)
{

	require('Config.php');
	if (file_exists(XML_PATH.XML_FILENAME)) 
	{
		$xml = file_get_contents(XML_PATH.XML_FILENAME);
		$Events = new SimpleXMLElement($xml);
		$New_XML = '<?xml version="1.0" encoding="UTF-8"?>';
		$New_XML .= '
		<Events>';
		$Id = 0;
		foreach ($Events->Event as $Event)
		{
				$New_XML .=	'	<Event>
				<Id>'.$Event->Id .'</Id>
				<Counter>'.$Event->Counter.'</Counter>
				</Event>';
				$Id = $Event->Id;
		}
		$Id=$Id+1;
		$New_XML .= '<Event>
		<Id>'.$Id .'</Id>
		<Counter>0</Counter>
		</Event>';
		$New_XML .= '</Events>';
		
		//Save the new xml
		$myFile = XML_PATH.XML_FILENAME;
		$fh = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh, $New_XML);
		$Process = fclose($fh);
		if($Process)
		{
			echo 'Success';
		}
	}
	else 
	{
		die("Can't find the xml file");
	}
	
	
}
else
{
	die("Wrong Hash");
}
?>