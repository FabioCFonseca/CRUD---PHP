<?php 

require_once "../../views/database.php";

$id = $_POST["id"] ?? null;

//Checar se o id existe
if (!$id) {
    header("location: teste.php");
    exit;
}

$statement = $pdo->prepare("DELETE FROM products WHERE id = :id");
$statement->bindValue(":id", $id);
$statement->execute();

header("location: index.php");


