<?php


session_start();
 

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
    <style>
        .subnav-hero-section {
            text-align: center;
            background: #bc8181;
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
            color: #b65454;
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
            color: white;
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
            background-color: #bc8181;
            border-color: #bc8181;
        }

        form .form-icons .input-group-field {
            border-color: #bc8181;
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

            <div class="grid-x grid-padding-x">
                <div class="large-12 cell">

                    <div class="large reveal" id="exampleModal1" data-reveal>
                        <h1>You Regrid is Recorded</h1>

                        <p>Now, <a href="recordLeins.php?parcelid=<?= $_GET['parcel_id'] ?>">Click here</a> for do you Clercks Office</p>
                        <button class="close-button" data-close aria-label="Close modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

   



                    <form>
                        <div class="form-icons">
                            <h4 style="color:  #bc8181;">Regrid</h4>

                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    County
                                </span>
                                <input class="input-group-field" type="text" id="countyReg" name="countyReg" value="<?= $_SESSION['auction'][0]['county_auction'] . ' / ' . $_SESSION['auction'][0]['state_auction']

                                                                                                                    ?>">
                            </div>

                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Parcel ID
                                </span>



                                <?php
                                if (isset($_GET['parcel_id'])) { ?>
                                    <input class="input-group-field" type="text" id="parcelId" readonly value="<?= $_GET['parcel_id'] ?>">

                                <?php
                                } else {
                                ?>
                                    <input class="input-group-field" type="text" id="parcelId">

                                <?php
                                }


                                ?>
                            </div>

                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Parcel Address
                                </span>
                                <input class="input-group-field" type="text" id="parcelAdd">
                            </div>


                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Owner's Name</span>
                                <input class="input-group-field" type="text" id="ownerName">
                            </div>

                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Owner's Mailing Address</span>
                                <input class="input-group-field" type="text" id="ownerAdd">
                            </div>

                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Parcel Value
                                </span>
                                <input class="input-group-field" type="text" id="parcelValue">
                            </div>



                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Total Parcel Value
                                </span>
                                <input class="input-group-field" type="text" id="totalParcelValue">
                            </div>


                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Improvement Value
                                </span>
                                <input class="input-group-field" type="text" id="improvementValue">
                            </div>


                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Land Value
                                </span>
                                <input class="input-group-field" type="text" id="landValue">
                            </div>

                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Centroid Coordinates
                                </span>
                                <input class="input-group-field" type="text" id="centroId">
                            </div>




                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Calculated Acres
                                </span>
                                <input class="input-group-field" type="text" id="calculatedAcres">
                            </div>



                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Calculate Parcel Square feet
                                </span>
                                <input class="input-group-field" type="text" id="calculatedParcel">
                            </div>

                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Link Regrid
                                </span>
                                <input class="input-group-field" type="text" id="linkRegrid">
                            </div>





                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Legal Description
                                </span>
                                <textarea class="input-group-field" type="text" id="legalDescription" rows="5"></textarea>
                            </div>

                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    comments
                                </span>
                                <textarea class="input-group-field" type="text" id="comments" rows="5"></textarea>
                            </div>

                            <div class="input-group" style="border-radius: 10px;">
                                <span class="input-group-label boxLabel">
                                    Auction
                                </span>
                                <input class="input-group-field" type="text" id="auditions" name="auditions" value="<?= $_SESSION['auction'][0]['idauction'] ?>" />
                            </div>


                        </div>

                        <input type="submit" style="background-color: #bc8181;" class="button expanded" value="Register Regrid">
                    </form>
                </div>
            </div>
        </div>

    </section>
    <footer></footer>







    <?php

include 'includes/footerJS.php';
?>


    <script>
        $('form').submit(function(event) {


            var formData = {


                parcelId: $('#parcelId').val(),
                parcelAdd: $('#parcelAdd').val(),
                ownerName: $('#ownerName').val(),
                ownerAdd: $('#ownerAdd').val(),
                parcelValue: $('#parcelValue').val(),
                totalParcelValue: $('#totalParcelValue').val(),
                improvementValue: $('#improvementValue').val(),
                landValue: $('#landValue').val(),
                centroId: $('#centroId').val(),
                calculatedAcres: $('#calculatedAcres').val(),
                calculatedParcel: $('#calculatedParcel').val(),
                legalDescription: $('#legalDescription').val(),
                linkRegrid: $('#linkRegrid').val(),
                comments: $('#comments').val(),
                auditions: $('#auditions').val(),
                countyReg: $('#countyReg').val(),






                inserir_Regrid: '1'
            };
            $.ajax({
                    type: 'POST',
                    url: 'controller/regridController.php',
                    data: formData,
                    dataType: 'json',
                    encode: true
                })
                .done(function(data) {
                    console.log(data);

                    if (data.retorno == true) {
                        $('#exampleModal1').foundation('open');


                    }

                });
            event.preventDefault();
        });
    </script>
</body>

</html>