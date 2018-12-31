<?php 
	if($user_id) {
		header("location:".BASE_URL);
	}
?>

<div id="container-user-akses">

    <form action="<?php echo BASE_URL."proses_login.php"; ?>" method="post">

    <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
  
        if($notif == true){
          echo "<div class='notif'>Maaf, Email & Password yang anda masukan tidak sesuai</div>";
        }
     ?>

      <div class="element-form">
        <label for="email">Email :</label>
        <span><input type="text" name="email" id="email"/></span>
      </div>

      <div class="element-form">
        <label for="pass">Password :</label>
        <span><input type="password" name="password" id="pass" /></span>
      </div>

      <div class="element-form">
        <span><input type="submit" value="LOGIN" /></span>
      </div>


    </form>

</div>
