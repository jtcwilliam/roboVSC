<?php

 
$objLiens = $ObjClerck->loadLiens($_GET['parcelid']);

?>



<?php





if ($objLiens != null) {
    foreach ($objLiens as $key => $value) { ?>
        <table style="font-size: 0.8em;">

            <thead>
                <th>parcel_id</th> 
                <th>Proccess Numbers</th>
                <th>Doc type</th>

                <th>reverse_name</th>
                <th>Direct Name</th>
                <th>Procces File</th>






            </thead>
            <tbody><?php



                    echo '<tr>';

                    echo '<td>' . $objLiens[$key]['parcel_id'] . '</td>';
                    echo '<td>' . $objLiens[$key]['proccess_number'] . '</td>';
                    echo '<td>' . $objLiens[$key]['doc_type'] . '</td>';
                    echo '<td>' . $objLiens[$key]['reverse_name'] . '</td>';
                    echo '<td>' . $objLiens[$key]['direct_name'] . '</td>';
                    
                   
                     echo '<td><a  href="' . $objLiens[$key]['addres_file'] . '" > Baixar Arquivo</a></td>';
                    echo '</tr>';

                    echo '<tr >';

                    echo '<td colspan=6> <b>Information</b>:  ' . $objLiens[$key]['comments'] . '</td>';


                    echo '</tr>';

                    ?>
            </tbody>
        </table><?php
            }
        }

                ?>