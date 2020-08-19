<?php

namespace App\Models;
use PDO;
/**
 * Description of Conn
 *  Classe de conexão com o DB
 * @author Fernando
 */
class Conn {
    
    private $db = "mysql";
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "auth";
    public $port = 3308;
    public $connect; 
    
    protected function conectar() {
        try {
            $this->connect = new PDO("mysql:dbname=".$this->dbname."; host=".$this->host, $this->user, $this->pass);
            //$this->connect = new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname, $this->user, $this->pass);
            return $this->connect;
        } catch (\PDOException $ex) {
            die('Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador adm@empresa.com');
        }
    }
}
