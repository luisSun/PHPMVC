<?php

namespace App\Models;

/*
if(!defined('4578S9')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}
*/
use PDO;

/**
 * Description of AdmsLogin
 *
 * @author Celke
 */
class AdmsLogin extends Conn
{

    private $dados;
    private $resultado = false;
    private $resultadoBd;
    private $conn;

    function getResultado(): bool {
        return $this->resultado;
    }

    public function login(array $dados = null) {
        $this->dados = $dados;
        $this->conn = $this->conectar();
        $query_val_login = "SELECT id, name, email, pass
                FROM user
                WHERE email =:email LIMIT 1";
        $result_val_login = $this->conn->prepare($query_val_login);
        $result_val_login->bindParam(":email", $this->dados['usuario'], PDO::PARAM_STR);
        $result_val_login->execute();
        $this->resultadoBd = $result_val_login->fetch();
        var_dump($this->resultadoBd);
        echo '<br>';
        if ($this->resultadoBd) {
            $this->validarSenha();
        } else {
            //$_SESSION['msg'] = "<p style='color: #ff0000;'>Erro: Usuário não encontrado!</p>";
            $this->resultado = false;
        }
    }

    private function validarSenha() {
        if (password_verify($this->dados['senha'], $this->resultadoBd['pass'])) {
            //$_SESSION['usuario_id'] = $this->resultadoBd['id'];
            //$_SESSION['usuario_nome'] = $this->resultadoBd['nome'];
            //$_SESSION['usuario_email'] = $this->resultadoBd['email'];
            $this->resultado = true;
            echo 'Senha correta';
        } else {
            //$_SESSION['msg'] = "<p style='color: #ff0000;'>Erro: Usuário ou a senha incorreta</p>";
            $this->resultado = false;
        }
    }

}
