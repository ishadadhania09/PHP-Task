
<?php
session_start();
if(isset($_SESSION['login'])){
 header("location:dashboard.php");
   }
   $conn = mysqli_connect('localhost', 'root', 'root', 'php');
   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
   if ($_POST['login']) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT users.*, accessType.name AS access_type_name 
    FROM `users` 
    JOIN userType ON users.id = userType.user_id 
    JOIN accessType ON userType.access_type_id = accessType.id 
    WHERE email='$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = $email;
        $_SESSION['access_type'] = $row['access_type_name'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?> 


<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      
    }

    .container {
      max-width: 400px;
      margin: auto auto;
      margin-top: 100px;
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
  
      <h2>Login</h2>
    <form method="POST" action="">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" required><br><br>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
    </div>
    <div class="form-group">
    <input type="submit" name="login" value="Login">
    </div>     
    </form>
      <label>Don't have an account?<a href="registrationform.php">Sign Up</a></label>
    </form>
  </div>
</body>
</html>


















