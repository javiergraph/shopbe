<?php 
require "configs/config.php";
include('composants/header.php'); ?>

<?php

    // if(isset($_SESSION['achat']) && $_SESSION['achat'] === '[""]') {
    //     unset($_SESSION['achat']);
    // }
    // Si session delete est à faux : stocke le cookie achat (les éléments dans le panier) dans la session achat
    if(!isset($_SESSION['achat']) && isset($_COOKIE['achat']) && $_SESSION['delete'] == false){
        $_SESSION['achat'] = $_COOKIE['achat'];
    } 

  
    
    if(isset($_COOKIE['panier']) && $_COOKIE['panier'] != 0) {
        $panier = preg_split('/,/', $_COOKIE['achat']);
        if(count($panier) == 1) {
            for($i=0; $i < count($panier); $i++ ) {
                $panier[$i] = substr($panier[$i], 2, -2);
            }
        } else  {
            for($i=0; $i < count($panier); $i++ ) {
                if($i === 0) {
                    $panier[$i] = substr($panier[$i], 2, -1);
                } elseif ($i === count($panier)-1) {
                    $panier[$i] = substr($panier[$i], 1, -2);
                } else {
                    $panier[$i] = substr($panier[$i], 1, -1);
                }
            }
        }
        $achat_total = 0;?>
        <?php 
        foreach($panier as $key => $produit){
            $produit = preg_split('/-/', $produit);
            $id_article = $produit[0];
            include "configs/db.php";
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            while($res = $result->fetch_assoc()){
                if ($res["id_product"]==$id_article){
                    $nom_article = $res["description"];
                    $intro = $res["intro"];
                    $photos = $res["img"];
                    $date = $res["date"];
                    $name = $res["name"];

                }
            }
            $id = $key + 1;
            ?>
                    <?php?>
                        <h1>Our History</h1>  
                        <div class="d-flex flex-row">
                            <div class="p-2"><img class="" src="<?php echo $photos;?>"></div>
                            <div class="p-2">
                                <?php echo"<h2>$name</h2>"?>
                                <?php echo"<h2>$intro</h2>"?>
                            </div>    
                        </div>
                        <?php
                        echo"<br><h4 class='text-justify'>$nom_article</h4><br>";
                        echo"$date";
                    ?>
                    
            <?php 
        }
        ?>
        
        <?php
    } 
    
    
?>

<?php
include('composants/footer.php');
?>
        
        
        

                
