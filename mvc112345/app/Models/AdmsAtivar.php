<?php

namespace App\Models;
use PDO;
if(!defined('4444a')){
    header("Location: /");
}

/**
 * Description of AdmsAtivar
 * 
 * @author Fernando
 */
class AdmsAtivar extends Conn {
    
    private $chave;
    private $resultado = false;
    private $resultadoBD;
    private $conn;
    
    function getResultado(): bool {
        return $this->resultado;
    }
        
    public function validarChave($chave) {
        $this->chave = $chave;
        var_dump($this->chave);
        $this->conn = $this->conectar();
        $query_val_chave = "SELECT id FROM user WHERE chave_verifica=:chave_verifica LIMIT 1";
        $result_val_chave = $this->conn->prepare($query_val_chave);
        $result_val_chave->bindParam(':chave_verifica', $this->chave);
        $result_val_chave->execute();
        $this->resultBD = $result_val_chave->fetch();
        
        echo  $this->resultBD['id'];

        
        if ($this->resultBD) {
            if ($this->ativarUsuario()) {
                $_SESSION['msg'] = "<p style='color: green'>Usuário ativado com sucesso!</p>";
                $this->resultado = true;
            } else {
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário não ativado, tente mais tarde!</p>";
                $this->resultado = false;
            }
            //$this->resultado = true;
        } else {
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Link inválido2!</p>";
            $this->resultado = false;
        }
    }
    
    private function ativarUsuario() {
        $chave_ativar = "";
        $sits_usuario_id = 1;
        $query_ativar_usuario = "UPDATE user SET chave_verifica=:chave_verifica, situacao_id=:situacao_id, data_alteracao=NOW() WHERE id=:id";
        $ativar_usuario = $this->conn->prepare($query_ativar_usuario);
        $ativar_usuario->bindParam(':chave_verifica', $chave_ativar);
        $ativar_usuario->bindParam(':situacao_id', $sits_usuario_id);
        $ativar_usuario->bindParam(':id', $this->resultBD["id"]);
        $ativar_usuario->execute();

        if ($ativar_usuario->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
