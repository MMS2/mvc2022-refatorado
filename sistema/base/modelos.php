<?php

// essa e a classe modelo que vai se chamada nos controlers
require_once('./sistema/configuracao.php');
class Modelos
{



    private $dbHost = HOST;
    private $dbUser = USER;
    private $dbPass = PASS;
    private $dbName = BD;

    private $statement;
    private $dbHandler;
    private $error;
    public $values;


    // Autoload Conexao
    public function __construct()
    {
        $conn            = 'mysql:host=' . $this->dbHost . '; dbname=' . $this->dbName;
        $options         = [PDO::ATTR_PERSISTENT  => true, PDO::ATTR_ERRMODE     => PDO::ERRMODE_EXCEPTION];
        try {

            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            $this->error     = $e->getMessage();
            echo $this->error;
        }
    }

    // Funcao Query
    public function busca($sql)
    {
        $this->statement = $this
            ->dbHandler
            ->prepare($sql);
    }


    public function bind($params, $values, $type            = null)
    {

        switch (is_null($type)) {
            case is_int($values):
                $type            = PDO::PARAM_INT;
                break;

            case is_bool($values):
                $type = PDO::PARAM_BOOL;
                break;

            case is_null($values):
                $type = PDO::PARAM_NULL;
                break;

            default:
                $type = PDO::PARAM_STR;
        }
        $this
            ->statement
            ->bindValues($params, $values, $type);
    }

    // Execucao do banco de dados
    public function execute()
    {
        return $this
            ->statement
            ->execute();
    }

    // Pegando todos os registro do role
    public function chama()
    {
        $this->execute();
        return $this
            ->statement
            ->fetchAll(PDO::FETCH_OBJ);
    }

    // Buscando inico
    public function unico()
    {
        $this->execute();
        return $this
            ->statement
            ->fetch(PDO::FETCH_OBJ);
    }

    // Contando coisas do banco de dados
    public function contagem()
    {
        $this->execute();
        return $this
            ->statement
            ->rowCount();
    }

    //adicional de qualidade

    function cadastrando($tabela, $data)
    {
        echo  $cadastra = " (`" . implode("`, `", array_keys($data)) . "`) VALUES ('" . implode("', '", $data) . "') ";
        $this->statement = $this
            ->dbHandler
            ->prepare("INSERT INTO " . $tabela . " " . $cadastra);
        echo "INSERT INTO " . $tabela . " " . $cadastra;

        if ($this->contagem() > 0) {
      
        } else {
            //   erro
        
            print_r($this->dbHandler->errorInfo());
         
        }
    }
}
