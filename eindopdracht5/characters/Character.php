<?php 
    function getInfo(){
        $CurrentCharacter = $_GET["character"];
        $connection = connect();

        $query = "SELECT * FROM characters Where name = '$CurrentCharacter'";

        $statement = $connection->prepare($query);

        $statement->execute();

        $result = $statement->fetchALl();

        return $result;
    }

    if(array_key_exists("character", $_GET ) ) { 
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
            <div>
                <?php foreach($people as $person){ ?>
                    <h1><?= $person['name'] ?></h1>
                    <div id="info">
                        <p id="bio"><?= $person['bio'] ?></p>
                        <img src=images/<?= $person['avatar']?> >
                    </div>
                    <div id="stats" style="background-color: <?= $person['color'] ?> ">
                        <p>&#9829; <?= $person['health'] ?></p>
                        <p>&#127919; <?= $person['attack'] ?></p>
                        <p>&#9930; <?= $person['defense'] ?></p>

                        <p>Weapon: <?= $person['weapon'] ?></p>
                        <p>Armor: <?= $person['armor'] ?></p>
                    </div>
                <?php } ?>
            </div>

        </body>
        </html>

        <?php
    }
?>