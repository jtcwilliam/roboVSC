<?php






 





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




        <div style="margin-top: 8vh;  margin-left: 20px; margin-right: 20px ;margin-bottom: 10vh;">



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

        function salvarTodosOsDados(rating, parcelId, avaliated) {


            $('#load').hide();

            $('.allSave').hide();

            var formData = {


                rating: rating,

                parcelId: parcelId,
                avaliated: avaliated,


                salvarDadosDirector: '1'
            };
            $.ajax({
                    type: 'POST',
                    url: 'controller/completeAppraiser.php',
                    data: formData,
                    dataType: 'html',
                    encode: true
                })
                .done(function(data) {
                    $('#load').show();
                    console.log(data);

                    if (data.retorno == true) {
                        alert("Updated all data");


                        carregarDados('3', 'tabelasComDados');

                        carregarDados('4', 'avaliacaoDiretor');



                    }
                });
            event.preventDefault();


        }

        carregarDados('1', 'tabelasComDados');
 
    </script>
</body>

</html>