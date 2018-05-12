<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/dropdown.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body >
	<div id="wrapper">
		<div id="navbar">
			
			<?php
				// List menu items horizontally
				// Parameter: $subname: The name of the button
				//			  $link: The link of the button
				function menuButton($subname, $link) {
					echo "<a href='" . $link . "'>";
					echo "<div class='subcategory'>";
					echo "<p>" . $subname . "</p>";
					echo "</div>";
					echo "</a>";
				}

				echo "<nav>";

				$subcategory = array("SEXUAL HEALTH", "MENTAL HEALTH", "PHYSICAL ACTIVITY", "ALCOHOL ACTIVITY", "NUTRITION ACTIVITY");
				foreach($subcategory as $sub) {
					menuButton($sub, "");
				}

				echo "</nav>";

			?>

		</div>
		<div id="search">
			<!-- PHP conversion: Ensure that the default on the SPAN is random -->
			<!-- Dropdown Menu -->
			<!-- Reference -->
			<p>I'm Looking For: </p>
			<dl class="dropdown">
				<dt><a><span style="font-weight: normal;">Dropdown n°1</span></a></dt>
				<dd>
					<ul>
						<li><a class="selected">Dropdown n°1</a></li>
						<li><a>Option n°1</a></li>
						<li><a>Option n°2</a></li>
						<li><a>Option n°3</a></li>
					</ul>
				</dd>
			</dl>
			<button id="check">Press Me</button>

			<!-- ------------- -->

		</div>
	</div>
</body>
<script src="js/dropdown.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {

		// Check what's chosen
		$("#check").click(function() {
			var selected = $("dt a span").html();
			alert(selected);
		});


	});
</script>
