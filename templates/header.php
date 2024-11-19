<?php 
  include("process/conn.php");

  $msg = "";

  if(isset($_SESSION["msg"])) {

    $msg = $_SESSION["msg"];
    $status = $_SESSION["status"];

    $_SESSION["msg"] = "";
    $_SESSION["status"] = "";

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>delicatto</title>

  <link rel="stylesheet" href="css/style.css">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

<!-- fonte banner -->

<!--  fonte -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Link do Bootstrap 5.0.2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   
  <style>

    .poppins-regular {
    font-family: "Poppins", serif;
    font-weight: 400;
    font-style: normal;
  }


  *{
    font-family: Poppins;
  }

  #navbar {
   background-color: #FFBAD1;
   box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Sombra mais intensa e desfocada */
   z-index: 10; /* Garante que o cabeçalho fique acima do vídeo */
}


    #navbar .navbar-brand img {
      width: 120px;
    }
    #navbar .navbar-nav .nav-link {
      color: #343a40;
      margin-right: 15px;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    #navbar .navbar-nav .nav-link:hover {
      color: #940034;
    }
    #navbar .button.is-success {
      background-color: #940034;
      color: #fff;
      padding: 10px 15px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }
    #navbar .button.is-success:hover {
      background-color: #E00137;
    }
    
    @media (max-width: 768px) {
      #navbar .navbar-nav {
        text-align: center;
      }
      #navbar .navbar-nav .nav-item {
        margin-bottom: 10px;
      }
    }

    #main-container {
      padding: 50px 0;
    }
  
    #main-banner {
      padding-top: 20px;
      padding-left: 20px;
      color: #940033;
    }

    /* Estilos do formulário */
    #bolo-form {
      background-color: #fdf0f5;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    #bolo-form h2 {
      color: #940034;
      font-size: 1.75rem;
      font-weight: 600;
      padding: 20px;
        }
    .form-group label {
      font-weight: 600;
      color: #940034;
    }
    .form-control {
      border: 1px solid #d6d6d6;
      border-radius: 5px;
    }
    .btn-primary {
      background-color: #940034;
      border-color: #ff6b6b;
      transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #E00137;
      border-color: #ff3b3b;
    }
    #bolo {
      color: #940034;
    }

