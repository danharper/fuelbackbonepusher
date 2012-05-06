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
				<legend>Add Message</legend>
				<p>
					<input placeholder="Your Name" class="span4" id="new-name" autofocus required>
					<textarea placeholder="Your Message" class="span4" id="new-text" required></textarea>
				</p>
			</fieldset>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</script>

	<script type="text/x-handlebars-template" id="template-list">
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

		<h1>Welcome!</h1>

		<div class="row">
			<div class="span4" id="form-shell">
				<p>Form.</p>
			</div>

			<div class="span8" id="list-shell">
				<p>Messages.</p>
			</div>
		</div>

	</div><!-- .container -->

</body>
</html>