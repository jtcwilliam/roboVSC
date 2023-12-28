<?php
if (isset($_POST['loadDados'])) {

    $dadosApp = $objApp->listPropert_County_Director($_POST['status']);

?>

    <div class="grid-x">
        <div class="cell small-12 medium-12 large-12 ">

            <table class="table striped">
                <thead>
                    <tr style="align-items: center;">
                        <Td>
                            Parcel ID
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
                            <center>V.A Rate</center>

                        </Td>

                        <Td>
                            <center>Director Rate</center>

                        </Td>

                        <td>

                        </td>




                    </tr>


                </thead>
                <tbody>
                    <?php
                    $cont = 1;
                    if ($dadosApp == null) {
                        echo "<center><h1>No House at time</h1></center>";
                    } else {



                        foreach ($dadosApp as $key => $value) { ?>

                            <tr>
                                <Td>
                                    <a href="#"> <?= $value['parcel'] ?></a>
                                </Td>

                                <Td>
                                    <center>
                                        <a target="_blank" href="<?= $value['aprraisalUrl'] ?>"><img src="imgs/pdf.png" style="height: 3vh" /><br>
                                            appraiser
                                        </a>

                                    </center>
                                </Td>
                                <Td>
                                    <center>
                                        <a target="_blank" href="<?= $value['regridUrl'] ?>">
                                            <img src="imgs/pdf.png" style="height: 3vh" /><br>
                                            Regrid

                                        </a>
                                    </center>
                                </Td>

                                <Td>
                                    <center>
                                        <a target="_blank" href="<?= $value['observacao'] ?>">
                                            <img src="imgs/pdf.png" style="height: 3vh" /><br>
                                            Regrid

                                        </a>
                                    </center>
                                </Td>






                                <Td>
                                    <?php

                                    if ($value['google'] == null) {
                                    ?>
                                        <input type="text" id="googleMaps<?= $cont ?>" name="googleMaps" placeholder="google" />


                                    <?php
                                    } else {

                                    ?>
                                        <center>
                                            <a href="<?= $value['google'] ?>" target="_blank">
                                                <img src="imgs/maps.png" style="height: 3vh" /><br>
                                                Maps
                                            </a>
                                        </center>

                                    <?php
                                    }
                                    ?>
                                </Td>
                                <Td>
                                    <?php

                                    if ($value['flood'] == null) {
                                    ?>
                                        <input type="text" id="flood<?= $cont ?>" name="flood" placeholder="Flood zone" />


                                    <?php
                                    } else {

                                        $links = str_replace(" ", '%20', $value['flood']);
                                        $links = htmlspecialchars($links);

                                        echo "<center><a href=\"{$links}\"  target=\"_blank\"><img src='imgs/flood.png' style='height: 3vh' /><br></a></center>";

                                    ?>

                                    <?php
                                    }
                                    ?>
                                </Td>

                                <Td>

                                    <center>
                                        <img src="imgs/sale.png" style="height: 3vh" /><br>
                                        <b><?= $value['minimo'] ?></b>
                                        </i>
                                    </center>

                                </Td>






                                <Td>
                                    <?php

                                    if ($value['marketValue'] == null) {
                                    ?>
                                        <input type="text" id="marketValue<?= $cont ?>" name="marketValue" placeholder="Sale Value" />


                                    <?php
                                    } else {

                                    ?>

                                        <center>
                                            <img src="imgs/sale.png" style="height: 3vh" /><br>
                                            <b>U$: <?= $value['marketValue'] ?></b>
                                            </i>
                                        </center>
                                        </a>



                                    <?php
                                    }
                                    ?>
                                </Td>




                                <Td>
                                    <?php

                                    if ($value['hoa'] == null) {
                                    ?>
                                        <input type="text" id="hoa<?= $cont ?>" name="hoa" placeholder="HOA Value" />


                                    <?php
                                    } else {

                                    ?>

                                        <center>
                                            <img src="imgs/hoa.png" style="height: 3vh" /><br>
                                            <b>U$: <?= $value['hoa'] ?></b>
                                            </i>
                                        </center>
                                        </a>



                                    <?php
                                    }
                                    ?>
                                </Td>

                                <Td>
                                    <?php

                                    if ($value['ratingVA'] == null) {
                                    ?>

                                        <select id="rating<?= $cont ?>" name="rating">
                                            <option>Choose</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>Disabled</option>
                                        </select>


                                    <?php
                                    } else {

                                    ?>

                                        <center>
                                            <img src="imgs/rating.png" style="height: 3vh" /><br>
                                            <b><?= $value['ratingVA']  ?></b>
                                            </i>
                                        </center>



                                    <?php
                                    }
                                    ?>
                                </Td>


                                <Td>
                                    <?php

                                    if ($value['ratingDirector'] == null) {
                                    ?>

                                        <select id="ratingDirector<?= $cont ?>" name="ratingDirector">
                                            <option>Choose</option>
                                            <option value="A Plus">A Plus </option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">Disabled</option>
                                        </select>


                                    <?php
                                    } else {

                                    ?>

                                        <center>
                                            <img src="imgs/rating.png" style="height: 3vh" /><br>
                                            <b><?= $value['ratingDirector']  ?></b>
                                            </i>
                                        </center>



                                    <?php
                                    }
                                    ?>
                                </Td>



                                <?php
                                if ($_POST['status'] == '3') { ?>

                                    <td>
                                        <center>
                                            <a class="allSave" onclick="salvarTodosOsDados(  $('#ratingDirector<?= $cont ?>').val(), <?= $value['idapps'] ?>,   '4'  )">
                                                Register all
                                            </a>
                                        </center>
                                    </td>

                                <?php } else {
                                    echo '<td> </td>';
                                }
                                ?>

                            </tr>






                    <?php


                            $cont++;
                        }
                    }

                    ?>
                </tbody>
            </table>

        </div>




    <?php

    exit();
}

    ?>