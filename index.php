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

<body class="text-white" style="background-color: #241831f0">
  <section class="Entete" style="background-color: #421374f0">
    <div class="container mx-auto">
      <div class="row">
        <div class="col-4 my-3">
          <h1 class="text-warning">Food_Order</h1>
        </div>
        <div class="col-4 d-flex align-items-center justify-content-center">
          <img class="logo" src="images/Logo.png" style="width: 80px" alt="" />
        </div>
        <div class="col-4 my-4">
          <ul class="nav-links d-flex justify-content-center align-items-center pt-2">
            <li class="link-item mx-2" style="list-style: none">
              <a class="text-warning" href="#" style="text-decoration: none"><strong>Login</strong></a>
            </li>
            <li class="link-item mx-2" style="list-style: none">
              <a class="text-warning" href="#" style="text-decoration: none"><strong>Sign in</strong></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="container vitrine">
    <div class="row my-5">
      <div class="col-6 d-flex flex-column justify-content-center">
        <h1 class="text-warning">You order & We deliver</h1>
        <h2 class="text-warning">Tasty and Healthy</h2>
      </div>
      <div class="col-6">
        <img src="images/Vitrine.png" style="width: 500px" alt="" />
      </div>
    </div>
  </section>

  <section class="Menu py-5" style="background-color: #421374f0">
    <h1 class="text-warning text-center my-5">Menu</h1>
    <form action="facture.php" method="post">
      <div class="container">
        <hr>

        <div class="row d-flex justify-content-center align-items-center">
          <?php foreach ($menu as $plat) { ?>
            <!--Parcourir le tableau des plats-->
            <div class="col-3 d-flex flex-column justify-content-center align-items-center m-3" style="border: 1px solid yellow; border-radius: 20px;">
              <h2 class="text-warning text-center"><?php echo $plat['nom']; ?></h2>
              <div class="d-flex justify-content-center align-items-center">
                <span class="text-warning text-center mx-2" style="font-size: 20px;"><strong><?= $plat['prix']; ?>$</strong></span>
                <input type="checkbox" name="prix[]" value="<?= $plat['prix'] ?>" id="">
              </div>
            </div>
          <?php } ?>
        </div>

        <div class="text-center">
          <button class="btn btn-success my-4 p-4" name="s">Click to order</button>
        </div>
      </div>
    </form>
  </section>

  <!--Footer-->
  <div class="footer py-3">
    <h3 class="text-center">Copyright &copy; Haroune Ba</h3>
  </div>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>