<?php
// session_start();
// if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'teacher')) {
//     header("Location: index.php");
//     exit();
// }
$conn = new mysqli("localhost", "root", "root", "php");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission and assign subjects to standards in the database
    // Insert the subject-standard associations into the database (assuming you have a MySQL database)
    

    $standardId = $_POST['standard'];
    $subjectIds = $_POST['subjects'];

    foreach ($subjectIds as $subjectId) {
        $query = "INSERT INTO standard_subject (standard_id, subject_id) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ii', $standardId, $subjectId);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}

// Fetch standards and subjects from the database for the form dropdowns
$conn = new mysqli("localhost", "root", "root", "php");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$standardQuery = "SELECT * FROM standards";
$standardResult = mysqli_query($conn, $standardQuery);

$subjectQuery = "SELECT * FROM subjects";
$subjectResult = mysqli_query($conn, $subjectQuery);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assign Subjects to Standards</title>
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
        <h1>Assign Subjects to Standards</h1>
        <form method="POST" action="">
            <label>Standard:</label><br>
            <select name="standard" required>
                <option value="">Select a standard</option>
                <?php while ($standard = mysqli_fetch_assoc($standardResult)) { ?>
                    <option value="<?php echo $standard['id']; ?>"><?php echo $standard['std']; ?></option>
                <?php } ?>
            </select><br><br>

            <label>Subjects:</label><br>
            <select name="subjects[]" multiple required>
                <?php while ($subject = mysqli_fetch_assoc($subjectResult)) { ?>
                    <option value="<?php echo $subject['id']; ?>"><?php echo $subject['subject_name']; ?></option>
                <?php } ?>
            </select><br><br>

            <input type="submit" value="Assign">
        </form>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
