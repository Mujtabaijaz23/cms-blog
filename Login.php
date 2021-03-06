<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
if(isset($_SESSION["UserId"])){
  Redirect_to("Dashboard.php");
}

if (isset($_POST["Submit"])) {
  $UserName = $_POST["Username"];
  $Password = $_POST["Password"];
  if (empty($UserName)||empty($Password)) {
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("Login.php");
  }else {
    // code for checking username and password from Database
    $Found_Account=Login_Attempt($UserName,$Password);
    if ($Found_Account) {
      $_SESSION["UserId"]=$Found_Account["id"];
      $_SESSION["UserName"]=$Found_Account["username"];
      $_SESSION["AdminName"]=$Found_Account["aname"];
      $_SESSION["SuccessMessage"]= "Wellcome ".$_SESSION["AdminName"]."!";
      if (isset($_SESSION["TrackingURL"])) {
        Redirect_to($_SESSION["TrackingURL"]);
      }else{
      Redirect_to("Dashboard.php");
    }
    }else {
      $_SESSION["ErrorMessage"]="Incorrect Username/Password";
      Redirect_to("Login.php");
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="Css/Styles.css">
  <title>Login</title>
</head>
<body>
  <!-- NAVBAR -->
  <div style="height:10px; background:#4d2600;"></div>
  <naV CLASS="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand"> Travel Blog</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
    </div>
        </div>
  </nav>
  <div style="height:10px; background:#4d2600"></div>
  <!-- NAVBAR END -->
  <!-- HEADER -->
  <header class="bg-dark text-white py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
    </div>
    </div>
  </div>
  </header>
  <!-- HEADER END -->
  <!-- MAIN AREA START -->
  <section class="container py-2 mb-4">
        <div class="row">
          <div class="offset-sm-3 col-sm-6" style="min-height:500px;">
            <br><br><br>
            <?php
           echo ErrorMessage();
           echo SuccessMessage();
           ?>
            <div class="card bg-secondary text-light">
              <div class="card-header">
                <h4>Wellcome Back !</h4>
                </div>
                <div class="card-body bg-dark">
                <form class="" action="Login.php" method="post">
                  <div class="form-group">
                    <label for="username"><span class="FieldInfo">Username:</span></label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white bg-info"> <i class="fas fa-user"></i> </span>
                      </div>
                      <input type="text" class="form-control" name="Username" id="username" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password"><span class="FieldInfo">Password:</span></label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                      </div>
                      <input type="password" class="form-control" name="Password" id="password" value="">
                    </div>
                  </div>
                  <input type="submit" name="Submit" class="btn btn-info btn-block" value="Login">
                </form>

              </div>

            </div>

          </div>

        </div>

      </section>
  <!-- MAIN AREA END -->
  <!-- FOOTER -->
<footer class="bg-dark text-white">
  <div class="container">
    <div class="row">
      <div class="col">
      <p class="lead text-center">Theme By | MUJTABA IJAZ | <span id="year"></span>&copy;</p>
      <p class="text-center small"><a style="color: white; text-decoration: none; cursor: pointer;" href="http://Mujtabaijaz.com/coupns/" target="_blank">
        This site is only used for Study purpose Mujtabaijaz.com have all rights, no one is allowed to distribute
        copies other than <br>&trade; mujtabaijaz.com &trade;
      </a></p>
      </div>
    </div>
    </div>
</footer>
<div style="height:10px; background:#4d2600"></div>

<!-- FOOTER END -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
$('#year').text(new Date().getFullYear());
  </script>
  </body>
  </html>
