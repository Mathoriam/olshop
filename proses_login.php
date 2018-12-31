<?php

	include_once("function/helper.php");

	$db = new Database();
	$db->getConnection("localhost","root","","olshop");

	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$query = "SELECT * FROM user WHERE email='$email' AND password='$password' AND status ='on'";
	$db->setQuery($query);
	$results = $db->loadObject();
echo "<pre>";
var_dump($results);
	if(!$results) {
		header("location:" . BASE_URL . "index.php?page=login&notif=true");
	}else {

		session_start();

		$_SESSION['user_id'] = $results->user_id;
		$_SESSION['nama'] = $results->nama;
		$_SESSION['level'] = $results->level;

		header("location: ".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");

	}
?>
