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

        $dadosApp = $objApp->listAllProperties('  and idapps=' . $_POST['idParcel']);

?>



        <div class="grid-container">

            <div class="grid-x grid-padding-x grid-padding-y">
                <div class="cell small-12  medium-12 large-12 ">
                    <hr>
                </div>
            </div>



            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">





            <legend>
                <h3><?= $dadosApp[0]['state_auction'] . ' - ' . $dadosApp[0]['county_auction'] ?> </h3>
            </legend>



            <?php

            ?>

            <div class="grid-x grid-padding-x grid-padding-y">

                <div class="cell small-12 medium-2 large-2 ">
                    <label for="marketValue">
                        <h5>Market Value
                            <input type="text" name="marketValue" id="marketValue" value="<?= $dadosApp[0]['marketValue'] ?>">
                        </h5>
                    </label>
                </div>

                <div class="cell small-12 medium-2 large-2 ">
                    <label for="hoa">
                        <h5>HOA Value
                            <input type="text" name="hoa" id="hoa" value="<?= $dadosApp[0]['hoa'] ?>">

                        </h5>
                    </label>
                </div>

                <div class="cell small-12 medium-2 large-2 ">
                    <label for="ratingVA">
                        <h5>Rating VA
                            <input type="text" name="ratingVA" id="ratingVA" value="<?= $dadosApp[0]['ratingVA'] ?>">
                        </h5>
                    </label>
                </div>

                <div class="cell small-12 medium-2 large-2 ">
                    <label for="ratingVA">
                        <h5>Rating VA
                            <input type="text" name="ratingVA" id="ratingDirector   " value="<?= $dadosApp[0]['ratingDirector'] ?>">
                        </h5>
                    </label>
                </div>

                <div class="cell small-12 medium-2 large-2 ">
                    <label for="landValue">
                        <h5>Land Value
                            <input type="text" name="landValue" id="landValue" value="<?= $dadosApp[0]['landValue'] ?>">
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
                        <h5><a href="<?= $dadosApp[0]['flood'] ?>" target="_blank" rel="noopener noreferrer">Flood</a></h5>

                    </CENTER>
                </div>

                <div class="cell small-12 medium-2 large-2 ">
                    <CENTER>
                        <img src="imgs/maps.png" width="50%" />

                        <h5><a href="<?= $dadosApp[0]['google'] ?>" target="_blank" rel="noopener noreferrer">google</a></h5>
                    </CENTER>
                </div>

                <div class="cell small-12 medium-3 large-2 ">

                    <center>
                        <img src="imgs/regrid.png" width="50%" />

                        <h5><a href="<?= $dadosApp[0]['regridUrl'] ?>" target="_blank" rel="noopener noreferrer">regridUrl</a></h5>
                    </center>
                </div>



                <div class="cell small-12 medium-3 large-2 ">
                    <center>
                        <img src="imgs/appraisal.png" width="50%" />

                        <h5><a href="<?= $dadosApp[0]['aprraisalUrl'] ?>" target="_blank" rel="noopener noreferrer">aprraisal </a></h5>
                    </center>
                </div>


                <div class="cell small-12 medium-3 large-2 ">
                    <center>
                        <img src="imgs/database.png" width="50%" />

                        <h5><a href="<?= $dadosApp[0]['observacao'] ?>" target="_blank" rel="noopener noreferrer">Extras</a></h5>
                    </center>
                </div>



                <div class="cell small-12 medium-3 large-2 ">
                    <center>
                        <img src="imgs/propstream.png" width="50%" />

                        <h5><a href="<?= $dadosApp[0]['details'] ?>" target="_blank" rel="noopener noreferrer">details</a></h5>
                    </center>
                </div>

                <div class="cell small-12 medium-3 large-12 ">
                    <center>
                        <a onclick="salvarTodosOsDados($('#marketValue').val(), $('#hoa').val(), $('#ratingVA').val(), $('#landValue').val()  )" class="submit  button" style="width: 30%; border-radius: 14px;">Record all data</a>
                    </center>
                </div>



            </div>







        </div>


    <?php
        exit();
    }



    ?>
    <!doctype html>
    <html class="no-js" lang="en" dir="ltr">

    <?php

    include 'includes/head.php';

    ?>

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


                </center>

                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">






                <div class="grid-container">
                    <fieldset class="fieldset">
                        <legend>
                            <h3>Consult By Parcel ID</h3>
                        </legend>


                        <?php

                        $auctions = $objAuction->listAuctions();




                        ?>


                        <div>





                            <div class="grid-x grid-padding-x">
                                <div class="cell small-12  medium-3 large-3 ">


                                    <label for="parcel">Select the parcel
                                        <select class="js-example-basic-single" id="parcel" name='parcel' style="height: 30px;">
                                            <?php
                                            $parcels = $objApp->listAllProperties();


                                            foreach ($parcels as $key => $value) {  ?><option value="<?= $value['idapps']; ?>"><?= $value['parcel']; ?></option><?php   }  ?>





                                        </select>
                                    </label>
                                    <br>
                                    <a onclick=" carregarDados($('#parcel').val())" class="button succes" style="  border-radius: 5px ;width: 100%;">Click here to search</a>


                                </div>


                            </div>

                        </div>

                        <div id="tabelasComDados">

                        </div>
                    </fieldset>
                </div>










            </div>



        </section>
        <footer></footer>




        <?php

        include 'includes/footerJS.php';
        ?>





        <script>
            $(document).ready(function() {


                $('.js-example-basic-single').select2();
            });
            $('#load').hide();

            function carregarDados(idParcel) {

                $('#tabelasComDados').html("<br> <center><h1>... Loading</h1></center>");



                var formData = {
                    status: status,

                    idParcel: idParcel,

                    loadDados: '1'
                };
                $.ajax({
                        type: 'POST',
                        url: 'consultAppraiser.php',
                        data: formData,
                        dataType: 'html',
                        encode: true
                    })
                    .done(function(data) {

                        console.log(data);

                        tabelasComDados

                        $('#tabelasComDados').html(data);



                    });
            }
        </script>
    </body>

    </html>
<?php

} ?>