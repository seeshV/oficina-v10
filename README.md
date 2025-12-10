# Sistema Oficina - Versão A (V10 theme)

### Como usar (XAMPP - Windows)
1. Extraia a pasta `oficina` para `C:\xampp\htdocs\` (ou `E:\xampp\htdocs\` se for seu caso).
2. Abra o **phpMyAdmin** (http://localhost/phpmyadmin) e execute o arquivo `php/create_db.sql` para criar o banco e tabelas (ou importe pelo botão Import).
   - O script já adiciona um usuário `admin` com senha `senha123` (hash já incluso). Se quiser trocar a senha, gere um novo hash PHP: `php -r "echo password_hash('novaSenha', PASSWORD_DEFAULT);"` e substitua no SQL antes de importar.
3. No navegador acesse `http://localhost/oficina/`
4. Login: `admin` / `senha123` (pode cadastrar outro usuário via formulário)

### Estrutura
- `php/` - scripts de conexão e ações (INSERT/UPDATE/DELETE)
- `restrito/` - áreas protegidas (menu, listas, formulários)
- `css/estilo.css` - tema V10
- `php/create_db.sql` - script para criar DB + dados iniciais

### Observações
- Ajuste `php/config.php` se seu servidor MySQL não usar root sem senha.
- Em produção, desative display_errors em config.php.
- Se algo falhar, verifique permissões e logs do Apache/MySQL.