/*introdução*/
    .intro {
      text-align: center;
      padding: 40px;
      background-color:#FFCDD9;
      border-radius: 10px;
      margin-bottom: 40px;
    }
    .intro h1 {
      font-size: 2.5rem;
      color: #940034;
      font-weight: bold;
    }
    .intro p {
      font-size: 1.2rem;
      color: #CD4E79;
      margin-top: 20px;
    }

    /* Destaques */
    .destaques h1 {
      font-size: 2rem;
      color:#940033;
      font-weight: bold;
      text-align: center;
    }
    .card {
      margin: 20px;
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      transition: transform 0.3s;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .card img {
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      max-height: 200px;
      object-fit: cover;
    }
    .card-body p {
      color:#CD4E79;
      font-size: 1rem;
      text-align: center;
    }


    .card {
    overflow: hidden; /* Controla a exibição da imagem quando não está ampliada */
    position: relative;
}

.card:hover .card-img-top {
    transform: scale(1.5); /* Amplia a imagem o suficiente para sair dos limites do card */
    transition: transform 0.4s ease;
    z-index: 1;
    position: relative;
}





    /* Cardápio */
    .cardapio h1 {
      font-size: 2rem;
      color: #940033;
      font-weight: bold;
      text-align: center;
      margin-top: 40px;
    }
    .cardapio .cardapio-img {
      flex: 1;
      margin: 15px;
      text-align: center;
    }
    .cardapio .cardapio-img img {
      width: 100%;
      max-width: 250px;
      border-radius: 10px;
      transition: transform 0.3s;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    .cardapio .cardapio-img img:hover {
      transform: scale(1.05);
    }

    /* Bolos Personalizados */
    .bolo {
      text-align: center;
      margin-top: 40px;
    }
    .bolo h1 {
      font-size: 2rem;
      color:#940033;
      font-weight: bold;
    }
    .bolo-img {
      margin-top: 20px;
    }
    .bolo-img img {
      width: 100%;
      max-width: 300px;
      border-radius: 10px;
      margin: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    .bolo a button {
      background-color: #940033;
      color: #fff;
      font-size: 1.2rem;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
      margin-top: 20px;
    }
    .bolo a button:hover {
      background-color: #E00038;
    }
    .recheio{
      padding-top:15px;
      margin-bottom: -20px;
    }

    h2.text-center {
    color: #940033;
    font-size: 2.5rem;
    font-weight: bold;
}

.card {
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 350px;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    margin: auto;
}

.card:hover {
    transform: scale(1.05);  /* Aumento de 5% no card */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.card-img-top {
    width: 100%;
    height: auto;
    max-height: 200px;
    object-fit: contain;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    transition: transform 0.3s;  /* Transição suave para a imagem */
}

.card:hover .card-img-top {
    transform: scale(1.05);  /* Aumento de 5% na imagem junto com o card */
}

.card-body {
    flex-grow: 1;
    padding: 1.5rem;
}

.card-title {
    font-size: 1.3rem;
    color: #940033;
    font-weight: 600;
}

.card-text {
    font-size: 1rem;
    color: #CD4E79;
    margin-bottom: 1rem;
}



.quantity-label {
    font-size: 0.9rem;
    color: #333;
}

.quantity-input {
    width: 60%;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ddd;
    margin-top: 5px;
}

.button {
    padding: 8px 12px;
    font-size: 0.9rem;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.button:hover {
    opacity: 0.9;
}

.hero {
     
    color: black; 
    padding-bottom:200px;
    }
#subtitle{
  margin:20px;
  font-size:17px;
}

.table {
    margin-top: 30px; 
}

.table th {
    background-color: #f2f2f2; /
    color: #940033; /* Cor do texto do cabeçalho */
}

.button {
  margin:10px;
  padding-top:20px
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #CD4E79; /* Cor do botão ao passar o mouse */
}

.button.is-warning {
    background-color: #FF87A0; 
    color: #fff;
    border-radius: 25px; 
    margin-top:20px;
    padding: 15px 30px; 
    font-size: 1rem; 
    transition: background-color 0.3s ease, transform 0.3s ease; /* Efeitos de transição */
}

.button.is-warning:hover {
    background-color: #CD4E79; 
    transform: scale(1.05); 
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); 
}

/*css faq*/

   .faq-container {
      margin-top: 50px;
      margin-bottom: 100px;
      margin-left: 400px;
      background-color: #FFCDD9;
      padding: 30px;
      border-radius: 20px;
      max-width: 700px;
      text-align: center;
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12), 5px 5px 10px rgba(0, 0, 0, 0.08);


   }

   .faq-container h1 {
      color: #940033;
      font-size: 3em;
      margin-bottom: 20px;
      font-family: Poppins;
   }

   .faq-container ul {
      list-style: none;
      padding: 0;
      text-align: left;
   }

   .faq-container ul li {
      background-color: #ffe6e6;
      margin-bottom: 15px;
      padding: 20px;
      border-radius: 12px;
      color: #333;
      font-size: 1.1em;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
   }

   .faq-container ul li:hover {
      background-color: #ffcccc;
      transform: scale(1.02);
   }

   .faq-container ul li.active {
      background-color: #CD4E79;
   }

   .faq-container ul li::after {
      content: '\002B';
      font-size: 2em;
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
      transition: transform 0.3s ease;
   }

   .faq-container ul li.active::after {
      transform: translateY(-50%) rotate(45deg);
   }

   .faq-container .answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
      font-size: 1em;
      padding: 0 20px;
      color: #FFCDD9;
   }

   .faq-container .answer.open {
      max-height: 500px;
      
   }





/* missao e valores */
.container2 {
    background-color: #fdf3f7; 
    padding: 50px;
    margin: 0 auto; 
    width: 100%; 
    max-width: 1200px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    box-sizing: border-box; /* Garante que padding e bordas não afete a largura do contêiner */
}
.container3 {
    padding: 50px;
    margin: 0 auto; 
    width: 100%; 
    max-width: 1200px;
    box-sizing: border-box; /* Garante que padding e bordas não afete a largura do contêiner */
}

.container2, .container3 h3{
  margin-top:80px;
  margin-bottom: 40px;
}

.container3 img{
  margin-left: 80px;
}

.titulo-sobre {
        text-align: center;
        color: #940034; /* Cor forte para o título */
        font-size: 50px;
        padding-top: 40px;
        font-weight: bold;
        margin-bottom: -30px;
    }

.container2, .container3 h5{
  color: #FF87A0;
}

.custom-align {
    color: #940033; /* Títulos na cor principal da marca */
    margin-top: 20px;
}

.custom-align h2 {
    font-size: 1.8rem;
    color: #940033;
    font-weight: bold;
    border-bottom: 3px solid #CD4E79;
    padding-bottom: 10px;
    margin-bottom: 20px;
    text-align: center;
}

.custom-align p {
    color: #333;
    line-height: 1.6;
    font-size: 1rem;
    text-align: justify;
    background-color: #f9e1e8; /* Fundo claro para contraste */
    padding: 15px;
    border-radius: 10px;
}
.missao ul {
    list-style-type: disc;
    padding-left: 20px;
}

.missao ul li {
  line-height: 1.6;
  padding: 15px;
  background-color: #f9e1e8;
  border-radius: 10px;
    margin-bottom: 10px;
    color: #333; /* Ajuste de cor conforme necessário */
}


.row .col-md-4 {
    padding: 10px;
}

/*video*/

    .banner {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 80vh; /* Ajuste a altura do banner conforme necessário */
        display: flex;
        justify-content: center;
        align-items: flex-end; /* Alinha o conteúdo na parte inferior */
    }

    .video-banner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        object-fit: cover;
        max-height: 90vh; /* Reduz ligeiramente a altura do vídeo para evitar cortes */
    }

