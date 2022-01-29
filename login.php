<?php

require('web_connect/config.php');


$error = false; // Permet de savoir si le login/mot de passe est invalide

// 1ere etape: on verifie si l'utilisateur a envoyé les données avec la methode isset
if(isset($_POST['username'])) {
    // On récupères les données de l'utilisateur
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // On verifie dans la base s'il ya une correspondance username/password avec les données de l'utilisateur
    $query = "SELECT * FROM utilisateur WHERE Nom = '$username' AND Mot_Passe = '$password'";

    //GET Results
    $result = mysqli_query($conn, $query);

    //Fetch Data
    $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //Free Result
    mysqli_free_result($result);

    //Close Connection
    mysqli_close($conn);

    // Ici si user=null cela veut dire qu'il ya pas de correspondance donc le login ou le mot de passe est invalide.
    if($user != null) {
        echo 'Bienvenu ' . $username;
    } else {
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>How To Create Simple Login Form Design In Bootstrap 5</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="" method="post" class="row g-3">
                        <h4>Welcome :)</h4>
                        <?php
                            if($error == true): ?>
                                <p class="alert alert-danger">Login ou mot de passe incorrecte</p>
                            <?php endif;
                        ?>
                        <div class="col-12">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe"> Remember me</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="L" class="btn btn-dark float-end">Login</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">Have not account yet? <a href="#">Signup</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
