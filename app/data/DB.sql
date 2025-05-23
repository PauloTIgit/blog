SHOW DATABASES;
CREATE DATABASE u973722018_blog;
USE u973722018_blog;

CREATE TABLE usuarios (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_nome varchar(100) NOT NULL,
    user_cpf varchar(14) NOT NULL,
    user_foto varchar(255) NOT NULL,
    user_hash_valid_mail INT NOT NULL,
    user_email varchar(255) NOT NULL,
    user_senha varchar(255) NOT NULL,
    user_perfil ENUM('admin', 'usuario', 'moderador') NOT NULL,
    user_status ENUM('ativo', 'inativo', 'bloqueado') NOT NULL,
    user_dt_cadastro DATE NOT NULL,
    user_dt_hr_acesso DATETIME NOT NULL,
    CONSTRAINT uc_user_cpf UNIQUE (user_cpf),
    CONSTRAINT uc_user_email UNIQUE (user_email),
    KEY (user_cpf)
);