/*area de contato*/

    .contact-section {
    display: flex;
    justify-content: center;
    padding: 2em 1em;
}

.form-container {
    background-color: #FFBAD1;
    padding: 2em;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
}
.form-container h2{
  color: #940033;
}

.contact-form label {
    display: block;
    margin-top: 1em;
    font-weight: bold;
    color: #940033;
}

.contact-form input, 
.contact-form textarea {
    width: 100%;
    padding: 0.8em;
    margin-top: 0.5em;
    border: 1px solid #CD4E79;
    border-radius: 5px;
    resize: none;
}

.contact-form button {
    display: block;
    width: 100%;
    padding: 0.8em;
    margin-top: 1.5em;
    background-color: #940033;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s;
}

.contact-form button:hover {
    background-color: #CD4E79;
}

.success-message {
    color: #940033;
    font-weight: bold;
    margin-bottom: 1em;
    text-align: center;
}

/*footer*/

.footer {
    background-color: #FFBAD1;
    color: #940034;
    padding: 10px 0;
    text-align: center;
    width: 100%;
    font-size: 12px;
    line-height: 1.2;
    font-family: "Poppins", sans-serif;
}

.footer .containerf {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    height: 80px;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    width: 100%;
    gap: 10px;
}

.footer-column {
    flex: 1;
    min-width: 200px; /* Para garantir que se ajuste em telas menores */
}

.footer-logo img {
    width: 100px;
    height: auto;
}

.footer-info {
    text-align: justify;
    margin: 0;
}

.footer-info h4 {
    font-size: 14px;
    color: #CD4E79;
    margin-bottom: 10px;
}

