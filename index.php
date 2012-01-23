<?php

$possible_subjects = array(
	'Lego'
	, 'Star Wars'
	, 'Transformers'
);

$possible_priorities = array(
	'low' => 'Low Priority'
	, 'norm' => 'Normal Priority'
	, 'high' => 'High Priority'
);

$errors =array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
$picknum = filter_input(INPUT_POST, 'picknum', FILTER_SANITIZE_NUMBER_INT);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
$priority = filter_input(INPUT_POST, 'priority', FILTER_SANITIZE_STRING);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {		//Check to see if the form has been submitted before validating
	if (empty($name)) {
		$errors['name'] = true;
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = true;
	}

	if (mb_strlen($message) < 25) {		//mb_strlen == multi byte string length
		$errors['message'] = true;
	}
	
	if ($picknum < 1 || $picknum >10) {
		$errors['picknum'] = true;
	}
		
	if (!in_array($subject, $possible_subjects)) {
		$errors['subject'] = true;
	}

	if (!array_key_exists($priority, $possible_priorities)) {
		$errors['priority'] = true;
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
	<form action="index.php" method="post">
		<div>
			<label for="name">Name<?php if (isset($errors['name'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="name"  name="name" value="<?php echo $name; ?>" required>
		</div>
		<div>
			<label for="email">E-mail Address<?php if (isset($errors['email'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
		</div>
		<div>
			<label for="subject">Subject<?php if (isset($errors['subject'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<select id="subject" name="subject">
			<?php foreach ($possible_subjects as $current_subject) : ?>
				<option<?php if ($current_subject == $subject) {echo ' selected'; } ?>><?php echo $current_subject; ?></option>
			<?php endforeach; ?>
			</select>
		</div>
		<fieldset>
			<legend>Message Priority</legend>
			<?php if (isset($errors['priority'])) : ?> <strong>Select a priority</strong><?php endif; ?>
		<?php foreach ($possible_priorities as $key => $value) : ?>
			<input type="radio" id="<?php echo $key; ?>" name="priority" value="<?php echo $key; ?>"<?php if ($key == $priority) { echo ' checked'; } ?>>
			<label for="<?php echo $key; ?>"><?php echo $value; ?></label>
		<?php endforeach; ?>
		</fieldset>
		<div>
			<label for="message">Message<?php if (isset($errors['message'])) : ?> <strong>must be a min. of 25 characters</strong><?php endif; ?></label>
			<textarea id="message" name="message" required><?php echo $message; ?></textarea>
		</div>
		<div>
			<label for="picknum">Type in a number between 1 and 10<?php if (isset($errors['picknum'])) : ?> <strong>What part of "...between 1 and 10" do you not understand?!</strong><?php endif; ?></label>
			<input type="number" id="picknum" name="picknum" value="<?php echo $picknum; ?>" required>
		</div>
		<div>
			<button type="submit">Send Message</button>
		</div>
	</form>
</body>
</html>