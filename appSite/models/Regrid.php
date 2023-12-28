<?php


class Regrid
{

    private $parcelId;
    private $parcelAdd;
    private $ownerName;
    private $ownerAdd;
    private $parcelValue;
    private $totalParcelValue;
    private $improvementValue;
    private $landValue;
    private $centroId;
    private $calculatedAcres;
    private $calculatedParcel;
    private $link;
    private $legalDescription;
    private $comments;
    private $auditions;
    private $countyReg;
    private $idAppraiser;



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


    public function loadRegrid($idParcelId)
    {
        $sql = "select 
                        id_regrid  ,
                    parcel_id  ,
                    property_address  ,
                    owers_name  ,
                    owners_mail  ,
                    parcel_value  ,
                    total_parcel_value  ,
                    improvement_value  ,
                    land_value  ,
                    centroid_coordinates  ,
                    calculated_acres  ,
                    calculated_parcel_sq_ft  ,
                    legal_description  ,
                    linkRegrid  ,
                    comments from regrid  
        where parcel_id = '" . $idParcelId . "' ";





        $executar = mysqli_query($this->getConexao(), $sql);

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados[] =  $row;
        }

        return $dados;
    }

    public function inserirRegrid()
    {
        try {



            $sql = "INSERT INTO  regrid
            ( 
            parcel_id,
            property_address,
            owers_name,
            owners_mail,
            parcel_value,
            total_parcel_value,
            improvement_value,
            land_value,
            centroid_coordinates,
            calculated_acres,
            calculated_parcel_sq_ft,
            linkRegrid,
            comments,
            legal_description,
            auditions,
            countyReg,
            idAppraiser
            )
            VALUES
            (
            
             
            trim('" . $this->getParcelId() . "'),
            '" . $this->getParcelAdd() . "',
            '" . $this->getOwnerName() . "',
            '" . $this->getOwnerAdd() . "',
            '" . $this->getParcelValue() . "',
            '" . $this->getTotalParcelValue() . "',
            '" . $this->getImprovementValue() . "',
            '" . $this->getLandValue() . "',
            '" . $this->getCentroId() . "',
            '" . $this->getCalculatedAcres() . "',
            '" . $this->getCalculatedParcel() . "',
            '" . $this->getLink() . "',
            '" . $this->getComments() . "',
            '" . $this->getLegalDescription() . "',
            '" . $this->getAuditions() . "',
            '" . $this->getCountyReg() . "',
            '" . $this->getIdAppraiser() . "');
            
             ";



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



    /**
     * Get the value of parcelId
     */
    public function getParcelId()
    {
        return $this->parcelId;
    }

    /**
     * Set the value of parcelId
     *
     * @return  self
     */
    public function setParcelId($parcelId)
    {
        $this->parcelId = $parcelId;

        return $this;
    }

    /**
     * Get the value of parcelAdd
     */
    public function getParcelAdd()
    {
        return $this->parcelAdd;
    }

    /**
     * Set the value of parcelAdd
     *
     * @return  self
     */
    public function setParcelAdd($parcelAdd)
    {
        $this->parcelAdd = $parcelAdd;

        return $this;
    }

    /**
     * Get the value of ownerName
     */
    public function getOwnerName()
    {
        return $this->ownerName;
    }

    /**
     * Set the value of ownerName
     *
     * @return  self
     */
    public function setOwnerName($ownerName)
    {
        $this->ownerName = $ownerName;

        return $this;
    }

    /**
     * Get the value of ownerAdd
     */
    public function getOwnerAdd()
    {
        return $this->ownerAdd;
    }

    /**
     * Set the value of ownerAdd
     *
     * @return  self
     */
    public function setOwnerAdd($ownerAdd)
    {
        $this->ownerAdd = $ownerAdd;

        return $this;
    }

    /**
     * Get the value of parcelValue
     */
    public function getParcelValue()
    {
        return $this->parcelValue;
    }

    /**
     * Set the value of parcelValue
     *
     * @return  self
     */
    public function setParcelValue($parcelValue)
    {
        $this->parcelValue = $parcelValue;

        return $this;
    }

    /**
     * Get the value of totalParcelValue
     */
    public function getTotalParcelValue()
    {
        return $this->totalParcelValue;
    }

    /**
     * Set the value of totalParcelValue
     *
     * @return  self
     */
    public function setTotalParcelValue($totalParcelValue)
    {
        $this->totalParcelValue = $totalParcelValue;

        return $this;
    }

    /**
     * Get the value of improvementValue
     */
    public function getImprovementValue()
    {
        return $this->improvementValue;
    }

    /**
     * Set the value of improvementValue
     *
     * @return  self
     */
    public function setImprovementValue($improvementValue)
    {
        $this->improvementValue = $improvementValue;

        return $this;
    }

    /**
     * Get the value of landValue
     */
    public function getLandValue()
    {
        return $this->landValue;
    }

    /**
     * Set the value of landValue
     *
     * @return  self
     */
    public function setLandValue($landValue)
    {
        $this->landValue = $landValue;

        return $this;
    }

    /**
     * Get the value of centroId
     */
    public function getCentroId()
    {
        return $this->centroId;
    }

    /**
     * Set the value of centroId
     *
     * @return  self
     */
    public function setCentroId($centroId)
    {
        $this->centroId = $centroId;

        return $this;
    }

    /**
     * Get the value of calculatedAcres
     */
    public function getCalculatedAcres()
    {
        return $this->calculatedAcres;
    }

    /**
     * Set the value of calculatedAcres
     *
     * @return  self
     */
    public function setCalculatedAcres($calculatedAcres)
    {
        $this->calculatedAcres = $calculatedAcres;

        return $this;
    }

    /**
     * Get the value of calculatedParcel
     */
    public function getCalculatedParcel()
    {
        return $this->calculatedParcel;
    }

    /**
     * Set the value of calculatedParcel
     *
     * @return  self
     */
    public function setCalculatedParcel($calculatedParcel)
    {
        $this->calculatedParcel = $calculatedParcel;

        return $this;
    }

    /**
     * Get the value of legalDescription
     */
    public function getLegalDescription()
    {
        return $this->legalDescription;
    }

    /**
     * Set the value of legalDescription
     *
     * @return  self
     */
    public function setLegalDescription($legalDescription)
    {
        $this->legalDescription = $legalDescription;

        return $this;
    }

    /**
     * Get the value of link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get the value of comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set the value of comments
     *
     * @return  self
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get the value of auditions
     */
    public function getAuditions()
    {
        return $this->auditions;
    }

    /**
     * Set the value of auditions
     *
     * @return  self
     */
    public function setAuditions($auditions)
    {
        $this->auditions = $auditions;

        return $this;
    }

    /**
     * Get the value of countyReg
     */
    public function getCountyReg()
    {
        return $this->countyReg;
    }

    /**
     * Set the value of countyReg
     *
     * @return  self
     */
    public function setCountyReg($countyReg)
    {
        $this->countyReg = $countyReg;

        return $this;
    }

    /**
     * Get the value of idAppraiser
     */ 
    public function getIdAppraiser()
    {
        return $this->idAppraiser;
    }

    /**
     * Set the value of idAppraiser
     *
     * @return  self
     */ 
    public function setIdAppraiser($idAppraiser)
    {
        $this->idAppraiser = $idAppraiser;

        return $this;
    }
}
