<?php

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

// Do not show the first message
$prev = file_get_contents("buffer");

$prev;
$counter = 0;

while (1) {
		$counter++;		
		$now = file_get_contents("buffer");

		if ($prev != $now) {
				$newdatas = substr($now, strlen($prev));
				$newdatas = explode("\n", $newdatas);
				foreach ($newdatas as $com) {
						$com = explode(' ', $com);
						$name = htmlspecialchars(base64_decode($com[0]));
						$contents = htmlspecialchars(base64_decode($com[1]));
						if (strpos($contents, "\n") !== false) {
								// Escape newline for SSE
								$contents = str_replace("\n", "%\\n", $contents);
						}
						if ($name != "" && $contents != "") 
								echo "data: $name $contents \n\n";
				}
				ob_flush();
				flush();
				$counter = 0;
		} else {
				// Send a little candy 15 seconds every in order not to disconnect
				if ($counter % 15 == 14) {
						echo ":[server] How is everything ? ;) \n\n";
						$counter = 0;
				}
		}

		$prev = $now;
		
    sleep(1);
}
