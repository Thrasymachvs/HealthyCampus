<?php
	
	$orgName = (strpos($_GET["orgName"], "and") === false) ? $_GET["orgName"]: str_replace("and", "&", $_GET["orgName"]);

	include 'format.php';
	$organization = Format::formatOrganizationContent("database/organization.txt", "database/RECOVERY/organization.txt");

	// Access the chosen productid
	$key = array_search($orgName, array_column($organization, 'organization'));
	
	// Display the correct information
	$result = "<span id='close' onclick='closeModal()'>&times</span>";
	$result = $result . "<div id='content'>";
	$result = $result . "<div id='org_name'><h1>" . $organization[$key]['organization'] . "</h1></div>";
	$result = $result . "<div id='org_link'><a href='" . $organization[$key]['website'] . "' target='_blank'><h3>" . $organization[$key]['website'] . "</h3></a></div>";
	$result = $result . "<div id='org_info'>";
	$result = $result . "<div id='org_img'><img src='" . $organization[$key]['imageName'] . "'/></div>";
	$result = $result . "<div id='contact_info'>";
	$result = $result . "<div id='phone'><p class='title'>Phone:</p><span class='contact_info'>" . $organization[$key]['phoneNumber'] . "</span></div>";
	$result = $result . "<div id='email'><p class='title'>Email:</p><span class='contact_info'>" . $organization[$key]['email'] . "</span></div>";
	$result = $result . "<div id='location'><p class='title'>Location:</p><span class='contact_info'>" . $organization[$key]['location'] . "</span></div>";
	$result = $result . "</div>";
	$result = $result . "</div>";

	$result = $result . "<div id='hof'>";
	$result = $result . "<p class='title'>hours of operation:</p>";
	$result = $result . "<ul>";
	
	// Print Hours of Operation
	foreach ($organization[$key]['hoursOfOperation'] as $day => $time) {
		$result = $result . "<li>" . $day . " - " . $time . "</li>";
	}	
	$result = $result . "</ul>";
	$result = $result . "</div>";

	$result = $result . "<div id='description'>";
	$result = $result . "<p class='title'>Description:</p>";

	// Print descriptions
	for ($i = 0; $i < count($organization[$key]['description']); $i ++) { 
		$result = $result . "<p>" . $organization[$key]['description'][$i] . "</p>";
	}
	$result = $result . "</div>";
	$result = $result . "</div>";

	echo $result;


?>