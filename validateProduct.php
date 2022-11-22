<?php
 

 $title = $_POST["title"];
 $description = $_POST["description"];
 $price = $_POST["price"];
 $imagePath = "";
 
 
 
 if (!$title) {
   $errors[] = "Insira o título";
 }
 
 if (!$price) {
   $errors[] = "Insira o preço";
 }
 
 if (empty($errors)) {
 
 $image = $_FILES["image"] ?? null;
 $imagePath = "";
 
 if ($product["iamge"]) {
     unlink($product["image"]);
 }
 
 if ($image && $image['tmp_name']) {
 
   $imagePath = "images/".randomString(4)."/".$image["name"];
   mkdir(dirname($imagePath));
 
   move_uploaded_file($image["tmp_name"], $imagePath);
 }
}

?>
