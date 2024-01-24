<?php
session_start();




if ($_SESSION['usuarioLogado']['logado'] == false) {

    echo '<h3>Acesso Negado';
    exit();
} else {





    include_once 'models/Appraiser.php';
    include_once 'models/Regrid.php';



    $objReg = new Regrid();
    $objApp = new Appraiser();


    $dados = $objApp->propertyData(" where idapps = " . $_GET['idAppraiser']);

    /*
echo '<pre>';
print_r($dados);
echo '</pre>';
*/






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


             //   include_once 'includes/navigationVa.php'
                ?>




            </ul>
        </header>

        <section>




            <div class="grid-container">



                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">




                <fieldset class="fieldset">

                    <legend>
                        <h3>Property. <?= $dados[0]['parcel'] ?></h3>
                    </legend>



                    <?php

                    ?>

                    <div class="grid-x grid-padding-x grid-padding-y">
                        <div class="cell small-12 medium-2 large-3 ">
                            <label for="marketValue">
                                <h5>Market Value
                                    <input type="text" name="marketValue" id="marketValue" value="<?= $dados[0]['marketValue'] ?>">
                                </h5>
                            </label>
                        </div>

                        <div class="cell small-12 medium-2 large-3 ">
                            <label for="hoa">
                                <h5>HOA Value
                                    <input type="text" name="hoa" id="hoa" value="<?= $dados[0]['hoa'] ?>">

                                </h5>
                            </label>
                        </div>

                        <div class="cell small-12 medium-2 large-3 ">
                            <label for="ratingVA">
                                <h5>Rating VA


                                    <?php


                                    if (isset($dados[0]['ratingVA'])) {
                                    ?>
                                        <input type="text" name="ratingVA" id="ratingVA" value="<?= $dados[0]['ratingVA'] ?>">

                                    <?php
                                    } else {
                                    ?>
                                        <select id="ratingVA">

                                            <option>Choose</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                        </select>



                                    <?php

                                    }

                                    ?>
                                </h5>
                            </label>
                        </div>

                        <div class="cell small-12 medium-2 large-3 ">
                            <label for="landValue">
                                <h5>Land Value
                                    <input type="text" name="landValue" id="landValue" value="<?= $dados[0]['landValue'] ?>">
                                </h5>
                            </label>
                        </div>
                    </div>
                    <?php

                    ?>


                    <div class="grid-x grid-padding-x grid-padding-y">
                        <div class="cell small-12 medium-2 large-2 ">
                            <CENTER>

                                <img src="imgs/flood.png" width="50%" />
                                <h5><a href="<?= $dados[0]['flood'] ?>" target="_blank" rel="noopener noreferrer">Flood</a></h5>

                            </CENTER>
                        </div>

                        <div class="cell small-12 medium-2 large-2 ">
                            <CENTER>
                                <img src="imgs/maps.png" width="50%" />

                                <h5><a href="<?= $dados[0]['google'] ?>" target="_blank" rel="noopener noreferrer">google</a></h5>
                            </CENTER>
                        </div>

                        <div class="cell small-12 medium-3 large-2 ">

                            <center>
                                <img src="imgs/regrid.png" width="50%" />

                                <h5><a href="<?= $dados[0]['regridUrl'] ?>" target="_blank" rel="noopener noreferrer">regridUrl</a></h5>
                            </center>
                        </div>



                        <div class="cell small-12 medium-3 large-2 ">
                            <center>
                                <img src="imgs/appraisal.png" width="50%" />

                                <h5><a href="<?= $dados[0]['aprraisalUrl'] ?>" target="_blank" rel="noopener noreferrer">aprraisal </a></h5>
                            </center>
                        </div>


                        <div class="cell small-12 medium-3 large-2 ">
                            <center>
                                <img src="imgs/database.png" width="50%" />

                                <h5><a href="<?= $dados[0]['observacao'] ?>" target="_blank" rel="noopener noreferrer">Extras</a></h5>
                            </center>
                        </div>



                        <div class="cell small-12 medium-3 large-2 ">
                            <center>
                                <img src="imgs/propstream.png" width="50%" />

                                <h5><a href="<?= $dados[0]['details'] ?>" target="_blank" rel="noopener noreferrer">details</a></h5>
                            </center>
                        </div>

                        <div class="cell small-12 medium-3 large-12 ">
                            <center>
                                <a onclick="salvarTodosOsDados($('#marketValue').val(), $('#hoa').val(), $('#ratingVA').val(), $('#landValue').val()  )" class="submit  button" style="width: 30%; border-radius: 14px;">Record all data</a>
                            </center>
                        </div>



                    </div>


                </fieldset>






            </div>


        </section>
        <footer></footer>


        <?php

include 'includes/footerJS.php';
?>




        <script>
            function salvarTodosOsDados(market, hoa, ratingVA, landValue) {


                $('#load').hide();

                $('.allSave').hide();

                var formData = {

                    parcel: <?= $_GET['idAppraiser'] ?>,
                    market: market,
                    hoa: hoa,
                    ratingVA: ratingVA,
                    landValue: landValue,
                    virtualAgent: <?php echo $_SESSION['usuarioLogado'][0]['idusuarios'] ?>,
                    completarappraiser: '1'
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
                            alert('This Property is updated');
                            window.location.replace("vaAvaliation.php");



                        }
                    });
                event.preventDefault();


            }
        </script>

    </body>

    </html>
<?php
}
?>