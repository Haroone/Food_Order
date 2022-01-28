<?php
require('web_connect/config.php');

//Create Query
$query = 'SELECT * FROM plats';

//GET Results
$result = mysqli_query($conn, $query);

//Fetch Data
$menu = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Free Result
mysqli_free_result($result);

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
    <div class="main d-flex justify-content-center align=items-center my-3">
        <div class="m-5" style="background-color: #241831f0; width: 500px; height: 400px">
            <h1 class="text-center">Facture</h1>
            <h1 class="text-white">Facture :
                <?php
                if (isset($_POST['s'])) {
                    $somme = 0;
                    foreach ($_POST['prix'] as $prix) {
                        $int = (int)$prix;
                        $somme = $somme + $int;
                    }
                    echo $somme;
                }
                ?>
            </h1>
        </div>
    </div>

    <!--Footer-->
    <div class="footer py-3 mt-5" style="background-color: #241831f0; color:#fff">
        <h3 class="text-center">Copyright &copy; Haroune Ba</h3>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>