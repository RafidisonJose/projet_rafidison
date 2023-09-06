<?php

    $database_username = 'root';
	$database_password = '';
	$pdo_conn = new PDO( 'mysql:host=localhost;dbname=gestion_scolaire', $database_username, $database_password );

    if(!empty($_POST["add_notes"])) {
	
	$sql = "INSERT INTO notes ( id_students, notes, matiere ) VALUES ( :students, :note, :matiere )";
	$pdo_statement = $pdo_conn->prepare( $sql );
		
	$result = $pdo_statement->execute( array( ':students'=>$_POST['students'], ':note'=>$_POST['note'], ':matiere'=>$_POST['matiere']) );
	if (!empty($result) ){
	  header('location:note.php');
	}
   

    // $stmt1 = $pdo_conn->prepare('SELECT * FROM salles WHERE id = ?');
    // $stmt1->execute([$_GET['id']]);
    // $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
}

$pdo_statement = $pdo_conn->prepare("SELECT * FROM students");
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

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
                <label for="">Etudiants:</label>
               <select class='form-control' name="students" id="">
                  <option value="">--selectionnez--</option>
                  <?php foreach ($result as $result): ?>
                  <option value="<?php echo $result["id"]; ?>"><?php echo $result["firstname"]; ?><?php echo $result["lastname"]; ?></option>
                  <?php endforeach ?>
               </select><br>
                <div class="demo-form-row">
                    <label>Notes: </label><br>
                    <input type="text" name="note" class="form-control" placeholder='ex: 18.5/20' required />
                </div>
                <div class="demo-form-row">
                    <label>Matiere: </label><br>
                    <input type="text" name="matiere" class="form-control" placeholder='ex: robotiques' required />
                </div>
                <br>
                <br>
                <div class="demo-form-row">
                    <input name="add_notes" type="submit" value="Ajouter" class="btn btn-primary">
                </div>
            </form>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</body>
</html>