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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delicatto</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #5c3c92;
            margin: 0;
            padding: 0;
        }

        #navbar {
            background-color: #FFBAD1;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            z-index: 10;
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

        .container{
          margin-top:-50px;
          
        }

        .alert {
            margin: 20px auto;
            max-width: 600px; /* Limita a largura das mensagens de alerta */
            font-weight: 500;
            text-align: center;
        }

        /*footer*/

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

    </style>
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto"> <!-- Alinha os itens à direita -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="login_admin.php" class="nav-link">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main id="main-container" class="container">
        <?php if($msg != ""): ?>
            <div class="alert alert-<?= $status ?>">
                <p><?= $msg ?></p>
            </div>
        <?php endif; ?>
        <!-- O conteúdo principal da página vai aqui -->
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-B4gt1jrGC7Jh4AgG2S7FEn6ZT5sLwOfO1nx2O4zQIK3RJS0hvvFpEc5Dnp0I5FY7" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-CjSoe/8iOgbZfW56ewkk3H2HUjU1U9Sn3lC61U4tnQQa2RsKrf5C2aXyZJ0tFfPj" crossorigin="anonymous"></script>
</body>
</html>
