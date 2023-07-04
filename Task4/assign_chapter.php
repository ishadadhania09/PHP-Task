<?php
// session_start();
// if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
//     header("Location: index.php");
//     exit();
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission and assign chapters to subjects in the database
    // Insert the chapter-subject associations into the database (assuming you have a MySQL database)
    $conn = new mysqli('localhost','root','root','php');
    if($conn->connect_error){
        die('Connectionh failed'.$conn->connect_error);
    }

    $subjectId = $_POST['subject'];
    $chapterIds = $_POST['chapters'];

    foreach ($chapterIds as $chapterId) {
        $query = "INSERT INTO subject_chapter (subject_id, chapter_id) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ii', $subjectId, $chapterId);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}

// Fetch subjects and chapters from the database for the form dropdowns
$conn = new mysqli('localhost','root','root','php');
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}

$subjectQuery = "SELECT * FROM subjects";
$subjectResult = mysqli_query($conn, $subjectQuery);

$chapterQuery = "SELECT * FROM chapters";
$chapterResult = mysqli_query($conn, $chapterQuery);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assign Chapters to Subjects</title>
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
        <h1>Assign Chapters to Subjects</h1>
        <form method="POST" action="">
            <label>Subject:</label><br>
            <select name="subject" required>
                <option value="">Select a subject</option>
                <?php while ($subject = mysqli_fetch_assoc($subjectResult)) { ?>
                    <option value="<?php echo $subject['id']; ?>"><?php echo $subject['subject_name']; ?></option>
                <?php } ?>
            </select><br><br>

            <label>Chapters:</label><br>
            <select name="chapters[]" multiple required>
                <?php while ($chapter = mysqli_fetch_assoc($chapterResult)) { ?>
                    <option value="<?php echo $chapter['id']; ?>"><?php echo $chapter['chapter_name']; ?></option>
                <?php } ?>
            </select><br><br>

            <input type="submit" value="Assign">
        </form>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
