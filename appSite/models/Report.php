<?php


class Report
{

 





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


	public function totalCasasSemClassificar()
		{
			$sql = "select count(parcel)  from apps where status =1 ";

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


	public function casasClassificadasVA()
		{
			$sql = "select count(parcel) from apps where status =3 ";

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
	
		public function casaAvaliadasDirector()
		{
			$sql = "select count(parcel) from apps where status =4 ";

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
	
	
	public function ratingVA()
		{
			$sql = "select  ratingVA, count(parcel) from apps  where ratingVA is not null group by ratingVA; ";

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
	
		public function ratingDirector()
		{
			$sql = "select  ratingDirector, count(parcel) from apps  where ratingDirector is not null   group by ratingDirector ";

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
	
	
	
	
	
		public function todasCasasCadastradas()
		{
			$sql = "select   count(parcel) from apps    ";

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
	
	
	
	public function propriedadesAvaliadasPorVA()
		{
			$sql = "select us.nomeUsuario,  count(idapps) from apps ap inner join  users us on us.idusuarios = ap.vaAvaliator group by vaAvaliator ";

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

 
}
