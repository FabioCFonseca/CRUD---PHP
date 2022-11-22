<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $error): ?>
        <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <form action="create.php" method="post" enctype="multipart/form-data">

        <?php if ($product["image"]): ?>
            <img src="<?php echo $product["image"] ?>">
        <?php endif; ?>    
        <div class="mb-3">
            <label>Imagem do produto</label>
            <br>
            <input type="file" name="image">
        </div>
        <div class="mb-3">
            <label>Nome do produto</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title ?>">
        </div>
        <div class="mb-3">
            <label>Descrição</label>
            <textarea class="form-control" name="description"><?php echo $description ?></textarea>
        </div>
        <div class="mb-3">
            <label>Preço</label>
            <input type="number" step=".01" class="form-control" name="price" value="<?php echo $price ?>">
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>