<?php 
session_start();
if (empty($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
$accessTypeName = $_SESSION['access_type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

    .form-group button {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
      background-color: #6c4caf;
    }

    .form-group button[type="submit"] {
      background-color: #6c4caf;
      width: 106%;
      padding: 10px;
      color: white;
      cursor: pointer;
     
    }

    .form-group button[type="submit"]:hover {
      background-color: #6c4caf;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>User Dashboard</h1>
    <h2>Welcome, <?php echo $_SESSION['login']; ?></h2>
    <p>Your access type: <?php echo $accessTypeName; ?></p>

    <?php if ($accessTypeName === "admin") { ?>
        <p>Welcome, Admin! You have special privileges.</p>
        <form action="educationportal.php" method="POST">
          <div class="form-group">
            <label for="educationportal">Education Portal:</label>
            <button><a href="educationportal.php"></a>Go to Education Portal</button>
          </div>
        </form>
    <?php } 
    elseif ($accessTypeName === "teacher") { ?>
        <p>Welcome, Teacher! You can manage your classes and assignments.</p>
        <form action="educationportal.php" method="POST">
          <div class="form-group">
            <label for="education_portal">Education Portal:</label>
            <button><a href="educationportal.php"></a>Go to Education Portal</button>
          </div>
        </form>
    <?php } 
    elseif ($accessTypeName === "student") { ?>
        <p>Welcome, Student! Access your courses and assignments here.</p>
    <?php } 
    elseif ($accessTypeName === "librarian") { ?>
        <p>Welcome, librarian! Access your courses and assignments here.</p>
    <?php } else { ?>
        <p>Welcome! Please contact the administrator for further instructions.</p>
    <?php } ?>
    <form action="view.php" method="POST">
      <div class="form-group">
        <label for="view">View:</label>
        <button><a href="view.php"></a>View</button>
      </div>
    </form>
    <form action="newuser.php" method="POST">
      <div class="form-group">
        <label for="newuser">Add new user:</label>
        <button><a href="newuser.php"></a>New User</button>
      </div>   
    </form>
    <form action="logout.php" method="POST">
      <div class="form-group">
        <label for="logout">Logout:</label>
        <button><a href="logout.php"></a>Logout</button>
      </div>   
    </form>
  </div>
</body>
</html>
<?php 

if(isset($_POST['logout'])){

session_start(); 
session_unset(); 
session_destroy(); 

header("Location: login.php");
exit();
 }
?>
