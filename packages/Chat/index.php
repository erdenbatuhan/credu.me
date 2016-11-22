<html>
	<head>
		<title> Chat Room #0165 - Credu </title>
		<?php
			include "head.php";
		?>
	</head>
	<body style="background-color: whitesmoke;">
		<div class="container">
			<div class="text-center">
				<hr>
				<h1 style="color: darkred;"><i> Chat Room #0165 </i></h1>
				<hr>
			</div>
			<h5><span class="fa fa-user"></span> Logged User: Batuhan Erden</h5>
			<br>
			<div id="chat_field">
				<?php
					if(file_exists("./logs/log.html") && filesize("./logs/log.html") > 0) {
    					$handle = fopen("./logs/log.html", "r");
    					$contents = fread($handle, filesize("./logs/log.html"));
    					fclose($handle);
						
    					echo $contents;
					}
				?>
			</div>
			<br>
			<form name="message_form" action="">
        		<input name="message" type="text" id="message" size="63" />
        		<input name="send" type="submit" id="send" value="Send" />
    		</form>
		</div>
	</body>
	<script>
		// Handle the click
		$("#send").click(function() {	
			if($("#message").val().length > 0) {
				$.post("post.php", {
					text: $("#message").val()
				});
			}

			$("#message").val("");
			return false;
		});

		// Load the chat log
		function reloadChats() {
        	$.ajax({
          		url: "./logs/log.html",
          		cache: false,
          		success: function(html) {
             		$("#chat_field").html(html);
          		} 
        	});
		}
 
		// Call reloadChats as soon as the page is loaded
		$(document).ready(function() {
 			reloadChats();
		});

		setInterval(reloadChats, 500); // Call reloadChats every 500ms
	</script>
</html>