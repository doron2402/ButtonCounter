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
			<h2>Here are the steps:</h2>
			<ul>
			<li>
			<p>On every event you want to follow add this function <xmp>onClick="Counter(1);"</xmp>we use number one as example you should change the id according to you.</p>
			</li>
			<li>
			Dont forget to add the the followin javascript file<br />
			First - add jquery to your code.
			Second the function:
			<xmp>
<script type="text/javascript">
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
			</xmp>
			</li>
			<li>
			That's it you good to go...
			You can check those 3 buttons and see on the console log that the script is working great.
			</li>
			</ul>
			
			</pre>
			
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