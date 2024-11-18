### **README.md**  

# Sistema de Notas Escolares  

Bem-vindo ao **Sistema de Notas Escolares**, uma aplicação desenvolvida para gerenciar o login de usuários e facilitar a navegação entre funcionalidades internas, como registro e consulta de informações escolares.

---

## **Tecnologias Utilizadas**
- **Linguagem de programação:** PHP
- **Banco de dados:** MySQL
- **Frontend:** HTML5, CSS3
- **Bibliotecas:** Google Fonts

---

## **Funcionalidades**
1. **Tela de Login**  
   - Autenticação de usuários com verificação de credenciais no banco de dados.  
   - Redirecionamento seguro após login bem-sucedido.  

2. **Sessões**  
   - Gerenciamento de sessões para identificar usuários logados.  

3. **Conexão ao Banco de Dados**  
   - Classe dedicada para realizar a conexão com o banco.  
   - Verificação de erros e segurança por meio de *prepared statements*.  

---

## **Como Instalar**
### Pré-requisitos:
1. Servidor web local (exemplo: XAMPP, WAMP).  
2. PHP 7.4 ou superior.  
3. MySQL instalado e configurado.  

### Passos:
1. Clone este repositório:
   ```bash
   git clone <URL_DO_REPOSITORIO>
   ```
2. Importe o arquivo `database.sql` para o MySQL para criar as tabelas necessárias.  
3. Configure as credenciais do banco no arquivo `class/Login.php`:
   ```php
   $host = "localhost";
   $dbname = "escola";
   $user = "root";
   $password = "";
   ```
4. Coloque os arquivos em uma pasta acessível pelo seu servidor local (exemplo: `htdocs` no XAMPP).  

---

## **Como Usar**
1. Acesse a aplicação pelo navegador:  
   ```
   http://localhost/nome-do-projeto
   ```
2. Faça login utilizando as credenciais cadastradas no banco de dados.  
3. Após o login, você será redirecionado à página principal.

---

## **Segurança**
- Utilização de `mysqli_real_escape_string` para evitar ataques de *SQL Injection*.  
- Sessões seguras para proteger informações do usuário.  

---

## **Melhorias Futuras**
1. Implementar hash para senhas utilizando `password_hash`.  
2. Criar um sistema de gerenciamento de usuários e permissões.  
3. Adicionar página de recuperação de senha.  
4. Melhorar a interface com bibliotecas modernas como Bootstrap.  

---

## **Contribuição**
Sinta-se à vontade para contribuir com o projeto enviando um *pull request* ou relatando *issues*.  

---

 **Autor**
Desenvolvido por **[JOAQUIM FELIPE]**.  

Se tiver dúvidas ou sugestões, entre em contato por e-mail: [seu-email@dominio.com](Joaquim:seu-email@dominio.com).  

---  

## **Licença**
Este projeto está licenciado sob a licença MIT. Consulte o arquivo `LICENSE` para mais detalhes.  