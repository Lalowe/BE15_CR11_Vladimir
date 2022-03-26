<?php
session_start();
require_once '../components/db_connect.php';
// i wil not let you a create page if you are not a user
if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}
// i wil not let you a create page if you are not a user and not admin i will send to you index to log
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

// $agency = "";
// $result = mysqli_query($connect, "SELECT * FROM agency"); // tu mam spraveny 1.krok s 2. ze nemam  query, 

// while ($row = $result->fetch_array(MYSQLI_ASSOC)) {// tu mam spraveny 3. krok to vyfetchuje to assocciate array ktore vie php  citat
//     $agency .=
//         "<option value='{$row['agencyId']}'>{$row['agency_name']}</option>";
// }

// !!serri!! choice instead while to fetch everything at once without while loop
// $rows =mysqli_fetch_all ($result,MYSQLI_ASSOC)
// var_dump($rows) - just to see if work
//
//to achieve dropdown you use to see like all rows with agencies :
// you need $agency = "";
// foreach ($rows as $row){
//  if($row["agencyID"]  == $fk_agency){
//       $list.="<option value = '{$row["agencyId"]}'>{$row['agency_name']} </option>"
//   }
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>Add Animal</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Add a new pet</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Here insert a name" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="description" placeholder="Here insert a description" step="any" /></td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed" placeholder="Here insert a breed" step="any" /></td>
                </tr>
                <tr>
                    <th>Hobbies</th>
                    <td><input class='form-control' type="text" name="hobbies" placeholder="Here insert a hobbies" step="any" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class='form-control' type="text" name="size" placeholder="Here insert a size" step="any" /></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="number" name="age" placeholder="Here insert an age" step="any" /></td>
                </tr>
                <tr>
                    <th>Live at</th>
                    <td><input class='form-control' type="text" name="live_at" placeholder="Here insert where pet lives" step="any" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Confirm</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>