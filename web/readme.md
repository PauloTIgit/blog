# 🧠 Sistema de Artigos com PHP MVC - Projeto de Estudo

![Status](https://img.shields.io/badge/status-em%20desenvolvimento-yellow)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-blue)
![License](https://img.shields.io/badge/license-MIT-lightgrey)

Este projeto é um sistema simples de autenticação e gerenciamento de artigos desenvolvido com **PHP puro**, usando **arquitetura MVC personalizada** e executado em ambiente **XAMPP**. Ele serve como plataforma de estudo para aprimorar técnicas de desenvolvimento, estruturação de código limpo e aplicação de boas práticas.

---

## 🚀 Funcionalidades

- ✅ Login e Logout de usuários
- ✅ Cadastro de usuários
- ✅ Criação e visualização de artigos
- ✅ Associação de artigo com autor
- ✅ Página protegida para ações internas
- ✅ Registro de logs
- ✅ Lógica central via `Licacao.class.php`

---

## 🛠️ Tecnologias e recursos utilizados

- **PHP 8+**
- **MySQL (via phpMyAdmin no XAMPP)**
- **Tailwind CSS**
- **XAMPP (Apache + MySQL local)**
- Sem uso de frameworks externos – 100% **PHP estruturado com MVC**

---

## 📂 Estrutura do Projeto

```bash 
  /App 
  /Controller
  ArtigoController.php
  UsuarioController.php
  /Model
  ArtigoModel.php
  UsuarioModel.php
  /View
  /Artigo
  /Usuario
  /Service (futuramente)
  /Repository (futuramente)
  /Core
  App.php
  Route.php
  /public
  index.php
  /config
  config.php
  /routes
  web.php
```


---

## 📌 Princípios e práticas aplicadas

- ✅ **Object Calisthenics** (regras de design orientado a objetos)
- ✅ Separação clara entre camadas (MVC)
- ✅ Código limpo e com nomes descritivos
- ✅ Evita duplicações e responsabilidades múltiplas
- ✅ Código comentado e fácil de manter
- 🚧 Padrões planejados: Service Layer, Repository, DTO

---

## 💡 Como rodar o projeto localmente

### Pré-requisitos:
- PHP 8+
- MySQL
- Servidor local (Apache/Nginx ou PHP embutido)

### Passo a passo:

1. **Clone o repositório**
   ```bash
   git clone https://github.com/seuusuario/seurepositorio.git
   cd seurepositorio
   ```

2. **Coloque o projeto dentro de:**

```bash
  C:/xampp/htdocs/SeuProjeto/
```

3. **Configure o banco de dados no phpMyAdmin**

 - Acesse: http://localhost/phpmyadmin
 - Crie o banco de dados (ex: estudo_artigos)
 - Importe o arquivo banco.sql, ou crie as tabelas manualmente

4. **Edite o arquivo ``/app/model/Ligacao.class.php`` com os dados do seu MySQL local**

```bash
  private $server = 'mysql:host=localhost;dbname=blog';
  private $user = 'root';
  private $pass = '';
```

5. **Acesse o sistema no navegador**

```bash
  http://localhost/blog
```

📚 Propósito do projeto
Este projeto é educacional, criado com o objetivo de:

 - Aprimorar o tempo e clareza no desenvolvimento
 - Praticar estruturação de código e padrões como MVC
 - Aplicar regras do Object Calisthenics (ex: uma instrução por linha, nomes significativos, etc.)
 - Evoluir para o uso de padrões como Service Layer, Repository, DTO e testes

📈 Próximos passos planejados

 - Refatorar com camadas Service e Repository
 - Implementar autenticação segura com password_hash
 - Adicionar testes automatizados com PHPUnit
 - Criar API REST para artigos
 - Adicionar paginação e ordenação
 - Implementar painel administrativo com mais recursos

👨‍💻 Autor
Paulo Fernando Ferreira Pires
Desenvolvedor FullStack e microempreendedor