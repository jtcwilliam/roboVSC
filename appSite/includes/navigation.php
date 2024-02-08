<style>
    li {

        background-color: #1779ba;

    }
</style>



<ul class="dropdown menu align-center" data-dropdown-menu>

    <li>

        <a href="#">Virtual Agent</a>

        <ul class="menu">



            <li><a href="vaAvaliation.php">List All Propertys</a></li>

        </ul>

    </li>


    <?php

    if ($_SESSION['usuarioLogado']['0']['status'] == '6') {


    ?>

        <li>
            
            <a href="#">Director</a>

            <ul class="menu">

            <li><a href="createAppraiser.php">Create Appraiser </a></li>

                <li><a href="favorite.php">Favorites </a></li>

                


                <li><a href="consultAppraiser.php">Consult Parcel </a></li>
                <li><a href="avaliatedDirector.php">My Avaliation </a></li>

                <li><a href="list_housesCountyDirector.php">List All Propertys</a></li>

                <!-- ... -->

            </ul>

        </li>





        <li>

            <a href="showReport.php">Report</a>

        </li>

    <?php
    }
    ?>



















</ul>