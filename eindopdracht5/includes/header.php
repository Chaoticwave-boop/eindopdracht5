<?php 
	$people = getPeople();
?>

<html>

    <!-- Side navigation -->
    <div class="sidenav">
        <?php foreach($people as $person){ ?>
            <a href="index.php?name=Character&character=<?= $person['name']?>" id="headerbutton"><?= $person['name'] ?></a>
        <?php } ?>
    </div>
        
    <?php
        function getPeople(){
            $connection = connect();
            $query = "SELECT * FROM `characters`";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchALl();

            return $result;
        }
    ?>
</html>