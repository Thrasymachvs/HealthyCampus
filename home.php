<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/dropdown.css">
<link rel="stylesheet" href="css/chevron.css">
<link rel="stylesheet" href="css/text_underline.css">
<link rel="stylesheet" href="css/push_anim.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
	include 'format.php';
?>
<body>
	<div id="head" class="wrapper">
		
		<!-- Navigation -->
		<?php 
			include 'php_include/navigation.php';

			// Modal - The pop up page
			include "modal.php";
			$organization_data = Format::formatOrganizationContent("database/organization.txt", "database/RECOVERY/organization.txt");
		?>
		
		<div id="search">
			
			<?php
				
				$dropdown_choices = Format::$dropdown_choices;
				
				// Description: Create the dropdown menu
				// Parameter: $choice: list of choices in dropdown menu
				function dropdown($choices) {
					// Choose a random element from the list to be default
					$i = array_rand($choices);
					echo "<dt><a><span id='choice' style='font-weight: normal; font-size: 1.5em;'>" . $choices[$i] . "</span></a></dt>";
					echo "<dd><ul style='display:none;'>";
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
				echo "<button id='submit_search'>Find resource</button>";
			?>
		</div>
		<div id="chevron">
			<a href="#about" class="hvr-push">
				<?php include 'php_include/chevron.php'?>
			</a>
		</div>
		<div id="button">
			<a href="#about" class="effect-underline">ABOUT</a>
		</div>
	</div>

	<!-- About -->
	<div id="body" class="wrapper">
		<div id="about">
			<h1>About</h1>
			<p>
				This website's purpose is to help students, faculty, and staff at UCI find on-campus health resources.
			</p>
			<p>
				The Healthy Campus Initiative (HCI) at UCI aims to promote campus health by addressing significant health challenges and increasing the awareness of resources people can use to combat them. These challenges are wide-ranging and are necessary to acknowledge in order to ensure the wellness of all of UCI's attendees. This initiative is part of the much larger HCI being introduced to all 10 schools within the University of California system as well as many other participating college campuses around the United States. 
			</p>
			<p>
				UCI’s HCI is lead by the Institute for Clinical and Translational Science (ICTS). We seek to build on the existing strengths and resources of our campus to enhance a culture of health and wellness for everyone here at UCI. 
			</p>
			<p>
				Please contact Luis Cendejas at <span style="color: DarkBlue;">lcendeja@uci.edu</span>, or (949)824-9560 if you have any questions regarding the Healthy Campus Initiative, or if you just want to talk to him.
			</p> 
		</div>
		
	</div>
</body>

<!-- Dropdown button animation -->
<script src="js/dropdown.js"></script>
<script src="js/smooth_scroll.js"></script>

<!-- Allow modal to open and close and display the correct information -->
<script src="js/modal.js"></script>
<script type="text/javascript">

	$(document).ready(function() {

		// Check what's selected after pressing 'Search'
		$("#submit_search").click(function() {

			// Determine which on the dropdown choices are selected
			var selected = $("dt a span").html();

			// A modal will open and display information based on the selected choice
			if (selected == "Sexual Assault") {
				openModal("Campus Assault Resource & Education");
			} else if (selected == "Extracurricular Activities") {
				openModal("Anteater Recreation Center");
			} else if (selected == "Stress, Anxiety and Depression") {
				openModal("Counseling Center");
			} else if (selected == "Colds, Flus and Sore Throats") {
				openModal("Student Health Center");
			} else if (selected == "STD") {
				openModal("Student Wellness & Health Promotion");
			}
		});


	});
</script>
