<?php 
	$people = getPeople();
?>

<html>

    <!-- Side navigation -->
    <div class="sidenav">
        <?php foreach($people as $person){ ?>
            <a href="index.php?name=Character" id="headerbutton"><?= $person['name'] ?></a>
        <?php } ?>
    </div>
        
    <?php
        function getPeople(){

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
</html>