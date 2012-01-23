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
			<label for="name">Name</label>
			<input id="name"  name="name">
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