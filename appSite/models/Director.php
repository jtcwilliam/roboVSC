<?php


class Director
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


    public function listPropert_County($idcount)
    {
        $sql = "select rating ,county_app , state_auction ,trim(parcel_id) as 'parcel_id', property_address, valor_mercado, owers_name from appraiser
         ap inner join auction au on au.idauction = ap.auctions  where  auctions  =" . $idcount;





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




    public function listPropert_Favorites($idstatus, $rating)
    {
        $sql = "SELECT * FROM apps  ap inner join status st on st.idstatus = ap.status inner join auction au on au.idauction = ap.auction
        where st.idstatus =" . $idstatus . " and   ratingDirector= '" . $rating . "'    order by idapps desc";


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

    public function listAvaliatedDirector()
    {


        $sql = "SELECT * FROM apps  ap inner join status st on st.idstatus = ap.status inner join auction au on au.idauction = ap.auction
        where st.idstatus !=0 and ratingDirector   is not null   order by ratingDirector asc";

    


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

    public function listAllProperties()
    {


        $sql = "SELECT * FROM apps  ap inner join status st on st.idstatus = ap.status inner join auction au on au.idauction = ap.auction
        where st.idstatus !=0   order by idapps desc";





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



    public function listPropert_County_robos($idstatus)
    {
        $sql = "SELECT * FROM apps  ap inner join status st on st.idstatus = ap.status inner join auction au on au.idauction = ap.auction
        where st.idstatus =" . $idstatus . "      order by idapps desc";




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

    public function listPropert_County_Director($idstatus)
    {
        $sql = "SELECT * FROM apps  ap inner join status st on st.idstatus = ap.status inner join auction au on au.idauction = ap.auction
        where st.idstatus =" . $idstatus . "        order by ratingVA asc";


 


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


    public function listPropertys($filter = null)
    {
        $sql = "select auctions ,county_app , state_auction ,trim(parcel_id) as 'parcel_id', property_address, valor_mercado, owers_name from appraiser
         ap inner join auction au on au.idauction = ap.auctions   ";

        if ($filter != null) {

            $sql .= $filter;
        }





        $executar = mysqli_query($this->getConexao(), $sql);

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados[] =  $row;
        }

        return $dados;
    }

    public function propertyData($filter = null)
    {
        $sql = "select ap.auction, ap.flood, ap.google, ap.parcel, ap.marketValue, ap.regridUrl, ap.aprraisalUrl, ap.ratingDirector, 
        ap.ratingVA, ap.hoa, ap.dataUp, ap.minimo, ap.observacao, ap.details, ap.landValue  from apps ap   ";

        if ($filter != null) {

            $sql .= $filter;
        }








        $executar = mysqli_query($this->getConexao(), $sql);

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados[] =  $row;
        }

        return $dados;
    }







    public function selectAppraiser($idParcelId)
    {
        $sql = "select    *  from appraiser      where parcel_id = trim('" . $idParcelId . "') ";


        $executar = mysqli_query($this->getConexao(), $sql);

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados[] =  $row;
        }

        return $dados;
    }

    public function loadDataAppraiser($idParcelId)
    {
        $sql = "select    rating ,ap.county_app       ,
        trim(ap.parcel_id) as 'Parcel_ID', trim(rg.parcel_id) as 'Parcel_ID_Regrid',  
     
        ap.owers_name 'Owner_Escambia', rg.owers_name 'Owner_Regrid', 
       
        ap.owners_mail 'Owner_Address_Escambia', rg.owners_mail 'Owner_address_Regrid',

         ap.property_address 'Address_escambia', rg.property_address 'Addres_Regrid', 
         ap.property_type, 
         ap.land_locked, 
         flood_zone, 
         ap.assessed_value,
         ap.minumum_bid, ap.valor_mercado, 
         ap.google_link as linkGoogle, trim(ap.img_map_gis) as 'gisImg', ap.property_use, 
         ap.property_characteristics, ap.property_description,
         ap.legal_description as 'legal_description_app', 
         rg.legal_description as 'legal_description_regrid', 
         ap.approximate_annual_taxes, 
         ap.crime_rate_zip_code, 
         ap.school_rate_zip_code, 
         ap.hoa, 
         ap.adictional_notes,
         ap.link_appraiser, 
         rg.centroid_coordinates , 
         rg.linkRegrid 
         from appraiser ap inner join regrid rg on ap.parcel_id = rg.parcel_id
        where ap.parcel_id = trim('" . $idParcelId . "') ";



        $executar = mysqli_query($this->getConexao(), $sql);

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados[] =  $row;
        }

        return $dados;
    }





    public function inserirApp()
    {
        try {



            $sql = " 
            
            INSERT INTO  appraiser
                                ( 
                                parcel_id,
                                link_appraiser,
                                property_address,
                                comentarios,
                                owers_name,
                                owners_mail,
                                land_locked,
                                flood_zone,
                                assessed_value,
                                minumum_bid,
                                valor_mercado,
                                google_link,
                                property_use,
                                property_characteristics,
                                property_type,
                                property_description,
                                legal_description,
                                approximate_annual_taxes,
                                crime_rate_zip_code,
                                school_rate_zip_code,
                                hoa,
                                linkReport,
                                img_map_gis, 
                                adictional_notes,
                                county_app,
                                auctions,
                                rating,
                                status
                                )
                                VALUES
                                ( 
                                    trim('" . $this->getParcelId() . "'),
                                '" . $this->getLinkApp() . "',
                                '" . $this->getPropertyAdd() . "',
                                '" . $this->getComments() . "',
                                '" . $this->getOwnerName() . "',
                                '" . $this->getOwnerAdd() . "',
                                '" . $this->getLocked() . "',
                                '" . $this->getFloodZone() . "',
                                '" . $this->getAssessedValue() . "',
                                '" . $this->getMinimumBid() . "',
                                '" . $this->getValorMercado() . "',
                                '" . $this->getGooglelink() . "',
                                '" . $this->getPropertyUse() . "',
                                '" . $this->getPropertCaracteristics() . "',
                                '" . $this->getPropertyType() . "',
                                '" . $this->getPropertyDescription() . "',
                                '" . $this->getLegalDescription() . "',
                                '" . $this->getApproximateAnualTaxes() . "',
                                '" . $this->getCrimeRate() . "',
                                '" . $this->getSchoolRateZip() . "',
                                '" . $this->getHoa() . "',
                                '" . $this->getLinkReport() . "',
                                trim('" . $this->getImgMapGis() . "'), 
                                '" . $this->getAddictionalNotes() . "',
                                '" . $this->getcounty_app() . "',
                                '" . $this->getAuctions() . "',
                                '" . $this->getRating() . "', '1')";







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



    /*
    //funcao unica para alterar perfil e dar acesso a pessoa
    public function permitirAcessoPessoa()
    {
        try {


            $sql =  " UPDATE pessoas   SET "
                . " idStatus  = " . $this->getIdStatus() . ","
                . " idPerfil  = " . $this->getIdPerfil() . ""
                . " WHERE  idPessoas  = " . $this->getIdPessoas();

            echo $sql;

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


*/

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
