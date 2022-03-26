<?php

$localhost = "127.0.0.1";// 173.212.235.205
$username = "root"; // vladimir_vladimircodefact
$password = "";// aHQ?_W]z1BAD
$dbname = "BE15_CR11_petadoption_Vladimir";//vladimir_accommodation

// $localhost = "173.212.235.205";// 173.212.235.205
// $username = "vladimir_vladimircodefact"; // vladimir_vladimircodefact
// $password = "aHQ?_W]z1BAD";// aHQ?_W]z1BAD
// $dbname = "vladimir_accommodation";//vladimir_accommodation

// create connection
$connect = new  mysqli($localhost, $username, $password, $dbname);

// check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
// } else {
//     echo "Successfully Connected";
}