<?php
require('web_connect/config.php');

//Close Connection
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>FOOD_ORDER</title>
</head>

<body style="background-color: #421374f0">
    <div class="main d-flex justify-content-center align=items-center my-5 p-4">
        <div class="m-5 p-4" style="background-color: #241831f0; width: 500px; height: 400px; border-radius: 20px;">
            <h1 class="text-center text-warning">Facture</h1>
            <hr class="bg-warning mb-5">
            <div class="p-4">
                <h1 class="text-center text-warning mx-5" style="border: 1px solid yellow; border-radius: 10px">
                    <?php
                    if (isset($_POST['s'])) {
                        $somme = 0;
                        foreach ($_POST['prix'] as $prix) {
                            $int = (int)$prix;
                            $somme = $somme + $int;
                        }
                        echo $somme . "$";
                    }
                    ?>
                </h1>
            </div>
            <form action="" method="post" class="d-flex justify-content-center align=items-center">
                <button class="btn btn-success mx-2" type="submit" name="o">Submit</button>
                <button class="btn btn-danger mx-2" type="submit" name="n">Submit</button>
            </form>
        </div>
    </div>
    <!--Footer-->
    <div class="footer py-3 mt-5" style="background-color: #241831f0; color:#fff">
        <h3 class="text-center">Copyright &copy; Haroune Ba</h3>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>