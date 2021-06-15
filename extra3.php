<?php

	if( empty($_POST['fname']) == False ) {

		$command = "python urlscan_json.py 3 " . $_POST['fname'];
		$result_py = exec($command);
		echo $result_py;

	} else {

		echo "Write down your Link/Domain to analyze it";

	}

?>