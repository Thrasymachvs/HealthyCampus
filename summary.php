<?php
	$orgName = $_GET["orgName"];

	include 'format.php';
	$organization = formatOrganizationContent(rawContent("database/organization.txt"), $valid_org_col, $valid_cat);
	// print_r($organization);
	// Access the chosen productid
	$key = array_search($orgName, array_column($organization, 'organization'));
	// print_r($organization[$key]);

	$result = "<p>organization: " . $organization[$key]['organization'] . "</p>";
	$result = $result . "<p>Website: " . $organization[$key]['website'] . "</p>";
	$result = $result . "<p>Category: " . $organization[$key]['category'] . "</p>";
	echo $result;

	// echo $orgName;
?>