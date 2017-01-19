<?php
require_once 'C:\xampp\htdocs\todo\init.php';
if(isset($_POST['name'])){
	$name = $_POST['name'];

	if(!empty($name)){
		$addedQuery = $db->prepare("
			INSERT INTO items (name, user, done)
			VALUES (:name, :user, 0)");

		$addedQuery->execute([
			'name' => $name,
			'user' => $_SESSION['user_id']]);
	}
}

header('Location: index.php');
