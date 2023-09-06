<?php
        $database_username = 'root';
        $database_password = '';
        $pdo_conn = new PDO( 'mysql:host=localhost;dbname=gestion_scolaire', $database_username, $database_password );
        if(!empty($_POST["save_student"])) {
            $pdo_statement=$pdo_conn->prepare("update students set firstname='" . $_POST[ 'firstname' ] . "', lastname='" . $_POST[ 'lastname' ]. "', level='" . $_POST[ 'level' ]. "' where id=" . $_GET["id"]);
            $result = $pdo_statement->execute();
            if($result) {
                header('location:index.php');
            }
        }
        $stmt = $pdo_conn->prepare('SELECT * FROM students WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
                    <input type="text" name="firstname" value='<?php echo $result["firstname"]; ?>' class="form-control" required />
                </div>
                <div class="demo-form-row">
                    <label>Prénom: </label><br>
                    <input type="text" name="lastname" value='<?php echo $result["lastname"]; ?>' class="form-control" required />
                </div>
                <div class="demo-form-row">
                    <label>Niveau: </label><br>
                    <input type="text" name="level" value='<?php echo $result["level"]; ?>' class="form-control" required />
                </div>
                <br>
                <br>
                <div class="demo-form-row">
                    <input name="save_student" type="submit" value="Modifier" class="btn btn-success">
                </div>
            </form>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</body>
</html>