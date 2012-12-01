<?php

/*
	DeleteEventCounterAjax.php

	Delete Event from xml using the id
	
*/

if(isset($_POST['EventId']) && $_POST['EventId'] > 0)
{
	$Id = (int)$_POST['EventId'];
	require('Config.php');
	if (file_exists(XML_PATH.XML_FILENAME)) 
	{
		$xml = file_get_contents(XML_PATH.XML_FILENAME);
		$Events = new SimpleXMLElement($xml);
		$New_XML = '<?xml version="1.0" encoding="UTF-8"?>';
		$New_XML .= '
		<Events>';
		
		foreach ($Events->Event as $Event)
		{
				if($Id == $Event->Id)
				{
					//Do nothing we delete this one...
				}
				else
				{
					$New_XML .=	'	<Event>
					<Id>'.$Event->Id .'</Id>
					<Counter>'.$Event->Counter.'</Counter>
					</Event>';
				}
		}
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
	die("Invalid Id");
}
?>