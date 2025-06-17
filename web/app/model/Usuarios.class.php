<?php
date_default_timezone_set('America/Sao_Paulo');

class Usuarios extends Ligacao
{
  private int $id;
  private string $nome;
  private string $foto;
  private int $hashValidMail;
  private string $email;
  private string $senha;
  private string $nivel;
  private int $status;
  private DateTime $dataCadastro;
  private bool $estado;

  // Public
  public function CadastrarUsuario($data)
  {
    $this->setUsuario(nome: $data['nome'], foto: $data['foto'], email: $data['email'], senha: $data['senha'], nivel: $data['nivel'], status: $data['status']);
    $validEmail = $this->validEmail(email: $data['email']);
    if ($validEmail == 404 || $validEmail == 500) {
      return [
        'status' => 400,
        'success' => false,
        'msg' => 'Erro ao interno. Contate o suporte!',
        'data' => []
      ];
    }

    if ($validEmail != []) {
      return [
        'status' => 200,
        'success' => false,
        'msg' => 'Email já cadastrado!',
        'data' => [
          'email' => $data['email'],
        ]
      ];
    }

    if ($this->salvar()) {
      return [
        'status' => 200,
        'success' => true,
        'msg' => 'Cadastro realizado com sucesso!',
        'data' => [
          'nome' => $data['nome'],
          'email' => $data['email'],
          'url' => "./valid"
        ]
      ];
    }
  }

  public function LogarUsuario($email, $senha, $lembrar)
  {
    // Verificar se o email tem login
    $validEmail = $this->validEmail($email);
    if ($validEmail == 404 || $validEmail == 500) {
      return [
        'status' => 400,
        'success' => false,
        'msg' => 'Erro ao interno. Contate o suporte!',
        'data' => []
      ];
    }

    if ($validEmail == []) {
      return [
        'status' => 200,
        'success' => false,
        'msg' => 'Email não cadastrado!',
        'data' => [
          'email' => $email,
          'validEmail' => $validEmail
        ]
      ];
    }

    // Validar senha    
    $validSenha = $this->validSenha($email, $senha);
    if ($validSenha == 404 || $validSenha == 500) {
      return [
        'status' => 400,
        'success' => false,
        'msg' => 'Erro ao interno. Contate o suporte!',
        'data' => []
      ];
    }

    if ($validSenha == 401) {
      return [
        'status' => 400,
        'success' => false,
        'msg' => 'Senha invalida!',
        'data' => []
      ];
    }

    // redirecionar para o painel pertinente
    // salvar dados do usuario na sessao
    $dadosUser = [
      'id'              => $validEmail[0]['id'],
      'foto'            => $validEmail[0]['foto'],
      'nome'            => $validEmail[0]['nome'],
      'email'           => $validEmail[0]['email'],
      'hash_valid_mail' => $validEmail[0]['hash_valid_mail'],
      'nivel'           => $validEmail[0]['nivel'],
      'estado'          => $validEmail[0]['estado'],
      'status'          => $validEmail[0]['estado'],
      'dataCadastro'    => $validEmail[0]['dataCadastro'],
      'lembrar'         => $lembrar,
      'painel'          => $validEmail[0]['nivel'] == 'root' ? 'admin' : $validEmail[0]['nivel']
    ];

    $_SESSION['usuario'] = $dadosUser;

    return [
      'status' => 200,
      'success' => true,
      'msg' => 'Logando...',
      'data' => [
        'url' => $dadosUser['painel']
      ]
    ];
  }

  // Protected

  protected function setSenha(string $senha): void
  {
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $this->senha = $hash;
  }

  protected function getHashValidMail(): void
  {
    $random = random_int(100000, 999999);
    $this->hashValidMail = $random;
  }

  protected function getName($usuario_id)
  {
    $busca = $this->buscarPorId($usuario_id);
    $result = [];

    if ($busca == []) {
      return [];
    }

    foreach ($busca as $value) {
      $result = $value['nome'];
    }

    return $result;
  }

  protected function salvar(): bool
  {
    $sql = 'INSERT INTO usuario (
                    nome, foto, hash_valid_mail, email, senha,
                    nivel, status, dataCadastro, estado
                ) VALUES (
                    :nome, :foto, :hash_valid_mail, :email, :senha,
                    :nivel, :status, :dataCadastro, :estado
                )';

    $conexao = $this->conecta();
    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':nome', $this->nome);
    $stmt->bindValue(':foto', $this->foto);
    $stmt->bindValue(':hash_valid_mail', $this->hashValidMail);
    $stmt->bindValue(':email', $this->email);
    $stmt->bindValue(':senha', $this->senha);
    $stmt->bindValue(':nivel', $this->nivel);
    $stmt->bindValue(':status', $this->status);
    $stmt->bindValue(':dataCadastro', date("Y-m-d H:i"));
    $stmt->bindValue(':estado', false, PDO::PARAM_BOOL);

    try {
      if ($stmt->execute()) {
        return 200;
      } else {
        $this->logUsuario("Erro ao cadastrar usuario | sql: $sql", "usuario");
        return 404;
      }
    } catch (\Exception $error) {
      $this->logUsuario("Erro ao cadastrar usuario | error: $error", "usuario");
      return 500;
    }
  }

  protected function buscarPorId(int $id)
  {
    $conexao = $this->conecta();

    $sql = 'SELECT * FROM usuario WHERE id = :id LIMIT 1';
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $id);

    try {
      if ($stmt->execute()) {
        return $stmt->fetchAll();
      } else {
        $this->logUsuario("Erro ao buscar usuario por id | sql: $sql", "usuario");
        return 404;
      }
    } catch (\Exception $error) {
      $this->logUsuario("Erro ao buscar usuario por id | error: $error", "usuario");
      return 500;
    }
  }

  protected function setUsuario(string $nome, string $foto, string $email, string $senha, string $nivel, int $status)
  {
    $this->nome = $nome;
    $this->foto = $foto;
    $this->getHashValidMail();
    $this->email = $email;
    $this->setSenha($senha);
    $this->nivel = $nivel;
    $this->status = $status;
  }

  protected function validEmail($email)
  {
    $conexao = $this->conecta();

    $sql = 'SELECT * FROM usuario WHERE email = :email LIMIT 1';
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':email', $email);

    try {
      if ($stmt->execute()) {
        return $stmt->fetchAll();
      } else {
        $this->logUsuario("Erro ao buscar usuario por id | sql: $sql", "usuario");
        return 404;
      }
    } catch (\Exception $error) {
      $this->logUsuario("Erro ao buscar usuario por id | error: $error", "usuario");
      return 500;
    }
  }

  protected function validSenha($email, $senha)
  {
    $conect = $this->conecta();
    $sql = "SELECT senha FROM usuario WHERE email = :email";
    $stmt = $conect->prepare($sql);
    $stmt->bindValue(':email', $email);

    try {
      if ($stmt->execute()) {
        $hash_password = $stmt->fetch()['senha'];
        return password_verify($senha, $hash_password) ? 200 : 401;
      }
      $this->logUsuario("Erro ao buscar senha por email | sql: $sql", "sistema");
      return 404;
    } catch (\Exception $error) {
      $this->logUsuario("Erro ao buscar senha por email | error: $error", "sistema");
      return 500;
    }
  }

  protected function logUsuario($mensage, $type)
  {
    $logClass = new Log();

    $logClass->gerarLog($mensage, $type, './log/usuario');
  }
}
