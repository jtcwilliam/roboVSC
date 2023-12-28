<?php

include_once 'models/Appraiser.php';
include_once 'models/Regrid.php';



$objReg = new Regrid();
$objApp = new Appraiser();




if (isset($_POST['loadDados'])) {

    $dadosApp = $objApp->listPropert_County_robos($_POST['status']);

?>

    <div class="grid-x">
        <div class="cell small-12 medium-12 large-12 ">

            <table class="table striped">
                <thead>
                    <tr style="align-items: center;">

                    <Td style="width: 10%;">
                            County
                        </Td>
                        <Td style="width: 10%;">
                            Parcel ID
                        </Td>

                        <Td style="width: 10%;">
                            <center>Appraisal</center>
                        </Td>

                  


                        <Td style="width: 10%;">
                            <center>Regrid</center>
                        </Td>

                        <Td style="width: 10%;">
                            <center>+ Info</center>
                        </Td>


                        <Td style="width: 10%;">
                            <center>Google Map</center>
                        </Td>
                        <Td style="width: 10%;">
                            <center>Flood zone</center>
                        </Td>


                        <Td style="width: 10%;">
                            <center> Price</center>
                        </Td>

                        <Td style="width: 10%;">
                            <center> HOA</center>
                        </Td>


                        <Td style="width: 10%;">
                            <center>Details</center>
                        </Td>


                        <Td style="width: 20%;">
                            <center> Rate</center>

                        </Td>

                        <Td style="width: 10%;">
                        <center> Ações</center>
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

                            <Td style="width: 10%;">
                                    <?= $value['county_auction'] ?>
                                </Td>

                                <Td style="width: 10%;">
                                    <a href="#"> <?= $value['parcel'] ?></a>
                                </Td>



                                <Td style="width: 10%;">
                                    <center>
                                        <a target="_blank" href="<?= $value['aprraisalUrl'] ?>"><img src="imgs/pdf.png" style="height: 3vh" />
                                        </a>

                                    </center>
                                </Td>
 


                                <Td style="width: 10%;">
                                    <center>
                                        <a target="_blank" href="<?= $value['regridUrl'] ?>">
                                            <img src="imgs/pdf.png" style="height: 3vh" />

                                        </a>
                                    </center>
                                </Td>

                                
                                <Td style="width: 10%;">
                                    <center>
                                        <a target="_blank" href="<?= $value['observacao'] ?>">
                                            <img src="imgs/pdf.png" style="height: 3vh" />

                                        </a>
                                    </center>
                                </Td>



                                <Td style="width: 10%;">
                                    <?php

                                    if ($value['google'] == null) {
                                    ?>
                                        <input type="text" id="googleMaps<?= $cont ?>" name="googleMaps" placeholder="google" />


                                    <?php
                                    } else {

                                    ?>
                                        <center>
                                            <a href="<?= $value['google'] ?>" target="_blank">
                                                <img src="imgs/maps.png" style="height: 3vh" />

                                            </a>
                                        </center>

                                    <?php
                                    }
                                    ?>
                                </Td>
                                <Td style="width: 10%;">
                                    <?php

                                    if ($value['flood'] == null) {
                                    ?>
                                        <input type="text" id="flood<?= $cont ?>" name="flood" placeholder="Flood zone" />


                                    <?php
                                    } else {

                                        $links = str_replace(" ", '%20', $value['flood']);
                                        $links = htmlspecialchars($links);

                                        echo "<center><a href=\"{$links}\"  target=\"_blank\"><img src='imgs/flood.png' style='height: 3vh' /><br></a></center>";

                                    ?>

                                    <?php
                                    }
                                    ?>
                                </Td>


                                <Td style="width: 10%;">
                                    <?php

                                    if ($value['marketValue'] == null) {
                                    ?>
                                        <input type="text" style="width: 100%;" id="marketValue<?= $cont ?>" name="marketValue" placeholder="Sale Value" />


                                    <?php
                                    } else {

                                    ?>

                                        <center>
                                            <img src="imgs/sale.png" style="height: 3vh" /><br>
                                            <b>U$: <?= $value['marketValue'] ?></b>
                                            </i>
                                        </center>
                                        </a>



                                    <?php
                                    }
                                    ?>
                                </Td>




                                <Td style="width: 10%;">
                                    <?php

                                    if ($value['hoa'] == null) {
                                    ?>
                                        <input style="width: 100%;" type="text" id="hoa<?= $cont ?>" name="hoa" placeholder="HOA Value" />


                                    <?php
                                    } else {

                                    ?>

                                        <center>
                                            <img src="imgs/hoa.png" style="height: 3vh" /><br>
                                            <b>U$: <?= $value['hoa'] ?></b>
                                            </i>
                                        </center>
                                        </a>



                                    <?php
                                    }
                                    ?>
                                </Td>


                                <Td style="width: 10%;">
                                    

                                        <center>
                                            <a href="<?= $value['details'] ?>" target="_blank" ><img src="imgs/icons.png" style="height: 3vh" /></a>
                                             
                                            
                                        </center>
                                    
                                </Td>

                                <Td style="width: 20%;">
                                    <?php

                                    if ($value['ratingVA'] == null) {
                                    ?><br>

                                        <select id="rating<?= $cont ?>" style="width: 100px;"  name="rating">
                                            <option>Choose</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>Disabled</option>
                                        </select>


                                    <?php
                                    } else {

                                    ?>

                                        <center>
                                            <img src="imgs/rating.png" style="height: 3vh" /><br>
                                            <b><?= $value['ratingVA']  ?></b>
                                            </i>
                                        </center>



                                    <?php
                                    }
                                    ?>
                                </Td>



                                <?php
                                if ($_POST['status'] != '3') { ?>

                                    <Td style="width: 10%;">
                                        <center>
                                            <a class="allSave" onclick="salvarTodosOsDados($('#googleMaps<?= $cont ?>').val(),  $('#flood<?= $cont ?>').val(), $('#marketValue<?= $cont ?>').val(), $('#rating<?= $cont ?>').val(), <?= $value['idapps'] ?>, $('#hoa<?= $cont ?>').val(), '3'  )">

                                            <img src="imgs/check.png" style="height: 3vh" /><br>      
 

                                            </a>
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
    <html class="no-js" lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kleber & Ruth Properties || Properties</title>
        <link rel="stylesheet" href="css/foundation.css">
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="css/foundation-icons/foundation-icons.css">
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



                <?php


                include_once 'includes/navigation.php'
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
                        <h3>New Properties to avaliation</h3>
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
                        url: 'list_housesCounty.php?',
                        data: formData,
                        dataType: 'html',
                        encode: true
                    })
                    .done(function(data) {

                        console.log(data);

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