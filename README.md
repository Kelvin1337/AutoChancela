# 🚗 Sistema de Login e Cadastro de Veículos

![GitHub repo size](https://img.shields.io/github/repo-size/SEU_USUARIO/SEU_REPOSITORIO)
![GitHub language count](https://img.shields.io/github/languages/count/SEU_USUARIO/SEU_REPOSITORIO)
![GitHub top language](https://img.shields.io/github/languages/top/SEU_USUARIO/SEU_REPOSITORIO)
![GitHub issues](https://img.shields.io/github/issues/SEU_USUARIO/SEU_REPOSITORIO)
![GitHub license](https://img.shields.io/github/license/SEU_USUARIO/SEU_REPOSITORIO)

---

## 📌 Introdução
Este projeto oferece uma solução prática para **gestão de usuários e veículos** em ambientes acadêmicos ou corporativos.  
O sistema permite que cada aluno/usuário tenha acesso a uma **área exclusiva**, onde pode se registrar, realizar login e cadastrar seus veículos de forma simples e organizada.  

Foco em **usabilidade**, **design moderno responsivo** e **segurança na autenticação**.

---

## 🎯 Funcionalidades
- **Tela de Login e Registro**
  - Autenticação de usuários via RA (Registro Acadêmico) e senha.
  - Registro de novos usuários com nome, RA, e-mail e senha.
  - Validação de termos de uso obrigatória.
  - Recuperação de senha com link dedicado.

- **Tela de Gerenciamento de Veículos**
  - Exibição de lista personalizada de veículos do usuário.
  - Cadastro de novos veículos com informações:
    - Tipo (Carro, Moto, Caminhão, Outro).
    - Modelo.
    - Cor.
    - Ano.
    - Placa (padrão brasileiro).
  - Edição e exclusão de veículos já cadastrados.
  - Interface simples, intuitiva e responsiva.

---

## 🛠 Tecnologias Utilizadas
- **Frontend**: HTML, CSS e JavaScript  
- **Backend**: PHP  
- **Banco de Dados**: MySQL  
- **Bibliotecas/Recursos**:  
  - [Boxicons](https://boxicons.com/) → ícones modernos  
  - [Font Awesome](https://fontawesome.com/) → ícones adicionais  
  - [SweetAlert2](https://sweetalert2.github.io/) → alertas interativos  
  - **Responsividade** com CSS3 e Flexbox  

---

## 📂 Estrutura do Sistema
- `index.php` → Tela inicial com login e registro de usuários.  
- `cadastro.php` → Cadastro de novos usuários.  
- `login.php` → Autenticação de login.  
- `logout.php` → Finaliza a sessão do usuário.  
- `pages/veiculos/` → Tela de gerenciamento de veículos (listagem, cadastro e edição).  
- `pages/termos/` → Página de termos de uso.  
- `pages/esqueceu_senha/` → Recuperação de senha.  

---

## 🔄 Fluxo do Sistema

```mermaid
flowchart TD
    A[🔑 Tela de Login] -->|Usuário novo| B[📝 Tela de Registro]
    A -->|Usuário existente| C[✔️ Autenticação]
    B -->|Cadastro concluído| A
    C -->|Login válido| D[🚙 Gerenciamento de Veículos]
    C -->|Login inválido| A

    D --> E[📋 Listar Veículos]
    D --> F[➕ Cadastrar Novo Veículo]
    D --> G[✏️ Editar Veículo]
    D --> H[🗑️ Excluir Veículo]
    D --> I[🚪 Logout]
