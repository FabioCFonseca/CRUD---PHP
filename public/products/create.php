<?php

require_once "../../views/database.php";
include_once "../../functions.php";

$errors = [];

$title = "";
$description = "";
$price = "";
$product = ["image" => ""];

if (!is_dir("images")) {
  mkdir("images");
}

//Verifica se o submit foi feito através do POST -- acessado através do form 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

require_once "../../validateProduct.php";

if (empty($errors)) {
  
//Parâmetros    
$statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
VALUES (:title, :image, :description, :price, :date) ");

// Valores dos parâmetros
$statement->bindValue(":title", $title);
$statement->bindValue(":image", $imagePath);
$statement->bindValue(":description", $description);
$statement->bindValue(":price", $price);
$statement->bindValue(":date", date("Y-m-d H:i:s"));
$statement->execute();
header("location: index.php");
}
}

?>

<?php include_once "../../views/partials/header.php"; ?>

    <p>
        <a href="index.php">Voltar para lista de produtos</a>
    </p>

    <h1>Criar novo produto</h1>

    <?php include_once "../../views/products/form.php"; ?>

  </body>
</html>