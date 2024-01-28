<?php


ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

 
include_once 'models/Appraiser.php';
include_once 'models/Regrid.php';



$objReg = new Regrid();
$objApp = new Appraiser();


//$dadosApp = $objApp->listPropertys();


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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
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
            include_once 'navigation.php';

            ?>




        </ul>
    </header>

    <section>
        <div class="grid-container" style="margin-top: 8vh; margin-bottom: 10vh;">

            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">



            <div class="grid-x">

                <div class="cell small-12 medium-12 large-12 ">
                    <form>

                        <fieldset class="fieldset">
                            <legend>
                                Create Actions
                            </legend>
                            <div class="grid-x grid-padding-x grid-padding-y">
                                <div class="cell small-12 medium-12 large-4 ">
                                    <label for="txtState">State
                                        <input type="text" id="txtState" name="txtState" />
                                    </label>

                                </div>
                                <div class="cell small-12 medium-12 large-4 ">
                                    <label for="txtCount">County
                                        <input type="text" id="txtCounty" name="txtCounty" />
                                    </label>

                                </div>

                                <div class="cell small-12 medium-12 large-4 ">
                                    <label for="dataApp">Date of Auction
                                        <input type="text" class="datepicker" name="dataApp" id="dataApp">
                                    </label>

                                </div>

                                <div class="cell auto "></div>

                                <div class="cell small-12 medium-12 large-4 ">

                                    <input type="submit" value="Record Auction" class="button succes" style="width: 100%;" />
                                    <Br>
                                    <a href="listAuctions.php" target="_self" class="button warning" style="width: 100%;">List Auctions</a>


                                </div>
                                <div class="cell auto "></div>





                            </div>
                        </fieldset>
                    </form>

                </div>





            </div>


        </div>

    </section>
    <footer></footer>





    <script>
        $(function() {
            $(".datepicker").datepicker();
        });
    </script>





    <script>
        $('form').submit(function(event) {


            var formData = {

                txtState: $('#txtState').val(),

                txtCounty: $('#txtCounty').val(),

                dataApp: $('#dataApp').val(),

                insertAuction: '1'
            };
            $.ajax({
                    type: 'POST',
                    url: 'controller/auctionController.php',
                    data: formData,
                    dataType: 'json',
                    encode: true
                })
                .done(function(data) {

                    if (data.retorno == true) {
                        alert('Good! Auction is created');
                        $('#txtState').val('');
                        $('#txtCounty').val('');
                        $('#dataApp').val('');


                    }

                });
            event.preventDefault();
        });
    </script>
</body>

</html>