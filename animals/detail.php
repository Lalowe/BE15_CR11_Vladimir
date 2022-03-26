<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Detail</title>
</head>
<body>
    <?php

    require_once '../components/db_connect.php';

    if(isset($_GET['id'])){ 
        $sql = "SELECT * FROM animals WHERE id_a = {$_GET['id']}";// klasicka podmienka z sql / we created
        // query a ulozili do $query a pouzijeme $_Get metodu ze ktore id sa ma zobrazit
        $result = mysqli_query($connect, $sql);
        if($row = mysqli_fetch_array($result)){
            
            echo "

          <div class='row row-cols-1 row-cols-md-2 g-4'>
            <div class='col'>
            <div class='card-group shadow p-3 mb-5 bg-light rounded '>
            <div class='card '>
            <h2> Detail Info </h2>
            <img src='../pictures/".$row['picture']."' class='card-img-top'  width= 100px ; height = 250px ; alt='...'>
              <div class='card-body'>
                <h5 class='card-title'>Name : ".$row['name']. "</h5>
                <hr>
                <p class='card-text'>Breed :".$row['breed']."</p>
                <hr>
                <p class='card-text'>Hobbies : ".$row['hobbies']."</p>
                <hr>
                <p class='card-text'>Age : ".$row['age']."</p>
                <hr>
                <p class='card-text'>Place of living : ".$row['live_at']."</p>
                <hr>
                
              </div>
            </div>
            </div>
            </div>

          </div>" ;
        }
    }   
    ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>