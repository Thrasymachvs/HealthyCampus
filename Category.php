<?php
include "format.php";
$category_data = $category_data = formatSubcategoryContent(rawContent("database/subcategory.txt"), $valid_sub_col, $valid_cat);
$organization_data = formatSubcategoryContent(rawContent("database/organization.txt"), $valid_sub_col, $valid_cat);
$working_group = $category_data[0]["category"];
$working_description = $category_data[0]["description"];
$hotlines= $category_data[0]["hotlines"];
$faculty_resources = get_user_resources("Mental", "Faculty", $organization_data);
$student_resources = get_user_resources("Mental", "Students", $organization_data);



echo '<div id="head" class="wrapper">
		<div id="navbar">';
			
		
				// Description: List menu items horizontally
				// Parameter: $subname: The name of the button
				//			  $link: The link of the button
				//			  $num: Define which button to use
				function menuButton($subname, $link, $num) {
					$style = (strlen($subname) >= 10) ? "1.2em" : "1.6em";
					echo "<a href='" . $link . "'>";
					echo "<div class='subcategory' style=\"background-image: url('img/button/button_" . $num . ".png'); background-size: 100% auto\">";
					echo "<p style='padding-top: " . $style . ";'>" . $subname . "</p>";
					echo "</div>";
					echo "</a>";
				}

				echo "<nav>";

				// '$valid_cat' is the valid category and is listed in the 'format.php'
				for ($i = 0; $i < count($valid_cat); $i++) { 
					menuButton($valid_cat[$i], "", $i + 1);
				}

				echo "</nav>";

			

echo'
<!DOCTYPE HTML>

<html>
<head>
<link rel="stylesheet" type="text/css" href="categorystyle.css">
</head>
<body>
<div class = "banner_wrapper">
<div class = "Text_wrapper">
<br><br><br>
<h1>' .$working_group . ' Health</h1>

<p class = "text_body"> '; 

for ($i = 0; $i < count($working_description); $i++){
		echo $working_description[$i] . " ";
	}

echo ' </p></div><div class = "Hotline_wrapper"><br><br><br><br><br><br><br><br><br><br>

	<div class = "v1"></div>
	<div id = "Hotline_table">
		<h2> National Hotlines </h2> 
			<ul>
		';

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
</body>
</html?'
?>



