<?php

/**
 *  Database cLASS
 */
class Database
{

  public $connect = null;
  public $result;


  public function getConnection($server, $user, $pass, $db)
  {
    $connect = mysqli_connect($server, $user, $pass, $db);
    if ($connect) {
      $this->connect = $connect;
      return true;
    } else {
      die("Koneksi ke database gagal");
      return false;
    }
  }

  public function setQuery($query)
  {
    $this->result = $this->connect->query($query);
  }

  public function login()
  {
    $email = $_POST['email'];
  	$password = md5($_POST['password']);

  	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status ='on'");

  	if(mysqli_num_rows($query) == 0) {
  		header("location:" . BASE_URL . "index.php?page=login&notif=true");
  	}else {
  		$row = mysqli_fetch_assoc($query);

  		session_start();

  		$_SESSION['user_id'] = $row['user_id'];
  		$_SESSION['nama'] = $row['nama'];
  		$_SESSION['level'] = $row['level'];

  		header("location: ".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");
    }
  }

  public function loadObjectList()
	{
		$hasil = array();
		if($this->result){
			while($a = $this->result->fetch_object()) {
				$hasil[] = $a;
			}
		}
		return $hasil;
	}

  public function loadObject()
	{
		$hasil = null;
		if($this->result){
			while($a = $this->result->fetch_object()) {
				$hasil = $a;
			}
		}
		return $hasil;
	}


}

 ?>
