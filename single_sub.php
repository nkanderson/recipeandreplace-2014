
<?php

	include '../../asdf.php';

	$food = htmlspecialchars($_POST['item']);

	try {
		$connection = new PDO('mysql:host=localhost;dbname=nkanders_recipe', $username, $password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$statement = $connection->prepare('SELECT food_items.subs FROM food_items INNER JOIN spelling ON food_items.Name = spelling.correct WHERE spelling.alternate = :food');
		$statement->execute(array('food' => $food));

		$result = $statement->fetch();
		if ( count($result) ) {

			echo json_encode($result);

		} else {
			$error = array( "error_message" => "Sorry, we don't have that in the database yet!");
			echo json_encode($error);
		}
	}	catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}

?>
