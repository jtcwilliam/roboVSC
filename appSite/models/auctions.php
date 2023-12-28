<?php


class Auction
{





    private $date_auction;
    private $state_auction;
    private $county_auction;
    private $status_auction;
    private $conexao;




    function __construct()
    {
        // importar a classe conexao
        include_once 'Db.php';
        //criar uma instancia de conexao;
        $objConectar = new Conexao();

        //chamar o metdo conectar
        $banco = $objConectar->Conectar();

        //criar uma instancia dessa nova conexao
        $this->setConexao($banco);
    }

    /**
     * Get the value of date_auction
     */
    public function getDate_auction()
    {
        return $this->date_auction;
    }

    /**
     * Set the value of date_auction
     *
     * @return  self
     */
    public function setDate_auction($date_auction)
    {
        $this->date_auction = $date_auction;

        return $this;
    }

    /**
     * Get the value of state_auction
     */
    public function getState_auction()
    {
        return $this->state_auction;
    }

    /**
     * Set the value of state_auction
     *
     * @return  self
     */
    public function setState_auction($state_auction)
    {
        $this->state_auction = $state_auction;

        return $this;
    }

    /**
     * Get the value of county_auction
     */
    public function getCounty_auction()
    {
        return $this->county_auction;
    }

    /**
     * Set the value of county_auction
     *
     * @return  self
     */
    public function setCounty_auction($county_auction)
    {
        $this->county_auction = $county_auction;

        return $this;
    }

    /**
     * Get the value of status_auction
     */
    public function getStatus_auction()
    {
        return $this->status_auction;
    }

    /**
     * Set the value of status_auction
     *
     * @return  self
     */
    public function setStatus_auction($status_auction)
    {
        $this->status_auction = $status_auction;

        return $this;
    }

    /**
     * Get the value of conexao
     */
    public function getConexao()
    {
        return $this->conexao;
    }

    /**
     * Set the value of conexao
     *
     * @return  self
     */
    public function setConexao($conexao)
    {
        $this->conexao = $conexao;

        return $this;
    }



    public function insertAuction()
    {
        try {
            $sql = " 
            
            INSERT INTO  auction
                ( 
                    date_auction, state_auction,  county_auction,  status_auction
                )
                    VALUES
                ( 
                                    
                    '" . $this->getDate_auction() . "',
                    '" . $this->getState_auction() . "',
                    '" . $this->getCounty_auction() . "',                                 
                    '1'
                )";

            $executar = mysqli_query($this->getConexao(), $sql);

            if ($executar == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }



    public function listAuctions($filter = null)
    {
        $sql = "SELECT   idauction,  DATE_FORMAT(date_auction, '%m/%d/%Y') as date_auction , state_auction, county_auction, status_auction   FROM  auction  ";

        if ($filter != null) {
            $sql .= ' where idauction=' . $filter;
        }

     

        $executar = mysqli_query($this->getConexao(), $sql);

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados[] =  $row;
        }

        return $dados;
    }
}
