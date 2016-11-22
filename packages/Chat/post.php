<?php
session_start();
$text = $_POST['text'];
 
$fp = fopen("./logs/log.html", 'a');
fwrite($fp, '<div class="jumbotron chatron">
			    <h6> Batuhan Erden - ' .date("g:i A"). '<h6>
				<p>' .stripslashes(htmlspecialchars($text)). '</p>
			 </div>');
		
fclose($fp);
?>