<?php

include_once 'models/Appraiser.php';
include_once 'models/Regrid.php';
include_once 'models/ClerckrsOffice.php';

$ObjClerck = new ClerckrsOffice();



$objReg = new Regrid();
$objApp = new Appraiser();

$dadosReg = $objReg->loadRegrid($_GET['parcelid']);
$dadosApp = $objApp->loadDataAppraiser($_GET['parcelid']);



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

            <center><a class="button success" href="housesCounty.php?auction=<?=$_GET['auctionCount'] ?>">Back to de Auction</a></center>

            </a>



      <fieldset class="fieldset">
        <legend style="font-size: 1.1em;">Parcel Id: <span style="font-weight: 700; font-size: 1.3em;"><?= $_GET['parcelid'] ?></span>.


        </legend>

        <fieldset class="fieldset">
          <Legend> <span style="font-weight: 700; font-size: 1.7em;"> Rating: <?= $dadosApp[0]['rating'] ?> </span></Legend>
          <?php

          switch ($dadosApp[0]['rating']) {
            case 'A':
              echo 'This Property is perfect';
              break;

            case 'B':
              echo 'This Property has a Good potential';
              break;

            case 'B':
              echo 'This house has no potential';
              break;

            default:
              # code...
              break;
          }


          ?>
        </fieldset>

        <ul class="accordion" data-accordion>
          <li class="accordion-item is-active" data-accordion-item>
            <!-- Accordion tab title -->
            <a href="#" class="accordion-title">Comparação de Dados</a>

            <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
            <div class="accordion-content" data-tab-content>


              <table>
                <thead>
                  <tr>
                    <td style="width: 50%; background-color: #9ad7ff;" colspan="2"> Appraisal</td>
                    <td style="width: 50%; background-color: #efaaf3 ; border-left: 1px solid white;" colspan="2">Regrid</td>

                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td style="background-color: #e5f1f9;"><b>Parcel Id</b></td>
                    <td style="background-color: #e5f1f9;"><?php echo $dadosApp[0]['Parcel_ID']    ?></td>

                    <td style="background-color: #f9e7fb;  border-left: 1px solid white;"><b>Parcel Id</b></td>
                    <td style="background-color: #f9e7fb;"><?php echo $dadosApp[0]['Parcel_ID_Regrid']    ?></td>

                  </tr>


                  <tr>
                    <td style="background-color: #9ad7ff;"><b>Owners Name</b></td>
                    <td style="background-color: #9ad7ff;"><?php echo $dadosApp[0]['Owner_Escambia']    ?></td>

                    <td style="background-color: #efaaf3 ;  border-left: 1px solid white;"><b>Owners Name</b></td>
                    <td style="background-color: #efaaf3 ;"><?php echo $dadosApp[0]['Owner_Regrid']    ?></td>

                  </tr>





                  <tr>
                    <td style="background-color: #e5f1f9;"><b>House Address</b></td>
                    <td style="background-color: #e5f1f9;"><?php echo $dadosApp[0]['Address_escambia']    ?></td>

                    <td style="background-color: #f9e7fb;  border-left: 1px solid white;"><b>House Address</b></td>
                    <td style="background-color: #f9e7fb;"><?php echo $dadosApp[0]['Addres_Regrid']    ?></td>

                  </tr>

                  <tr>
                    <td style="background-color: #9ad7ff;"><b>Legal Description</b></td>
                    <td style="background-color: #9ad7ff;"><?php echo $dadosApp[0]['legal_description_app']    ?></td>

                    <td style="background-color: #efaaf3 ;  border-left: 1px solid white;"><b>Legal Description</b></td>
                    <td style="background-color: #efaaf3 ;"><?php echo $dadosApp[0]['legal_description_regrid']    ?></td>

                  </tr>


                  <tr>
                    <td colspan="2" style="background-color: #e5f1f9;">
                      <b>
                        <a href="<?= $dadosApp[0]['link_appraiser'] ?>" target="_blank">
                          Acessar o Appraiser
                        </a>
                      </b>
                    </td>


                    <td colspan="2" style="background-color: #f9e7fb ;  border-left: 1px solid white;">
                      <b>
                        <a href="<?= $dadosApp[0]['linkRegrid'] ?>" target="_blank">
                          Acessar o Regrid
                        </a>
                      </b>
                    </td>


                  </tr>








                </tbody>
              </table>




            </div>
          </li>




          <li class="accordion-item " data-accordion-item>
            <!-- Accordion tab title -->
            <a href="#" class="accordion-title">Appraiser County</a>

            <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
            <div class="accordion-content" data-tab-content>


              <table>

                <tbody>

                  <tr>
                    <td style="background-color: #e5f1f9;"><b>Parcel Id</b></td>
                    <td style="background-color: #e5f1f9;"><?php echo $dadosApp[0]['Parcel_ID']    ?>

                      <b>
                        <a style="padding-left: 50px; color: green;" href="<?= $dadosApp[0]['link_appraiser'] ?>" target="_blank">
                          Click to access the appraiser
                        </a>
                      </b>


                    </td>



                  </tr>





                  <tr>
                    <td style="background-color: #9ad7ff;"><b>Owners Name</b></td>
                    <td style="background-color: #9ad7ff;"><?php echo $dadosApp[0]['Owner_Escambia']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #e5f1f9;"><b>Owners Address</b></td>
                    <td style="background-color: #e5f1f9;"><?php echo $dadosApp[0]['Owner_Address_Escambia']    ?></td>



                  </tr>


                  <tr>
                    <td style="background-color: #9ad7ff;"><b>Property Address</b></td>
                    <td style="background-color: #9ad7ff;"><?php echo $dadosApp[0]['Address_escambia']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #e5f1f9;"><b>Property Type</b></td>
                    <td style="background-color: #e5f1f9;"><textarea style="background-color: #e5f1f9; border: #e5f1f9;" rows="15" readonly><?php echo $dadosApp[0]['property_type']    ?></textarea></td>



                  </tr>


                  <tr>
                    <td style="background-color: #9ad7ff;"><b>Land Locked</b></td>
                    <td style="background-color: #9ad7ff;"><?php echo $dadosApp[0]['land_locked']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #e5f1f9;"><b>Flood Zone</b></td>
                    <td style="background-color: #e5f1f9;"><?php echo $dadosApp[0]['flood_zone']    ?></td>



                  </tr>


                  <tr>
                    <td style="background-color: #9ad7ff;"><b>Assesd Value</b></td>
                    <td style="background-color: #9ad7ff;"><?php echo $dadosApp[0]['assessed_value']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #e5f1f9;"><b>Minimum Bid</b></td>
                    <td style="background-color: #e5f1f9;"><?php echo $dadosApp[0]['minumum_bid']    ?></td>



                  </tr>


                  <tr>
                    <td style="background-color: #9ad7ff;"><b>Valor de Mercado</b></td>
                    <td style="background-color: #9ad7ff;"><?php echo $dadosApp[0]['valor_mercado']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #e5f1f9;"><b>Property Characteristics</b></td>
                    <td style="background-color: #e5f1f9;"><textarea style="background-color: #e5f1f9; border: #e5f1f9;" rows="15" readonly> <?php echo $dadosApp[0]['property_characteristics']    ?> </textarea> </td>



                  </tr>


                  <tr>
                    <td style="background-color: #9ad7ff;"><b>Legal Desciption</b></td>
                    <td style="background-color: #9ad7ff;"><?php echo $dadosApp[0]['legal_description_app']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #e5f1f9;"><b>Approximated Annual Taxes</b></td>
                    <td style="background-color: #e5f1f9;"><?php echo $dadosApp[0]['approximate_annual_taxes']    ?></td>



                  </tr>


                  <tr>
                    <td style="background-color: #9ad7ff;"><b>Zip Code Rate Crime</b></td>
                    <td style="background-color: #9ad7ff;"><?php echo $dadosApp[0]['crime_rate_zip_code']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #e5f1f9;"><b>School Rate Zip Code</b></td>
                    <td style="background-color: #e5f1f9;"><?php echo $dadosApp[0]['school_rate_zip_code']    ?></td>
                  </tr>


                  <tr>
                    <td style="background-color: #9ad7ff;"><b>HOA</b></td>
                    <td style="background-color: #9ad7ff;"><?php echo $dadosApp[0]['hoa']    ?></td>
                  </tr>

                  <tr>
                    <td style="background-color: #e5f1f9;"><b>Adiction Notes</b></td>
                    <td style="background-color: #e5f1f9;"><?php echo $dadosApp[0]['adictional_notes']    ?></td>
                  </tr>


                </tbody>
              </table>

              <table>

                <tr>
                  <td style="width: 50%; background-color: #e5f1f9;">
                    <h3>Google Earth</h3><Br>
                    <?php echo $dadosApp[0]['linkGoogle'];    ?>
                  </td>
                  <td style="width: 50%; background-color: #e5f1f9;">
                    <h3>Mapa County</h3><Br>
                    <img src="imgProps/<?= $dadosApp[0]['gisImg']; ?>" />
                  </td>



                </tr>
              </table>






            </div>
          </li>




          <li class="accordion-item " data-accordion-item>
            <!-- Accordion tab title -->
            <a href="#" class="accordion-title">Regrid</a>

            <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
            <div class="accordion-content" data-tab-content>


              <table>

                <tbody>

                  <tr>
                    <td style="background-color: #efaaf3;"><b>Parcel Id</b></td>
                    <td style="background-color: #efaaf3;"><?php echo $dadosReg[0]['parcel_id']    ?></td>



                  </tr>


                  <tr>
                    <td style="background-color: #f9e7fb;"><b>Owners Name</b></td>
                    <td style="background-color: #f9e7fb;"><?php echo $dadosReg[0]['owers_name']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #efaaf3;"><b>Owners Address</b></td>
                    <td style="background-color: #efaaf3;"><?php echo $dadosReg[0]['owners_mail']    ?></td>



                  </tr>


                  <tr>
                    <td style="background-color: #f9e7fb;"><b>Property Address</b></td>
                    <td style="background-color: #f9e7fb;"><?php echo $dadosReg[0]['property_address']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #efaaf3;"><b>Parcel Value</b></td>
                    <td style="background-color: #efaaf3;"><?php echo $dadosReg[0]['parcel_value']    ?></td>



                  </tr>


                  <tr>
                    <td style="background-color: #f9e7fb;"><b>Total Parcel Value</b></td>
                    <td style="background-color: #f9e7fb;"><?php echo $dadosReg[0]['total_parcel_value']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #efaaf3;"><b>Improvement Value</b></td>
                    <td style="background-color: #efaaf3;"><?php echo $dadosReg[0]['improvement_value']    ?></td>



                  </tr>


                  <tr>
                    <td style="background-color: #f9e7fb;"><b>Land Value</b></td>
                    <td style="background-color: #f9e7fb;"><?php echo $dadosReg[0]['land_value']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #efaaf3;"><b>Centro Id Coordinates</b></td>
                    <td style="background-color: #efaaf3;"><?php echo $dadosReg[0]['centroid_coordinates']    ?></td>



                  </tr>


                  <tr>
                    <td style="background-color: #f9e7fb;"><b>Calculated Acres</b></td>
                    <td style="background-color: #f9e7fb;"><?php echo $dadosReg[0]['calculated_acres']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #efaaf3;"><b>Calculated Square Feets</b></td>
                    <td style="background-color: #efaaf3;"><?php echo $dadosReg[0]['calculated_parcel_sq_ft']    ?></td>



                  </tr>


                  <tr>
                    <td style="background-color: #f9e7fb;"><b>Legal Desciption</b></td>
                    <td style="background-color: #f9e7fb;"><?php echo $dadosReg[0]['legal_description']    ?></td>



                  </tr>

                  <tr>
                    <td style="background-color: #efaaf3;"><b>Coments</b></td>
                    <td style="background-color: #efaaf3;"><?php echo $dadosReg[0]['comments']    ?></td>



                  </tr>




                </tbody>
              </table>








            </div>
          </li>


          <li class="accordion-item " data-accordion-item>
            <!-- Accordion tab title -->
            <a href="#" class="accordion-title">Clercks Office</a>

            <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
            <div class="accordion-content" data-tab-content>

              <a class="button warning" style="width: 20%;" href="recordLeins.php?parcelid=<?= $_GET['parcelid'] ?>">Click here to Insert the information</a>

              <?php


              include_once 'controller/leansController.php';

              ?>





            </div>
          </li>



        </ul>

      </fieldset>


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