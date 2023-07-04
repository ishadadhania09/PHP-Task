<?php
$conn = new mysqli('localhost', 'root', 'root', 'php');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $accessTypeId = $_POST["accessType"];

  $stmt = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";

  if ($conn->query($stmt) === TRUE) {
    // Get the inserted user's ID
    $userId = $conn->insert_id;

    // Store the user's access type in the `userType` table
    $accessTypeStmt = "INSERT INTO userType (user_id, access_type_id) VALUES ('$userId', '$accessTypeId')";

    if ($conn->query($accessTypeStmt) === TRUE) {
      echo "Registration successful!";
    } else {
      echo "Error inserting access type: " . $conn->error;
    }
  } else {
    echo "Error inserting user: " . $conn->error;
  }

  $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 50px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f2f2f2;
    }

    .container h1 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .form-group input[type="submit"] {
      background-color: #6c4caf;
      width: 106%;
      padding: 10px;
      color: white;
      cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
      background-color: #6c4caf;
    }
  </style>
</head>
<body>
  
  <div class="container">
    <h1>Registration Form</h1>
    <form action="" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
     
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="number" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="accessType">Access Type:</label>
        <select name="accessType" id="accessType" required>
      <?php
            // PHP code to fetch access types and generate options
            $conn = new mysqli('localhost', 'root', 'root', 'php');

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $accessTypeQuery = "SELECT id, name FROM accessType";
            $accessTypeResult = mysqli_query($conn, $accessTypeQuery);
            $accessTypes = mysqli_fetch_all($accessTypeResult, MYSQLI_ASSOC);

            foreach ($accessTypes as $accessType) {
              echo '<option value="' . $accessType['id'] . '">' . $accessType['name'] . '</option>';
            }

            
          ?>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" value="Register">
      </div>
      <label>Already have an account?<a href="login.php">Login</a></label>
    </form>
  </div>
</body>
</html>

