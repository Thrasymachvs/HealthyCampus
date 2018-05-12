<link rel="stylesheet" href="css/dropdown.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- <h1>Dropy</h1>
<h2>A Simple SCSS & jQuery dropdown</h2>

<main>
  <p><a href="https://codepen.io/Tombek/pen/OPvpLe" target="_blank">I've made a new version of Dropy !</a></p>
</main> -->


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

<!-- <dl class="dropdown">
	<dt><a><span>Dropdown n°2</span></a></dt>
		<dd>
			<ul>
				<li><a class="default">Dropdown n°2</a></li>
				<li><a>Option n°1</a></li>
				<li><a>Option n°2</a></li>
				<li><a>Option n°3</a></li>
				<li><a>Option n°4</a></li>
				<li><a>Option n°5</a></li>
				<li><a>Option n°6</a></li>
			</ul>
		</dd>
</dl>

<dl class="dropdown">
	<dt><a><span>Dropdown n°3</span></a></dt>
		<dd>
			<ul>
				<li><a class="default">Dropdown n°3</a></li>
				<li><a>Option n°1</a></li>
				<li><a>Option n°2</a></li>
			</ul>
		</dd>
</dl> -->
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
