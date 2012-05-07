<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Live</title>

	<script>
		var Prefetch = {
			messages: <?php echo $messages; ?>
		};
	</script>

	<?php
	echo Asset::css(array(
		'http://fonts.googleapis.com/css?family=Fredoka+One',
		'bootstrap.css',
		'main.css',
	));
	echo Asset::js(array(
		'jquery.min.js',
		'underscore.min.js',
		'backbone.min.js',
		'handlebars.js',
		'bootstrap.min.js',
		'pusher.min.js',
		'app.js',
	));
	?>

	<script type="text/x-handlebars-template" id="template-form">
		<form id="new-list-item">
			<fieldset>
				<legend>Shout!</legend>
				<p>
					<input placeholder="Your Name" class="span4" id="new-name" autofocus required>
					<textarea placeholder="Your Message" class="span4" id="new-text" required></textarea>
				</p>
			</fieldset>
				<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</script>

	<script type="text/x-handlebars-template" id="template-list">
		<h2>Live Shouts</h2>
		<p class="info">Open another browser window to see messages you write be pushed down to you.</p>
		{{#if collection}}
			<ul>
				{{#each collection}}
					<li>
						<strong>{{name}}</strong> <em>says</em>: <br>
						{{text}}
					</li>
				{{/each}}
			</ul>
		{{else}}
			<p>Nothing.</p>
		{{/if}}
	</script>
</head>
<body>

	<div class="container">

		<hgroup>
			<h1>Shoutbox</h1>
			<p><a href="http://danharper.me">Dan Harper</a> for <a href="http://net.tutsplus.com">Nettuts+</a></p>
		</hgroup>

		<div class="row">
			<div class="span12">
				<div id="form-shell">
					<p>Form.</p>
				</div>

				<div id="list-shell">
					<p>Messages.</p>
				</div>
			</div>
		</div>

	</div><!-- .container -->

</body>
</html>