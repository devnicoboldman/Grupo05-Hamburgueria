 

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rock n' Burguer</title>
  <!-- Fonte Outfit (Google Fonts) -->
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>

    <nav class="navbar">
      <div class="logo">
      <a href="index.php">
        <img src="img/LOGOATUAL.png" alt="Rock n' Burguer" height="80">
      </a>
    </div>

    <div class="menu">
      <a href="index.php">Ínicio</a>
      <a href="cardapio.php">Cardápio</a>
      <a href="carrinho.php">Meu carrinho</a>
      <?php if (isset($_SESSION['usuario'])): ?>
        <span>Olá, <?= $_SESSION['usuario']['nome']; ?></span>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>
    </div>
    </nav>
  </header>
