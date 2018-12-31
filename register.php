<?php 
	if($user_id) {
		header("location:".BASE_URL);
	}
?>

<div id="container-user-akses">


    <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
        $email = isset($_GET['email']) ? $_GET['email'] : false;
        $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
        $alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;
        // $password = isset($_GET['password']) ? $_GET['password'] : false;
        // $repassword = isset($_GET['repassword']) ? $_GET['repassword'] : false;

        if($notif == "require"){
          echo "<div class='notif'>Maaf, kamu harus melengkapi isi form dibawah ini.</div>";
        }elseif ($notif == "password") {
          echo "<div class='notif'>Maaf, password harus sama</div>";
        }elseif ($notif == "email") {
          echo "<div class='notif'>Maaf, Email anda sudah terdaftar</div>"; 
        }
     ?>
    <form action="<?php echo BASE_URL."proses_register.php"; ?>" method="post">
      <div class="element-form">
        <label for="nama">Nama Lengkap :</label>
        <span><input type="text" name="nama_lengkap" id="nama" value="<?php echo $nama_lengkap; ?>" /></span>
      </div>

      <div class="element-form">
        <label for="email">Email :</label>
        <span><input type="text" name="email" id="email" value="<?php echo $email; ?>"/></span>
      </div>

      <div class="element-form">
        <label for="phone">Handphone :</label>
        <span><input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" /></span>
      </div>

      <div class="element-form">
        <label for="alamat">Alamat :</label>
        <span><textarea name="alamat" id="alamat" placeholder="Alamat" ><?php echo $alamat; ?></textarea></span>
      </div>

      <div class="element-form">
        <label for="pass">Password :</label>
        <span><input type="password" name="password" id="pass" /></span>
      </div>

      <div class="element-form">
        <label for="pass2">Re-type Password :</label>
        <span><input type="password" name="repassword" id="pass2" /></span>
      </div>

      <div class="element-form">
        <span><input type="submit" value="REGISTER" /></span>
      </div>


    </form>

</div>
