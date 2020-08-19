<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(!defined('4444a')){
    header("Location: /");
}

/**
 * Description of AdmsCadastrar
 *
 * @author Fernando
 */
class AdmsCadastrar extends Conn{
    
    private $dados;
    private $conn;
    
    public function cadastrar(array $dados = null){
        $this->dados = $dados;    
        $this->dados['senha'] = password_hash($this->dados['senha'], PASSWORD_DEFAULT);
        $this->dados['chave_ativar'] = password_hash(date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
        var_dump($this->dados);
        $this->conn = $this->conectar();
        $query_cadUser = "INSERT INTO user(name, email, pass, chave_verifica, data_criacao) VALUES (:name, :email, :pass, :chave_verifica,NOW())";
        $cadUsuario = $this->conn->prepare($query_cadUser);
        $cadUsuario->bindParam(':name', $this->dados['nome']);
        $cadUsuario->bindParam(':email', $this->dados['email']);
        $cadUsuario->bindParam(':pass', $this->dados['senha']);
        $cadUsuario->bindParam(':chave_verifica', $this->dados['chave_ativar']);
        $cadUsuario->execute();
        
        if($cadUsuario->rowCount()){
            $this->enviarEmail();
            return true;
        }
        else{
            $_SESSION['msg'] = "<p style='color: red;'>Usuario NÂO cadastrado</p>";
            return false;
        }
    }
    
        private function enviarEmail() {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = '823bf2ae9fef6c';                     // SMTP username
            $mail->Password = '47538a13f59b0b';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            //Recipients
            $mail->setFrom('testedeemail@teste.com', 'ADM');
            $mail->addAddress($this->dados['email'], $this->dados['nome']);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Confirmar e-mail';
            $conteudoHTML = "Prezado {$this->dados['nome']}<br><br>";
            $conteudoHTML .= "Confirme o e-mail clicando no link abaixo.<br>";
            $conteudoHTML .= "<a href='".URL."ativar/index?chave={$this->dados['chave_ativar']}'>".URL."ativar/index?chave={$this->dados['chave_ativar']}</a><br>";
            $mail->Body = $conteudoHTML;
            
            
            $conteudoTexto = "Prezado {$this->dados['nome']}\n\n";
            $conteudoTexto .= "Confirme o e-mail colocando o link abaixo no navegador.\n";
            $conteudoTexto .= URL."ativar/index?chave={$this->dados['chave_ativar']}\n";
            $mail->AltBody = $conteudoTexto;

            $mail->send();
            $_SESSION['msg'] = "<p style='color: green'>Usuário cadastrado com sucesso, acesse seu e-mail para confirmar o cadastro!</p>";
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: E-mail não enviado.  Mailer Error: {$mail->ErrorInfo}!</p>";
        }
    }
}
