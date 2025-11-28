# 🥜 Sistema de Cadastro Dr Peanut

<p align="center">
  <img src="https://img.shields.io/badge/HTML5-v5.2-330072?style=for-the-badge&logo=html5&logoColor=white" />
  <img src="https://img.shields.io/badge/CSS3-v3.1-E74E0F?style=for-the-badge&logo=css3&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-v8.0-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-Database-005C84?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Figma-Protótipo-330072?style=for-the-badge&logo=figma&logoColor=white" />
  <img src="https://img.shields.io/badge/Status-Em%20Desenvolvimento-FFFFFF?style=for-the-badge&logoColor=330072" />
</p>


🌐 Projeto Website Institucional - Dr. Peanut

Este projeto tem como objetivo o desenvolvimento de um protótipo no Figma e a implementação de um website institucional para a marca Dr. Peanut. A plataforma contempla funcionalidades básicas de gestão, como:

✅ Cadastro de fornecedores  
✅ Cadastro de produtos  
✅ Listagem de produtos disponíveis  

---

## 📦 Escopo da Sprint 1

- Criar protótipo funcional no Figma.  
- Desenvolver páginas principais: Home, Produtos, Contato.  
- Implementar funcionalidades de cadastro e listagem de produtos e fornecedores.  
- Garantir responsividade e boa apresentação visual.

---

## 🛠️ Planejamento e Metodologia

O desenvolvimento seguiu princípios da metodologia ágil, com divisão de tarefas em etapas.

---

## ✨ Funcionalidades Desenvolvidas

- Cadastro de fornecedores  
- Cadastro de produtos  
- Listagem de produtos disponíveis  
- Página institucional com informações da marca  
- Canal de contato via formulário e WhatsApp  

---
 


## 🎨 Paleta de Cores Oficial — Dr. Peanut

| Cor / Uso                              | Código HEX | RGB             | CMYK              |
|----------------------------------------|------------|------------------|--------------------|
| **Branco principal**                   | `#FFFFFF`  | `255, 255, 255`  | —                  |
| **Preto (texto / cor escura principal)** | `#141414`  | `20, 20, 20`     | `75, 65, 65, 80`   |
| **Laranja de destaque**               | `#E74E0F`  | `231, 78, 15`    | `0, 80, 100, 0`    |
| **Roxo complementar**                 | `#330072`  | `51, 0, 114`     | `98, 100, 22, 13`  |


**Tipografia:** Lalezar

**Layout:** Layout clean e moderno, com foco em imagens vibrantes dos produtos, seções bem definidas.

_______________________________________________________________________

## ✅ Critérios de Aceitação

- Site totalmente responsivo em dispositivos móveis

- Todas as páginas e seções funcionais com links corretos

- Formulários operando corretamente, com envio de informações por e-mail

- Interface alinhada com o protótipo desenvolvido no Figma

- Facilidade de navegação e clareza na apresentação dos conteúdos

______________________________________________________________________
## 📸 Protótipo
  
| Página Principal Original | Página Principal de Natal|
|------------------|------------------------|
| <img width="1056" height="788" src="https://github.com/user-attachments/assets/b8ba741f-c29b-4a70-b47b-71c22d262cac" />|<img width="1056" height="788" alt="image" src="https://github.com/user-attachments/assets/f084e069-b211-447b-8cea-1ba78367ebc7" /> 

| Página Cadastre-se Original | Página Cadastre-se de Natal|
|------------------|------------------------|
|<img width="1056" height="788" alt="image" src="https://github.com/user-attachments/assets/964e5a3c-21e3-4d52-a926-d34f95504aee" />|<img width="1056" height="788" alt="image" src="https://github.com/user-attachments/assets/3864102f-de60-41a3-b218-85d8a9bd0b5e" />
______________________________________________________________________
 ---

## 🔗 Links do Protótipo no Figma

- 💻 **Desktop:**  
  https://www.figma.com/design/DeVtQDLZHbx14F7VIqXgtm/Protótipo-Dr-Penaut?node-id=5-2

- 📱 **Mobile:**  
  https://www.figma.com/design/nXUmpX0ut2QLGcmrGHqnV1/Untitled?node-id=0-1

---


## 💻 Tecnologias e Ferramentas Utilizadas

<p align="left">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" width="40" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" width="40" />
  <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/Figma-logo.svg" width="40" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" width="40" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" width="40" />
</p>


- **HTML** – Estruturação das páginas  
- **CSS** – Estilização e responsividade  
- **Figma** – Criação do protótipo visual  
- **PHP** – Processamento no servidor, regras de negócio, autenticação e geração dinâmica de páginas  
- **MySQL** – Armazenamento de dados, relações entre tabelas e consultas do sistema  

---

# 🗄️ Banco de Dados — Dr. Peanut

Estruturado para permitir:

- Cadastro de fornecedores e produtos  
- Edição de dados existentes  
- Exclusão de registros  

---

## 🏗️ Estrutura do Sistema (Banco de Dados)

