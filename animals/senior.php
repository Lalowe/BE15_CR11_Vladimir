<?php
require_once '../components/db_connect.php';

    $query = "SELECT * FROM animals WHERE age > 8 ORDER BY age DESC "; ;// klasicka podmienka z sql / we created
    // query a ulozili do $query a pouzijeme $_Get metodu ze ktore id sa ma zobrazit
    
    $tbody = "";
    
    $result = mysqli_query($connect, $query);
    
    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){// you need while loop to show all of them because
        // if you not use it it will just show one publisher_name what was clicked
    
        
         
        $tbody .="
        <div class=col>
    <div class=card>
  <img src='../pictures/" . $row['picture'] . "' class= card-img-top width = 300px height = 200px >
  <div class=card-body>
    <h5 class=card-title>Name :" . $row['name'] . "</h5>
    <p class=card-text>Description: " . $row['description'] . "</p>
    <hr>
    <p class=card-text>Age: " . $row['age'] . "</p>
  </div>
</div>
      ";
    }
}   
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Senior Club</title>
</head>
<body>
    
<div class="container mt-3">
<h3 class = mt-3>Our seniors will be your Friends:</h3>
<div class="row row-cols-4 row-cols-md-2 g-4">
    
<?php echo $tbody ?>
</div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

