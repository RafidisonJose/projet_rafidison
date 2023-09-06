<?php
$database_username = 'root';
$database_password = '';
$pdo_conn = new PDO( 'mysql:host=localhost;dbname=gestion_scolaire', $database_username, $database_password );
$pdo_statement=$pdo_conn->prepare("delete from students where id=" . $_GET['id']);
$pdo_statement->execute();
header('location:index.php');
?>