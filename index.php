<?php

require_once 'C:\xampp\htdocs\todo\init.php';

$itemsQuery = $db->prepare("
	SELECT id, name, done 
	FROM items 
	WHERE user = :user
	");

$itemsQuery->execute([
	'user' => $_SESSION['user_id']]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
			<meta charset="utf-8">
			<title>To-Do List</title>
			<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
		<div>
			<h1><u>My To-Do List</u></h1>
			<?php
				if(!empty($items)) : 
			?>
			<ul>
				<?php 
				foreach($items as $item): 
				?>
					<li>
						<?php 
						echo $item['done'] ? 'done' : '' 
						?>
						<span>
							<?php 
							echo $item['name']; 
							?>
						</span>
					<?php 
					if(!$item['done']): 
					?>
						<a href="delete.php?update=done&item=<?php echo $item['id'];?>" class="delete-button">Delete</a>
					<?php endif;?>
					</li>
				<?php endforeach;?>
			</ul>
		<?php else: ?>
			<p>No items added yet</p>
		<?php endif; ?>
			<form action="add.php" method="post">
				<input type="text" name="name" placeholder = "Enter New task here" autocomplete="off" required>
				<input type ="submit" value="Add">
			</form>
		</div>
	</body>
</html>