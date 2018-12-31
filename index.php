<?php

	session_start();

	include_once("framework/database.php");

	include_once("function/koneksi.php");
	include_once("function/helper.php");
    $page = isset($_GET['page']) ? $_GET['page'] : false;

	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css" rel="stylesheet">
    <title>I'SHOP | Shoping For your life</title>
  </head>
  <body>

    <div id="container">

      <div id="header">
        <a href="<?php echo BASE_URL."index.php"; ?>">
          <img src="<?php echo BASE_URL."image/logoolshop.jpg"; ?>" width="200px"><br>
        </a>

        <div id="menu">
          <div id="user">
			<?php
				if($user_id) {
				echo"Hi $nama,
						  <a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
						  <a href='".BASE_URL."logout.php'>Logout</a>";
				}else{
					echo "<a href='".BASE_URL."index.php?page=login'>Login</a>
						  <a href='".BASE_URL."index.php?page=Register'>Register</a>";
        }
  
			?>

          </div>
          <a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="button_keranjang">
            <img src="<?php echo BASE_URL."image/keranjang.png"; ?>" width="30px">
          </a>
        </div>
      </div>

      <div id="content">

        <?php
          $filename = "$page.php";

          if (file_exists ($filename)){
            include_once($filename);
          } else {
            echo "Maaf, file tersebut tidak ada didalam system";
          }
        ?>

      </div>

      <div id="footer">
        <p>Copyright I'Shop 2018</p>
      </div>
    </div>

  </body>
</html>
