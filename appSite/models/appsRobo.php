<?php


class appsRobo
{

    private $parcelId;
    private $linkApp;
    private $propertyAdd;
    private $comments;
    private $ownerName;
    private $ownerAdd;
    private $locked;
    private $floodZone;
    private $assessedValue;
    private $minimumBid;
    private $valorMercado;
    private $googlelink;
    private $propertyUse;
    private $propertCaracteristics;
    private $propertyType;
    private $propertyDescription;
    private $legalDescription;
    private $approximateAnualTaxes;
    private $crimeRate;
    private $schoolRateZip;
    private $imgMapGis;
    private $hoa;
    private $county_app;
    private $linkReport;
    private $coordinates;
    private $addictionalNotes;
    private $auctions;
    private $rating;






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






    public function listPropert_County_robos($idcount, $idstatus)
    {
        $sql = "SELECT * FROM apps  ap inner join status st on st.idstatus = ap.status inner join auction au on au.idauction = ap.auction
        where st.idstatus =" . $idstatus . "  and ap.auction =" . $idcount;

        $executar = mysqli_query($this->getConexao(), $sql);

        while ($row = mysqli_fetch_assoc($executar)) {
            $dados[] =  $row;
        }

        if (empty($dados)) {

            return false;
        } else {
            return $dados;
        }
    }


    public function completeAll($value, $rating, $idParcelId, $hoa, $avaliated)
    {

        $sql = "update apps  set status='{$avaliated}',      marketvalue='{$value}',  ratingVA ='{$rating}',  hoa ='{$hoa}'  where idapps = {$idParcelId}";


        echo $sql;

        $executar = mysqli_query($this->getConexao(), $sql);

        if ($executar) {

            return true;
        }
    }



    
    public function saveDirector($idParcelId, $rateDirector, $avaliated)
    {



        $sql = "update apps  set status='{$avaliated}',       ratingDirector ='{$rateDirector}'  where idapps = {$idParcelId}";
 




        $executar = mysqli_query($this->getConexao(), $sql);

        if ($executar) {

            return true;
        }
    }


