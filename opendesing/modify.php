<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}else{
    include('composants/header.php');

    if(isset($_GET['edit'])){
        require 'configs/db.php';
        $id = $_GET['edit'];
        $query="SELECT * FROM products WHERE id_product='".$id."'";
        $result = $conn->query($query);
        $produit = $result->fetch_assoc();
    }
?>

<h1>Modifier mon produit</h1>

<form action="functions/modify_product.php" method="post" enctype="multipart/form-data">
    <div class="container form-group">

        <input type="hidden" name="id_product" value="<?php echo $produit['id_product']?>">

        <label>Name</label>
        <input class="form-control" type="text" name="name" value="<?php echo $produit['name']?>">
        <label>Intro</label>
        <input class="form-control" type="text" name="intro" value="<?php echo $produit['intro']?>">
        <label>Description</label>
        <textarea class="form-control" type="text" name="description" value="<?php echo $produit['description']?>"></textarea>
        <label>Date</label>
        <input class="form-control" type="date" name="date" value="<?php echo $produit['date']?>">
        <label>Image</label>
        <input class="form-control-file" type="file" name="img" value="<?php echo $produit['img']?>">
        <br />
        <button class="form btn btn-primary" name="send" type="submit">Modifier</button>

    </div>
</form>

<?php
    
include('composants/footer.php');
}
?>


