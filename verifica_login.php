<?php
// Inicia a sessão
session_start();

// Conecta ao banco de dados (exemplo com MySQLi)
$host = "localhost";
$usuario = "root";
$senha = ""; // ou sua senha do MySQL
$banco = "seu_banco"; // nome do seu banco de dados

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário
$email = $_POST['usuario'];
$senha_digitada = $_POST['senha'];

// Verifica se o usuário existe e a senha está correta
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha_digitada'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Login bem-sucedido
    $_SESSION['usuario'] = $email;

    // Redireciona para pedido.php
    header("Location: pedido.php");
    exit();
} else {
    // Login falhou
    echo "<script>alert('Email ou senha inválidos.'); window.location.href='login.php';</script>";
}

// Fecha conexão
$conn->close();
?>
