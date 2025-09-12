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
      margin: 0 15px;
      text-decoration: none;
      font-weight: bold;
    }
    h1, h2 { color: #c00; }
    .container { max-width: 1200px; margin: 40px auto; padding: 20px; }

    .filtros {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      margin-bottom: 20px;
      gap: 10px;
    }
    .filtros input {
      padding: 6px;
      border-radius: 5px;
      border: 1px solid #555;
      width: 200px;
      font-size: 14px;
    }
    .filtros button {
      background: #c00;
      color: #fff;
      border: none;
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      margin: 5px;
      font-size: 14px;
    }

    .categoria { margin-top: 30px; }
    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
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
    .card img { width: 100px; height: 100px; object-fit: contain; margin-bottom: 10px; }
    .card h3 { font-size: 18px; margin-bottom: 5px; color: #fff; }
    .card p { font-size: 14px; color: #ccc; margin-bottom: 10px; display: none; }
    .card span { font-weight: bold; color: #c00; display: block; margin-bottom: 10px; }
    button { background: #c00; color: #fff; border: none; padding: 10px; width: 100%; border-radius: 20px; cursor: pointer; font-weight: bold; margin-top: 5px; }

    footer {
      background: #c00;
      padding: 5px;
      position: fixed;
      bottom: 0;
      width: 100%;
      text-align: center;
      font-size: 12px;
    }

    #topo {
      position: fixed;
      bottom: 60px;
      right: 20px;
      background: #c00;
      color: white;
      padding: 10px;
      border-radius: 50%;
      cursor: pointer;
      font-weight: bold;
      display: none;
      border: none;
      font-size: 16px;
    }

    @media (max-width: 768px) {
      .filtros { flex-direction: column; align-items: flex-start; }
      .filtros input { width: 100%; }
      .card img { width: 80px; height: 80px; }
      .card h3 { font-size: 16px; }
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

    <div class="filtros">
      <input type="text" id="pesquisa" placeholder="Pesquisar produto...">
      <div>
        <button onclick="filtrar('todos')">Todos</button>
        <button onclick="filtrar('mais-pedidos')">Mais pedidos</button>
        <button onclick="filtrar('combos')">Combos</button>
        <button onclick="filtrar('acompanhamentos')">Acompanhamentos</button>
        <button onclick="filtrar('bebidas')">Bebidas</button>
      </div>
    </div>

    <!-- Mais Pedidos -->
    <div class="categoria mais-pedidos">
      <h2>Mais pedidos</h2>
      <div class="card-grid">
        <div class="card">
          <img src="img/classicodorock.jpeg" alt="Clássico do Rock">
          <h3>Clássico do Rock</h3>
          <p>Pão com gergelim, alface, queijo, tomate e hambúrguer suculento.</p>
          <span>R$ 35,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
        <div class="card">
          <img src="img/soloapimentado.jpeg" alt="Solo Apimentado">
          <h3>Solo Apimentado</h3>
          <p>Hambúrguer com cheddar, jalapeños e toque de pimenta especial.</p>
          <span>R$ 39,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
        <div class="card">
          <img src="img/batidavegana.jpeg" alt="Batida Vegana">
          <h3>Batida Vegana</h3>
          <p>Hambúrguer vegetal com alface, tomate e pão brioche.</p>
          <span>R$ 38,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
        <div class="card">
          <img src="img/bacondistortion.jpeg" alt="Bacon Distortion">
          <h3>Bacon Distortion</h3>
          <p>Hambúrguer com queijo, alface e tiras crocantes de bacon.</p>
          <span>R$ 38,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
      </div>
    </div>

    <!-- Combos -->
    <div class="categoria combos">
      <h2>Combos</h2>
      <div class="card-grid">
        <div class="card">
          <img src="img/comboapimentado.png" alt="Combo Apimentado">
          <h3>Combo Apimentado</h3>
          <p>Hambúrguer apimentado + batata frita média + refrigerante 500ml.</p>
          <span>R$ 55,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
        <div class="card">
          <img src="img/comboclassico.jpeg" alt="Combo Clássico do Rock">
          <h3>Combo Clássico do Rock</h3>
          <p>Hambúrguer clássico + refrigerante 500ml.</p>
          <span>R$ 50,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
        <div class="card">
          <img src="img/combobacon.png" alt="Combo Bacon Distortion">
          <h3>Combo Bacon Distortion</h3>
          <p>Hambúrguer com bacon + batata frita pequena + refrigerante 500ml.</p>
          <span>R$ 55,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
        <div class="card">
          <img src="img/combotradicional.jpeg" alt="Combo Simples">
          <h3>Combo Simples</h3>
          <p>Hambúrguer tradicional + batata frita pequena.</p>
          <span>R$ 55,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
      </div>
    </div>

    <!-- Acompanhamentos -->
    <div class="categoria acompanhamentos">
      <h2>Acompanhamentos</h2>
      <div class="card-grid">
        <div class="card">
          <img src="img/batata.jpeg" alt="Batata Pequena">
          <h3>Batata Pequena</h3>
          <p>Porção de batata frita pequena.</p>
          <span>R$ 15,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
        <div class="card">
          <img src="img/batata.jpeg" alt="Batata Média">
          <h3>Batata Média</h3>
          <p>Porção de batata frita média.</p>
          <span>R$ 20,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
        <div class="card">
          <img src="img/batata.jpeg" alt="Batata Grande">
          <h3>Batata Grande</h3>
          <p>Porção de batata frita grande.</p>
          <span>R$ 25,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
      </div>
    </div>

    <!-- Bebidas -->
    <div class="categoria bebidas">
      <h2>Bebidas</h2>
      <div class="card-grid">
        <div class="card">
          <img src="img/coca.jpeg" alt="Coca-Cola">
          <h3>Coca-Cola 500ml</h3>
          <p>Refrigerante Coca-Cola 500ml.</p>
          <span>R$ 15,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
        <div class="card">
          <img src="img/guarana.jpeg" alt="Guaraná">
          <h3>Guaraná 500ml</h3>
          <p>Refrigerante Guaraná 500ml.</p>
          <span>R$ 15,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
        <div class="card">
          <img src="img/agua.jpeg" alt="Água">
          <h3>Água 500ml</h3>
          <p>Garrafa de água mineral 500ml.</p>
          <span>R$ 12,00</span>
          <button class="adicionar">Adicionar</button>
          <button class="saiba-mais">Saiba mais</button>
        </div>
      </div>
    </div>

  </div>

  <button id="topo">↑</button>

  <footer>
    <p>© 2025 Rock N Burguer</p>
  </footer>

  <script>
    // Pesquisa
    document.getElementById('pesquisa').addEventListener('input', function() {
      let termo = this.value.toLowerCase();
      document.querySelectorAll('.card').forEach(card => {
        let nome = card.querySelector('h3').innerText.toLowerCase();
        card.style.display = nome.includes(termo) ? 'block' : 'none';
      });
    });

    // Filtros
    function filtrar(categoria) {
      document.querySelectorAll('.categoria').forEach(cat => {
        if (categoria === 'todos') {
          cat.style.display = 'block';
        } else {
          cat.style.display = cat.classList.contains(categoria) ? 'block' : 'none';
        }
      });
    }

    // Saiba mais
    document.querySelectorAll('.saiba-mais').forEach(btn => {
      btn.addEventListener('click', function() {
        let p = this.parentElement.querySelector('p');
        p.style.display = (p.style.display === 'block') ? 'none' : 'block';
      });
    });

    // Voltar ao topo
    const topo = document.getElementById('topo');
    window.addEventListener('scroll', () => {
      topo.style.display = window.scrollY > 300 ? 'block' : 'none';
    });
    topo.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Adicionar ao carrinho
    document.querySelectorAll('.adicionar').forEach(btn => {
      btn.addEventListener('click', function() {
        const card = this.parentElement;
        const nome = card.querySelector('h3').innerText;
        const preco = parseFloat(card.querySelector('span').innerText.replace('R$', '').replace(',', '.'));
        const img = card.querySelector('img').src;

        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        let itemExistente = carrinho.find(item => item.nome === nome);
        if (itemExistente) itemExistente.qtd++;
        else carrinho.push({nome, preco, img, qtd:1});

        localStorage.setItem('carrinho', JSON.stringify(carrinho));
      alert(nome + " adicionado ao carrinho!");
    });
  });
</script>
  




