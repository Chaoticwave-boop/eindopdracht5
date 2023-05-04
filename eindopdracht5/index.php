<?php
    include("includes/header.php");
  ?>
    
	<link rel="stylesheet" href="css/style.css">

	<!-- laad hier via php de juiste contentpagina in (vanuit de pages map) in. Welke geselecteerd moet worden kun je uit de URL halen (URL_Params).-->
  <?php
      if(array_key_exists("name", $_GET ) && $_GET["name"] == "Character") {
          include("characters/Character.php");
      }
    ?>

<?php
function connect()
	{
		try {
			$serveraddress = "localhost";
			$dbname = "data_characters";
			$username = "root";
			$password = "mysql";

			$conn = new PDO("mysql:host=$serveraddress;dbname=data_characters", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
?>

<?php
    include("includes/footer.php");
  ?>