<?php




//V.A



session_start();

if ($_SESSION['usuarioLogado']['logado'] == false) {

    echo '<h3>Acesso Negado';
    exit();
} else {










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
        <?php
        include_once 'includes/head.php';
        ?>
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




            <div style="margin-top: 8vh;  margin-left: 20px; margin-right: 20px ;margin-bottom: 10vh;">

                <h6>Hello Virtual Agent <span id="nome"><?= $_SESSION['usuarioLogado'][0]['nomeUsuario'] ?></span></h6>



                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

                <div class="panel callout radius" id="load" style="background-color: red; color: white;">
                    <center>
                        <h1>Wait while we are loading the data</h1>

                    </center>

                </div>








                <fieldset class="fieldset">

                    <legend>
                        <h3>New Properties to avaliate</h3>
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

            function carregarDados(status, grade) {

                $('#load').show();

                var formData = {
                    status: status,
                    grade: grade,
                    loadDados: '1'
                };
                $.ajax({
                        type: 'POST',
                        url: 'controller/vaListHousesController.php',
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



            carregarDados('1', 'tabelasComDados');
        </script>
    </body>

    </html>
<?php

}
?>