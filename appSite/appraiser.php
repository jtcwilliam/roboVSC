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

      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <form action="controller/appController.php" method="POST" enctype="multipart/form-data">
            <div class="form-icons">
              <h4 style="color: #1779ba;">Appraiser Search</h4>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  County
                </span>
                <input class="input-group-field" type="text" id="countyApp" name="countyApp" value="<?= $_SESSION['auction'][0]['county_auction'] . ' / ' . $_SESSION['auction'][0]['state_auction']

                                                                                                    ?>">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Parcel ID
                </span>
                <input class="input-group-field" type="text" id="parcelId" name="parcelId">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Link Appraiser
                </span>
                <input class="input-group-field" type="text" id="linkApp" name="linkApp">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Owner's Name</span>
                <input class="input-group-field" type="text" id="ownerName" name="ownerName">
              </div>



              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Owner's Mailing Address</span>
                <input class="input-group-field" type="text" id="ownerAdd" name="ownerAdd">
              </div>



              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Property Address </span>
                <input class="input-group-field" type="text" id="propertyAdd" name="propertyAdd">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Property Type
                </span>
                <textarea class="input-group-field" rows="6" id="propertyType" name="propertyType"></textarea>
              </div>


              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Assessed Value
                </span>
                <textarea class="input-group-field" type="text" id="assessedValue" name="assessedValue" rows="7">Year:
Land:
Improvement:
Total:
Cap Val: 
                </textarea>

              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Approximate Annual Taxes
                </span>
                <input class="input-group-field" type="text" id="approximateAnualTaxes" name="approximateAnualTaxes">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Property Use (Exemptions)
                </span>
                <input class="input-group-field" type="text" id="propertyUse" name="propertyUse">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Comentarios</span>
                <input class="input-group-field" type="text" id="comments" name="comments">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Landlocked
                </span>
                <input class="input-group-field" type="text" id="locked" name="locked">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Flood Zone
                </span>
                <input class="input-group-field" type="text" id="floodZone" name="floodZone">
              </div>



              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Minimum BID
                </span>
                <input class="input-group-field" type="text" id="minimumBid" name="minimumBid">
              </div>


              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Valor de mercado
                </span>
                <input class="input-group-field" type="text" id="valorMercado" name="valorMercado">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Google Link </span>
                <input class="input-group-field" type="text" id="googlelink" name="googlelink">
              </div>
              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Property Characteristics
                </span>
                <textarea class="input-group-field" rows="6" id="propertCaracteristics" name="propertCaracteristics"></textarea>
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Property Description
                </span>
                <textarea class="input-group-field" rows="6" id="propertyDescription" name="propertyDescription"></textarea>
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Legal Description
                </span>
                <input class="input-group-field" type="text" id="legalDescription" name="legalDescription">
              </div>






              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Crime Rate Zip Code
                </span>
                <input class="input-group-field" type="text" id="crimeRate" name="crimeRate">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  School Rate Zip Code
                </span>
                <input class="input-group-field" type="text" id="schoolRateZip" name="schoolRateZip">
              </div>



              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  HOA
                </span>
                <input class="input-group-field" type="text" id="hoa" name="hoa">
              </div>


              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Link Report GIS
                </span>
                <input class="input-group-field" type="text" id="linkReport" name="linkReport">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Image GIS
                </span>
                <input class="input-group-field" type="file" id="fotoGIS" name="fotoGIS">
              </div>

              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Rating
                </span>
                <select name="rating" id="rating">
                  <option value="A">A (Better)</option>
                  <option value="B">B (Medium)</option>
                  <option value="C">C (Not Good)</option>


                </select>
              </div>


              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Adiction Notes
                </span>
                <textarea class="input-group-field" type="text" id="addictionalNotes" rows="5" name="addictionalNotes"></textarea>
              </div>


              <div class="input-group" style="border-radius: 10px;">
                <span class="input-group-label boxLabel">
                  Auction
                </span>
                <input class="input-group-field" type="text" id="auditions" name="auditions" value="<?= $_SESSION['auction'][0]['idauction'] ?>" />
              </div>


            </div>

            <input type="submit" class="button expanded" value="Register Appraiser">
          </form>
        </div>
      </div>
    </div>

  </section>
  <footer></footer>








  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>


  <script>
    /*
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
          linkReport: $('#linkReport').val(),
          addictionalNotes: $('#addictionalNotes').val(),
          inserirApp: '1'
        };
        $.ajax({
            type: 'POST',
            url: 'controller/appController.php',
            data: formData,
            dataType: 'json',
            encode: true
          })
          .done(function(data) {

            if (data.retorno == true) {
              alert('Your Appraiser is Registered');
            }

          });
        event.preventDefault();
      });
*/
  </script>
</body>

</html>