<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Chapter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4c4faf;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 600px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 6px 10px;
            background-color: #4c4faf;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        button a {
            color: #fff;
            text-decoration: none;
        }

        button a:hover {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1 text align = "center">List of Chapter</h1>
    <form action="" method="POST">
    <input type="submit" value="View" name="view">
    </form>
</body>
</html>

<?php


$conn = new mysqli('localhost','root','root','php');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['view'])){

    global $conn;
    $query1 = "Select * from chapters";
    $result = mysqli_query($conn,$query1);

    if(mysqli_num_rows($result)>0){?>
       <table align="center" border="1px" style="width:600px; line-height:40px;">
            <thead>
            <tr>  
            <th>Id</th> 
            <th>Chapter Name</th>
            <th>Update</th>
            <th>Delete</th>
            
            
            </tr>
        </thead> <tbody><?php
        while($row = mysqli_fetch_assoc($result)){
            ?>
           <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['chapter_name'];?></td>
                <td><button><a href="edit_chapter.php?upd=<?php echo $row['id']; ?>">Update</a></button></td>
                <td><button><a href="delete_chapter.php?delete=<?php echo $row['id']; ?>">Delete</a></button></td>
                </tr>
                <?php
        }?>
        <button style="center"><a href="add_chapter.php?<?php echo $row['id']; ?>">Add Chapter</a></button>
        <?php
        echo "</tbody>
                </table>";
               
    }

}


?>