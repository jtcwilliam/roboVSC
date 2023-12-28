<?php

include 'models/auctions.php';
$ObjAuctions = new Auction();

$dadosAuction = $ObjAuctions->listAuctions($_GET['auction']);



session_start();

$_SESSION['auction'] = $dadosAuction;



if ($_GET['houses'] == true) {

?>
    <script>
        window.location.href = "housesCounty.php?auction=<?=$_GET['auction']?>";
    </script>
    
    <?php




                exit();
            }



            if (isset($_SESSION)) {
                ?>


    <script>
        window.location.href = "appraiser.php";
    </script>


<?php
            }
?>