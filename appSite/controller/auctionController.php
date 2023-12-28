<?php


include '../models/auctions.php';


$ObjAuction = new Auction();


// verificando se está setada a variavel para inserção
if (isset($_POST['insertAuction'])) {

    date_default_timezone_set('America/New_York');

    $date = date_create($_POST['dataApp']);

    $datas = date_format($date, 'Y-m-d H:i:s');

    $ObjAuction->setState_auction($_POST['txtState']);

    $ObjAuction->setCounty_auction($_POST['txtCounty']);

    $ObjAuction->setDate_auction($datas);

    if ($ObjAuction->insertAuction() == true) {
        echo json_encode(array('retorno' => true));
    }

    exit();
    die();
}

if (isset($_POST['listAllAuctions'])) {

    $auctions = $ObjAuction->listAuctions(null);

    print_r($auctions);
}
