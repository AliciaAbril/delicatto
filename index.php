<?php
  include_once("templates/header.php");
?>

<div class="banner">
    <video class="video-banner" autoplay muted loop>
        <source src="banner2.mp4">
    </video>
    
</div>


<br>

<div class="intro">
<div class="col-md-12"> 
      <h1>Bem-Vindos à Delicatto!</h1>
      <p>Aqui, cada doce é feito com carinho e qualidade, transformando momentos especiais em deliciosas memórias. Venha descobrir o sabor da delicadeza!</p>
</div>
</div>

<hr>

<div class="destaques">
  <div class="col-md-12">
  <h1>Destaques</h1>
  <br>
  <div class="row justify-content-center">
    <div class="card" style="width: 18rem; cursor: pointer;" onclick="window.location.href='doces.php'">
        <img src="cookie_nutela.jpeg" class="card-img-top" alt="Cookie Recheado de Nutella">
        <div class="card-body">
            <p class="card-text">Cookie Recheado de Nutella <br></p>
            <p>R$15,50</p>
        </div>
    </div>
    <div class="card" style="width: 18rem; cursor: pointer;" onclick="window.location.href='doces.php'">
        <img src="blondie.jpeg" class="card-img-top" alt="Blondie de Chocolate Branco com Frutas Vermelhas">
        <div class="card-body">
            <p class="card-text">Blondie de Chocolate Branco com Frutas Vermelhas <br></p>
            <p>R$8,50</p>
        </div>
    </div>
    <div class="card" style="width: 18rem; cursor: pointer;" onclick="window.location.href='salgados.php'">
        <img src="coxinha_cat.jpeg" class="card-img-top" alt="Coxinha de Frango com Catupiry">
        <div class="card-body">
            <p class="card-text">Coxinha de Frango com Catupiry <br></p>
            <p>R$7,00</p>
        </div>
    </div>
</div>

<br>
<hr>
<br>

<div class="cardapio">
  <div class="col-md-12">
    <h1>Produtos</h1>
    <br>
    <div class="row">
      <div class="cardapio-img">
        <a href="doces.php"><img src="img/favs/doces.jpeg"></a>
      </div>
      <div class="cardapio-img">
        <a href="salgados.php"><img src="img/favs/salgados.jpeg"></a>
      </div>
      <div class="cardapio-img">
        <a href="refri.php"><img src="img/favs/bebidas.jpeg"></a>
      </div>
    </div>
  </div>
</div>

<hr>

<div class="bolo">
  <div class="col-md-12">
    <h1>Bolos Personalizados</h1>
    <br>
      <div class="bolo-img">
        <img src="img/favs/bolo.jpeg"> 
        <img src="img/favs/bolo1.jpeg"> 
        <img src="img/favs/bolo2.jpeg"> 
        <br>
        <a href="personalize.php"><button>Monte seu bolo personalizado</button></a>
      </div>
  </div>
</div>

<hr>

<div class="container2">
    <div class="row align-items-start">
        <div class="col-12 col-md-4 custom-align">
            <h2>Missão</h2>
            <p>A missão da Confeitaria Delicatto é proporcionar momentos de encanto através de sobremesas artesanais e esteticamente impecáveis, criadas com ingredientes de alta qualidade e uma atenção cuidadosa aos detalhes. Queremos fazer parte de memórias especiais e resgatar, a cada mordida, a alegria..</p>
        </div>
        <div class="col-12 col-md-4 custom-align">
            <h2>Visão</h2>
            <p>Ser reconhecida como referência em confeitaria gourmet, sendo lembrada pela inovação e pelo compromisso com a qualidade e o bem-estar, onde cada cliente é valorizado e cada doce conta uma história única.</p>
        </div>
        <div class="col-12 col-md-4 custom-align">
            <h2>Valores</h2>
            <div class="missao">
              <ul>
                  <li>Buscar a perfeição em cada detalhe, desde o sabor até a apresentação.</li>
                  <li>Inovar constantemente, explorando combinações de sabores que surpreendam e encantem.</li>
                  <li>Escolher ingredientes e práticas que respeitem o meio ambiente e apoiem a comunidade.</li>
                  <li>Tratar clientes e colaboradores com gentileza e compreensão, criando um ambiente acolhedor e inclusivo.</li>
                  <li>Celebrar cada cliente e cada momento, acreditando que o melhor da vida está nos detalhes.</li>
              </ul>
            </div>
        </div>
    </div>
</div>

<br> 

<?php
  include_once("templates/footer.php");
?>