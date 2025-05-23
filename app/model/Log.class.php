<?php

class Log
{
    private $logPath;

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
        $logFile = $this->logPath . $path.'.log';
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }
    public function lerLogs($file): string
    {
        $logFile = $this->logPath . $file.'.log';

        if (file_exists($logFile)) {
            return file_get_contents($logFile);
        }

        return "Nenhum log encontrado.";
    }
    public function apagarLogs($file): bool
    {
        $logFile = $this->logPath . $file.'.log';

        if (file_exists($logFile)) {
            unlink($logFile);
            return true;
        }

        return false;
    }
    function gerarHash(string $texto): string {
        /**
         * Gera um hash SHA-256 a partir de uma string de entrada.
         *
         * @param string $texto Texto de entrada para gerar o hash
         * @return string Hash no formato hexadecimal
         */
        return hash('sha256', $texto);
    }

    function gerarCodigoValidacao(): string {
        $Usuario = new Usuarios;
        do {
            // Gera um código aleatório
            $codigo = '';
            $caracteres = "0123456789";
            $tamanho = 6;
            $maxIndex = strlen($caracteres) - 1;
            for ($i = 0; $i < $tamanho; $i++) {
                $codigo .= $caracteres[random_int(0, $maxIndex)];
            }
        } while ($Usuario->verificarCodigo($codigo)); // Repete se o código já existir no banco
        
        return $codigo;
    }

}
