<?php

namespace App\Models;

use PDO;
/**
 * Description of AdmsLogin
 *
 * @author Fernando
 */
class AdmsLogin extends Conn{
    
    private $resultado = false;
    private $resultadoBd;
    private $dados;
    private $conn;
    public $meme;


    public function getResultado(): bool {
        return $this->resultado;
    }
        
    public function login(array $dados = null) {
        $this->dados = $dados;
        $this->conn = $this->conectar();
        $query = "SELECT id, name, email, pass
                FROM user
                WHERE email =:email LIMIT 1";
        $result_val_login = $this->conn->prepare($query);
        $result_val_login->bindParam(":email", $this->dados['usuario'], PDO::PARAM_STR);
        $result_val_login->execute();
        $this->resultadoBd = $result_val_login->fetch();
        echo '<br>';
        if($this->resultadoBd){
            $this->validarSenha();
        }else{
            $_SESSION['msg'] =  '<p style="color: #ff0000">USUARIO NÂO ENCONTRADO</p>';
            $this->resultado = false;
        }      

    }
    
    private function validarSenha() {
        if ($this->dados['senha'] == $this->resultadoBd['pass']){
            $_SESSION['usuario_id'] = $this->resultadoBd['id'];
            $_SESSION['usuario_user'] = $this->resultadoBd['name'];
            $_SESSION['usuario_email'] = $this->resultadoBd['email'];
            $this->resultado = true;
        }
        else{
             $_SESSION['msg'] =  '<p style="color: #ff0000">SENHA INCORRETA</p>';
             $this->resultado = false;
        }
    }

}
