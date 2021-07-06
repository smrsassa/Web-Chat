<?php

require_once 'database.php';

class usuario extends database
{
    function __construct()
    {
        parent::__construct();
    }

    public function login( String $nome, String $senha )
    {
        $userInfo = $this->procuraNomeSenha($nome, $senha);

        if ( $userInfo ) {
            $this->updateUserLog($userInfo['id'], 1);

            session_start();
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['nomeUnico'] = $userInfo['nomeUnico'];
            $_SESSION['nome'] = $userInfo['nome'];
            $_SESSION['sobrenome'] = $userInfo['sobrenome'];
            $_SESSION['email'] = $userInfo['email'];
            $_SESSION['status'] = $userInfo['status'];

            if (isset($cookies)) {
                $expire = time() + 60 * 60 * 24 * 30;
                setcookie("nome", $nome, $expire);
                setcookie("senha", $senha, $expire);
            }

            return true;
        }
        
        return false;
    }

    public function registro(String $nome, String $sobrenome, String $nomeUnico, String $email, String $senha, String $imgData)
    {
        $sql = "INSERT INTO `usuarios`(`nomeUnico`, `nome`, `sobrenome`, `email`, `senha`, `foto`)
                VALUES (:nomeUnico, :nome, :sobrenome, :email, :senha, :foto)";

        $stmt = $this->con->prepare($sql);

        $stmt->bindParam(':nomeUnico', $nome);
        $stmt->bindParam(':nome', $sobrenome);
        $stmt->bindParam(':sobrenome', $nomeUnico);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':foto', $imgData, PDO::PARAM_LOB);

        if ( $stmt->execute() ) {
            return true;
        }

        return false;
    }

    public function procuraNomeSenha( String $nome, String $senha )
    {
        $querySearchUser = "SELECT * FROM usuarios WHERE nomeUnico = '$nome' AND senha = '$senha'";
        $stmt = $this->con->prepare($querySearchUser);
        if ( $stmt->execute() ) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
    
    public function updateUserLog( Int $id_usuario, Int $valor = 0 )
    {
        $queryUserLog = "UPDATE `usuarios` SET `log`= '$valor' WHERE `id`='$id_usuario'";
        $stmt = $this->con->prepare($queryUserLog);
        $stmt->execute();
    }
}
