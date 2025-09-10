 

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Rock n' Burguer</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <nav>
      <a href="index.php">INÍCIO</a>
      <a href="cardapio.php">CARDÁPIO</a>
      <a href="carrinho.php">MEU CARRINHO</a>
      <?php if (isset($_SESSION['usuario'])): ?>
        <span>Olá, <?= $_SESSION['usuario']['nome']; ?></span>
      <?php else: ?>
        <a href="login.php">LOGIN</a>
      <?php endif; ?>
    </nav>
  </header>
