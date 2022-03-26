<?php
session_start(); // start a new session or continues the previous
if (isset($_SESSION['user']) != "") {
    header("Location: home.php"); // redirects to home.php
}
if (isset($_SESSION['adm']) != "") {
    header("Location: dashboard.php"); // redirects to home.php
}
require_once 'components/db_connect.php';
require_once 'components/file_upload.php';
$error = false;
$first_name = $last_name = $phone_number  = $pass = $email =$adress =$picture = '';
$first_nameError = $last_nameError= $phoneError =$adressError= $emailError  = $passError = $picError = '';

function cleanUp ($var){
    $value = trim($var);
    $value =strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}


    if (isset($_POST['btn-signup'])) {
        $first_name = cleanup($_POST["fname"]); // "fname" is coming of the input form not from the database but recommend to use same names !!!!
        $last_name = cleanup($_POST["lname"]); // berie to akoparameter z inputu 
        $phone_number = cleanup($_POST["phone"]);
        $email = cleanup($_POST["email"]);
        $adress = cleanup($_POST["adress"]);
        $pass = cleanup($_POST["pass"]);
    
    
        $uploadError = '';
        $picture = file_upload($_FILES['picture']); // picture is comming form fileupload

    // basic name validation
    if (empty($first_name) || empty($last_name)) {
        $error = true;
        $first_nameError = "Please enter your full name and surname";
    } else if (strlen($first_name) < 3 || strlen($last_name) < 3) {
        $error = true;
        $first_nameError = "Name and surname must have at least 3 characters.";
    } else if (!preg_match("/^[a-zA-Z]+$/", $first_name) || !preg_match("/^[a-zA-Z]+$/", $last_name)) {
        $error = true;
        $first_nameError = "Name and surname must contain only letters and no spaces.";
    }

    // basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // checks whether the email exists or not
        $query = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count != 0) { //pozres ci tam su a ak tam uz je tak vypise ze uz je obsadeny
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }
    // checks if the date input was left empty
    // if (empty($adress)) {
    //     $error = true;
    //     $adressError = "Please enter your adress.";
    // }
    if (empty($phone_number)) {
        $error = true;
        $phoneError = "Please enter your phone number.";
    }
    // password validation
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have at least 6 characters.";
    }

    // password hashing for security
    $password = hash('sha256', $pass);
    // if there's no error, continue to signup
    if (!$error) {

        $query = "INSERT INTO users(first_name, last_name, phone_number, adress , password,  email, picture)
                  VALUES('$first_name', '$last_name','$phone_number' ,'$adress' ,'$password',  '$email', '$picture->fileName')";
        $res = mysqli_query($connect, $query);


    



        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        }
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration System</title>
    <?php require_once 'components/boot.php' ?>
</head>

<body>
    <div class="container">
        <form class="w-75" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" enctype="multipart/form-data">
            <h2>Sign Up.</h2>
            <hr />
            <?php
            if (isset($errMSG)) {
            ?>
                <div class="alert alert-<?php echo $errTyp ?>">
                    <p><?php echo $errMSG; ?></p>
                    <p><?php echo $uploadError; ?></p>
                </div>

            <?php
            }
            ?>



            <input type="text" name="fname" class="form-control" placeholder="First name" maxlength="50" value="<?php echo $first_name ?>" />
            <span class="text-danger"> <?php echo $first_nameError; ?> </span>

            <input type="text" name="lname" class="form-control" placeholder="Surname" maxlength="50" value="<?php echo $last_name ?>" />
            <span class="text-danger"> <?php echo $last_nameError; ?> </span>

            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
            <span class="text-danger"> <?php echo $emailError; ?> </span>

            <input type="text" name="adress" class="form-control" placeholder="Enter Your Adress" maxlength="40" value="<?php echo $adress ?>" />
            <span class="text-danger"> <?php echo $adressError; ?> </span>

            <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone" maxlength="40" value="<?php echo $phone_number ?>" />
            <span class="text-danger"> <?php echo $phoneError; ?> </span>
            
            <div class="d-flex">

                <input class='form-control w-50' type="file" name="picture">
                <span class="text-danger"> <?php echo $picError; ?> </span>
            </div>
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
            <span class="text-danger"> <?php echo $passError; ?> </span>
            <hr />
            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            <hr />
            <a href="index.php">Sign in Here...</a>
        </form>
    </div>
</body>
</html>