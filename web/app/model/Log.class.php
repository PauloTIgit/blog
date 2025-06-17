<?php

class Log extends Ligacao
{
  private $logPath;
  private  $usuario_id;
  private  $usuario;
  private  $metodo;
  private  $tabela;
  private  $registro_id;
  private  $mensagem;
  private  $ip;
  private  $categoria;
  private  $status;

  public function __construct()
  {
    // Define o diretório onde os logs serão armazenados
    $this->logPath = './src/log/';
    if (!is_dir($this->logPath)) {
      mkdir($this->logPath, 0755, true);
    }
  }
  public function gerarLog($message, $type = 'INFO', $path = 'site')
  {
    $timestamp = date('Y-m-d H:i:s');
    if (is_array($message)) {
      $message = implode(', ', array_map(
        fn($key, $value) => "$key: $value",
        array_keys($message),
        $message
      ));
    }
    $logMessage = "[{$timestamp}] {$type}: $message" . PHP_EOL;
    $logFile = $this->logPath . $path . '.log';
    file_put_contents($logFile, $logMessage, FILE_APPEND);
  }

  private function getIP()
  {
    return $_SERVER['REMOTE_ADDR'] ?? null;
  }

  private function getNameUsuario($usuario_id)
  {
    $UsuarioClass = new Usuario();
    return $UsuarioClass->getName($usuario_id);
  }

  public function setLog($usuario_id, $metodo, $tabela, $registro_id, $mensagem, $categoria, $status)
  {
    $this->usuario_id = $usuario_id;
    $this->usuario = $this->getNameUsuario($usuario_id);;
    $this->metodo = $metodo;
    $this->tabela = $tabela;
    $this->registro_id = $registro_id;
    $this->mensagem = $mensagem;
    $this->ip = $this->getIP();
    $this->categoria = $categoria;
    $this->status = $status;
  }

  public function salvar()
  {
    $sql = 'INSERT INTO logs (
                    usuario_id, usuario, metodo, tabela, registro_id,
                    mensagem, ip, categoria, status
                ) VALUES (
                    :usuario_id, :usuario, :metodo, :tabela, :registro_id,
                    :mensagem, :ip, :categoria, :status
                )';
    $conexao = $this->conecta();
    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':usuario_id', $this->usuario_id);
    $stmt->bindValue(':usuario', $this->usuario);
    $stmt->bindValue(':metodo', $this->metodo);
    $stmt->bindValue(':tabela', $this->tabela);
    $stmt->bindValue(':registro_id', $this->registro_id);
    $stmt->bindValue(':mensagem', $this->mensagem);
    $stmt->bindValue(':ip', $this->ip);
    $stmt->bindValue(':categoria', $this->categoria);
    $stmt->bindValue(':status', $this->status);
    try {
      if ($stmt->execute()) {
        return 200;
      } else {
        $this->gerarLog("Erro ao gerar log | sql: $sql", "sistema");
        return 404;
      }
    } catch (\Exception $error) {
      $this->gerarLog("Erro ao gerar log | error: $error", "sistema");
      return 500;
    }
  }
}
