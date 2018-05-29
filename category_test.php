
<link rel="stylesheet" type = "text/css" href = "css/categorystyle.css">
<!DOCTYPE HTML>
<html>
<head>
	
</head>


<?php
	include "format.php";

	// Access the chosen group
	$group = $_GET["group"];
	
	// Access both 'category' and 'organization' data
	$category_data = $category_data = formatSubcategoryContent(rawContent($path . "subcategory.txt"), $valid_sub_col, $valid_cat);
	$organization_data = formatSubcategoryContent(rawContent($path . "organization.txt"), $valid_sub_col, $valid_cat);
	// print_r($category_data);
	// print_r($organization_data);
	
	// Access that array that holds the information of the specified category	
	$category = (strpos($group, "_") === false) ? strtolower($group) : strtolower(substr($group, 0, strpos($group, "_")));
	$key = array_search($category, array_column($category_data, 'category'));

	// Access the information that holds the information of the specified category
	$working_group = $category_data[$key]["category"];
	$working_description = $category_data[$key]["description"];
	$hotlines= $category_data[$key]["hotlines"];
	
	// Access Faculty' resrouces
	// echo ucfirst(strval($working_group));
	$faculty_resources = get_user_resources(ucfirst($working_group), "Faculty", $organization_data);

	// Access 'Student' resrouces
	$student_resources = get_user_resources(ucfirst($working_group), "Student", $organization_data);
	// echo ucfirst(strval($working_group));

	// Navigation
	include 'php_include/navigation.php';

?>

<body>
	<div class = "text_wrapper">
	<div class = "card">
		<?php 
			echo "<h1>". ucfirst(strval($working_group)) . " Health</h1>
			<p class = 'text_body'> "; 
			for ($i = 0; $i < count($working_description); $i++){
						echo $working_description[$i] . " ";
					}
			 ?>
			</div>
</div>
	<div class = "Hotline_wrapper">
		<div class = "card">
			<div id = "Hotline_table">
				<h2> National Hotlines </h2>
				<ul>
					<?php
						foreach (array_keys($hotlines) as $key){
									echo "<li>" . $key . "  :  " . $hotlines[$key] .  "</li>";
								}
								?>
				</ul>
			</div>
		</div>
	</div>

	
		<div class = "faculty_resources">
			<div class = "card">
			<h3>Faculty Resources</h3>
			<ul>
				<?php
					foreach($faculty_resources as $key){
							echo "<li style = 'font-family: sans-serif;'>" . $key["organization"] . "</li>";
						} ?>
					</ul>
				</div>
			</div>


</body>
</html>
			