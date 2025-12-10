🚗 Sistema Oficina — Versão A (Tema V10)
<img src="https://github.com/user-attachments/assets/87e807be-a049-48d0-a96d-c7b42f6525a8" width="900"/>

Aplicação web completa para gestão de veículos e serviços mecânicos.
Inclui autenticação, CRUD completo, tema escuro moderno (V10), MySQL e PHP.
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

📸 Demonstração
<img src="https://github.com/user-attachments/assets/f51af2a9-1859-4a1c-8a5f-ced4c548fc99" width="900"/> <img src="https://github.com/user-attachments/assets/e680f93c-8d69-49e3-96e6-af05f2191953" width="900"/> <img src="https://github.com/user-attachments/assets/1ab2a4c0-958a-4fb4-9d72-bcc35957e8e5" width="900"/> <img src="https://github.com/user-attachments/assets/a8d2fedf-5f7e-4f9a-8398-9c2119255149" width="900"/>
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
🔧 Requisitos
XAMPP (Apache + MySQL)
PHP 8+
MySQL / MariaDB
Navegador moderno (Chrome, Edge etc.)
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
📥 Como instalar (XAMPP — Windows)
1️⃣ Colocar os arquivos no XAMPP
Extraia a pasta oficina para:
C:\xampp\htdocs\
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
2️⃣ Criar o banco de dados
Acesse:
http://localhost/phpmyadmin

Clique em Importar → selecione:
php/create_db.sql

O script cria:

Banco oficina
Tabela de usuários
Tabela veiculos
Tabela servicos
Usuário inicial padrão:
Usuário	Senha
admin	senha123
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------A senha já está criptografada.

Para gerar uma senha nova:
php -r "echo password_hash('minhasenha', PASSWORD_DEFAULT);"
Cole o hash dentro do SQL antes de importar.
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

3️⃣ Abrir a aplicação
http://localhost/oficina/
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

4️⃣ Login inicial
Use:
Usuário: admin
Senha: senha123
Ou cadastre um novo usuário pelo sistema.
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
📂 Estrutura do Projeto
oficina/
│
├── css/
│   └── estilo.css              # Tema visual V10
│
├── php/
│   ├── config.php              # Configurações
│   ├── conexao.php             # Conexão com MySQL
│   ├── create_db.sql           # Script do BD
│   ├── autentica.php           # Login
│   ├── inserir_*.php           # Inserts
│   ├── atualizar_*.php         # Updates
│   └── excluir_*.php           # Deletes
│
├── restrito/
│   ├── menu.php
│   ├── lista_*.php
│   ├── inserir_*.php
│   └── editar_*.php
│
├── index.php
├── login.php
└── logout.php
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
🔐 Segurança

✔ Senhas com password_hash()
✔ Sessão obrigatória para acessar páginas restritas
✔ Prepared Statements (evita SQL Injection)
✔ Logout limpa completamente a sessão
✔ Bloqueio total sem login
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

🛠 Funcionalidades
👤 Usuários
Login
Logout
Cadastro
Proteção de rotas

🚗 Veículos

CRUD completo:
Cadastrar
Listar
Editar
Excluir
Problema reclamado

Relacionamento com serviços (1 veículo × N serviços)

🔧 Serviços
Descrição
Valor
Data
Relacionado ao veículo
CRUD completo
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
🎨 Interface (Frontend)
Tema escuro moderno (V10)
Bootstrap 5.3
Layout responsivo
Botões, inputs e labels estilizados
Navegação padronizada
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
🧪 Validações

✔ Campos obrigatórios
✔ Tipos corretos (number, date)
✔ Sessão conferida antes de cada ação
✔ SQL Injection prevenido
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
📌 Observações Importantes
Se seu MySQL tiver senha, ajuste php/config.php.
Em produção, desative display_errors.
Verifique logs se der erro (Apache/MySQL).
Se mudar o nome da pasta, atualize BASE_URL no config.
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
🧑‍💻 Autor

Vitor Gabriel (seeshV)
🔗 GitHub: https://github.com/seeshV
🎥 Vídeo da entrega:
https://youtu.be/F1wGPx-OT5M
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
📄 Licença
Projeto livre para fins de estudo e modificação.
