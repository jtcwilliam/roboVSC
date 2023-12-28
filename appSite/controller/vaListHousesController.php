<?php


include_once '../models/Appraiser.php';
include_once '../models/Regrid.php';



$objReg = new Regrid();
$objApp = new Appraiser();


if (isset($_POST['loadDados'])) {



    $dadosApp = $objApp->listPropert_County_robos($_POST['status']);


?>


    <div class="grid-x">
        <div class="cell small-12 medium-12 large-12 ">

            <table class="table striped">
                <thead>
                    <tr style="align-items: center; font-size: 0.8em;">
                        <Td style="width: auto;">
                            <center>Order</center>
                        </Td>
                        <Td style="width: auto;">
                            <center>Parcel ID</center>
                        </Td>

                        <Td style="width: auto;">
                            <center>Appraisal</center>
                        </Td>
                        <Td>
                            <center>Regrid</center>
                        </Td>

                        <Td>
                            <center>+ Info</center>
                        </Td>

                        <Td>
                            <center>Map</center>
                        </Td>
                        <Td>
                            <center>Flood</center>
                        </Td>

                        <Td>
                            <center>Minimum </center>
                        </Td>

                        <Td>
                            <center>HOA</center>
                        </Td>


                        <Td>
                            <center>Price</center>
                        </Td>

                        <Td>
                            <center>$ Land</center>
                        </Td>


                        <Td>
                            <center>V.A Rate</center>
                        </Td>





                        <Td>
                            <center>Action</center>

                        </Td>

                        <td>

                        </td>




                    </tr>


                </thead>


                <tbody>


                    <?php
                    $cont = 1;
                    foreach ($dadosApp as $key => $value) { ?>

                        <tr style="align-items: center; font-size: 0.8em;">
                            <Td style="width: auto;">
                                <center><?= $value['idapps'] ?></center>
                            </Td>
                            <Td style="width: auto;">
                                <center><?= $value['parcel'] ?></center>

                            </Td>

                            <Td style="width: auto;">
                                <center>
                                    <a href="<?= $value['aprraisalUrl'] ?>" target="_blank" ?>Appraisal</a>
                                </center>

                            </Td>
                            <Td>
                                <center>
                                    <a href="<?= $value['regridUrl'] ?>" target="_blank" ?>Regrid</a>
                                </center>

                            </Td>

                            <Td>

                                <center>
                                    <a href="<?= $value['observacao'] ?>" target="_blank" ?>Appraisal (B) </a>
                                </center>


                            </Td>

                            <Td>

                                <center>
                                    <a href="<?= $value['google'] ?>" target="_blank" ?>Map </a>
                                </center>

                            </Td>
                            <Td>

                                <center>
                                    <a href="<?= $value['flood'] ?>" target="_blank" ?>Flood </a>
                                </center>


                            </Td>

                            <Td>

                                <center>
                                    <?= $value['minimo'] ?>
                                </center>


                            </Td>

                            <Td>
                                <center>
                                    <?= $value['hoa'] ?>
                                </center>

                            </Td>


                            <Td>

                                <center>
                                    <?= $value['marketValue'] ?>
                                </center>

                            </Td>

                            <Td>

                                <center>
                                    <?= $value['landValue'] ?>
                                </center>


                            </Td>

                            <Td>

                                <center>
                                    <?= $value['ratingVA'] ?>
                                </center>


                            </Td>







                            <Td>
                                <center>

                                    <a class="btn succes" target="_self" href="completeData.php?idAppraiser=<?= $value['idapps'] ?>">Watch This Property</a>

                                    </a>
                                </center>

                            </Td>

                            <td>

                            </td>




                        </tr>


                    <?php } ?>

                </tbody>

            </table>

        </div>




    <?php

    exit();
}
