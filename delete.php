<?php
require_once 'C:\xampp\htdocs\todo\init.php';
if(isset($_GET['update'], $_GET['item'])){
	$update = $_GET['update'];
	$item = $_GET['item'];

	if($update == 'done'){
			$doneQuery = $db->prepare("
				DELETE FROM items 
				WHERE id = :item
				AND user = :user");

			$doneQuery->execute([
				'item'=>$item,
				'user'=>$_SESSION['user_id']]);
	}

/*
	switch($update){
		case 'done':
			$doneQuery = $db->prepare("
				DELETE FROM items 
				WHERE id = :item
				AND user = :user");

			$doneQuery->execute([
				'item'=>$item,
				'user'=>$_SESSION['user_id']]);
			break;
	}*/
}

header('Location: index.php');