<?php
if(isset($_GET['ButtonId']) && $_GET['ButtonId'] > 0)
{

	require('Config.php');
	$Id = (int)$_GET['ButtonId'];
	if (file_exists(XML_PATH.XML_FILENAME)) 
	{
		$xml = file_get_contents(XML_PATH.XML_FILENAME);
		$Events = new SimpleXMLElement($xml);
		$New_XML = '<?xml version="1.0" encoding="UTF-8"?>';
		$New_XML .= '<Events>';
		foreach ($Events->Event as $Event)
		{
			if($Event->Id == $Id)
			{
				$newCounter = $Event->Counter + 1;
				$New_XML .=	'<Event><Id>'.$Event->Id .'</Id><Counter>'.$newCounter.'</Counter></Event>';
			}
			else
			{
				$New_XML .=	'<Event><Id>'.$Event->Id .'</Id><Counter>'.$Event->Counter.'</Counter></Event>';
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
	die("Wrong Id");
}

?>