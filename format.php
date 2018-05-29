<?php
		
	// The URL to get to database folder for Healthy Campus
	$valid_path = "database/";

	// Valid 'organization' columns
	$valid_org_col = array("organization", "website", "category", "description", "users", "hoursOfOperation", "imageName", "phoneNumber", "email", "location", "geotag");

	// Valid 'subcategory' columns
	$valid_sub_col = array("category", "description", "hotlines");

	// Valid category
	$valid_cat = array("SEXUAL HEALTH", "MENTAL HEALTH", "PHYSICAL ACTIVITY", "ALCOHOL & OTHER DRUGS", "NUTRITION");

	// Read the content of the text file found in the given path and do a rough format (does not check if the contents are valid)
	function rawContent($pathName) {
		// Get content (Remove the uunnecessary characters)
		$string = substr(str_replace("\n", "", file_get_contents($pathName)), 7, -8);
		// Split strings based on their organzation
		$content = preg_split("/}(\s*),(\s*){/", $string);

		$result = array();

		// Iterate through the organizations		
		for($i = 0; $i < count($content); $i++) {
			$temparr = array();
			
			// Split strings based on their organzation
			$x = preg_split("/\"(\s*),(\s*)\"/", $content[$i]);

			// Iterate through the organizations' contents (ie name, description, etc,.)
			for($j = 0; $j < count($x); $j++) {
				// Key
				// Remove the first opening quotation mark that encloses the future KEY (if necessary)
				$word = ($j == 0) ? preg_replace("/\"/", "", $x[$j], 1) : $x[$j];

				// Find the closing quotation mark that encloses the future KEY
				$length = strpos($word, "\"");

				// Remove the unnecessary characters between the future KEY and save it
				$key = preg_replace('/\s+/', '', substr($word, 0, $length));

				// Value
				// Remove the first half of the string (the KEY)
				$word = substr($word, (strpos($word, ":") + 1));

				// Remove the first opening quotation mark that encloses the future VALUE
				$word = substr($word, (strpos($word, "\"") + 1));

				// Remove the closing opening quotation mark that encloses the future VALUE (if necessary)
				$value = ($j == (count($x) - 1)) ? strrev(substr(strrev($word), (strpos(strrev($word), "\"")) + 1)) : $word;

				// Remove whitespace in the beginning and in the end of the string
				$value = ltrim($value);
				$value = rtrim($value);

				// Add the key and value pair in the temporary array
				$temparr[$key] = $value;

			}
			// Add all the organization's information in array
			$result[$i] = $temparr;
			
		}

		return $result;
	}

	// Checks if the organization's name is all letters
	function _checkOrganization($orgName) {
		return ctype_alpha(str_replace(' ', '', $orgName));
	}

	// Checks if the URL follow the URL format
	// NOTE: it does not check the whole web if it exists because it will considerably slowdown the website
	function _checkWebsite($url) {
		return filter_var($url, FILTER_VALIDATE_URL);
	}

	// Checks if the category listed is valid
	function _checkCategory($selected, $categories) {
		return in_array(strtoupper($selected), $categories);
	}

	// Checks if the users given is valid
	function _checkUsers($user, $users) {
		return in_array(strtoupper($user), $users);
	}

	// Checks if the format given for Hours of Operation is valid
	function _checkHOF($HOF) {
		// Turn the HOF string to array
		$time = (strpos($HOF, ",") == false) ? array($HOF) : preg_split("/,/", $HOF);

		// List of valid days
		$day = array("m", "tu", "w", "th", "f", "sa", "su");
		for ($i = 0; $i < count($time); $i++) {
			$isActive = false;
			$skip = 0;

			// Make sure to stop by '=' sign
			$length = strlen(substr($time[$i], 0, strpos($time[$i], "="))) + 1;
			for ($j = 0; $j < $length; $j++) {

				// Ensure that it skips iteration on extra letters (if applicable) and the last index (because that's the '=' sign)
				// Example: 'm' does not have extra letter but 'tu' has, so the iteration won't iterate on the extra letter which is 'u' in this case
				if (((($isActive == true) && ($skip === $j))) || $j == ($length  - 1)) { continue; };
				
				// If the current index is either a 't' or and 's' 
				if ($time[$i][$j] == "t" || $time[$i][$j] == "s") {
					
					// Ensures that it captures the whole 'day'
					$selected =  $time[$i][$j] . $time[$i][$j + 1];

					// Activate the skipping process mentioned above
					$isActive = true;

					// Mark the index that will be skipped
					$skip = $j + 1;

				} else {

					// The current character
					$selected =  $time[$i][$j];

					// Deactivate the skipping process
					$isActive = false;
				}

				// If any of the strings containts '=', skip it
				if((strlen($selected) == 2 && $selected[1] == "=")) { continue; };

				// Find the day (ie 'm', 'th', etc.,) and remove it from DAYS array
				// This is to prevent repetition of days
				if (($key = array_search($selected, $day)) !== false) {
				    unset($day[$key]);
				} else {
					// Return FALSE if there's day repetition OR the day in invalid
					return false;
				}
			}

			// Gets the time range
			$range = strtoupper(substr($time[$i], strpos($time[$i], "=") + 1));

			// Returns FALSE if the value does not follow the correct time format
			if (!($range == "allday") && !(preg_match("#([01]?[0-9]|2[0-3]):[0-5][0-9](am|pm)\-([01]?[0-9]|2[0-3]):[0-5][0-9](am|pm)$#", $range))) { return false; };

		}
	}

	// Checks if the number given is valid
	function _checkPhoneNumber($number) {
		return ctype_digit($number) && strlen($number) == 10;
	}

	// Checks if the email follows the email format
	function _checkEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	// Checks if all the hotlines given are formatted correctly
	function _checkHotlines($hotlines) {
		$phoneNumbers = preg_split("/(\s*),(\s*)/", $hotlines);
		
		for ($i = 0; $i < count($phoneNumbers); $i++) { 
			$num = substr($phoneNumbers[$i], strpos($phoneNumbers[$i], "=") + 1);
			if(_checkPhoneNumber($num) === false) { return false; }
		}
		return true;
	}

	// Return an array that lists which days are in the specific string
	function _determineDays($string) {
		$result = array();
		$isActive = false;
		$skip = 0;
		for ($i = 0; $i < strlen($string); $i++) { 
			// Ensure that it skips iteration on extra letters (if applicable)
			// Example: 'm' does not have extra letter but 'tu' has, so the iteration won't iterate on the extra letter which is 'u' in this case
			if ((($isActive == true) && ($skip === $i))) { continue; };

			// If the current index is either a 't' or and 's' 
			if($string[$i] == "t" || $string[$i] == "s") {

				// Ensures that it captures the whole 'day'
				$selected = $string[$i] . $string[$i + 1];
				
				// Activate the skipping process mentioned above
				$isActive = true;

				// Mark the index that will be skipped				
				$skip = $i + 1;

			} else {

				// The current character
				$selected = $string[$i];

				// Deactivate the skipping process
				$isActive = false;
			}

			// Determine the day based on the abbreviation and add it to the RESULT
			if ($selected == 'm') {
				array_push($result, "Monday");
			} elseif ($selected == 'tu') {
				array_push($result, "Tuesday");
			} elseif ($selected == 'w') {
				array_push($result, "Wednesday");
			} elseif ($selected == 'th') {
				array_push($result, "Thursday");
			} elseif ($selected == 'f') {
				array_push($result, "Friday");
			} elseif ($selected == 'sa') {
				array_push($result, "Saturday");
			} elseif ($selected == 'su') {
				array_push($result, "Sunday");
			}	

		}

		return $result;
	}

	// Format Description
	function _formatDescription($description) {
		return explode("|par|", $description);
	}

	// Format Hours of Operation
	function _formatHOF($HOF) {
		// Turn the HOF string to array
		$time = (strpos($HOF, ",") == false) ? array($HOF) : preg_split("/,/", $HOF);

		// Initalize the days
		$hoursOfOperation = array("Monday" => "", "Tuesday" => "", "Wednesday" => "", "Thursday" => "", "Friday" => "", "Saturday" => "", "Sunday" => "");
		for ($i = 0; $i < count($time); $i++) {
			
			// Get the actualy days of the current string
			$abbr = substr($time[$i], 0, strpos($time[$i], "="));
			$days = _determineDays(strtoupper($abbr));

			// Get the time range it specified for the current string
			$range = strtoupper(substr($time[$i], strpos($time[$i], "=") + 1));

			// Iterate through the days
			for ($j = 0; $j < count($days); $j++) { 

				// Populate the HOURSOFOPERATION
				if ($range == "allday") {
					$hoursOfOperation[$days[$j]] = "Open 24 hours";
				} else {
					$hoursOfOperation[$days[$j]] = $range;
				}
			}
		}

		// If any of the keys does not have value, put 'Closed' for their values
		foreach ($hoursOfOperation as $key => $value) {
			if ($value == "") {
				$hoursOfOperation[$key] = "Closed";
			}
		}

		return $hoursOfOperation;

	}

	// Format image path
	function _formatImage($img) {
		return "img/" . $img;
	}

	// Format phone number
	function _formatPhoneNumber($num) {
		$num = (strlen($num) > 10) ? substr($num, 2) : $num;
		return "(" . substr($num, 0, 3) . ") " . substr($num, 3, 3) . " - " . substr($num, 6, 4);
	}

	// Format hotlines
	function _formatHotlines($hotlines) {
		$phoneNumbers = preg_split("/(\s*),(\s*)/", $hotlines);
		$result = array();

		for ($i = 0; $i < count($phoneNumbers); $i++) { 
			$num = explode("=", $phoneNumbers[$i]);
			$result[$num[0]] = _formatPhoneNumber($num[1]);
		}

		return $result;
	}

	// For each column given, check if they follow the format stated in README
	function checkValidity($organization, $categories) {
		foreach ($organization as $key => $value) {
		 	if($value == "") { continue; }
		 	if($key == "organization") {
		 		if(_checkOrganization($value) === 0) { return false; }
		 	} elseif ($key == "website") {
				if (_checkWebsite($value) === 0) { return false; }
		 	} elseif ($key == "category") {
		 		if(_checkCategory($value, $categories) === 0) { return false; }
		 	} elseif ($key == "users") {
		 		$valid_users = array("student", "faculty", "both");
		 		if(_checkUsers($value, $valid_users) === 0) { return false; }
		 	} elseif ($key == "hoursOfOperation") {
		 		_checkHOF($value);
		 	} elseif ($key == "phoneNumber") {
		 		$number = substr($value, 2, 10);
		 		if(_checkPhoneNumber($number) === 0) { return false; }
		 	} elseif ($key == "email)") {
		 		if(_checkEmail($email) === 0) { return false; }
		 	} elseif ($key == "hotlines") {
		 		if(_checkHotlines($value) === 0)  { return false; }
		 	}

		}
		return true;
	}

	// Format the whole organization database
	function formatOrganizationContent($organization, $columns, $categories) {
		$result = $organization;

		// Iterate through all the organization
		for($i = 0; $i < count($organization); $i++) {

			// Iterate through an organization's information
			for($j = 0; $j < count($columns); $j++){

				// For the columns that are not filled out in the database, initialize each one to have and empty string
				if(!(array_key_exists($columns[$j], $organization[$i]))) {
					$result[$i][$columns[$j]] = "";
				}
			}

			// Check if content the value of the current organization is valid, if not return 'FAILED'
			if (!checkValidity($result[$i], $categories)) { return "Error: Organization database failed to load!"; };
			
			// Format Description
			if ($result[$i]["description"] !== "") { $result[$i]["description"] = _formatDescription($result[$i]["description"]); };

			// Format Hours of Operation
			if ($result[$i]["hoursOfOperation"] !== "") { $result[$i]["hoursOfOperation"] = _formatHOF($result[$i]["hoursOfOperation"]); };

			// Format Image Link
			if ($result[$i]["imageName"] !== "") { $result[$i]["imageName"] = _formatImage($result[$i]["imageName"]); };

			// Format Phone Number
			if ($result[$i]["phoneNumber"] !== "") { $result[$i]["phoneNumber"] = _formatPhoneNumber($result[$i]["phoneNumber"]); };

		}

		return $result;
	}

	// Format the whole subcategory database
	function formatSubcategoryContent($category, $columns, $categories) {
		$result = $category;

		// Iterate through all the category
		for($i = 0; $i < count($category); $i++) {

			// Iterate through an category's information
			for($j = 0; $j < count($columns); $j++){

				// For the columns that are not filled out in the database, initialize each one to have and empty string
				if(!(array_key_exists($columns[$j], $category[$i]))) {
					$result[$i][$columns[$j]] = "";
				}
			}
			
			// Check if content the value of the current organization is valid, if not return 'FAILED'
			if (!checkValidity($result[$i], $categories)) { return "Error: Subcategory database failed to load!"; };

			// Format Description
			if ($result[$i]["description"] !== "") { $result[$i]["description"] = _formatDescription($result[$i]["description"]); };

			// Format Hotlines
			if ($result[$i]["hotlines"] !== "") { $result[$i]["hotlines"] = _formatHotlines($result[$i]["hotlines"]); };
		}


		return $result;
	}

	//Scans the database searching for resources by two categories -- the working group, and who can use the resources. May split into two functions soon, but this is good for now. 
	function get_user_resources($category, $user, $category_data){
		$results = array();

			foreach ($category_data as $value){
				if($value["category"] == $category && $value["users"] == $user){
					// echo "value organization: " . $value["organization"] . "--";
					// echo "value users: " . $value["users"] . "--";
					// echo "user: " . $user . "<br>";
					array_push($results, $value);
				}
			}
	return $results;
}
  	
	// print_r(formatSubcategoryContent(rawContent("database/subcategory.txt"), $valid_sub_col, $valid_cat));
	// print_r(rawContent("database/subcategory.txt"));
	// print_r(formatOrganizationContent(rawContent("database/organization.txt"), $valid_org_col, $valid_cat));
	// print_r(rawContent("database/organization.txt"));
	// print_r(formatOrganizationContent(rawContent("http://centaurus-8.ics.uci.edu:8926/hcampus/database/organization.txt"), $valid_org_col, $valid_cat));

?>