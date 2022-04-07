<?php
session_start();
require '../configs/db.php';// probe con esta en $sql use query select y no funciono, esta bien usarla asi o deberia usar objetos? ;

if(!empty($_REQUEST["name"]) && !empty($_REQUEST["intro"]) && !empty($_REQUEST["description"]) && !empty($_REQUEST["date"]) && !empty($_FILES["img"]["name"])){
    $name=$_REQUEST["name"];
    $intro=$_REQUEST["intro"];
    $description=$_REQUEST["description"];
    $date = $_REQUEST["date"];
    $img=$_FILES["img"]["name"];
    $direccion=$_FILES["img"]["tmp_name"];
    $dossier="../img/".$img;
    copy($direccion,$dossier);
    $image="img/".$img;
    $sql= "INSERT INTO products (name, intro, description, img, date) VALUES ('$name','$intro', '$description', '$image', '$date')";
    $pdo->exec($sql);
    $_SESSION['flash']['success']="Produit Créé";
    header("Location:../admin.php");
    exit();
}else{
    $_SESSION['flash']['error']="Un des champs est vide!";
    header("Location:../admin.php");
    exit();
}
?>