<?php

    $database_username = 'root';
	$database_password = '';
	$pdo_conn = new PDO( 'mysql:host=localhost;dbname=gestion_scolaire', $database_username, $database_password );

    if(!empty($_POST["add_emplois"])) {
	
	$sql = "INSERT INTO emploi_du_temps ( id_salles, id_prof, date, heures ) VALUES ( :salles, :professeurs, :date, :heure )";
	$pdo_statement = $pdo_conn->prepare( $sql );
		
	$result = $pdo_statement->execute( array( ':salles'=>$_POST['salles'], ':professeurs'=>$_POST['professeurs'], ':date'=>$_POST['date'], ':heure'=>$_POST['heure'] ) );
	if (!empty($result) ){
	  header('location:emploi.php');
	}
   

    // $stmt1 = $pdo_conn->prepare('SELECT * FROM salles WHERE id = ?');
    // $stmt1->execute([$_GET['id']]);
    // $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
}

$pdo_statement = $pdo_conn->prepare("SELECT * FROM salles");
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

$pdo_statement1 = $pdo_conn->prepare("SELECT * FROM professeurs");
$pdo_statement1->execute();
$result1 = $pdo_statement1->fetchAll();

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
                <label for="">Salle de classe:</label>
               <select class='form-control' name="salles" id="">
                  <option value="">--selectionnez--</option>
                  <?php foreach ($result as $result): ?>
                  <option value="<?php echo $result["id"]; ?>"><?php echo $result["name"]; ?></option>
                  <?php endforeach ?>
               </select><br>
                <label for="">Professeurs:</label>
               <select class='form-control' name="professeurs" id="">
                  <option value="">--selectionnez--</option>
                  <?php foreach ($result1 as $result1): ?>
                  <option value="<?php echo $result1["id"]; ?>"><?php echo $result1["firstname"]; ?> <?php echo $result1["lastname"]; ?></option>
                  <?php endforeach ?>
               </select><br>
                <div class="demo-form-row">
                    <label>Dates: </label><br>
                    <input type="date" name="date" class="form-control" required />
                </div>
                <div class="demo-form-row">
                    <label>Heures: </label><br>
                    <input type="text" name="heure" class="form-control" placeholder='ex: 9H - 12H' required />
                </div>
                <br>
                <br>
                <div class="demo-form-row">
                    <input name="add_emplois" type="submit" value="Ajouter" class="btn btn-primary">
                </div>
            </form>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</body>
</html>