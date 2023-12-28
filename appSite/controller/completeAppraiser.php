<?php







include_once '../models/appsRobo.php';



$objApp = new appsRobo();



if (isset($_POST['salvarDadosDirector'])) {


$parcel =  $_POST['parcelId'];

    if ($objApp->saveDirector($_POST['parcelId'], $_POST['rating'], $_POST['avaliated'])) {
        echo json_encode(array('retorno' => true));
    }
}






if (isset($_POST['completarappraiser'])) {





    if ($objApp->completeAppraiser($_POST['parcel'], $_POST['market'], $_POST['ratingVA'], $_POST['hoa'], $_POST['landValue'], '3', $_POST['virtualAgent'], date("Y-m-d H:i:s"))) {
        echo json_encode(array('retorno' => true));
    }





    exit();
}
