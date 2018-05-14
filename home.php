<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/dropdown.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body >
	<div id="wrapper">
		<div id="navbar">
			
			<?php
				// Description: List menu items horizontally
				// Parameter: $subname: The name of the button
				//			  $link: The link of the button
				function menuButton($subname, $link) {
					$style = (strlen($subname) >= 10) ? "1.2em" : "1.6em";
					echo "<a href='" . $link . "'>";
					echo "<div class='subcategory'>";
					echo "<p style='padding-top: " . $style . ";'>" . $subname . "</p>";
					echo "</div>";
					echo "</a>";
				}

				echo "<nav>";

				// Note: Change when database access is figured out
				$subcategory = array("SEXUAL HEALTH", "MENTAL HEALTH", "PHYSICAL ACTIVITY", "ALCOHOL ACTIVITY", "NUTRITION");
				foreach($subcategory as $sub) {
					menuButton($sub, "");
				}

				echo "</nav>";

			?>

		</div>
		<div id="search">
			
			<?php
				$dropdown_choices = array("Counseling Services" , "Fitness Groups" , "Anxiety Resources");
				// Description: Create the dropdown menu
				// Parameter: $choice: list of choices in dropdown menu
				function dropdown($choices) {
					// Choose a random element from the list to be default
					$i = array_rand($choices);
					echo "<dt><a><span style='font-weight: normal; font-size: 1.5em;'>" . $choices[$i] . "</span></a></dt>";
					echo "<dd><ul>";
					echo "<li><a class='selected'>" . $choices[$i] . "</a></li>";
					
					// Print the rest in the dropdown menu
					unset($choices[$i]);
					foreach($choices as $choice) {
						echo "<li><a>" . $choice . "</a></li>";
					}
					echo "</ul></dd>";					
				}

				echo "<p>I'M LOOKING FOR </p>";
				echo "<dl class='dropdown'>";
				dropdown($dropdown_choices);
				echo "</dl>";
				echo "<button id='submit_search'>Search</button>";
			?>

		</div>
	</div>
</body>
<script src="js/dropdown.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {

		// Check what's selected
		$("#submit_search").click(function() {
			var selected = $("dt a span").html();
			alert(selected);
		});


	});
</script>
