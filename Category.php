<link rel="stylesheet" href="css/categorystyle.css">

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
							echo "<li style = 'font-family: sans-serif;'>" . $key["organization"] . "</li>";
						}

					echo '</ul>
		
				</div>	

				<div class = "student_resources">
					<h3> Student Resources </h3>

					<ul>';


						foreach($student_resources as $key){
							echo "<li style = 'font-family: sans-serif'>" . $key["organization"] . "</li>";
						}

					echo '</ul>
				</div>
			<div class = "separator"></div>
		</div>
	</body>'
?>

<!-- <style type="text/css">
	#container {
		margin: 0 auto;
		width: 100%;
		height: auto;
		background-color: blue;
		display: flex;
		justify-content: center;
	}

	#content {
		width: 60%;
		background-color: yellow;
	}

	#content * {
		margin: 10px;
	}

	#description {
		height: 250px;
		background-color: red;
	}

	#resources {
		background-color: brown;
		display: flex;
		justify-content: center;
		min-height: 200px;
		height: auto;
	}

	#resources * { 
		width: 50%;
	}

	#faculty {
		/*height: 100px;*/
		background-color: grey;
	}

	#student {
		/*height: 100px;*/
		background-color: lavender;
	}

	#hotlines {
		width: 20%;
		background-color: green;
	}
</style>

<div id="container">

	<div id="content">

		<div id="description">Name & Description</div>
		
		<div id="resources">
			
			<div id="faculty">Faculty Resources</div>
			
			<div id="student">Student Resources</div>
		</div>

	</div>

	<div id="hotlines">Hotlines</div>
</div> -->

