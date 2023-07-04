<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "root", "php");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $id = $_POST["id"];
  $subject_name = $_POST["subject_name"];

  // Update the subject in the subjects table
  $sql = "UPDATE `subjects` SET `subject_name`='$subject_name' WHERE `id`='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Subject updated successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}

// Retrieve the subject data for editing
if (isset($_GET["id"])) {
  $subject_id = $_GET["id"];

  // Retrieve the subject from the subjects table
  $sql = "SELECT * FROM `subjects` WHERE `id`='$subject_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $subject_name = $row["subject_name"];
  } else {
    echo "Subject not found!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Subject</title>
</head>
<body>
<form method="POST" action="edit_subject.php">
  <label for="subjectName">Subject Id:</label>
  <input type="text" name="id" value="<?php echo $id; ?>"><br>
  <label for="subjectName">Subject Name:</label>
  <input type="text" name="subject_name" value="<?php echo $subject_name; ?>" required><br>
  <input type="submit" value="Update Subject">
</form>
</body>
</html>
