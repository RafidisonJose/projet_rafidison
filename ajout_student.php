<?php

    $database_username = 'root';
	$database_password = '';
	$pdo_conn = new PDO( 'mysql:host=localhost;dbname=gestion_scolaire', $database_username, $database_password );

    if(!empty($_POST["add_students"])) {
	
	$sql = "INSERT INTO students ( firstname, lastname, level ) VALUES ( :firstname, :lastname, :level )";
	$pdo_statement = $pdo_conn->prepare( $sql );
		
	$result = $pdo_statement->execute( array( ':firstname'=>$_POST['firstname'], ':lastname'=>$_POST['lastname'], ':level'=>$_POST['level'] ) );
	if (!empty($result) ){
	  header('location:index.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
    <div class="cotains">
        <div class="menu">
            <ul>
                <li class='active'><a href="./index.php">Eleves</a></li>
                <li><a href="#">Professeurs</a></li>
                <li><a href="#">Salles</a></li>
                <li><a href="#">Emploi du temps</a></li>
                <li><a href="#">Notes</a></li>               
            </ul>
        </div>
    </div>
    <div class="header-menu">
          <span></span>
    </div>

    <div class="main">
        <div class="row">
            <div class="col-6">
            <form name="frmAdd" action="" method="POST">
                <div class="demo-form-row">
                    <label>Nom: </label><br>
                    <input type="text" name="firstname" class="form-control" required />
                </div>
                <div class="demo-form-row">
                    <label>Prénom: </label><br>
                    <input type="text" name="lastname" class="form-control" required />
                </div>
                <div class="demo-form-row">
                    <label>Niveau: </label><br>
                    <input type="text" name="level" class="form-control" required />
                </div>
                <br>
                <br>
                <div class="demo-form-row">
                    <input name="add_students" type="submit" value="Ajouter" class="btn btn-primary">
                </div>
            </form>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</body>
</html>