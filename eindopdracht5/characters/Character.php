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
            <?php foreach($people as $person){ ?>
                <h1><?= $person['name'] ?></h1>
                <p><?= $person['bio'] ?></p>
                <img src=images/<?= $person['avatar']?> >

            <?php } ?>

        </body>
        </html>

        <?php
    }
?>