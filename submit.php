<?php

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject']
  $message = $_POST['message'];

  // Validate the form data
  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    $error = 'Please fill out all fields';
  } else {
    // Set the recipient email address
    $to = "olakriso@yahoo.com";

    // Set the email subject
    $subject = "$subject from $name";

    // Set the email headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
      $success = 'Your mail has been sent successfuly ! Thank you for your feedback';
    } else {
      $error = 'There was an error sending your message';
    }
  }
}



<!-- HTML form goes here -->
<form method="post">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo isset($name) ? $name : '' ?>">
  <br>
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" value="<?php echo isset($email) ? $email : '' ?>">
  <br>
  <label for="subject">Subject:</label>
  <input type="text" name="subject" id="subject" value="<?php echo isset($subject) ? $subject : '' ?>">
  <br>
  <label for="message">Message:</label>
  <textarea name="message" id="message"><?php echo isset($message) ? $message : '' ?></textarea>
  <br>
  <input type="submit" name="submit" value="Send">
</form>

<!-- Display success or error messages -->
<?php if (isset($success)) : ?>
  <p style="color: green"><?php echo $success ?></p>
<?php endif ?>
<?php if (isset($error)) : ?>
  <p style="color: red"><?php echo $error ?></p>
<?php endif ?>
