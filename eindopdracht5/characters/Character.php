<?php 
	$people = getInfo();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($people as $person){ ?>
        <h1><?= $person['name'] ?></h1>
		<p><?= $person['bio'] ?></p>
        <img src=images/<?= $person['avatar']?> alt="ellie"  >
		
    <?php } ?>

</body>
</html>

<?php
function getInfo(){
    // maak een verbinding
        $connection = connect();

    // maak een query
        $query = "SELECT * FROM `characters`";

    // voorbereid een query
        $statement = $connection->prepare($query);

    // voer de query uit
        $statement->execute();

    // haal de result op
        $result = $statement->fetchALl();

        return $result;
    }
?>