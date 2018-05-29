<link rel="stylesheet" href="css/categorystyle.css">

<?php
	include "format.php";

	// Access the chosen group
	$group = $_GET["group"];
	
	// Access both 'category' and 'organization' data
	$category_data = formatSubcategoryContent(rawContent($valid_path . "subcategory.txt"), $valid_sub_col, $valid_cat);
	$organization_data = formatSubcategoryContent(rawContent($valid_path . "organization.txt"), $valid_sub_col, $valid_cat);
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

<!-- Modal link style -->
<!-- Need to move to CSS after the update! -->
<style type="text/css">
	.myBtn {
		cursor: pointer;
	}

	.myBtn:hover {
		text-decoration: underline;
	}
</style>

<?php
	echo'
	<body>
		<div class = "banner_wrapper">
			<div class = "Text_wrapper">
			<br><br><br>
				<h1>' . ucfirst(strval($working_group)) . ' Health</h1>

				<p class = "text_body"> '; 

				for ($i = 0; $i < count($working_description); $i++){
						echo $working_description[$i] . " ";
					}

	echo ' </p></div>
			<div class = "Hotline_wrapper"><br><br><br><br><br><br><br><br><br><br>
				<div class = "v1"></div>
					<div id = "Hotline_table">
						<h2> National Hotlines </h2> 
						<ul>';

							foreach (array_keys($hotlines) as $key){
								echo "<li>" . $key . "  :  " . $hotlines[$key] .  "</li>";
							}

	echo'	
						</ul>
					</div>
				</div>
			</div>

			<br><br><br><br><br><br><br><br><br><br><br><br><br>
	
			<div class = "resources">
				<div class="faculty_resources">
					<h3> Faculty Resources </h3>
					<ul> ';
						foreach($faculty_resources as $key){
							echo "<li style = 'font-family: sans-serif;'><a class=\"myBtn\" onclick=\"openModal('" . $key["organization"] . "')\">" . $key["organization"] . "</a></li>";
						}

					echo '</ul>
		
				</div>	

				<div class = "student_resources">
					<h3> Student Resources </h3>

					<ul>';


						foreach($student_resources as $key){
							echo "<li style = 'font-family: sans-serif;'><a class=\"myBtn\" onclick=\"openModal('" . $key["organization"] . "')\">" . $key["organization"] . "</a></li>";
						}

					echo '</ul>
				</div>
			<div class = "separator"></div>
		</div>
	</body>'
?>

<!-- The Modal -->
<?php include "modal.php"?>