.footer-info p {
    font-size: 10px;
    line-height: 1.2;
}

.wrapper {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.wrapper .icon {
    width: 40px;
    height: 40px;
    font-size: 16px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background-color: #CD4E79;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.wrapper .icon:hover {
    background-color: #940034;
}

/* Responsividade */
@media (max-width: 768px) {
    .footer .containerf {
        flex-direction: column;
        text-align: center;
    }
    .footer-column {
        min-width: 100%;
    }
}

/*carrinho*/

.containerc { 
    padding: 20px;
    margin: 20px; 
    width: 100%; 
    max-width: 1200px;
    box-sizing: border-box; /* Garante que padding e bordas não afete a largura do contêiner */
}
.hero.is-info {
  
    color: #940034;
    padding-top: 30px;
}

.hero .title {
    color: #E00137;
}

.hero .subtitle {
    color: #FF87A0;
}

/* Botão de ver cardápio */
.button.is-warning {
    background-color: #940034;
    color: #FAFFF0;
    border-color: #940034;
}
.button.is-warning:hover {
    background-color: #E00137;
    border-color: #E00137;
}

/* Estilos para a tabela do carrinho */
.table {
    background-color: #fff;
    color: #940034;
}

.table thead {
    background-color: #FFBAD1;
}

.table tbody tr:hover {
    background-color: #FF87A0;
}

/* Texto do título do carrinho */
.is-size-2.has-text-centered.has-text-danger {
    color: #940034;
    margin-top: 30px;
}

/* Botão de finalizar compra */
.botao_finalizar {
    background-color: #940034;
    color: #fff;
    border-color: #FF87A0;
    padding: 20px 40px;
    border-radius: 20px;
    cursor: pointer;
}

.botao_finalizar:hover {
    background-color: #E00137;
    color: #fff;
    border-color: #940034;
}

.botao_carrinho {
  margin-bottom: 30px;
  display: flex;
  justify-content: right;
  margin-right: 150px;
}

/* Estilos do formulário de login */
#login-form-container {
  background-color: #FFBAD1;
  padding: 40px;
  border-radius: 15px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  margin: auto;
  margin-top: 100px;
  margin-bottom: 50px;
}

#login-form-container h2 {
  font-size: 2rem;
  font-weight: bold;
  color: #940033;
  text-align: center;
  margin-bottom: 20px;
}

#login-form-container .form-control {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #CD4E79;
  border-radius: 5px;
  font-size: 1rem;
  transition: border-color 0.3s;
}

#login-form-container .form-control:focus {
  border-color: #940033;
  box-shadow: 0 0 5px rgba(148, 0, 51, 0.5);
}

#login-form-container a {
  color: #940033;
  font-size: 0.9rem;
  text-align: center;
  display: block;
  margin-top: 10px;
  text-decoration: none;
  transition: color 0.3s;
}

#login-form-container a:hover {
  color: #E00137;
}

#login-form-container .btn-submit {
  background-color: #940033;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  font-size: 1.1rem;
  width: 100%;
  cursor: pointer;
  transition: background-color 0.3s;
}

#login-form-container .btn-submit:hover {
  background-color: #E00137;
}

/* pedido realizado*/

.mensagem {
    padding: 10px;
    margin: 15px 0;
    border-radius: 5px;
    text-align: center;
    font-size: 16px;
}

.sucesso {
    background-color: #61EB52;
    color: white;

}

.erro {
    background-color: #dc3545;
    color: white;
    border: 1px solid #c82333;
}

/*depoimentos*/
.container-depoimentos {
    padding: 50px 20px;
    text-align: center;
}

.titulo-depoimentos {
    margin-bottom: 30px;
    color: #940034;
}

