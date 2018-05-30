<link rel="stylesheet" href="css/categorystyle.css">

<?php
	include "format.php";

	// Access the chosen group
	$group = $_GET["group"];
	

	$bg_image = "img/category_bg/" . $group . ".png";
	
	
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
	include "modal.php";
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
<<<<<<< HEAD
	<div class = "viewport">
=======
	<div class = "text_wrapper">
		<div class = "card">
			<div class = "container">
				<?php 
					echo "<h1>". ucfirst(strval($working_group)) . " Health</h1> <p class = 'text_body'> "; 
					for ($i = 0; $i < count($working_description); $i++){
						echo $working_description[$i] . " ";
					}
					echo "</p>";
				?>
			</div>
		</div>
	</div>

>>>>>>> 2c866bf467667498a99e35d9673ea77e52a35e53
	<div class = "Hotline_wrapper">
		<div class = "card">
			<div class = "container">
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
	</div>
<<<<<<< HEAD
	</div>
	<div class = "text_wrapper">
	<div class = "card">
		<div class = "container">
		<?php 
			echo "<h1>". ucfirst(strval($working_group)) . " Health</h1>
			<p class = 'text_body'> "; 
			for ($i = 0; $i < count($working_description); $i++){
						echo $working_description[$i] . " ";
					}
			 ?>
			</div>
		</div>
		<div class = "faculty_resources">
			<div class = "card">
				<div class = "container">
			<h3><u>Faculty Resources</u></h3>
			<ul>
				<?php
					foreach($faculty_resources as $key){
=======

	
	<div class = "faculty_resources">
		<div class = "card">
			<div class = "container">
				<h3><u>Faculty Resources</u></h3>
				<ul>
					<?php
						foreach($faculty_resources as $key){
>>>>>>> 2c866bf467667498a99e35d9673ea77e52a35e53
							echo "<li style = 'font-family: sans-serif;'><a class=\"myBtn\" onclick=\"openModal('" . $key["organization"] . "')\">" . $key["organization"] . "</a></li>";
						} 
					?>
				</ul>
			</div>
		</div>
	</div>

	<div class = "student_resources">
		<div class = "card">
			<div class = "container">
				<h3><u>Student Resources</u></h3>
				<ul>
					<?php
						foreach($student_resources as $key){
							echo "<li style = 'font-family: sans-serif;'><a class=\"myBtn\" onclick=\"openModal('" . $key["organization"] . "')\">" . $key["organization"] . "</a></li>";
						} 
					?>
				</ul>
			</div>
<<<<<<< HEAD
			

</div>
	
<div class = "elem">
				<div class = "card">
					<div class = "container">
							<h3> FUN FACT </h3>
					<div class ="w3-center w3-display-middle" style = "width:100%">
					<div class = "w3-left">&#10094;</div>
					<p class = "text_body"> Swearing reduces stress! So what the f*** are you waiting for? </p>
					<div class = "w3-right">&#10095;</div>
				</div>
					</div>
				</div>			
			</div>
=======
		</div>
	</div>
>>>>>>> 2c866bf467667498a99e35d9673ea77e52a35e53

	
		

</div>

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

