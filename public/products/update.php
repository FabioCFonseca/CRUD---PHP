<?php


require_once "../../views/database.php";
include_once "../../functions.php";


$id = $_GET["id"] ?? null;

if (!$id) {
    header("location: index.php");
    exit;
}

$statement = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$statement->bindValue(":id", $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];

$title = $product["title"];
$description = $product["description"];
$price = $product["price"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

require_once "validateProduct.php";

if (empty($errors)) {


$statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, 
                            description = :description, price = :price");

$statement->bindValue(":title", $title);
$statement->bindValue(":image", $imagePath);
$statement->bindValue(":description", $description);
$statement->bindValue(":price", $price);
$statement->bindValue(":date", $date);
$statement->execute();
header("location: index.php");
}
}
?>

<?php include_once "../../views/partials/header.php"; ?>

    <p>
        <a href="index.php">Voltar para lista de produtos</a>
    </p>
    
    <h1>Atualizar produto</h1>

    <?php include_once "../../views/products/form.php"; ?>

  </body>
</html>
