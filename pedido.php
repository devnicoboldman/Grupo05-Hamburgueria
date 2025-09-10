<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit;
}
?>

<?php include 'includes/header.php'; ?>

<h2>Meu Pedido</h2>

<p>Endereço: <?= $_SESSION['usuario']['endereco']; ?></p>
<p>Forma de pagamento: PIX - QR Code</p>

<a href="confirmado.php" class="btn">Fazer pedido</a>

<?php include 'includes/footer.php'; ?>

