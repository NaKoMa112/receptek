<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="getData.js"></script>
    <script src="postData.js"></script>
    <link rel="shortcut icon" href="../kepek/powerbites logo filled.png" type="image/x-icon">
    <title>PowerBites</title>
      <!--PowerBites.com-->
</head>
    <body>
        <nav id="menu">
          <input type="checkbox" id="responsive-menu" onclick="pdatemenu()"><label></label>
          <ul>
            <li><a href="index.php?prog=fooldal.php"><img src="../kepek/powerbites logo transparentmini.png"> PowerBites</a></li>
            <li><a href="index.php?prog=betolt.php">Sütemények</a></li>
            <li><a href="index.php?prog=sajatrecept.php">Saját Recept</a></li>
            <li style="float: right;"><a href="index.php?prog=bejelentkezes.php">Profil</a></li>
          </ul>
        </nav>
        

          <div class="row p-3 justify-content-center">
            <!--az URL-ben kapott program betöltése-->
            <?php
              if(isset($_GET['prog']))
                include $_GET['prog'];
               else
                include 'fooldal.php'; 
            ?>
            
          </div>
        <script>

          function updatemenu() {
            if (document.getElementById('responsive-menu').checked == true) {
              document.getElementById('menu').style.borderBottomRightRadius = '0';
              document.getElementById('menu').style.borderBottomLeftRadius = '0';
            }else{
              document.getElementById('menu').style.borderRadius = '10px';
            }
          }

        </script>
    
        <script src="bootstrap/jquery-3.5.1.min.js"></script>
  <script src="bootstrap/bootstrap.bundle.js"></script>
</body>
</html>