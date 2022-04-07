<?php
require "configs/config.php";

include('composants/header.php');

$_SESSION['delete'] = false;

include "configs/db.php";
$sql = "SELECT * FROM products";
//$pdo->exec($sql);
$result = $conn->query($sql);
?>
<div class="card-group container">
    <?php while($res = $result->fetch_assoc()){ ?>
        <div class="col-sm-4">
            <div class="row">
                <div class="col align-items-center">
                    <img class="img-fluid" style="width: 16rem; height:13rem"  src="<?php echo $res["img"]; ?>">
                    <ul class="card-body">
                        <h5 class="card-title"><?php echo $res["name"]; ?></h5>
                        <p class="card-text"><?php echo $res["intro"];?></p>
                        <li class="card-text"><?php echo $res["date"]; ?></li>
                    </ul>
                    <div class="">
                        <break class="" type="number" id="quantite-<?php echo $res['id_product']?>" name="ajout_<?php echo $res["name"]; ?>" value="1" min="1" max="<?php echo $res["date"]; ?>">
                    </div>
                    <a href="panier.php"><button class="btn btn-dark stretched-link" type="button" id="add-to-cart" onclick="addToCart(<?php echo $res['id_product'];?>)" >READ MORE +</button></a>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php include('composants/footer.php'); ?>

