<?php

include_once 'models/Appraiser.php';
include_once 'models/Regrid.php';
include_once 'models/ClerckrsOffice.php';

$ObjClerck = new ClerckrsOffice();

$ObjApp = new Appraiser();

$housesA = $ObjApp->listPropertys("where rating='A'");

$housesB = $ObjApp->listPropertys("where rating='B'");

$housesC = $ObjApp->listPropertys("where rating='C'");
 
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
        <div class="grid" style="margin-top: 8vh; margin-bottom: 10vh;">

            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">






            <fieldset class="fieldset">
                <legend style="font-size: 1.1em;">

                    Ranked <b>A</b>



                    <?php





                    ?>


                </legend>

                <table>
                    <thead>
                        <th>County Appraisal</th>
                        <th>State Auction</th>
                        <th>Parcel ID</th>
                        <th>County Appraisal</th>
                        <th>Valor de Mercado</th>
                        <th>County Appraisal</th>
                        <th>See Property</th>
                    </thead>

                    <tbody>
                        <?php


                        foreach ($housesA as $key => $value) {
                        ?>
                            <tr>
                                <td><?=$housesA[$key]['county_app']  ?></td>
                                <td><?=$housesA[$key]['state_auction']  ?></td>
                                <td><?=$housesA[$key]['parcel_id']  ?></td>
                                <td><?=$housesA[$key]['property_address']  ?></td>
                                <td><?=$housesA[$key]['valor_mercado']  ?></td>
                                <td><?=$housesA[$key]['owers_name']  ?></td>
                                <td><a href="queryApp.php?parcelid=<?=$housesA[$key]['parcel_id']  ?>&auctionCount=<?=$housesA[$key]['auctions']  ?>   " >      <?=$housesA[$key]['owers_name']  ?></td>
                            </tr>

                        <?php
                        }


                        ?>
                    </tbody>
                </table>



            </fieldset>

            
            <fieldset class="fieldset">
                <legend style="font-size: 1.1em;">

                    Ranked <b>B</b>



                    <?php





                    ?>


                </legend>

                <table>
                    <thead>
                        <th>County Appraisal</th>
                        <th>State Auction</th>
                        <th>Parcel ID</th>
                        <th>County Appraisal</th>
                        <th>Valor de Mercado</th>
                        <th>County Appraisal</th>
                        <th>See Property</th>
                    </thead>

                    <tbody>
                        <?php


                        foreach ($housesB as $key => $value) {
                        ?>
                            <tr>
                                <td><?=$housesB[$key]['county_app']  ?></td>
                                <td><?=$housesB[$key]['state_auction']  ?></td>
                                <td><?=$housesB[$key]['parcel_id']  ?></td>
                                <td><?=$housesB[$key]['property_address']  ?></td>
                                <td><?=$housesB[$key]['valor_mercado']  ?></td>
                                <td><?=$housesB[$key]['owers_name']  ?></td>
                                <td><a href="queryApp.php?parcelid=<?=$housesB[$key]['parcel_id']  ?>&auctionCount=<?=$housesB[$key]['auctions']  ?>   " >      <?=$housesB[$key]['owers_name']  ?></td>
                            </tr>

                        <?php
                        }


                        ?>
                    </tbody>
                </table>



            </fieldset>


            <fieldset class="fieldset">
                <legend style="font-size: 1.1em;">

                    Ranked <b>C</b>



                    <?php





                    ?>


                </legend>

                <table>
                    <thead>
                        <th>County Appraisal</th>
                        <th>State Auction</th>
                        <th>Parcel ID</th>
                        <th>County Appraisal</th>
                        <th>Valor de Mercado</th>
                        <th>County Appraisal</th>
                        <th>See Property</th>
                    </thead>

                    <tbody>
                        <?php


                        foreach ($housesC as $key => $value) {
                        ?>
                            <tr>
                                <td><?=$housesC[$key]['county_app']  ?></td>
                                <td><?=$housesC[$key]['state_auction']  ?></td>
                                <td><?=$housesC[$key]['parcel_id']  ?></td>
                                <td><?=$housesC[$key]['property_address']  ?></td>
                                <td><?=$housesC[$key]['valor_mercado']  ?></td>
                                <td><?=$housesC[$key]['owers_name']  ?></td>
                                <td><a href="queryApp.php?parcelid=<?=$housesC[$key]['parcel_id']  ?>&auctionCount=<?=$housesC[$key]['auctions']  ?>   " >      <?=$housesC[$key]['owers_name']  ?></td>
                            </tr>

                        <?php
                        }


                        ?>
                    </tbody>
                </table>



            </fieldset>

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
                linkApp: $('#linkApp').val(),
                propertyAdd: $('#propertyAdd').val(),
                comments: $('#comments').val(),
                ownerName: $('#ownerName').val(),
                ownerAdd: $('#ownerAdd').val(),
                locked: $('#locked').val(),
                floodZone: $('#floodZone').val(),
                assessedValue: $('#assessedValue').val(),
                minimumBid: $('#minimumBid').val(),
                valorMercado: $('#valorMercado').val(),
                googlelink: $('#googlelink').val(),
                propertyUse: $('#propertyUse').val(),
                propertCaracteristics: $('#propertCaracteristics').val(),
                propertyType: $('#propertyType').val(),
                propertyDescription: $('#propertyDescription').val(),
                legalDescription: $('#legalDescription').val(),
                approximateAnualTaxes: $('#approximateAnualTaxes').val(),
                crimeRate: $('#crimeRate').val(),
                schoolRateZip: $('#schoolRateZip').val(),
                hoa: $('#hoa').val(),
                addictionalNotes: $('#addictionalNotes').val(),
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
    </script>
</body>

</html>