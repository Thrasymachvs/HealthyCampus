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
			include 'php_include/navigation.php'
		?>
		
		<div id="search">
			
			<?php
				$dropdown_choices = array("Counseling Services" , "Fitness Groups" , "Anxiety Resources");
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
				echo "<button id='submit_search'>Search</button>";
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
	<div id="body" class="wrapper">
		<div id="about">
			<h1>About</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget bibendum sapien. Suspendisse sollicitudin, sem in auctor aliquet, mi nibh semper urna, in laoreet ante sem sit amet quam. Praesent imperdiet porta libero, et maximus justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean magna velit, rutrum a est sit amet, blandit imperdiet magna. Fusce non purus vel dolor euismod suscipit. Nunc egestas varius tellus, ut iaculis dolor fringilla vitae.
			</p>
			<p>
				Maecenas velit nibh, facilisis sed venenatis non, tristique id lacus. Ut viverra augue ornare erat pulvinar rutrum. Maecenas a massa id elit efficitur venenatis. Nullam ut mauris vitae elit placerat aliquet sit amet a purus. Fusce a ligula in risus iaculis sagittis. Nullam magna est, volutpat et finibus in, malesuada et elit. Aenean tempor rhoncus purus in tempor. Nam velit libero, ullamcorper a urna non, sagittis efficitur tellus. Morbi dapibus laoreet lectus, at tincidunt dui molestie vel. Nulla at magna eget massa varius gravida eu id tortor. Pellentesque tristique mauris et nisi pulvinar molestie congue finibus ligula. Integer blandit placerat imperdiet. Maecenas condimentum ligula ac nisi laoreet, ac fermentum ipsum laoreet. Nullam tempus nibh vitae elit pharetra, tincidunt volutpat lacus malesuada. Vestibulum rutrum maximus finibus.
			</p>
			<p>
				Nunc dapibus, odio eget rhoncus pretium, ligula tortor dictum nisl, eu scelerisque purus erat non nulla. In sagittis risus urna, sit amet rhoncus libero ornare in. Pellentesque egestas posuere quam, et imperdiet metus posuere nec. In at nulla vitae nibh pulvinar dapibus. Curabitur consectetur, mi eu ullamcorper posuere, quam dui tincidunt ante, dignissim pulvinar neque tellus quis tortor. Quisque sollicitudin, ipsum ut aliquam pellentesque, velit tellus pulvinar turpis, euismod viverra eros massa ac eros. Morbi a felis et ex vulputate pulvinar vel non dui. Quisque mollis nunc pretium, venenatis lorem semper, rhoncus felis.
			</p>
			<p>
				Duis tempor, augue eu cursus pulvinar, libero velit finibus nibh, molestie aliquet tellus augue sit amet leo. Aliquam tristique elementum mauris sit amet elementum. Maecenas lacinia est vitae augue congue dictum. Curabitur fringilla, ligula sit amet vestibulum volutpat, justo eros pulvinar augue, eu placerat libero arcu a ante. Nunc lobortis dolor eu venenatis viverra. Suspendisse pellentesque sapien vitae urna consectetur egestas. Ut aliquam turpis ut arcu dictum porttitor ut finibus est. Cras pharetra leo ac lacus luctus, ut cursus eros pretium. Morbi consectetur tellus vitae dolor finibus, eu vulputate ante sollicitudin.
			</p>
			<p>
				Donec varius faucibus vehicula. Vestibulum in tincidunt nulla, at sagittis libero. Nunc vehicula consequat elit, in finibus quam venenatis in. Nulla pharetra fringilla tortor, sit amet facilisis libero dictum a. Pellentesque ullamcorper est eget metus venenatis vulputate. Nam bibendum ligula pharetra rhoncus cursus. Aenean vel augue feugiat, lobortis odio eu, efficitur lorem. Praesent in sem semper metus mattis venenatis ac pulvinar ipsum. Fusce lacinia dui vitae lacus bibendum lobortis. Etiam odio arcu, eleifend at augue in, euismod ultricies justo. Ut congue, elit vel tempor interdum, nibh erat eleifend purus, id tincidunt diam justo at lorem.
			</p> 
		</div>
		
	</div>
</body>
<script src="js/dropdown.js"></script>
<script src="js/smooth_scroll.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {

		// Check what's selected
		$("#submit_search").click(function() {
			var selected = $("dt a span").html();
			alert(selected);
		});


	});
</script>
