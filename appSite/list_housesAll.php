<?php

include_once 'models/Appraiser.php';
include_once 'models/Regrid.php';



$objReg = new Regrid();
$objApp = new Appraiser();




if (isset($_POST['loadDados'])) {

    $dadosApp = $objApp->listHousesFiltered(null);

?>

    <div class="grid-x">
        <div class="cell small-12 medium-12 large-12 ">

            <table class="table striped">
                <thead>
                    <tr style="align-items: center;">

                        <Td style="width: auto">
                            County
                        </Td>
                        <Td style="width: auto">
                            Parcel ID
                        </Td>

                        <Td style="width: auto">
                            <center>Appraisal</center>
                        </Td>


                        <Td style="width:auto">
                            <center>Regrid</center>
                        </Td>
                        <Td style="width: auto">
                            <center>+ Info</center>
                        </Td>
                        <Td style="width: auto">
                            <center>Google Map</center>
                        </Td>
                        <Td style="width: auto">
                            <center>Flood zone</center>
                        </Td>

                        <Td style="width: auto">
                            <center> Minimum</center>
                        </Td>

                        <Td style="width: auto">
                            <center> Price</center>
                        </Td>

                        <Td style="width: auto">
                            <center> HOA</center>
                        </Td>



                        <Td style="width: auto">
                            <center> Rate</center>

                        </Td>

                        <Td style="width: auto">

                        </td>




                    </tr>


                </thead>
                <tbody>
                    <?php
                    $cont = 1;
                    if ($dadosApp == null) {
                        echo "<center><h1>No House at time</h1></center>";
                    } else {



                        foreach ($dadosApp as $key => $value) { ?>

                            <tr>

                                <Td style="width: auto;">
                                    <?= $value['county_auction'] ?>
                                </Td>
                                <Td style="width: auto;">
                                    <a href="#"> <?= $value['parcel'] ?></a>
                                </Td>



                                <Td style="width: auto;">
                                    <center>
                                        <a target="_blank" href="<?= $value['aprraisalUrl'] ?>"><img src="imgs/pdf.png" style="height: 3vh" />
                                        </a>

                                    </center>
                                </Td>


                                <Td style="width: auto;">
                                    <center>
                                        <a target="_blank" href="<?= $value['regridUrl'] ?>">
                                            <img src="imgs/pdf.png" style="height: 3vh" />
                                        </a>
                                    </center>
                                </Td>

                                <Td style="width: auto;">
                                    <center>
                                        <a target="_blank" href="<?= $value['observacao'] ?>">
                                            <img src="imgs/pdf.png" style="height: 3vh" />
                                        </a>
                                    </center>
                                </Td>





                                <Td style="width: auto;">

                                    <center>
                                        <a href="<?= $value['google'] ?>" target="_blank">
                                            <img src="imgs/maps.png" style="height: 3vh" />

                                        </a>
                                    </center>


                                </Td>
                                <Td style="width: auto;">
                                    <?php


                                    $links = str_replace(" ", '%20', $value['flood']);
                                    $links = htmlspecialchars($links);

                                    echo "<center><a href=\"{$links}\"  target=\"_blank\"><img src='imgs/flood.png' style='height: 3vh' /><br></a></center>";

                                    ?>

                                </Td>

                                <Td style="width: auto;">

                                    <center>

                                        <b>U$: <?= $value['minimo'] ?></b>

                                    </center>
                                    </a>



                                </Td>



                                <Td style="width: auto;">

                                    <center>

                                        <b>U$: <?= $value['marketValue'] ?></b>

                                    </center>
                                    </a>



                                </Td>




                                <Td style="width: auto;">
                                    <center>

                                        <b>U$: <?= $value['hoa'] ?></b>

                                    </center>
                                    </a>
                                </Td>

                                <Td style="width: auto;">


                                    <center>

                                        <b><?= $value['ratingVA']  ?></b>

                                    </center>


                                </Td>



                                <?php
                                if ($_POST['status'] != '3') { ?>

                                    <Td style="width: 15%;">
                                        <center>
                                            <b><?= $value['dataUp']  ?></b>
                                        </center>
                                    </td>

                                <?php } else {
                                    echo '<td>S </td>';
                                }
                                ?>

                            </tr>






                    <?php


                            $cont++;
                        }
                    }

                    ?>
                </tbody>
            </table>

        </div>




    <?php

    exit();
}







    ?>
    <!doctype html>
    <!doctype html>
    <html class="no-js" lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kleber & Ruth Properties || Properties</title>
        <link rel="stylesheet" href="css/foundation.css">
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="css/foundation-icons/foundation-icons.css">
        <?php
        include_once 'includes/head.php';
        ?>
    </head>

    <body style="background-color: #fffdf0;">


        <header class="subnav-hero-section">
            <h1 class="subnav-hero-headline">Kleber & Ruth <small>Properties</small></h1>
            <ul class="subnav-hero-subnav">



                <?php


                include_once 'includes/navigationVa.php'
                ?>



            </ul>
        </header>

        <section>




            <div style="margin-top: 8vh;  margin-left: 10px; margin-right: 10px ;margin-bottom: 10vh;">

                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

                <div class="panel callout radius" id="load" style="background-color: red; color: white;">
                    <center>
                        <h1>Wait while we are loading the data</h1>

                    </center>

                </div>




                <fieldset class="fieldset">

                    <legend>
                        <h3>All Properties</h3>
                    </legend>

                    <div id="tabelasComDados">

                    </div>
                </fieldset>




            </div>



        </section>
        <footer></footer>








        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/what-input.js"></script>
        <script src="js/vendor/foundation.js"></script>
        <script src="js/app.js"></script>


        <script>
            $('#load').hide();

            function carregarDados(status, grade) {

                $('#load').show();

                var formData = {
                    status: status,
                    grade: grade,
                    loadDados: '1'
                };
                $.ajax({
                        type: 'POST',
                        url: 'list_housesAll.php',
                        data: formData,
                        dataType: 'html',
                        encode: true
                    })
                    .done(function(data) {

                        $('#load').hide();

                        $('#' + grade).html(data);



                    });
            }

            function salvarTodosOsDados(google, flood, sale, rating, parcelId, hoa, avaliated) {


                $('#load').hide();

                $('.allSave').hide();

                var formData = {

                    google: google,
                    flood: flood,
                    sale: sale,
                    rating: rating,
                    hoa: hoa,
                    parcelId: parcelId,
                    avaliated: avaliated,


                    salvarTodosOsDados: '1'
                };
                $.ajax({
                        type: 'POST',
                        url: 'controller/completeAppraiser.php',
                        data: formData,
                        dataType: 'json',
                        encode: true
                    })
                    .done(function(data) {
                        $('#load').show();
                        console.log(data);

                        if (data.retorno == true) {
                            alert("Updated all data");

                            carregarDados('1', 'tabelasComDados');

                            carregarDados('3', 'dadosCarregados');
                        }
                    });
                event.preventDefault();


            }

            carregarDados('1', 'tabelasComDados');

            carregarDados('3', 'dadosCarregados');
        </script>
    </body>

    </html>