<?php

require_once "../../views/database.php";

// Prepared statement para loop de display
$statement = $pdo->prepare("SELECT * FROM products ORDER BY create_date DESC");
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC); 

?>

<?php include_once "../../views/partials/header.php"; ?>

    <h1>Lista de produuutos</h1>

    <p>
        <a href="create.php" class="btn btn-success">Criar novo produto</a>
    </p>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imagem</th>
      <th scope="col">Produto</th>
      <th scope="col">Preço</th>
      <th scope="col">Data de Criação</th>
      <th scope="col">Alterar</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($products as $i => $products): ?>

    <tr>
      <th scope="row"><?php echo $i + 1 ?></th>
      <td>
        <img src="<?php echo $product["image"]?>">
      </td>
      <td><?php echo $products["title"] ?></td>
      <td><?php echo $products["price"] ?></td>
      <td><?php echo $products["create_date"] ?></td>
      <td>
        <a href="update.php?id=<?php echo $products["id"] ?>" type="button" class="btn btn-outline-primary">Editar</a>
        <form style="display: inline-block" action="../products/delete.php" method="post">
          <input type="hidden" name="id" value="<?php echo $products["id"] ?>" >
          <button type="submit" class="btn btn-sm btn-outline-danger">Remover</button>
        </form>
      </td>
    </tr>

    <?php endforeach; ?>
  </tbody>
</table>


  </body>
</html>