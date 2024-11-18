
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
   git clone <https://github.com/Merllynsnxnx/Sistema-Alunos.git>
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
   http://localhost/Sistema-Alunos
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


--- IMAGENS ---
![Captura de tela 2024-11-15 232712](https://github.com/user-attachments/assets/4c95b80a-cf71-47a3-a8c5-efee55acc73a)
![Captura de tela 2024-11-15 232721](https://github.com/user-attachments/assets/8ce47125-876f-46af-b889-e7283834dc64)
![Captura de tela 2024-11-15 232747](https://github.com/user-attachments/assets/c07c9ac7-b43f-46c5-96d6-5d8d8c731ee5)
![Captura de tela 2024-11-15 232810](https://github.com/user-attachments/assets/78c8de73-79b9-4446-85e4-84f5acd1f2f2)
![Captura de tela 2024-11-15 232940](https://github.com/user-attachments/assets/3f2b3b35-113f-4ab1-bc20-8745271a53d6)
![Captura de tela 2024-11-15 233106](https://github.com/user-attachments/assets/0a4040d9-3a9c-463b-ba4f-94c2452f5b1d)
![Captura de tela 2024-11-15 232859](https://github.com/user-attachments/assets/4e6f62a1-b339-4dbe-82c4-c56047906111)
![Captura de tela 2024-11-15 233135](https://github.com/user-attachments/assets/38f41ba6-c543-45c8-a0ee-fa3420568fdc)




