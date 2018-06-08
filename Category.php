<link rel="stylesheet" href="css/categorystyle.css">

<?php
	include "format.php";

	// Access the chosen group
	$group = $_GET["group"];

		//sets the path for the image to be used on the page. In this case, the name of the image must share the same name as the $group variable, and it must be placed in the img/bg folder. Additionally, it must be a .png file. 
		$bg_image = "img/bg/" . $group . ".png";
	
	// Access both 'category' and 'organization' data
	// $category_data = formatSubcategoryContent(rawContent($valid_path . "subcategory.txt"), $valid_sub_col, $valid_cat);
	$category_data = Format::formatSubcategoryContent("database/subcategory.txt", "database/RECOVERY/subcategory.txt");
	// $organization_data = formatSubcategoryContent(rawContent($valid_path . "organization.txt"), $valid_sub_col, $valid_cat);
	$organization_data = Format::formatOrganizationContent("database/organization.txt", "database/RECOVERY/organization.txt");
	// print_r($category_data);
	// print_r($organization_data);
	
	// Access that array that holds the information of the specified category	
	$category = (strpos($group, "_") === false) ? strtolower($group) : strtolower(substr($group, 0, strpos($group, "_")));
	$key = array_search($category, array_column($category_data, 'category'));

	// Access the information that holds the information of the specified category
	$working_group = $category_data[$key]["category"];
	//Hotfixes for a few working groups that wouldn't format right
	if ($working_group == "alcohol"){
		$title = "Alcohol & Other Drugs";
	}
	//Hotfix for working group that doesn't format right. 
	else if ($working_group == "nutrition"){
		$title = "Nutritional";
	}
	//General case: Just keep the $group value as the name
	else{
		$title = ucfirst(strval($working_group));
	}
	//Get the description from the database 
	$working_description = $category_data[$key]["description"];
	//Pull the hotlines from the database
	$hotlines= $category_data[$key]["hotlines"];
	
	// Access Faculty' resrouces
	// echo ucfirst(strval($working_group));
	$faculty_resources = Format::get_user_resources($working_group, "Faculty", $organization_data);

	// Access 'Student' resrouces
	$student_resources = Format::get_user_resources($working_group, "Student", $organization_data);
	// echo ucfirst(strval($working_group));

	// Modal - The pop up page
	include "modal.php";

	// Navigation
	include 'php_include/navigation.php';

?>

<!-- Modal link style -->
<!-- Need to move to CSS after the update! -->

<style type="text/css">
body{
	

	background-image: url(<?php echo $bg_image?>);
}
	.myBtn {
		cursor: pointer;
	}

	.myBtn:hover {
		text-decoration: underline;
	}
</style>

<body>
	<div class = "viewport">
	<div class = "text_wrapper">
		<div class = "card">
			<div class = "container">
				<?php 
				//Print the header with the working group in the title 
					echo "<h1 class = 'header'>". $title . " Health</h1>"; 
					//Iterate through the working description's sections and print out the data from the database. 
					for ($i = 0; $i < count($working_description); $i++){
						echo "<p class = 'text_body'>" . $working_description[$i] . "</p>";
					}
					// echo "</p>";
				?>
			</div>
		</div>

		<div class = "faculty_resources">
		<div class = "card">
			<div class = "container">
				<h3 class = 'header'>Faculty Resource Links</h3>
				<ul>
					<?php
					//Iterate through all of the resources for faculty members and print it out with the appropriate links to the modals
						foreach($faculty_resources as $key){
							echo "<li class = 'text_setting'><a class=\"myBtn\" onclick=\"openModal('" . $key["organization"] . "')\">" . $key["organization"] . "</a></li>";
						} 
					?>
				</ul>
			</div>
		</div>
	</div>

	<div class = "student_resources">
		<div class = "card">
			<div class = "container">
				<h3 class = 'header'>Student Resource Links</h3>
				<ul>

					<?php
					//Iterate through all of the resources for students and print the resources out with appropriate links to the modals 
						foreach($student_resources as $key){
							echo "<li class = 'text_setting'><a class=\"myBtn\" onclick=\"openModal('" . $key["organization"] . "')\">" . $key["organization"] . "</a></li>";
						} 
					?>
				</ul>
			</div>
		</div>
	</div>


</div>
<div class = "Hotline_wrapper">
		<div class = "card">
			<div class = "container">
				<div id = "Hotline_table">
					<h2 class = 'header'> National Hotlines </h2>
					<ul>
						<?php
							//Print out each Hotline name and the appropriate phone number., 
							foreach (array_keys($hotlines) as $key){
								echo "<li class ='header'>" . $key . "  : <br> <p class = 'number_text'> " . $hotlines[$key] .  "</p></li>";
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</div>

	

	



	<!-- Allow modal to open and close and display the correct information -->
	<script src="js/modal.js"></script>


</body>
</html>

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

