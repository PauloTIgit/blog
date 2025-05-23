<?php

class Usuarios extends Ligacao
{

    private $userId;
    private $userNome;
    private $userCPF;  
    private $userFoto;
    private $userHashValidMail;
    private $userEmail;
    private $userSenha;
    private $userPerfil;
    private $userStatus;
    private $userDataCadastro;
    
///////////// SET
    protected function setUserId($userId)
    {
        $this->userId = $userId;
    }
    protected function setUserNome($userNome)
    {
        $this->userNome = $userNome;
    }
    protected function setUserCPF($userCPF)
    {
        $this->userCPF = $userCPF;
    }
    protected function setUserFoto($userFoto)
    {
        $this->userFoto = $userFoto;
    }
    protected function setUserHashValidMail($userHashValidMail)
    {
        $this->userHashValidMail = $userHashValidMail;
    }    
    protected function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }
    protected function setUserSenha($userSenha)
    {
        $this->userSenha = $userSenha;
    }
    protected function setUserPerfil($userPerfil)
    {
        $this->userPerfil = $userPerfil;
    }
    protected function setUserStatus($userStatus)
    {
        $this->userStatus = $userStatus;
    }
    protected function setUserDtCadastro($userDataCadastro)
    {
        $this->userDataCadastro = $userDataCadastro;
    }

///////////// GET

    protected function getUserId()
    {
        return $this->userId;
    }
    protected function getUserNome()
    {
        return $this->userNome;
    }
    protected function getUserCPF()
    {
        return $this->userCPF;
    }
    protected function getUserFoto()
    {
        return $this->userFoto;
    }
    protected function getUserHashValidMail()
    {
        return $this->userHashValidMail;
    }
    protected function getUserEmail()
    {
        return $this->userEmail;
    }
    protected function getUserSenha()
    {
        return $this->userSenha;
    }
    protected function getUserPerfil()
    {
        return $this->userPerfil;
    }
    protected function getUserStatus()
    {
        return $this->userStatus;
    }
    protected function getUserDtCadastro()
    {
        return $this->userDataCadastro;
    }

