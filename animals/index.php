<?php
session_start();
require_once '../components/db_connect.php';

// if (isset($_SESSION['user']) != "") {
//     header("Location: ../home.php");
//     exit;
// }

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

$sql = "SELECT * FROM animals";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
$tbodyd = '';
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='../pictures/" . $row['picture'] . "'</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['description'] . "</td>
            <td>" . $row['breed'] . "</td>
            <td>" . $row['hobbies'] . "</td>
            <td>" . $row['size'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>" . $row['live_at'] . "</td>
            <td>
            <a href='detail.php?id=" .$row['id_a']."'><button class='btn btn-outline-info btn-sm' type='button'>Detail</button></a>
                <form action='actions/a_add.php' method='post'>
                <button class='btn btn-outline-success btn-sm' type='submit' name='adopt'>Adopt me !</button><input type='hidden' name=id_a value= " . $row['id_a'] . " ></form>     
            </td>

            </tr>";
            if(isset($_SESSION["adm"])){
                $tbody .= " <td><a href='update.php?id=" . $row['id_a'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
                <a href='delete.php?id=" . $row['id_a'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>";
            }
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals</title>
    
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        td {
            text-align: left;
            vertical-align: middle;
        }

        tr {
            text-align: center;
        }
    </style>
</head>

<body>
<div class="container w-75 h-74 mt-4 mx-auto">
        <h2 class="text-center display 3 text m-3">Animals</h2>
        <?php 
        if(isset($_SESSION["adm"])){ echo '<a href="create.php"><button class="btn btn-outline-primary display 1 mb-3"  >Add a new pet</button></a>
        ';}?>
        <table class=" table table-dark table-striped table-hover">
            <thead class="table-secondary table-dark  display-9 text">
                
                <!-- cize toto je vrch table to je to co je hore co sa nemeni co je stale -->
                <tr> 
                <a href="senior.php"><button class="btn btn-outline-primary display 1 mb-3" type="button">Seniors</button></a>
                <a href="../home.php"><button class="btn btn-outline-primary display 1 mb-3 "type="button">Home</button></a>
                    <th >Picture</th>
                    <th >Name</th>
                    <th >Description</th>
                    <th >Breed</th>
                    <th >hobbies</th>
                    <th >Size</th>
                    <th >Age</th>
                    <th >Place of live</th>
                    <th >Actions</th>
                    

                </tr>
            </thead>
            <!-- a tu vkladam svoj php table rovno pod ten horny table  -->
            <tbody>
                <?php echo $tbody 
                ?>
            </tbody>
            
        </table>
</body>
</html>