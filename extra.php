<?php

	function theLine($link){

		$linesInFile = count(file("links.txt"));

		$fp = fopen("links.txt", "r");

		for($i = 1; $i <= $linesInFile; $i++) {

			$line = fgets($fp);
			$thelink = trim($line);
			$thesplit = explode(";", $thelink);

			$normal1 = substr($thesplit[0], 8, strlen($thesplit[0]));
			$normal2 = substr($thesplit[0], 0, strlen($thesplit[0])-1);
			$normal3 = substr($thesplit[0], 7, strlen($thesplit[0]));
			$no_diagonal1 = substr($normal1, 0, strlen($normal1)-1);
			$no_diagonal2 = substr($normal3, 0, strlen($normal3)-1);

			if ( $link == $thesplit[0] || $link == $normal1 || $link == $no_diagonal1 || $link == $no_diagonal2 || $link == $normal2 || $link == $normal3 ) {
				echo "<br><br>" . "The page was vulnerable to " . $thesplit[1];

				if ( $thesplit[2] == True ) {
					echo $thesplit[2];
				}
				
				return 0;

			}

		}

		if ( $thelink == "-theend-" ){

				echo "<br><br>" . "We dont have any information of: " . $link;

		}

		fclose($fp);
		
	}
	
	if( empty($_POST['fname']) == False ) {

		$postName = $_POST['fname'];

		echo "Database:";

		if ( substr( $_POST['fname'], 0, 8 ) === 'https://' ){

		theLine($postName);

		echo "<br><br>Your link is using a secure protocol: " . $_POST['fname'];

		} elseif ( substr( $_POST['fname'], 0, 7 ) === 'http://' ) {

			theLine($postName);

			echo "<br><br>Your link is using a non-secure protocol: " . $_POST['fname'];

		} else {

			theLine($postName);

			echo "<br><br>Your link is : " . $_POST['fname'];

	}
		
	} else {

		echo "Write down your Link/Domain to analyze it";

	}



?>