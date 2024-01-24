<?php



session_start();

if ($_SESSION['usuarioLogado']['logado'] == false  || $_SESSION['usuarioLogado']['0']['status'] != '6') {

    echo '<h3>Acesso Negado';
    exit();
} else {




    include_once 'models/Appraiser.php';
    include_once 'models/Regrid.php';
    include_once 'models/auctions.php';




    $objAuction = new Auction();
    $objReg = new Regrid();
    $objApp = new Appraiser();




    if (isset($_POST['loadDados'])) {

        $dadosApp = $objApp->listPropert_Favorites('  and auction =' . $_POST['county'] . '  ');
        // 'A Plus'

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


                            <Td style="width: auto">
                                <center>Regrid</center>
                            </Td>

                            <Td style="width: auto">
                                <center>+ Info</center>
                            </Td>



                            <Td style="width:  auto">
                                <center>Google Map</center>
                            </Td>
                            <Td style="width: auto">
                                <center>Flood zone</center>
                            </Td>

                            <Td style="width: auto">
                                <center> Minimum</center>
                            </Td>


                            <Td style="width: auto">
                                <center> Price U$</center>
                            </Td>

                            <Td style="width: auto">
                                <center> HOA U$</center>
                            </Td>



                            <Td style="width: auto">
                                <center> V.A </center>

                            </Td>

                            <Td style="width: auto">
                                <center> Director</center>

                            </Td>

                            <Td style="width:auto ">
                                <center> Data</center>
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

                                            <?= $value['minimo'] ?>

                                        </center>
                                        </a>



                                    </Td>


                                    <Td style="width: auto;">

                                        <center>

                                            <?= $value['marketValue'] ?>

                                        </center>
                                        </a>



                                    </Td>




                                    <Td style="width: auto;">
                                        <center>

                                            <?= $value['hoa'] ?>

                                        </center>
                                        </a>
                                    </Td>

                                    <Td style="width: auto;">


                                        <center>

                                            <?= $value['ratingVA']  ?>

                                        </center>


                                    </Td>

                                    <Td style="width: auto;">


                                        <center>

                                            <?= $value['ratingDirector']  ?>

                                        </center>


                                    </Td>



                                    <?php
                                    if ($_POST['status'] != '3') { ?>

                                        <Td style="width: 10%;">
                                            <center>
                                                <?= $value['dataUp']  ?>
                                            </center>
                                        </td>

                                    <?php }      ?>

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

                    <center>
                        <h1>Favorite Houses</h1>

                    </center>

                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

                    <div class="panel callout radius" id="load" style="background-color: red; color: white;">
                        <center>
                            <h1>Wait while we are loading the data</h1>

                        </center>

                    </div>



                    <fieldset class="fieldset">
                        <legend><B>Please Select the county</B></legend>


                        <?php

                        $auctions = $objAuction->listAuctions();




                        ?>


                        <div>
                            <div class="grid-x grid-padding-x">
                                <div class="cell small-5 ">
                                    <label for="cbCounty">
                                        <select id="cbCounty" style="height: 4vh;">

                                            <?php

                                            foreach ($auctions as $key => $value) {
                                            ?>
                                                <option value="<?= $value['idauction'] ?>"><?= $value['state_auction'] . " - " . $value['county_auction'] . " - " . $value['date_auction'] ?></option>


                                            <?php
                                            }

                                            ?>

                                        </select>

                                    </label>

                                </div>
                                <div class="cell small-2 ">
                                    <a onclick=" carregarDados(   'tabelasComDados')" class="button succes" style="height: 4vh;">Click here to search</a>


                                </div>
                            </div>

                        </div>
                    </fieldset>


                    <fieldset class="fieldset">

                        <legend>
                            <h3 id="countName"> </h3>
                        </legend>

                        <div id="tabelasComDados">

                        </div>
                    </fieldset>




                </div>



            </section>
            <footer></footer>





            <?php

include 'includes/footerJS.php';
?>



            <script>
                $('#load').hide();

                function carregarDados(grade) {

                    $('#load').show();

                    var nomeCount = $("#cbCounty option:selected").text();

                    var formData = {
                        status: status,
                        grade: grade,
                        county: $('#cbCounty').val(),

                        loadDados: '1'
                    };
                    $.ajax({
                            type: 'POST',
                            url: 'favorite.php',
                            data: formData,
                            dataType: 'html',
                            encode: true
                        })
                        .done(function(data) {

                            console.log(data);


                            $('#countName').html(nomeCount);

                            $('#load').hide();

                            $('#' + grade).html(data);



                        });
                }


                //   carregarDados(   'tabelasComDados');
            </script>
        </body>

        </html>
    <?php

} ?>