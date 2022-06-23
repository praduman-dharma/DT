<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <p>
    <label for="username">Name*</label><br>
    <input type="text" name="username" id="username">
  </p>
  <p>
      <label for="email">Email*</label><br>
      <input type="email" name="email" id="email">
  </p>
  <p>
      <label for="password">Password*</label><br>
      <input type="password" name="password" id="password">
  </p>
  <p><button>Submit</button></p>
</form>

<?php

// Has the form been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Username & cleanup
  $username = preVal($_POST['username']);

  // Validate empty or less than 3 characters
  if(empty($username) || strlen($username) < 3) {
    echo "<p>Error: Name requires a minimum of 3 characters</p>";
  }

  // Email & cleanup
  $email = preVal($_POST['email']);

  // Validate empty or email
  if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p>Error: Please provide a valid email address</p>";
  }

  // Password & cleanup
  $password = preVal($_POST['password']);

  // Define RegEx pattern
  $pattern  = "/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{7,}$/";

  // Validate empty or pattern
  if(empty($password) || preg_match($pattern, $password) === 0) {
    echo "<p>Error: Password is invalid</p>";
  }
}

// Clean up
function preVal($str) {
  return trim($str);
}

?>