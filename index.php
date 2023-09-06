<?php
	$database_username = 'root';
    $database_password = '';
    $pdo_conn = new PDO( 'mysql:host=localhost;dbname=gestion_scolaire', $database_username, $database_password );

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
                <li class='active'><a href="index.php">Eleves</a></li>
                <li><a href="professeurs.php">Professeurs</a></li>
                <li><a href="salles.php">Salles</a></li>
                <li><a href="emploi.php">Emploi du temps</a></li>
                <li><a href="note.php">Notes</a></li>               
            </ul>
        </div>
    </div>
    <div class="header-menu">
          <span></span>
    </div>

    <div class="main">
       <a href="./ajout_student.php" class='btn btn-primary'>Ajouter</a><br><br>
       <table class='table table-striped'>
            <thead>
                <th>#ID</th>
                <th>Nom & Prénom</th>
                <th>Niveau</th>
                <th></th>
            </thead>
            <tbody>
            <?php
                if(!empty($result)) { 
                    foreach($result as $row) {
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["firstname"]; ?> <?php echo $row["lastname"]; ?></td>
                    <td><?php echo $row["level"]; ?></td>
                    <td><a class="btn btn-success btn-sm" href='modifier_student.php?id=<?php echo $row['id']; ?>'>Modifier</a> <a class="btn btn-danger btn-sm" href='delete_students.php?id=<?php echo $row['id']; ?>'>Supprimer</a></td>
                </tr>
                <?php
		            }
                }
	            ?>
            </tbody>
       </table>
    </div>
</body>
</html>