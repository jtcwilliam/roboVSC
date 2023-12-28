<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kleber & Ruth Properties || Properties</title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="../css/app.css">
    <style>
        .subnav-hero-section {
            text-align: center;
            background: #1779ba;
            background-size: cover;
            position: relative;
            overflow: visible;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            height: 100vh;
        }

        .subnav-hero-section .subnav-hero-headline {
            color: #fefefe;
        }

        .subnav-hero-subnav {
            float: none;
            position: absolute;
            text-align: center;
            margin: 0 auto;
            bottom: 0;
            width: 100%;
        }

        .subnav-hero-subnav li {
            float: none;
            display: inline-block;
        }

        .subnav-hero-subnav li a {
            padding: 0.9rem 1rem;
            font-size: 0.75rem;
            color: #fefefe;
            text-transform: uppercase;
            display: block;
            font-weight: bold;
            letter-spacing: 1px;
            transition: all 0.35s ease-in-out;
        }

        .subnav-hero-subnav li a.is-active {
            background: rgba(254, 254, 254, 0.15);
        }

        .subnav-hero-subnav li a:hover {
            background: rgba(254, 254, 254, 0.15);
        }


        form .form-icons {
            text-align: center;
        }

        form .form-icons h4 {
            margin-bottom: 1rem;
        }

        form .form-icons .input-group-label {
            background-color: #1779ba;
            border-color: #1779ba;
        }

        form .form-icons .input-group-field {
            border-color: #1779ba;
        }

        form .form-icons .fa {
            color: white;
            width: 1rem;
        }

        .boxLabel {
            width: 20vw;
            color: white;
            border-top-left-radius: 10px;

        }

        .input-group {
            margin-bottom: 30px;
        }
    </style>
</head>

<body style="background-color: #fffdf0;">


    <header class="subnav-hero-section">
        <h1 class="subnav-hero-headline">Hold on Please! <br><small> </small></h1>
        <br><Br>

        <?php



        include_once '../models/Appraiser.php';

        $objApp = new Appraiser();



        if (isset($_POST['insertAuction'])) {



            exit();
        }


        //if (isset($_POST['inserirApp'])) {


        $dadosNome = $_FILES['fotoGIS']['name'];

        $nomeArquivo =   preg_replace("/\s+/", "", $dadosNome);

        move_uploaded_file($_FILES['fotoGIS']['tmp_name'], '../imgProps/' . $nomeArquivo);





        $objApp->setParcelId(preg_replace("/\s+/", "", $_POST["parcelId"]));

        $objApp->setLinkApp($_POST['linkApp']);
        $objApp->setPropertyAdd($_POST['propertyAdd']);
        $objApp->setComments($_POST['comments']);
        $objApp->setOwnerName($_POST['ownerName']);
        $objApp->setOwnerAdd($_POST['ownerAdd']);
        $objApp->setLocked($_POST['locked']);
        $objApp->setFloodZone($_POST['floodZone']);
        $objApp->setAssessedValue($_POST['assessedValue']);
        $objApp->setMinimumBid($_POST['minimumBid']);
        $objApp->setValorMercado($_POST['valorMercado']);
        $objApp->setGooglelink($_POST['googlelink']);
        $objApp->setPropertyUse($_POST['propertyUse']);
        $objApp->setPropertCaracteristics($_POST['propertCaracteristics']);
        $objApp->setPropertyType($_POST['propertyType']);
        $objApp->setPropertyDescription($_POST['propertyDescription']);
        $objApp->setLegalDescription($_POST['legalDescription']);
        $objApp->setApproximateAnualTaxes($_POST['approximateAnualTaxes']);
        $objApp->setCrimeRate($_POST['crimeRate']);
        $objApp->setSchoolRateZip($_POST['schoolRateZip']);
        $objApp->setHoa($_POST['hoa']);
        $objApp->setLinkReport($_POST['linkReport']);
        $objApp->setAuctions($_POST['auditions']);
        $objApp->setRating($_POST['rating']);


        //auditions


        $objApp->setImgMapGis($nomeArquivo);
        //$objApp->setCoordinates($_POST['coordinates']);//
        $objApp->setAddictionalNotes($_POST['addictionalNotes']);
        $objApp->setcounty_app($_POST['countyApp']);



        if ($objApp->inserirApp() == true) {
        ?>


            <a href="../regrid.php?parcel_id=<?= $_POST['parcelId'] ?>">
                <h1> <small><br>Now, Click Here to record the regrid</small></h1>
            </a>



        <?php

        }

        ?>




    </header>

    <section>
        <div class="grid-container" style="margin-top: 8vh; margin-bottom: 10vh;">

            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

            <div class="grid-x grid-padding-x">
                <div class="large-12 cell">

                </div>
            </div>
        </div>

    </section>
    <footer></footer>








    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>


</body>

</html>