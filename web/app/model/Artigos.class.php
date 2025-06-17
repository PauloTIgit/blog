<?php

class Artigos extends Ligacao
{
  private int $id;
  private string $titulo;
  private string $slug;
  private string $resumo;
  private string $capa;
  private string $conteudo;
  private string $autor;
  private int $status;
  private DateTime $dataCadastro;

  // Public

  public function CadastrarArtigo($data)
  {
    $this->setArtigo(
      titulo: $data['titulo'],
      resumo: $data['resumo'],
      capa: $data['capa'],
      conteudo: $data['conteudo'],
      autor: $data['autor'],
      status: $data['status']
    );

    if ($this->salvar()) {
      return [
        'status' => 200,
        'success' => true,
        'msg' => 'Artigo cadastrado com sucesso!',
        'data' => [
          'titulo' => $data['titulo'],
          'slug' => $this->slug,
        ]
      ];
    } else {
      return [
        'status' => 400,
        'success' => false,
        'msg' => 'Erro interno ao cadastrar o artigo.',
        'data' => []
      ];
    }
  }

  public function ListarArtigos($status = null)
  {
    $result = $this->getArtigos($status);

    if ($result === 404 || $result === 500) {
      return print_r(json_encode([
        'status' => 400,
        'success' => false,
        'msg' => 'Erro ao interno. Contate o suporte!',
        'data' => ['resultado' =>  $result]
      ]));
    }

    if ($result === []) {
      return print_r(json_encode([
        'status' => 200,
        'success' => false,
        'msg' => 'Nehum Artigo no momento!',
        'data' => [
          'result' => $result,
        ]
      ]));
    }

    return $result;
  }

  // Protected

  protected function setArtigo(string $titulo, string $resumo, string $capa, string $conteudo, string $autor, int $status)
  {
    $this->titulo = $titulo;
    $this->slug = $this->gerarSlug($titulo);
    $this->resumo = $resumo;
    $this->capa = $capa;
    $this->conteudo = $conteudo;
    $this->autor = $autor;
    $this->status = $status;
    $this->dataCadastro = new DateTime();
  }

  protected function salvar(): bool
  {
    $sql = 'INSERT INTO artigos (
                titulo, slug, resumo, capa, conteudo, autor, status, dataCadastro
            ) VALUES (
                :titulo, :slug, :resumo, :capa, :conteudo, :autor, :status, :dataCadastro
            )';

    $conexao = $this->conecta();
    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':titulo', $this->titulo);
    $stmt->bindValue(':slug', $this->slug);
    $stmt->bindValue(':resumo', $this->resumo);
    $stmt->bindValue(':capa', $this->capa);
    $stmt->bindValue(':conteudo', $this->conteudo);
    $stmt->bindValue(':autor', $this->autor);
    $stmt->bindValue(':status', $this->status);
    $stmt->bindValue(':dataCadastro', $this->dataCadastro->format("Y-m-d H:i"));

    try {
      if ($stmt->execute()) {
        return true;
      } else {
        $this->logArtigo("Erro ao cadastrar artigo | sql: $sql", "artigo");
        return false;
      }
    } catch (\Exception $error) {
      $this->logArtigo("Erro ao cadastrar artigo | error: $error", "artigo");
      return false;
    }
  }

  protected function gerarSlug($titulo): string
  {
    $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', trim($titulo)));
    return rtrim($slug, '-');
  }

  protected function getArtigos($status)
  {
    $conexao = $this->conecta();

    $sql = 'SELECT * FROM artigos';

    if (!is_null($status)) {
      $sql .= ' WHERE status = :status';
    }

    $sql .= ' ORDER BY criado_em DESC';

    $stmt = $conexao->prepare($sql);

    if (!is_null($status)) {
      $stmt->bindValue(':status', $status);
    }

    try {
      if ($stmt->execute()) {
        $data = [];
        $item = 0;

        foreach ($stmt->fetchAll() as $value) {
          $data[$item] = [
            'id' => $value['id'],
            'titulo' => $value['titulo'],
            'descricao' => $value['descricao'],
            'conteudo' => $value['conteudo'],
            'imagem_capa' => $value['imagem_capa'],
            'categoria_id' => $value['categoria_id'],
            'criado_em' => $value['criado_em'],
            'atualizado_em' => $value['atualizado_em'],
            'status' => $value['status'],
          ];
          $item++;
        }

        return print_r(json_encode([
          'status' => 200,
          'success'  => true,
          'msg' => 'Manutenção',
          'data' => $data
        ]));
      } else {
        $this->logArtigo("Erro ao listar artigos | sql: $sql", "artigo");
        return 404;
      }
    } catch (\Exception $error) {
      $this->logArtigo("Erro ao listar artigos | error: $error", "artigo");
      return 500;
    }
  }

  protected function logArtigo($mensage, $type)
  {
    $logClass = new Log();
    $logClass->gerarLog($mensage, $type, 'artigo');
  }
}
