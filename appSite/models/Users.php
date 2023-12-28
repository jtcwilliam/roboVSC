<?php

class Users
{


    private $user;
    private $password;





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


    public function login($email, $senha)
    {


        $sql = "SELECT * FROM users  where  emailUsuario ='" . $email . "' and senhaUsuario= '" . $senha . "'";


        $dados = [];


        $executar = mysqli_query($this->getConexao(), $sql);



        while ($row = mysqli_fetch_assoc($executar)) {

            $dados[] =  $row;
        }




        if (empty($dados)) {


            $dados['logado'] = false;
            return $dados;
        } else {
            $dados['logado'] = true;
            return $dados;
        }
    }

    public function getConexao()
    {
        return $this->conexao;
    }

    public function setConexao($conexao): self
    {
        $this->conexao = $conexao;

        return $this;
    }

    public function getPassword() 
    {
        return $this->password;
    }

    public function setPassword( $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUser() 
    {
        return $this->user;
    }

    public function setUser( $user): self
    {
        $this->user = $user;

        return $this;
    }
}
