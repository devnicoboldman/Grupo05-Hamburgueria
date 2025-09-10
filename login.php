<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Aqui você coloca sua lógica de validação de login
    if ($email === "teste@teste.com" && $senha === "1234") {
        $_SESSION["usuario"] = $email;
        header("Location: meu_pedido.php");
        exit();
    } else {
        $erro = "Email ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #0a0a0a;
            color: white;
        }

        .navbar {
            background-color: #c00;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-left {
            font-size: 32px;
            font-weight: bold;
        }

        .navbar-right a {
            color: white;
            text-decoration: none;
            margin-left: 30px;
            font-size: 20px;
        }

        .navbar-right a:hover {
            text-decoration: underline;
            color: #ffcccc;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 60px;
        }

        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 80px;
            color: #c00;
            margin-bottom: 40px;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 300px;
        }

        label {
            font-size: 22px;
            margin-bottom: 10px;
        }

        input[type="email"],
        input[type="password"] {
            padding: 10px;
            font-size: 18px;
            margin-bottom: 20px;
            background-color: #c00;
            border: none;
            color: white;
        }

        input[type="submit"] {
            padding: 12px;
            font-size: 18px;
            background-color: #c00;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #a00;
        }

        .link-registro {
            margin-top: 20px;
            font-size: 16px;
        }

        .link-registro a {
            color: #ff6666;
            text-decoration: none;
        }

        .link-registro a:hover {
            text-decoration: underline;
        }

        .erro {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="navbar-left">LOGIN</div>
        <div class="navbar-right">
            <a href="cardapio.php">CARDÁPIO</a>
            <a href="carrinho.php">MEU CARRINHO</a>
            <span style="font-size: 26px;">👤</span>
        </div>
    </div>

    <div class="container">
        <div class="avatar">👤</div>

        <?php if (!empty($erro)) echo "<div class='erro'>$erro</div>"; ?>

        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <input type="submit" value="Entrar">
        </form>

        <div class="link-registro">
            Já possui uma conta? Se não, <a href="cadastro.php">faça agora!</a>
        </div>
    </div>

</body>
</html>





