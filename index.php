<?php

$errors =array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
var_dump($name);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {		//Check to see if the form has been submitted before validating
	if (empty($name)) {
		$errors['name'] = true;
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Form</title>
	<link href="css/general.css" rel="stylesheet"

</head>

<body>
	<form action="index.php" form method="post">
		<div>
			<label for="name">Name<?php if (isset($errors['name'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="name"  name="name" value="<?php echo $name; ?>" required>
		</div>
		<div>
			<label for="email">E-mail Address</label>
			<input id="email"  id="email" name="email">
		</div>
		<div>
			<label for="message">Message</label>
			<textarea id="message"  name="email"></textarea>
		</div>
		<div>
			<button type="submit">Send Message</button>
		</div>
	</form>
</body>
</html>