<?php
session_start();
require_once "../../components/db_connect.php";


if($_POST){
    $id = $_SESSION["user"];
    $id_a = $_POST["id_a"];
    $sql = "INSERT INTO pet_adoption (fk_user_id, fk_animal_id) VALUES ($id, $id_a)";
    $result = mysqli_query($connect, $sql);

}

    

    $sql = "SELECT pet_adoption.*, animals.* FROM pet_adoption JOIN animals ON id_a=fk_animal_id WHERE fk_user_id = $_SESSION[user]";
    $result = mysqli_query($connect, $sql);
    $tcontent = "";
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $tcontent .= "<tr>
                <td><img class='img-thumbnail' src='../../pictures/" .$row['picture']."'</td>
                <td>" .$row['name']."</td>
                
                </tr>";
        }
    }
    else{
        $tcontent = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
    }

    mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adopt</title>
        <?php require_once '../../components/boot.php'?>
        <style type="text/css">
            .manageProduct {           
                margin: auto;
            }
            .img-thumbnail {
                width: 70px !important;
                height: 70px !important;
            }
            td {          
                text-align: center;
                vertical-align: middle;
            }
            tr {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="manageProduct w-75 mt-3">    
            <div class='mb-3'>
                <div class="d-flex justify-content-between">
                <a href= "../index.php"><button class="btn btn-primary" type="button" >Back</button></a>
                </div>
            </div>
            <p class='h2'>You have adopt </p>
            <table class='table table-striped'>
                <thead class='table-success'>
                    <tr>
                    </tr>
                </thead>
                <tbody>
                    <?= $tcontent;?>
                </tbody>
            </table>
        </div>
    </body>
</html>