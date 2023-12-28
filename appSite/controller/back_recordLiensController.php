<?php

include_once '../models/Appraiser.php';
include_once '../models/Regrid.php';

include_once '../models/ClerckrsOffice.php';



$objReg = new Regrid();
$objApp = new Appraiser();
$objClercks = new ClerckrsOffice();


$dadosApp = $objApp->listPropertys();


?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kleber & Ruth Properties || Properties</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>




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
            height: 200px;
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
        <h1 class="subnav-hero-headline">Kleber & Ruth <small>Properties</small></h1>
        <ul class="subnav-hero-subnav">



            <li><a href="appraiser.php">Insert Appraiser </a></li>
            <li><a href="regrid.php">Insert Regrid </a></li>
            <li><a href="index.php" class="is-active"> List Houses </a></li>





        </ul>
    </header>

    <section>

        <?php



        $arquivo = $_FILES['fileCSV']['tmp_name'];



        $row = 1;
        if (($handle = fopen($arquivo, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 10000,  )) !== FALSE) {


                var_dump($data);

/*
 
                $objClercks->setStatus($data[0]);
                $objClercks->setSearch_name($data[1]);
               
                $objClercks->setParcel_id($_POST['parcelId']);

                $objClercks->inserirClercks();

 */





                echo '<pre>';
                print_r($data);
                echo '</pre>';


                $num = count($data);



                for ($c = 0; $c < $num; $c++) {
                    //   echo $data[$c] . "<br />\n";


                }
                
            }


            if (fclose($handle) ==  true) {
                header("location: queryApp.php?idParcelId" . $_POST['parcelId']);
            } else {
                echo '0';
            }
        }



        ?>

    </section>
    <footer></footer>






</body>

</html>