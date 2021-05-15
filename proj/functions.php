<?php
	function message($text)
	{
		echo"<p class='message'>$text</p>";
	}
	
	function success($text)
	{
		echo"<p class='success'><img src='images/tick.png' /><br />$text</p>";
	}
	
	function error($text)
	{
		echo"<p class='error'><img src='images/x.png' /><br />$text</p>";
	}
?>