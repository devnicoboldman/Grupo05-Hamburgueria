<?php
// Ssssssss formulário for enviado, processa os dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];

    // Aqui você pode salvar em um banco de dados futuramente
    echo "<script>alert('Cadastro realizado com sucesso!');</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #c00;
      padding: 15px;
      text-align: center;
    }
    header a {
      color: #fff;
      margin: 0 20px;
      text-decoration: none;
      font-weight: bold;
    }
    .container {
      max-width: 600px;
      margin: 40px auto;
      padding: 20px;
      background: #111;
      border-radius: 10px;
    }
    .container img {
      display: block;
      margin: 0 auto 20px;
      width: 100px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: none;
      border-radius: 5px;
      background: #c00;
      color: #fff;
    }
    .metade {
      width: 48%;
      display: inline-block;
    }
    button {
      background: #c00;
      color: #fff;
      padding: 15px;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-weight: bold;
      width: 100%;
    }
    
 footer {
  background: #c00;
  padding: 5px; /* Antes era 10px, agora menor */
  position: fixed;
  bottom: 0;
  width: 100%;
  text-align: center;
  font-size: 12px; /* Fonte menor */
}

    
  </style>
</head>
<body>
  <header>
    <a href="index.php">LOGIN</a>
    <a href="cardapio.php">CARDÁPIO</a>
    <a href="carrinho.php">MEU CARRINHO</a>
  </header>

  <div class="container">
    <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Usuário">
    <form method="POST" action="">
      <label>Nome completo:</label>
      <input type="text" name="nome" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Telefone:</label>
      <input type="text" name="telefone" required>

      <label>Criar senha:</label>
      <input type="password" name="senha" required>

      <label>Repetir senha:</label>
      <input type="password" name="senha2" required>

      <label>Endereço:</label>
      <input type="text" name="endereco" required>

      <label>Bairro:</label>
      <input type="text" name="bairro" required>

      <button type="submit">FINALIZAR</button>
    </form>
  </div>

  <footer>
    <p>© 2025 Rock N Burguer</p>
  </footer>
</body>
</html>