.depoimentos {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.depoimento {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    max-width: 300px;
    text-align: left;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.foto-perfil {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 15px;
    object-fit: cover;
}

.info-depoimento h4 {
    font-size: 20px;
    margin: 5px 0;
    color: #940034;
}

.estrelas {
    color: #ffcc00;
    font-size: 18px;
    margin-bottom: 10px;
}

.info-depoimento p {
    font-size: 14px;
    color: #555;
    line-height: 1.5;
}

/*carrosel

.carousel-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .carousel-item img {
            height: 200px;
            object-fit: cover;
        }
       
        .carousel-item {
            transition: none !important;
        }
        */
 /* Estilo para as imagens do carrossel */
 .carousel-item img {
            width: 100%;
            height: 300px; /* Ajuste a altura conforme necessário */
            object-fit: cover; /* Para as imagens se ajustarem ao tamanho do container */
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilo da legenda */
        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5); /* Fundo semitransparente para a legenda */
            color: white;
            font-size: 16px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #940033; /* Cor personalizada para os ícones */
        }

        .carousel-indicators [data-bs-target] {
            background-color: #940033; /* Cor personalizada para os indicadores */
        }

        /* Para exibir os carrosséis em 3 colunas */
        .carrossel-coluna {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }

        .carousel-item {
            transition: none !important;
        }
        /* Caso queira esconder os controles em telas menores */
        @media (max-width: 768px) {
            .carousel-control-prev,
            .carousel-control-next {
                display: none;
            }
        }
@media (max-width: 1200px) {
      #navbar .navbar-nav .nav-link {
        font-size: 14px;
      }
      .section-title {
        font-size: 2rem;
      }
      .form-group label {
        font-size: 14px;
      }
      .card img {
        max-height: 180px;
      }
    }

    @media (max-width: 992px) {
      #navbar .navbar-nav .nav-link {
        font-size: 14px;
      }
      .main-section {
        padding: 10px;
      }
      .section-title {
        font-size: 1.8rem;
      }
      .card img {
        max-height: 150px;
      }
    }

    @media (max-width: 768px) {
      #navbar .navbar-nav .nav-link {
        font-size: 12px;
        padding: 6px 10px;
      }
      .form-control {
        padding: 8px;
      }
      .btn-primary {
        padding: 8px 15px;
      }
      .card {
        margin: 10px 0;
      }
      .card img {
        max-height: 120px;
      }
    }

    @media (max-width: 576px) {
      .footer {
        font-size: 12px;
        padding: 15px 0;
      }
      .footer .social-icons a {
        font-size: 18px;
        margin: 0 5px;
      }
      .banner {
        height: 50vh;
      }
      .banner img {
        object-position: top;
      }
      .section-title {
        font-size: 1.5rem;
        margin-bottom: 15px;
      }
      .card img {
        max-height: 100px;
      }
    }
  </style>

   <!-- faq -->
   <script src="faq.js"></script>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg d-flex align-items-center" id="navbar">
      <a href="index.php" class="navbar-brand">
        <img src="img/logo.png" alt="Delicatto" id="brand-logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-between align-items-center" id="navbarNav">
        <ul class="navbar-nav ml-3">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Página Inicial</a>
          </li>
          <li class="nav-item">
            <a href="personalize.php" class="nav-link">Personalize seu Bolo</a>
          </li>
          <li class="nav-item">
            <a href="sobre.php" class="nav-link">Sobre nós</a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="contato.php" class="nav-link">Contato</a>
          </li>
          <li class="nav-item">
            <a href="faq.php" class="nav-link">FAQ</a>
          </li>
        </ul>
        <a href="vercarrinho.php" class="button is-success">
          <strong>Ver carrinho <?php
            include_once "func.php";
            $quantidade = count(obterIdsDeProdutosNoCarrinho());
            if ($quantidade > 0) {
                printf("(%d)", $quantidade);
            }
            ?>&nbsp;<i class="fa fa-shopping-cart"></i></strong>
        </a>
      </div>
    </nav>
  </header>

  <?php if($msg != ""): ?>
    <div class="alert alert-<?= $status ?>">
      <p><?= $msg ?></p>
    </div>
  <?php endif; ?>