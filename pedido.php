<?php
session_start();

// Produtos disponíveis com imagem e preço
$produtos = [
    "Clássico do Rock" => ["img/classicodorock.jpeg", 35],
    "Combo Apimentado" => ["img/comboapimentado.png", 55],
    "Combo Bacon Distortion" => ["img/combobacon.png", 55],
    "Batata Grande" => ["img/batata.jpeg", 25],
    "Coca-Cola 500ml" => ["img/coca.jpeg", 15],
    
];

// Adicionar produto
if(isset($_POST['adicionar'])){
    $produto = $_POST['produto'];
    $quantidade = intval($_POST['quantidade']);

    if(isset($_SESSION['carrinho'][$produto])){
        $_SESSION['carrinho'][$produto] += $quantidade;
    } else {
        $_SESSION['carrinho'][$produto] = $quantidade;
    }
}

// Limpar carrinho
if(isset($_POST['limpar'])){
    $_SESSION['carrinho'] = [];
}

// Gerar PIX (simulação simples)
$pix = "";
if(isset($_POST['gerar_pix'])){
    $total = 0;
    foreach($_SESSION['carrinho'] as $item => $qtd){
        $total += $produtos[$item][1] * $qtd;
    }
    // Aqui você poderia gerar o QR Code real usando uma biblioteca
    $pix = "PIX gerado para R$ " . number_format($total,2,",",".");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meu Pedido</title>
<style>
body { background-color: #000; color:#fff; font-family: Arial,sans-serif; margin:0; padding:0;}
header{background:#c00; padding:15px; text-align:center;}
header a{color:#fff; margin:0 20px; text-decoration:none; font-weight:bold;}
.container{max-width:1200px; margin:40px auto; padding:20px;}
h1,h2{color:#c00;}
.card-grid{display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:20px;}
.card{background:#111; border-radius:10px; overflow:hidden; text-align:center; padding:15px; border:1px solid #333; position:relative;}
.card img{width:100px; height:100px; object-fit:contain; margin-bottom:10px;}
.card h3{font-size:18px; margin-bottom:5px; color:#fff;}
.card span{font-weight:bold; color:#c00;}
button{background:#c00; color:#fff; border:none; padding:10px; width:100%; border-radius:20px; cursor:pointer; font-weight:bold; margin-top:5px;}
input[type=number]{width:60px; padding:5px; margin-top:5px;}
footer{background:#c00; padding:5px; position:fixed; bottom:0; width:100%; text-align:center; font-size:12px;}
.mensagem{color:#0f0; font-weight:bold; margin:10px 0;}
</style>
</head>
<body>
<header>
    <a href="index.php">LOGIN</a>
    <a href="cardapio.php">CARDÁPIO</a>
    <a href="carrinho.php">MEU CARRINHO</a>
</header>

<div class="container">
<h1>Meu Pedido</h1>

<!-- Lista de produtos -->
<div class="card-grid">
<?php foreach($produtos as $nome => $info): ?>
<div class="card">
    <img src="<?php echo $info[0]; ?>" alt="<?php echo $nome; ?>">
    <h3><?php echo $nome; ?></h3>
    <span>R$ <?php echo number_format($info[1],2,",","."); ?></span>
    <form method="POST">
        <input type="hidden" name="produto" value="<?php echo $nome; ?>">
        <input type="number" name="quantidade" value="1" min="1">
        <button type="submit" name="adicionar">Adicionar ao carrinho</button>
    </form>
</div>
<?php endforeach; ?>
</div>

<!-- Carrinho -->
<h2>Itens no Carrinho</h2>
<?php if(empty($_SESSION['carrinho'])): ?>
    <p>Seu carrinho está vazio.</p>
<?php else: ?>
    <ul>
    <?php $total=0; foreach($_SESSION['carrinho'] as $item => $qtd): 
        $preco = $produtos[$item][1]; 
        $subtotal = $preco * $qtd;
        $total += $subtotal;
    ?>
        <li><?php echo $item; ?> - <?php echo $qtd; ?>x - R$ <?php echo number_format($subtotal,2,",","."); ?></li>
    <?php endforeach; ?>
    </ul>
    <h2>Total: R$ <?php echo number_format($total,2,",","."); ?></h2>

    <form method="POST">
        <button type="submit" name="limpar">Limpar Carrinho</button>
    </form>

    <form method="POST">
        <button type="submit" name="gerar_pix">Gerar PIX</button>
    </form>

    <?php if($pix): ?>
        <div class="mensagem"><?php echo $pix; ?></div>
    <?php endif; ?>
<?php endif; ?>

</div>

<footer>
<p>© 2025 Rock N Burguer</p>
</footer>
</body>
</html>



