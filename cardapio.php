<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cardápio</title>
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
    h1, h2 {
      color: #c00;
    }
    .container {
      max-width: 1200px;
      margin: 40px auto;
      padding: 20px;
    }
    .categoria {
      margin-top: 30px;
    }
    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 20px;
      margin-top: 20px;
    }
    .card {
      background: #111;
      border-radius: 10px;
      overflow: hidden;
      text-align: center;
      padding: 15px;
      border: 1px solid #333;
    }
    .card img {
      width: 100px;
      height: 100px;
      object-fit: contain;
      margin-bottom: 10px;
    }
    .card h3 {
      font-size: 18px;
      margin-bottom: 5px;
      color: #fff;
    }
    .card p {
      font-size: 14px;
      color: #ccc;
      margin-bottom: 10px;
    }
    .card span {
      font-weight: bold;
      color: #c00;
    }
    button {
      background: #c00;
      color: #fff;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 20px;
      cursor: pointer;
      font-weight: bold;
    }
    footer {
      background: #c00;
      padding: 5px;
      position: fixed;
      bottom: 0;
      width: 100%;
      text-align: center;
      font-size: 12px;
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
    <h1>Cardápio</h1>

    <!-- Mais Pedidos -->
    <div class="categoria">
      <h2>Mais pedidos</h2>
      <div class="card-grid">
        <div class="card">
          <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Hamburguer">
          <h3>Clássico do Rock</h3>
          <p>Pão com gergelim, alface, queijo, tomate e hambúrguer suculento.</p>
          <span>R$ 35,00</span>
          <button>Adicionar</button>
        </div>
        <div class="card">
          <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Hamburguer">
          <h3>São Apimentado</h3>
          <p>Hambúrguer com cheddar, jalapeños e toque de pimenta especial.</p>
          <span>R$ 39,00</span>
          <button>Adicionar</button>
        </div>
        <div class="card">
          <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Hamburguer">
          <h3>Vegan Burger</h3>
          <p>Hambúrguer vegetal com alface, tomate e pão brioche.</p>
          <span>R$ 38,00</span>
          <button>Adicionar</button>
        </div>
      </div>
    </div>

    <!-- Combos -->
    <div class="categoria">
      <h2>Combos</h2>
      <div class="card-grid">
        <div class="card">
          <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Combo">
          <h3>Combo Apimentado</h3>
          <p>Hambúrguer apimentado, batata frita e refrigerante 500ml.</p>
          <span>R$ 55,00</span>
          <button>Adicionar</button>
        </div>
        <div class="card">
          <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Combo">
          <h3>Combo Clássico</h3>
          <p>Hambúrguer clássico, batata frita e refrigerante 500ml.</p>
          <span>R$ 50,00</span>
          <button>Adicionar</button>
        </div>
      </div>
    </div>

    <!-- Acompanhamentos -->
    <div class="categoria">
      <h2>Acompanhamentos</h2>
      <div class="card-grid">
        <div class="card">
          <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Batata">
          <h3>Batata Pequena</h3>
          <span>R$ 15,00</span>
          <button>Adicionar</button>
        </div>
        <div class="card">
          <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Batata">
          <h3>Batata Média</h3>
          <span>R$ 20,00</span>
          <button>Adicionar</button>
        </div>
        <div class="card">
          <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Batata">
          <h3>Batata Grande</h3>
          <span>R$ 25,00</span>
          <button>Adicionar</button>
        </div>
      </div>
    </div>

    <!-- Bebidas -->
    <div class="categoria">
      <h2>Bebidas</h2>
      <div class="card-grid">
        <div class="card">
          <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Coca-Cola">
          <h3>Coca-Cola 500ml</h3>
          <span>R$ 15,00</span>
          <button>Adicionar</button>
        </div>
        <div class="card">
          <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Guaraná">
          <h3>Guaraná 500ml</h3>
          <span>R$ 15,00</span>
          <button>Adicionar</button>
        </div>
        <div class="card">
          <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Água">
          <h3>Água 500ml</h3>
          <span>R$ 12,00</span>
          <button>Adicionar</button>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <p>© 2025 Sua Hamburgueria</p>
  </footer>
</body>
</html>