    public function completeAppraiser($idParcelId,  $marketValue, $ratingVA, $hoa, $landValue, $status, $avaliador, $dataAvaliated)
    {

        $sql = "update  apps set marketValue='" . $marketValue . "', ratingVA='" . $ratingVA .
            "' ,  hoa='" . $hoa . "', landValue='{$landValue}', status='{$status}' ,   vaAvaliator='{$avaliador}' , avaliateVaData='{$dataAvaliated}'       where idapps = " . $idParcelId;
 


        $executar = mysqli_query($this->getConexao(), $sql);



        if ($executar) {

            return true;
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
     * Get the value of linkApp
     */
    public function getLinkApp()
    {
        return $this->linkApp;
    }

    /**
     * Set the value of linkApp
     *
     * @return  self
     */
    public function setLinkApp($linkApp)
    {
        $this->linkApp = $linkApp;

        return $this;
    }

    /**
     * Get the value of propertyAdd
     */
    public function getPropertyAdd()
    {
        return $this->propertyAdd;
    }

    /**
     * Set the value of propertyAdd
     *
     * @return  self
     */
    public function setPropertyAdd($propertyAdd)
    {
        $this->propertyAdd = $propertyAdd;

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
     * Get the value of locked
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set the value of locked
     *
     * @return  self
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get the value of floodZone
     */
    public function getFloodZone()
    {
        return $this->floodZone;
    }

    /**
     * Set the value of floodZone
     *
     * @return  self
     */
    public function setFloodZone($floodZone)
    {
        $this->floodZone = $floodZone;

        return $this;
    }

    /**
     * Get the value of assessedValue
     */
    public function getAssessedValue()
    {
        return $this->assessedValue;
    }

    /**
     * Set the value of assessedValue
     *
     * @return  self
     */
    public function setAssessedValue($assessedValue)
    {
        $this->assessedValue = $assessedValue;

        return $this;
    }

    /**
     * Get the value of minimumBid
     */
    public function getMinimumBid()
    {
        return $this->minimumBid;
    }

    /**
     * Set the value of minimumBid
     *
     * @return  self
     */
    public function setMinimumBid($minimumBid)
    {
        $this->minimumBid = $minimumBid;

        return $this;
    }

    /**
     * Get the value of valorMercado
     */
    public function getValorMercado()
    {
        return $this->valorMercado;
    }

    /**
     * Set the value of valorMercado
     *
     * @return  self
     */
    public function setValorMercado($valorMercado)
    {
        $this->valorMercado = $valorMercado;

        return $this;
    }

    /**
     * Get the value of googlelink
     */
    public function getGooglelink()
    {
        return $this->googlelink;
    }

    /**
     * Set the value of googlelink
     *
     * @return  self
     */
    public function setGooglelink($googlelink)
    {
        $this->googlelink = $googlelink;

        return $this;
    }

    /**
     * Get the value of propertyUse
     */
    public function getPropertyUse()
    {
        return $this->propertyUse;
    }

    /**
     * Set the value of propertyUse
     *
     * @return  self
     */
    public function setPropertyUse($propertyUse)
    {
        $this->propertyUse = $propertyUse;

        return $this;
    }

    /**
     * Get the value of propertCaracteristics
     */
    public function getPropertCaracteristics()
    {
        return $this->propertCaracteristics;
    }

    /**
     * Set the value of propertCaracteristics
     *
     * @return  self
     */
    public function setPropertCaracteristics($propertCaracteristics)
    {
        $this->propertCaracteristics = $propertCaracteristics;

        return $this;
    }

    /**
     * Get the value of propertyType
     */
    public function getPropertyType()
    {
        return $this->propertyType;
    }

    /**
     * Set the value of propertyType
     *
     * @return  self
     */
    public function setPropertyType($propertyType)
    {
        $this->propertyType = $propertyType;

        return $this;
    }

    /**
     * Get the value of propertyDescription
     */
    public function getPropertyDescription()
    {
        return $this->propertyDescription;
    }

    /**
     * Set the value of propertyDescription
     *
     * @return  self
     */
    public function setPropertyDescription($propertyDescription)
    {
        $this->propertyDescription = $propertyDescription;

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
     * Get the value of approximateAnualTaxes
     */
    public function getApproximateAnualTaxes()
    {
        return $this->approximateAnualTaxes;
    }

    /**
     * Set the value of approximateAnualTaxes
     *
     * @return  self
     */
    public function setApproximateAnualTaxes($approximateAnualTaxes)
    {
        $this->approximateAnualTaxes = $approximateAnualTaxes;

        return $this;
    }

    /**
     * Get the value of crimeRate
     */
    public function getCrimeRate()
    {
        return $this->crimeRate;
    }

    /**
     * Set the value of crimeRate
     *
     * @return  self
     */
    public function setCrimeRate($crimeRate)
    {
        $this->crimeRate = $crimeRate;

        return $this;
    }

    /**
     * Get the value of schoolRateZip
     */
    public function getSchoolRateZip()
    {
        return $this->schoolRateZip;
    }

    /**
     * Set the value of schoolRateZip
     *
     * @return  self
     */
    public function setSchoolRateZip($schoolRateZip)
    {
        $this->schoolRateZip = $schoolRateZip;

        return $this;
    }

    /**
     * Get the value of hoa
     */
    public function getHoa()
    {
        return $this->hoa;
    }

    /**
     * Set the value of hoa
     *
     * @return  self
     */
    public function setHoa($hoa)
    {
        $this->hoa = $hoa;

        return $this;
    }

    /**
     * Get the value of addictionalNotes
     */
    public function getAddictionalNotes()
    {
        return $this->addictionalNotes;
    }

    /**
     * Set the value of addictionalNotes
     *
     * @return  self
     */
    public function setAddictionalNotes($addictionalNotes)
    {
        $this->addictionalNotes = $addictionalNotes;

        return $this;
    }

    /**
     * Get the value of linkReport
     */
    public function getLinkReport()
    {
        return $this->linkReport;
    }

    /**
     * Set the value of linkReport
     *
     * @return  self
     */
    public function setLinkReport($linkReport)
    {
        $this->linkReport = $linkReport;

        return $this;
    }

    /**
     * Get the value of imgMapGis
     */
    public function getImgMapGis()
    {
        return $this->imgMapGis;
    }

    /**
     * Set the value of imgMapGis
     *
     * @return  self
     */
    public function setImgMapGis($imgMapGis)
    {
        $this->imgMapGis = $imgMapGis;

        return $this;
    }

    /**
     * Get the value of coordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Set the value of coordinates
     *
     * @return  self
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * Get the value of county_app
     */
    public function getcounty_app()
    {
        return $this->county_app;
    }

    /**
     * Set the value of county_app
     *
     * @return  self
     */
    public function setcounty_app($county_app)
    {
        $this->county_app = $county_app;

        return $this;
    }


    /**
     * Get the value of auctions
     */
    public function getAuctions()
    {
        return $this->auctions;
    }

    /**
     * Set the value of auctions
     *
     * @return  self
     */
    public function setAuctions($auctions)
    {
        $this->auctions = $auctions;

        return $this;
    }

    /**
     * Get the value of rating
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }
}
