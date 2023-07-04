<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List if Data</title>
</head>
<body>
    <h1 text align = "center">List of Users</h1>
    <form action="" method="POST">
    <input type="submit" value="View" name="view">
    </form>
    <form action="export.php" method="POST">
    <input type="submit" value="Export" name="export">
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
    $query1 = "Select * from users";
    $result = mysqli_query($conn,$query1);

    if(mysqli_num_rows($result)>0){?>
       <table align="center" border="1px" style="width:600px; line-height:40px;">
            <thead>
            <tr>  
            <th>Id</th> 
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Password</th>
            <th>Update</th>
            <th>Show</th>
            <th>Delete</th>
            
            
            </tr>
        </thead> <tbody><?php
        while($row = mysqli_fetch_assoc($result)){
            ?>
           <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['password'];?></td>
                <td><button><a href="update.php?upd=<?php echo $row['id']; ?>">Update</a></button></td>
                <td><button><a href="show.php?show=<?php echo $row['id']; ?>">Show</a></button></td>
                <td><button><a href="delete.php?delete=<?php echo $row['id']; ?>">Delete</a></button></td>
                </tr>
                <?php
        }
        echo "</tbody>
                </table>";
               
    }

}


?>

