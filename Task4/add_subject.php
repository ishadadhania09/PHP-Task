<?php

// Connect to the database
$conn = new mysqli("localhost", "root", "root", "php");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $subject_name = $_POST["subject_name"];
  

 

  // Insert the new subject into the subjects table
  $sql = "INSERT INTO `subjects` (`subject_name`) VALUES ('$subject_name')";
  if ($conn->query($sql) === TRUE) {
    echo "Subject added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Subject</title>
</head>
<body>
<form method="POST" action="add_subject.php">
  <label for="subjectName">Subject Name:</label>
  <input type="text" name="subject_name" required><br>
  <input type="submit" value="Add Subject">
</form>

</body>
</html>
