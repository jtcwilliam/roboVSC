<?php
if (isset($_SESSION)) {
  session_destroy();
}

include_once 'models/Appraiser.php';
include_once 'models/Regrid.php';


include 'models/auctions.php';
$ObjAuctions = new Auction();


$objReg = new Regrid();
$objApp = new Appraiser();


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




    <div class="grid-container" style="margin-top: 8vh; margin-bottom: 10vh;">

      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

      <div class="grid-x">
        <div class="cell small-12 medium-4 large-4 " style=" padding-left: 10px; padding-right: 10px;">

        </div>
      </div>



      <div class="grid-x">



        <?php
        $dadosAuctions = $ObjAuctions->listAuctions();





        foreach ($dadosAuctions as $key => $value) { ?>
          <div class="cell small-12 medium-4 large-4 " style=" padding-left: 10px; padding-right: 10px;">
            <fieldset class="fieldset" style="background-color: #f1f0e9;  ">
              <legend style="font-size: 1.3em; font-weight: bold;"> County: </b> <?= $dadosAuctions[$key]['county_auction'] ?></legend>


              <div class="grid-x">
                <div class="cell small-12 " style="padding-bottom: 1em; color: gray;"><b> State: </b>
                  <span style="color: black;">
                    </b> <?= $dadosAuctions[$key]['state_auction'] ?>
                  </span>
                </div>

                <div class="cell small-12 " style="padding-bottom: 1em; color: gray;"><b> Data of Auction: </b>

                  <span style="color: black;">
                    </b> <?= $dadosAuctions[$key]['date_auction'] ?>
                  </span>
                </div>

                <div class="cell small-12">
                  <a class="button warning" target="_self" href="list_housesCounty.php?auction=<?= $dadosAuctions[$key]['idauction']  ?>&houses=true" style="width: 100%; border-radius: 10px;"> List Houses</a>
                </div>


                <div class="cell small-12">
                  <a class="button success" target="_self" href="prepareAuction.php?auction=<?= $dadosAuctions[$key]['idauction']  ?>" style="width: 100%; border-radius: 10px;"> Insert Houses</a>
                </div>





              </div>





            </fieldset>
          </div>
        <?php
        }


        ?>

      </div>

  </section>
  <footer></footer>








  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>


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