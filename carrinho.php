<?php
session_start();

// Simulação: descomente para testar login
// $_SESSION['usuario'] = "Cliente Teste";

$logado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho</title>
  <style>
    body{background:#000;color:#fff;font-family:Arial;margin:0;padding:0;}
    header{background:#c00;padding:15px;text-align:center;}
    header a{color:#fff;margin:0 15px;text-decoration:none;font-weight:bold;}
    h1{color:#c00;text-align:center;margin-top:20px;}
    .container{max-width:800px;margin:20px auto;padding:20px;}
    table{width:100%;border-collapse:collapse;margin-bottom:20px;}
    th,td{border:1px solid #333;padding:10px;text-align:center;}
    button{padding:5px 10px;border:none;border-radius:5px;cursor:pointer;font-weight:bold;}
    .remover{background:#900;color:#fff;}
    .mais{background:#090;color:#fff;}
    .menos{background:#f90;color:#000;}
    .resumo{margin-top:20px;font-size:18px;}
    .cupom{margin:15px 0;}
    .cupom input{padding:6px;width:70%;border:none;border-radius:5px;}
    .cupom button{background:#c00;color:#fff;padding:6px 10px;}
  </style>
</head>
<body>
<header>
  <a href="index.php"><?php echo $logado ? "SAIR" : "LOGIN"; ?></a>
  <a href="cardapio.php">CARDÁPIO</a>
  <a href="carrinho.php">MEU CARRINHO</a>
  <?php if($logado): ?>
    <a href="perfil.php">MEU PERFIL</a>
  <?php endif; ?>
</header>

<div class="container">
  <h1>Seu Carrinho</h1>
  <table id="tabela">
    <thead>
      <tr>
        <th>Produto</th><th>Preço</th><th>Qtd</th><th>Total</th><th>Ações</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

  <div class="cupom">
    <input type="text" id="cupom" placeholder="Digite um cupom">
    <button onclick="aplicarCupom()">Aplicar Cupom</button>
  </div>

  <div class="resumo">
    <p id="subtotal"></p>
    <p id="desconto"></p>
    <p id="total"></p>
  </div>

  <button onclick="continuar()">Continuar para pedidos</button>
</div>

<script>
let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
let descontoValor = 0;

function render(){
  let tbody=document.querySelector('#tabela tbody');
  tbody.innerHTML='';
  let subtotal=0;
  carrinho.forEach((item,i)=>{
    let total=item.preco*item.qtd;
    subtotal+=total;
    tbody.innerHTML+=`
      <tr>
        <td>${item.nome}</td>
        <td>R$ ${item.preco.toFixed(2)}</td>
        <td>${item.qtd}</td>
        <td>R$ ${total.toFixed(2)}</td>
        <td>
          <button class="mais" onclick="mudarQtd(${i},1)">+</button>
          <button class="menos" onclick="mudarQtd(${i},-1)">-</button>
          <button class="remover" onclick="remover(${i})">Excluir</button>
        </td>
      </tr>
    `;
  });
  document.getElementById('subtotal').innerText='Subtotal: R$ '+subtotal.toFixed(2);
  document.getElementById('desconto').innerText='Desconto: R$ '+descontoValor.toFixed(2);
  document.getElementById('total').innerText='Total: R$ '+(subtotal-descontoValor).toFixed(2);
}
function mudarQtd(i,valor){
  carrinho[i].qtd+=valor;
  if(carrinho[i].qtd<=0) carrinho.splice(i,1);
  salvar();
}
function remover(i){carrinho.splice(i,1);salvar();}
function salvar(){
  localStorage.setItem('carrinho',JSON.stringify(carrinho));
  render();
}
function aplicarCupom(){
  let cup=document.getElementById('cupom').value.trim().toLowerCase();
  if(cup==='desconto10'){descontoValor=10;alert('Cupom aplicado!');}else{descontoValor=0;alert('Cupom inválido!');}
  render();
}
function continuar(){
  let logado = <?php echo json_encode($logado); ?>;
  if(!logado){
    alert('Você precisa estar logado! Vamos para a página de login...');
    window.location='index.php';
  } else {
    window.location='pedidos.php';
  }
}
render();
</script>
</body>
</html>


