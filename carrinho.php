<?php
session_start();

// Simulação de login
$usuario_logado = isset($_SESSION['usuario']); // true se estiver logado

// Produtos disponíveis (imagem, preço)
$produtos = [
    "Clássico do Rock" => ["img/classicodorock.jpeg", 35],
    "Solo Apimentado" => ["img/soloapimentado.jpeg", 39],
    "Batida Vegana" => ["img/batidavegana.jpeg", 38],
];

// Inicializa carrinho de exemplo com 3 itens
if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = [
        "Clássico do Rock" => 1,
        "Solo Apimentado" => 2,
        "Batida Vegana" => 1,
    ];
}

// Atualizar quantidades
if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
    $item = $_POST['item'];

    if($acao == "aumentar"){
        $_SESSION['carrinho'][$item]++;
    } elseif($acao == "diminuir"){
        if($_SESSION['carrinho'][$item] > 1){
            $_SESSION['carrinho'][$item]--;
        } else {
            unset($_SESSION['carrinho'][$item]);
        }
    } elseif($acao == "remover"){
        unset($_SESSION['carrinho'][$item]);
    }
}

// Aplicar cupom
$desconto = 0;
$mensagem_cupom = "";
if(isset($_POST['aplicar_cupom'])){
    $cupom = strtoupper(trim($_POST['cupom']));
    // Exemplo: cupom DESCONTO10 aplica 10% de desconto
    if($cupom == "DESCONTO10"){
        $desconto = 0.10;
        $mensagem_cupom = "Cupom aplicado! 10% de desconto.";
    } else {
        $mensagem_cupom = "Cupom inválido.";
    }
}

// Calcular valores
$subtotal = 0;
foreach($_SESSION['carrinho'] as $item => $qtd){
    $subtotal += $produtos[$item][1] * $qtd;
}
$valor_desconto = $subtotal * $desconto;
$total = $subtotal - $valor_desconto;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrinho</title>
<style>
body {background:#000; color:#fff; font-family:Arial,sans-serif; margin:0; padding:0;}
header{background:#c00; padding:15px; text-align:center;}
header a{color:#fff; margin:0 20px; text-decoration:none; font-weight:bold;}
.container{max-width:1000px; margin:40px auto; padding:20px;}
h1{color:#c00;}
.carrinho-item{display:flex; align-items:center; background:#111; margin-bottom:15px; padding:10px; border-radius:10px;}
.carrinho-item img{width:80px; height:80px; object-fit:contain; margin-right:15px;}
.carrinho-info{flex:1;}
.carrinho-info h3{margin:0 0 5px 0; color:#fff;}
.carrinho-info span{color:#c00; font-weight:bold;}
.carrinho-acoes button{margin-right:5px; padding:5px 10px; cursor:pointer; border-radius:5px; border:none; background:#c00; color:#fff; font-weight:bold;}
.resumo{background:#111; padding:15px; border-radius:10px; margin-top:20px;}
input[type=text]{padding:5px; width:150px; margin-right:5px;}
button#continuar{background:#0a0; width:100%; padding:10px; border:none; border-radius:10px; font-weight:bold; color:#fff; margin-top:10px; cursor:pointer;}
.mensagem{color:#0f0; margin-top:10px;}
.alerta{color:#f00; margin-top:10px;}
</style>
</head>
<body>
<header>
<a href="index.php">LOGIN</a>
<a href="cardapio.php">CARDÁPIO</a>
<a href="carrinho.php">MEU CARRINHO</a>
</header>

<div class="container">
<h1>Meu Carrinho</h1>

<?php if(empty($_SESSION['carrinho'])): ?>
<p>Seu carrinho está vazio.</p>
<?php else: ?>
    <?php foreach($_SESSION['carrinho'] as $item => $qtd): ?>
    <div class="carrinho-item">
        <img src="<?php echo $produtos[$item][0]; ?>" alt="<?php echo $item; ?>">
        <div class="carrinho-info">
            <h3><?php echo $item; ?></h3>
            <span>R$ <?php echo number_format($produtos[$item][1]*$qtd,2,",","."); ?></span> - <?php echo $qtd; ?> unidade(s)
        </div>
        <div class="carrinho-acoes">
            <form method="POST" style="display:inline;">
                <input type="hidden" name="item" value="<?php echo $item; ?>">
                <button type="submit" name="acao" value="aumentar">+</button>
                <button type="submit" name="acao" value="diminuir">-</button>
                <button type="submit" name="acao" value="remover">X</button>
            </form>
        </div>
    </div>
    <?php endforeach; ?>

    <a href="cardapio.php"><button style="margin-top:10px;">Adicionar mais itens</button></a>

    <!-- Cupom -->
    <div style="margin-top:15px;">
        <form method="POST">
            <input type="text" name="cupom" placeholder="Código do cupom">
            <button type="submit" name="aplicar_cupom">Aplicar</button>
        </form>
        <?php if($mensagem_cupom): ?>
            <div class="mensagem"><?php echo $mensagem_cupom; ?></div>
        <?php endif; ?>
    </div>

    <!-- Resumo -->
    <div class="resumo">
        <p>Subtotal: R$ <?php echo number_format($subtotal,2,",","."); ?></p>
        <p>Desconto: R$ <?php echo number_format($valor_desconto,2,",","."); ?></p>
        <p><strong>Total: R$ <?php echo number_format($total,2,",","."); ?></strong></p>
    </div>

    <!-- Continuar -->
    <?php if($usuario_logado): ?>
        <form action="pedido.php">
            <button id="continuar">Continuar para Pedido</button>
        </form>
    <?php else: ?>
        <div class="alerta">
            Você precisa se cadastrar para continuar. <a href="cadastro.php" style="color:#0f0;">Clique aqui para se cadastrar</a>
        </div>
    <?php endif; ?>
<?php endif; ?>

</div>
</body>
</html>

