<?php
/*
	Author	:	Doron Segal
	Date	:	November 2012
	
	ManageCounter.php
	
	1. Help you to create new Id
	2. See your data, and analyze it.
	3. 

*/
	
require 'Config.php';

?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  // Handler for .ready() called.
});

function deleteEvent(Id)
{
	var Id = parseInt(Id);
	var dataSend = "Id=" + Id;
	var Url = 'DeleteEventCounterAjax.php';
	$.ajax({
	 type: "POST",
	 data: dataSend,
	  url: Url,
	  data: 'EventId=' + Id,
	  success: function(data) {
		console.log(data);
		location.reload();
	  }
	});
}

function addMore()
{
	var Hash = '<?php echo rand(1001,99999);?>';
	var Url = 'AddEventCounterAjax.php';
	$.ajax({
	 type: "POST",
	  url: Url,
	  data: 'Hash=' + Hash,
	  success: function(data) {
		location.reload();
	  }
	});
}
</script>
<title>Event Counter - Manager Side</title>
</head>
<body>
<div id="Wrap">
	<div id="Content">
		<div id="header">
			<h1>Event Counter - Manager Side</h1>
		</div>
		<div id="mainbody">
			<?php
	if (file_exists(XML_PATH.XML_FILENAME)) 
	{
		$xml = file_get_contents(XML_PATH.XML_FILENAME);
		$Events = new SimpleXMLElement($xml);
		foreach ($Events->Event as $Event)
		{
			echo 'Id : ' . $Event->Id;
			echo '<br />';
			echo '<p>Number of clicks: ' . $Event->Counter .'<a style="margin-left:10px;cursor:pointer;" onClick="deleteEvent('.$Event->Id.');">Delete Event</a></p>';
			echo '<hr>';
		}
	
	}
			?>
			
		<h3 onClick="addMore();">Add More Event<h3>
		</div>
		<div id="footer">
			Doron Segal
		</div>
	</div>
</div>
</body>
</html>