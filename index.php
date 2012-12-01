<?php

/*
	Author	:	Doron Segal
	Date	:	Novemeber 2012
	
	Event Counter
	
	Event Counter its a simple tool that help website admin to analyze his traffic
	The tool basically tell how many user click specific object/event/image/button/etc... 
	
	You can take it farter by understanding converstion rate and more...
	
	
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

function Counter(Id)
{
	var Id = parseInt(Id);
	var Url = 'CounterAjax.php';
	$.ajax({
	 type: "POST",
	  url: Url,
	  data: 'ButtonId=' + Id,
	  success: function(data) {
		console.log(data);
	  }
	});
}
</script>
<title>Event Counter</title>
</head>
<body>
<div id="Wrap">
	<div id="Content">
		<div id="header">
			<h1>Event Counter</h1>
		</div>
		<div id="mainbody">
			<button onClick="Counter(1);">Button 1</button>
			<button onClick="Counter(2);">Button 2</button>
			<button onClick="Counter(3);">Button 3</button>
		</div>
		<div id="footer">
			Doron Segal
		</div>
	</div>
</div>
</body>
</html>