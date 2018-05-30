<?php
	include 'format.php';
function get_user_resources($category, $user){
	$results = array();
	$category_data = formatSubcategoryContent(rawContent("database/organization.txt"), $valid_sub_col, $valid_cat);
	foreach ($category_data as $value){
		if($value["category"] == $category && $value["users"] == $user){
			array_push($results, $value);
	}
	}
	return $results;
}

$result_list = test_formatting("Mental", "Students");

foreach($result_list as $entries){
	echo $entries["organization"];
}

?>