<?php
class cd_object {
	
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
	
	
	/* takes a .txt file with a specific format (as described in the readme)
	   makes a multidemnsional array with the contents to make a music library */
	public function import_data($file) {
		
		//select file - will be changed to be less specific
		
		$music_array = array();
		
		//$contents is an array containing the contents of the file line by line.
		$contents = file($file);
		//the string that will be searched for by the function (why the formating is essential).
		$search1 = "Group: ";
		
		
		//iterate 
		foreach($contents as $key=>$lines) {
			
			
			if (strpos($lines, $search1) !== false) {	
				
				//trim is used to clean up $music array (no unnecessary returns or spaces)
				$lines = trim($lines);
				
				$group = str_replace($search1, "", $lines);

				//searches $music_array for the group name to see if it is already there.
				if (!array_key_exists($group, $music_array)) {
					
					$music_array[$group] = array();
					
				}
					
				$album = str_replace("Album: ", "", trim($contents[$key + 1]));
				

				$music_array[$group][$album] = array();

				$num_songs = str_replace("Songs: ", "", trim($contents[$key + 2]));
				
				//add songs to the albums
				for ($i = 0; $i < $num_songs; $i++) {
					$music_array[$group][$album][] = trim($contents[$key + 3 + $i]);
				}			
			}	
		}
		
		return $music_array;
	}
	

		
}

?>
