<?php
class html_object {
	
	public function open_html() {
		echo "<html>";
	}
	
	public function close_html() {
		echo "</html>";
	}
	

	
	public function open_intro() {
		echo "<head>
			<Title>CD System</Title>
		</head>
		<body>
			<p>Welcome to the CD system, from this menu you can choose whether
			to import, export or display your data";
		}
		
	//function that takes file names in an array with the button names as keys
	//use ' ' for the strings in the array!	
	public function menu_form($file_array) {
		foreach ($file_array as $key => $value) {
			echo "<form action=$value>
				<input type='submit' value=$key>
			</form>";
			
			}
			
	}
	
/*	public function import_data() {
		print "<head>
			<Title>Import data</Title>
		</head>
		<h3>Import data</h3>
		<body>
		<form action='getfile.php' method='post'><br>
		Type (or select) Filename: <input type='file' name='uploadFile'>
		<input type='submit' value='Upload File'>
		</form>
		<body>";
		
	}*/
	
	public function import_data() {
		
		$file = "C:\Users\joef\Desktop\Music.txt";
		
		//header("Content-Type: text/plain");
		$music_array = array();
		
		//get the file contents
		//$contents = file_get_contents($file);
		$contents = file($file);
		$search1 = "Group: ";
		
		
		
		foreach($contents as $lines) {
			
			//var_dump($lines);
			
			if (strpos($lines, $search1) !== false) {	
				
				//$key is the key for the lines in the $content array
				$key = array_search($lines, $contents);
				
				$group = str_replace($search1, "", $lines);

				if (!in_array($group, $music_array)) {
					$music_array[$group] = array();
				
				
					$album = str_replace("Album: ", "", $contents[$key + 1]);
				
					$music_array[$group][$album] = array();
				} 
				else {
				$album2 = str_replace("Album: ", "", $contents[$key + 1]);
				
				$music_array[$group][$album2] = array();
				}
				$num_songs = str_replace("Songs: ", "", $contents[$key + 2]);
				echo $num_songs;
				$i = 1;
				/*do {
					
					
					$i ++;
				} while ($i <= $num_songs);*/
				//do this so it gets to do the later albums by the same artist. 
				unset($contents[$key]);
			}
			
			
		}
		
		print_r($music_array);
		//$count = count($count_array);
		//echo $count;
		
		
	}
	

		
}

?>
