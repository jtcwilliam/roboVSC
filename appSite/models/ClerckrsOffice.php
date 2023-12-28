<?php


class ClerckrsOffice
{

    private $idclerks_office;
    private $status;
    private $search_name;
    private $direct_name;
    private $reverse_name;
    private $record_date;
    private $doc_type;
    private $book_type;
    private $book;
    private $pag;
    private $cfn;
    private $doc_links;
    private $comments;
    private $legal;
    private $doc_links_b;
    private $clecksLine;
    private $parcel_id;
    private $name_file;
    private $addres_file;
    private $proccess_number;

    


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



    public function listPropertys()
    {
        $sql = "select parcel_id, property_address, valor_mercado, owers_name from appraiser";



        $executar = mysqli_query($this->getConexao(), $sql);

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados[] =  $row;
        }

        return $dados;
    }





    public function loadLiens($idParcelId)
    {
        $sql = " SELECT * FROM clerks_office   where parcel_id ='" . $idParcelId . "'";




        $executar = mysqli_query($this->getConexao(), $sql);

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados[] =  $row;
        }

         
        if (isset($dados)   ) {

            return $dados;
        }else{
            return false;
        }
    }





    public function inserirClercks()
    {
        try {



            $sql = " 
            
            INSERT INTO   clerks_office 
            (  
          
             parcel_id ,
             doc_type ,
             reverse_name ,
             direct_name ,
             comments,
             addres_file,
             name_file,
             proccess_number             
             )
            VALUES
            ( 
                '" . $this->getParcel_id() . "',
                '" . $this->getDoc_type() . "',
                '" . $this->getReverse_name() . "',
                '" . $this->getDirect_name() . "',
                '" . $this->getComments() . "',
                '" . $this->getAddres_file() . "',
                '" . $this->getName_file() . "',
                '" . $this->getproccess_number(). "' )";


               



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
     * Get the value of idclerks_office
     */
    public function getIdclerks_office()
    {
        return $this->idclerks_office;
    }

    /**
     * Set the value of idclerks_office
     *
     * @return  self
     */
    public function setIdclerks_office($idclerks_office)
    {
        $this->idclerks_office = $idclerks_office;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of search_name
     */
    public function getSearch_name()
    {
        return $this->search_name;
    }

    /**
     * Set the value of search_name
     *
     * @return  self
     */
    public function setSearch_name($search_name)
    {
        $this->search_name = $search_name;

        return $this;
    }

    /**
     * Get the value of direct_name
     */
    public function getDirect_name()
    {
        return $this->direct_name;
    }

    /**
     * Set the value of direct_name
     *
     * @return  self
     */
    public function setDirect_name($direct_name)
    {
        $this->direct_name = $direct_name;

        return $this;
    }

    /**
     * Get the value of reverse_name
     */
    public function getReverse_name()
    {
        return $this->reverse_name;
    }

    /**
     * Set the value of reverse_name
     *
     * @return  self
     */
    public function setReverse_name($reverse_name)
    {
        $this->reverse_name = $reverse_name;

        return $this;
    }

    /**
     * Get the value of record_date
     */
    public function getRecord_date()
    {
        return $this->record_date;
    }

    /**
     * Set the value of record_date
     *
     * @return  self
     */
    public function setRecord_date($record_date)
    {
        $this->record_date = $record_date;

        return $this;
    }

    /**
     * Get the value of doc_type
     */
    public function getDoc_type()
    {
        return $this->doc_type;
    }

    /**
     * Set the value of doc_type
     *
     * @return  self
     */
    public function setDoc_type($doc_type)
    {
        $this->doc_type = $doc_type;

        return $this;
    }

    /**
     * Get the value of book_type
     */
    public function getBook_type()
    {
        return $this->book_type;
    }

    /**
     * Set the value of book_type
     *
     * @return  self
     */
    public function setBook_type($book_type)
    {
        $this->book_type = $book_type;

        return $this;
    }

    /**
     * Get the value of book
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set the value of book
     *
     * @return  self
     */
    public function setBook($book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get the value of pag
     */
    public function getPag()
    {
        return $this->pag;
    }

    /**
     * Set the value of pag
     *
     * @return  self
     */
    public function setPag($pag)
    {
        $this->pag = $pag;

        return $this;
    }

    /**
     * Get the value of cfn
     */
    public function getCfn()
    {
        return $this->cfn;
    }

    /**
     * Set the value of cfn
     *
     * @return  self
     */
    public function setCfn($cfn)
    {
        $this->cfn = $cfn;

        return $this;
    }

    /**
     * Get the value of doc_links
     */
    public function getDoc_links()
    {
        return $this->doc_links;
    }

    /**
     * Set the value of doc_links
     *
     * @return  self
     */
    public function setDoc_links($doc_links)
    {
        $this->doc_links = $doc_links;

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
     * Get the value of legal
     */
    public function getLegal()
    {
        return $this->legal;
    }

    /**
     * Set the value of legal
     *
     * @return  self
     */
    public function setLegal($legal)
    {
        $this->legal = $legal;

        return $this;
    }

    /**
     * Get the value of doc_links_b
     */
    public function getDoc_links_b()
    {
        return $this->doc_links_b;
    }

    /**
     * Set the value of doc_links_b
     *
     * @return  self
     */
    public function setDoc_links_b($doc_links_b)
    {
        $this->doc_links_b = $doc_links_b;

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

    /**
     * Get the value of parcel_id
     */
    public function getParcel_id()
    {
        return $this->parcel_id;
    }

    /**
     * Set the value of parcel_id
     *
     * @return  self
     */
    public function setParcel_id($parcel_id)
    {
        $this->parcel_id = $parcel_id;

        return $this;
    }

    /**
     * Get the value of clecksLine
     */
    public function getClecksLine()
    {
        return $this->clecksLine;
    }

    /**
     * Set the value of clecksLine
     *
     * @return  self
     */
    public function setClecksLine($clecksLine)
    {
        $this->clecksLine = $clecksLine;

        return $this;
    }

    /**
     * Get the value of name_file
     */ 
    public function getName_file()
    {
        return $this->name_file;
    }

    /**
     * Set the value of name_file
     *
     * @return  self
     */ 
    public function setName_file($name_file)
    {
        $this->name_file = $name_file;

        return $this;
    }

    /**
     * Get the value of addres_file
     */ 
    public function getAddres_file()
    {
        return $this->addres_file;
    }

    /**
     * Set the value of addres_file
     *
     * @return  self
     */ 
    public function setAddres_file($addres_file)
    {
        $this->addres_file = $addres_file;

        return $this;
    }

    /**
     * Get the value of proccess_number
     */ 
    public function getproccess_number()
    {
        return $this->proccess_number;
    }

    /**
     * Set the value of proccess_number
     *
     * @return  self
     */ 
    public function setproccess_number($proccess_number)
    {
        $this->proccess_number = $proccess_number;

        return $this;
    }
}