///////////// GERAIS

    public function pegarDados($userNome,$userCPF,$userFoto,$userHashValidMail,$userEmail,$userSenha,$userGenero,$userPerfil,$userStatus,$userDataCadastro){
        $this->setUserNome($userNome);
        $this->setUserCPF($userCPF);
        $this->setUserFoto($userFoto);
        $this->setUserHashValidMail($userHashValidMail);
        $this->setUserEmail($userEmail);
        $this->setUserSenha($userSenha);
        $this->setUserGenero($userGenero);
        $this->setUserPerfil($userPerfil);
        $this->setUserStatus($userStatus);
        $this->setUserDtCadastro($userDataCadastro);
    }
    public function informarEmail($userEmail){
        $this->setUserEmail($userEmail);
    }
    public function verificaEMAIL(){
        $con = $this->conecta();
        $userEmail = $this->getUserEmail();

        $sql = "SELECT * FROM `user` WHERE user_email = :email";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':email',$userEmail);

        try {
            if($stmt->execute()){
                return $stmt->rowCount();
            }else{
                return 0;
            }
        } catch (Exception $e) {
            $log = new Log();
            $mensagem = "Erro ao verificar email: " . $e->getMessage() . "\n";
            $log->gerarLog($mensagem,"VERIFICAR-EMAIL","user");
            return 0;
        }
    }
    public function passwordHash($userSenha){
        return password_hash($userSenha, PASSWORD_BCRYPT);
    }

    public function pegarPasswordHash(){
        $con = $this->conecta();
        $userEmail = $this->getUserEmail();

        $sql = "SELECT hash_valid_mail FROM `user` WHERE user_email = :email";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':email',$userEmail);

        try {
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return 0;
            }
        } catch (Exception $e) {
            $log = new Log();
            $mensagem = "Erro ao pegar hash_valid_mail: " . $e->getMessage() . "\n";
            $log->gerarLog($mensagem,"VERIFICAR-EMAIL","user");
            return 0;
        }
    }
    public function pegarId(){
        $con = $this->conecta();
        $email = $this->getUserEmail();

        $sql = "SELECT user_id FROM `user` WHERE user_email = :email";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':email',$email);

        try {
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return 0;
            }
        } catch (Exception $e) {
            $log = new Log();
            $mensagem = "Erro ao pegar hash_valid_mail: " . $e->getMessage() . "\n";
            $log->gerarLog($mensagem,"VERIFICAR-EMAIL","user");
            return 0;
        }
    }
    public function pegarPasswordDB(){
        $con = $this->conecta();
        $userEmail = $this->getUserEmail();

        $sql = "SELECT user_senha FROM `user` WHERE user_email = :email";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':email',$userEmail);

        try {
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return 0;
            }
        } catch (Exception $e) {
            $log = new Log();
            $mensagem = "Erro ao pegar hash_valid_mail: " . $e->getMessage() . "\n";
            $log->gerarLog($mensagem,"VERIFICAR-EMAIL","user");
            return 0;
        }
    }

    public function atulizarHashEmail($id, $hashValid){
        $con = $this->conecta();
        $sql = "UPDATE user SET hash_valid_mail = :hash_valid WHERE user_id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':hash_valid', $hashValid);

        try {
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return 0;
            }
        } catch (Exception $e) {
            $log = new Log();
            $mensagem = "Erro ao atualizar hash_valid_mail: " . $e->getMessage() . "\n";
            $log->gerarLog($mensagem,"VERIFICAR-EMAIL","user");
            return 0;
        }
    }
    public function verificarCodigo($hash){
        $con = $this->conecta();

        $sql = "SELECT user_id FROM `user` WHERE hash_valid_mail = :hash";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':hash',$hash);

        try {
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return 0;
            }
        } catch (Exception $e) {
            $log = new Log();
            $mensagem = "Erro ao verificar hash_valid_mail: " . $e->getMessage() . "\n";
            $log->gerarLog($mensagem,"VERIFICAR-EMAIL","user");
            return 0;
        } 
    }
    public function ativarUsuario($userId){
        $con = $this->conecta();
        $sql = "UPDATE user SET user_status = 1 WHERE user_id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $userId);

        try {
            if($stmt->execute()){
                return $stmt->rowCount();
            }else{
                return 0;
            }
        } catch (Exception $e) {
            $log = new Log();
            $mensagem = "Erro ao atualizar hash_valid_mail: " . $e->getMessage() . "\n";
            $log->gerarLog($mensagem,"VERIFICAR-EMAIL","user");
            return 0;
        }
    }
    public function resetarSenha($id, $passwordHash){
        $con = $this->conecta();
        $sql = "UPDATE user SET user_senha = :user_senha WHERE user_id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_senha', $passwordHash);

        try {
            if($stmt->execute()){
                return $stmt->rowCount();
            }else{
                return 0;
            }
        } catch (Exception $e) {
            $log = new Log();
            $mensagem = "Erro ao resetar senha: " . $e->getMessage() . "\n";
            $log->gerarLog($mensagem,"RESETAR-SENHA","user");
            return 0;
        }
    }


    // CRUD
    public function createUser(){
        $con = $this->conecta();
        $userNome = $this->getUserNome();
        $userCPF = $this->getUserCPF();
        $userFoto = $this->getUserFoto();
        $userHashValidMail = $this->getUserHashValidMail();
        $userEmail = $this->getUserEmail();
        $userSenha = $this->getUserSenha();
        $userGenero = $this->getUserGenero();
        $userPerfil = $this->getUserPerfil();
        $userStatus = $this->getUserStatus();
        $userDataCadastro = $this->getUserDtCadastro();            

        $sql = "INSERT INTO `user` VALUES 
            (null, :nome, :cpf, :foto, :hash_valid, :email, :senha, :genero, :Perfil, :status, :data_cadastro)
        ";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nome', $userNome);
        $stmt->bindParam(':cpf', $userCPF);
        $stmt->bindParam(':foto', $userFoto);
        $stmt->bindParam(':hash_valid', $userHashValidMail);
        $stmt->bindParam(':email', $userEmail);
        $stmt->bindParam(':senha', $userSenha);
        $stmt->bindParam(':genero', $userGenero);
        $stmt->bindParam(':Perfil', $userPerfil);
        $stmt->bindParam(':status', $userStatus);
        $stmt->bindParam(':data_cadastro', $userDataCadastro);

        try {
            if($stmt->execute()){
                return $stmt->rowCount();
            }else{
                return 0;
            }
        } catch (Exception $e) {
            $log = new Log();
            $mensagem = "Erro ao criar um novo usuario: " . $e->getMessage() . "\n";
            $log->gerarLog($mensagem,"CREATE-USER","user");
            return 0;
        }


    }

}