### 👤 Usuário
- 🆔 `ID (PK)` – Identificador único do usuário  
- 👤 `Nome do Usuário` – Nome do usuário cadastrado  
- 📧 `Email` – Endereço eletrônico do usuário  
- 📞 `Telefone` – Contato telefônico  
- 🔑 `Senha` – Credencial de acesso

---

### 🏢 Fornecedor
- 🆔 `ID (PK)` – Identificador único do fornecedor  
- 🏢 `Nome do Fornecedor` – Nome da empresa ou pessoa jurídica  
- 🪪 `CNPJ` – Documento de identificação fiscal  
- 🏠 `Endereço` – Localização do fornecedor  
- 📞 `Telefone` – Contato telefônico  
- 📧 `Email` – Contato eletrônico  
- 📝 `Observações` – Informações adicionais relevantes  
- 📝✏️ `Edição e Exclusão` – Permite atualizar e remover fornecedores e produtos vinculados  
- 👤 `usuario_id (FK)` – Identificação do usuário responsável pelo cadastro   

---

### 📦 Produto
- 🆔 `ID (PK)` – Identificador único do produto  
- 🏷️ `Nome do Produto` – Nome do item  
- 🔢 `Código (SKU)` – Código interno  
- 📖 `Descrição` – Detalhes do produto  
- 📦 `Quantidade em Estoque` – Unidades disponíveis  
- 💲 `Preço Unitário` – Valor por unidade  
- 🖼️ `Imagens` – Arquivos visuais  
- 🔗 `fornecedor_id (FK)` – Fornecedor responsável  

---

# 🖥️ Implementação PHP no Sistema Dr. Peanut

O PHP é responsável por:

- ⚙️ Processar dados  
- 📦 Manipular registros no banco  
- 📤 Receber formulários  
- 🔄 Validar informações  
- 🔐 Gerenciar sessões  
- 🌐 Criar páginas dinâmicas  

---

## 🏗️ Arquitetura dos Arquivos PHP

### 🧱 **conexao.php**
Conecta o sistema ao MySQL e define o charset padrão.

---

### 🔐 Autenticação

- `fazer_login.php` — Valida credenciais e cria a sessão 
- `sair.php` — Encerra sessão e redireciona  sair.php

---

### 👤 Usuários

- `salvar_usuario.php` — Cadastro de novos usuários 

---

### 🏢 Fornecedores

- `salvar_fornecedor.php` — Cadastro de fornecedores 
- `delete_fornecedor.php` — Exclusão via ID  

---

### 📦 Produtos

- `salvar_produto.php` — Cadastro + upload de imagens  
- `delete_produto.php` — Exclusão via ID  delete_produto.php

---

## 🎯 Objetivos do Sistema PHP

- ➕ Cadastrar usuários, fornecedores e produtos  
- ✏️ Editar registros  
- 🗑️ Excluir dados  
- 🔗 Relacionar fornecedores e produtos  
- 🔐 Autenticação com login e sessão  
- 🖼️ Upload de imagens  
- 🌐 Páginas dinâmicas geradas com PHP  


_____________________________________________

## 🗂️ Diagrama 

<img width="598" height="335" alt="image" src="https://github.com/user-attachments/assets/1b9c11a3-ed12-42d9-9578-ef22ba9d8b92" />



_______________________________________________________________


## 🧠 Aprendizados

- Metodologias ágeis na prática  
- Integração entre Design e Front-end  
- Uso de Git e GitHub  
- Estruturação de banco de dados  
- Implementação de fluxos de cadastro e listagem  

---

## 💬 Contato

[![Email](https://img.shields.io/badge/Email-contato@code6.dev-E74E0F?style=for-the-badge&logo=gmail&logoColor=white)](mailto:contato@code6.dev)  
[![WhatsApp](https://img.shields.io/badge/WhatsApp-(11)%2091234--5678-25D366?style=for-the-badge&logo=whatsapp&logoColor=white)](https://wa.me/5511912345678)  
[![Telefone](https://img.shields.io/badge/Telefone-(11)%203456--7890-141414?style=for-the-badge&logo=phone&logoColor=white)]()  
[![Website](https://img.shields.io/badge/Site-www.code6.dev-330072?style=for-the-badge&logo=google-chrome&logoColor=white)](https://www.code6.dev)

---

## 👥 Equipe

| Nome                          | Função        | Contato                          |
|-------------------------------|---------------|----------------------------------|
| Ana Carolina da Fonseca Souza | Desenvolvedora| ana.c.souza150@aluno.senai.br   |
| Evellyn Silva de Lima         | Desenvolvedora| evellyn.s.lima6@aluno.senai.br  |
| Gustavo Henrique F. Barreto   | Desenvolvedor | gustavo.h.barreto6@aluno.senai.br |
| Isabella Dias da Silva        | Scrum Master  | isabella.d.silva7@aluno.senai.br |
| Leonardo Alves Leão           | Desenvolvedor | leonardo.a.leao@aluno.senai.br |
| Pedro de Oliveira             | Desenvolvedor | pedro.oliveira23@aluno.senai.br |


