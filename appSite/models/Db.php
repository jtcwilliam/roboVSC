<?php



class Conexao

{

    private $success;

 


    public function Conectar()

    {

        try {







            $user = 'u328184393_prod_appraiser';

            $password = 'M@r1@He1en@';

            $db = 'u328184393_prod_appraiser';



            $host = '193.203.166.79';


  /*
          



            $user = 'root';

            $password = '';

            $db = 'appraiser';



            $host = '127.0.0.1';

 
*/




            ini_set('default_socket_timeout', 300);







            $con = mysqli_connect($host, $user, $password, $db);







            if (!mysqli_ping($con)) {





                $con =  mysqli_connect($host, $user, $password, $db, TRUE);
            }











            mysqli_set_charset($con, "utf8");





            if (mysqli_connect_errno()) {

                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }



            return $con;
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }
}
