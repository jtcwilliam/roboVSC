<?php



include_once '../models/Regrid.php';
include_once '../models/Appraiser.php';


$objRegrid = new Regrid();
$objApp = new Appraiser();

$dadosApp = $objApp->selectAppraiser($_POST["parcelId"]);

 
 


$objRegrid->setParcelId(preg_replace("/\s+/", "", $_POST["parcelId"]));
$objRegrid->setParcelAdd($_POST['parcelAdd']);;
$objRegrid->setOwnerName($_POST['ownerName']);;
$objRegrid->setOwnerAdd($_POST['ownerAdd']);;
$objRegrid->setParcelValue($_POST['parcelValue']);;
$objRegrid->setTotalParcelValue($_POST['totalParcelValue']);;
$objRegrid->setImprovementValue($_POST['improvementValue']);;
$objRegrid->setLandValue($_POST['landValue']);;
$objRegrid->setCentroId($_POST['centroId']);;
$objRegrid->setCalculatedAcres($_POST['calculatedAcres']);;
$objRegrid->setCalculatedParcel($_POST['calculatedParcel']);;
$objRegrid->setLegalDescription($_POST['legalDescription']);
$objRegrid->setComments($_POST['comments']);
$objRegrid->setAuditions($_POST['auditions']);
$objRegrid->setCountyReg($_POST['countyReg']);
$objRegrid->setIdAppraiser($dadosApp['0']['id_appraiser']);


$objRegrid->setLink($_POST['linkRegrid']);


if ($objRegrid->inserirRegrid() == true) {
    echo json_encode(array('retorno' => TRUE));
}
