<?php
// session_start();
// if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'teacher')) {
//     header("Location: index.php");
//     exit();
// }
$conn = new mysqli('localhost','root','root','php');
if($conn->connect_error){
    die('Connection Fail'.$conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission and assign students to standards in the database
    // Insert the student-standard associations into the database (assuming you have a MySQL database)
   

    $standardId = $_POST['standard'];
    $studentIds = $_POST['students'];

    foreach ($studentIds as $studentId) {
        $query = "INSERT INTO standard_student (standard_id, student_id) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ii', $standardId, $studentId);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}

// Fetch standards and students from the database for the form dropdowns
$conn = new mysqli('localhost','root','root','php');
    if($conn->connect_error){
        die('Connection Fail'.$conn->connect_error);
    }

$standardQuery = "SELECT * FROM standards";
$standardResult = mysqli_query($conn, $standardQuery);

$studentQuery = "SELECT * FROM Student";
$studentResult = mysqli_query($conn, $studentQuery);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assign Students to Standards</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            display: block;
            margin: 20px 0;
            padding: 10px;
            width: 100%;
            background-color: #524caf;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Assign Students to Standards</h1>
        <form method="POST" action="">
            <label>Standard:</label><br>
            <select name="standard" required>
                <option value="">Select a standard</option>
                <?php while ($standard = mysqli_fetch_assoc($standardResult)) { ?>
                    <option value="<?php echo $standard['id']; ?>"><?php echo $standard['std']; ?></option>
                <?php } ?>
            </select><br><br>

            <label>Students:</label><br>
            <select name="students[]" multiple required>
                <?php while ($student = mysqli_fetch_assoc($studentResult)) { ?>
                    <option value="<?php echo $student['id']; ?>"><?php echo $student['First_Name']; ?></option>
                <?php } ?>
            </select><br><br>

            <input type="submit" value="Assign">
        </form>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
