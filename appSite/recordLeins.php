<?php

include_once 'models/Appraiser.php';
include_once 'models/Regrid.php';



$objReg = new Regrid();
$objApp = new Appraiser();

$dadosApp = $objApp->selectAppraiser($_GET['parcelid']);



include_once 'models/ClerckrsOffice.php';

$ObjClerck = new ClerckrsOffice();


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



            <?php


            include_once 'navigation.php'
            ?>




        </ul>
    </header>

    <section>
        <div class="grid-container" style="margin-top: 8vh; margin-bottom: 10vh;">

            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

            <form action="controller/recordLiensController.php" method="POST" enctype="multipart/form-data">
                <div class="grid-x grid-padding-x">

                    <div class="cell small-12 medium-6 large-6 ">


                        <label>Parcel ID</label>






                        <input type="text" name="parcelId" value="<?= $_GET['parcelid'] ?>" />






                    </div>

                    <div class="cell small-12 medium-6 large-4 ">
                        <label>Proccess Number</label>
                        <input type="text" name="proccess_number" />
                    </div>

                </div>
                <div class="grid-x grid-padding-x">

                    <div class="cell small-12 medium-3 large-3">
                        <label>
                            Doc Type
                            <select id="doctype" name="doctype">
                                <option>Deeds</option>
                                <option>Code Enforcement</option>
                                <option>Liens</option>
                                <option>Judgment</option>
                            </select>
                        </label>

                    </div>


                    <div class="cell small-12 medium-3 large-2">
                        <label>
                            Reverse Name
                            <input type="text" name="reverse_name" />
                        </label>

                    </div>

                    <div class="cell small-12 medium-3 large-3">
                        <label>
                            Direct Name
                            <input type="text" name="direct_name" />
                        </label>

                    </div>
                    <div class="cell small-12 medium-12 large-3">
                        <label>
                            File of Procces
                            <input type="file" name="fileProccess" id="fileProccess" />
                        </label>

                    </div>

                    <div class="cell small-12 medium-12 large-12">
                        <label>
                            Comments
                            <textarea rows="3" name="comments"></textarea>
                        </label>

                    </div>

                </div>







        </div>



        <br>
        <div class="grid-x grid-padding-x">




            <div class="cell small-12 medium-12 large-12">
                <label>
                    <br>&nbsp;

                    <input class="button success" type="submit" value="Click here to Insert the Information" style="width: 100%;" />
                </label>

            </div>
        </div>


        <div class="grid-x grid-padding-x">
            <div class="cell small-12 medium-12 large-12">
                <fieldset class="fieldset">

                    <?php


                    include_once 'controller/leansController.php';

                    ?>
                </fieldset>
            </div>
        </div>






        </form>


        <?php












        ?>




    </section>
    <footer></footer>



    <script>
        $('.selects').select2();
    </script>

    <script>
        /*
        $('form').submit(function(event) {


            var formData = {

                parcelId: $('#parcelId').val(),
                inserirApp: '1'
            };
            $.ajax({
                    type: 'POST',
                    url: 'controller/appController.php',
                    data: formData,
                    dataType: 'html',
                    encode: true
                })
                .done(function(data) {

                    console.log(data);

                });
            event.preventDefault();
        });

        */
    </script>




</body>

</html>