<?php
  include_once("conn.php");

  $method = $_SERVER["REQUEST_METHOD"];

  if($method === "POST") {

    $pedidosQuery = $conn->query("SELECT * FROM pedido;");

    $pedidos = $pedidosQuery->fetchAll();
   
    $bolos = [];

    foreach($pedidos as $pedido) {

      $bolo = [];

      $bolo["id_bolo"] = $pedido["bolo_id"];

      $boloQuery = $conn->prepare("SELECT * FROM bolo WHERE id_bolo = :bolo_id");

      $boloQuery->bindParam(":bolo_id", $bolo["id_bolo"]);

      $boloQuery->execute();

      $boloData = $boloQuery->fetch(PDO::FETCH_ASSOC);

      
      $coberturaQuery = $conn->prepare("SELECT * FROM cobertura WHERE id_cobertura = :cobertura_id");
      $coberturaQuery->bindParam(":cobertura_id", $boloData["cobertura_id"]);
      $coberturaQuery->execute();
      $cobertura = $coberturaQuery->fetch(PDO::FETCH_ASSOC);

      $bolo["cobertura"] = $cobertura["tipo"];

      
      $massaQuery = $conn->prepare("SELECT * FROM massa WHERE id_massa = :massa_id");

      $massaQuery->bindParam(":massa_id", $boloData["massa_id"]);

      $massaQuery->execute();

      $massa = $massaQuery->fetch(PDO::FETCH_ASSOC);

      $bolo["massa"] = $massa["tipo"];

      
      $recheioQuery = $conn->prepare("SELECT * FROM sabor_bolo WHERE bolo_id = :bolo_id");

      $recheioQuery->bindParam(":bolo_id", $bolo["id_bolo"]);

      $recheioQuery->execute();

      $recheio = $recheioQuery->fetchAll(PDO::FETCH_ASSOC);

      // resgatando o nome dos sabores
      $recheioDoBolo = [];

      $recheioQuery = $conn->prepare("SELECT * FROM recheio WHERE id_recheio = :recheio_id");

      foreach($sabores as $sabor) {

        $recheioQuery->bindParam(":recheio_id", $recheio["recheio_id"]);

        $recheioQuery->execute();

        $recheioBolo = $recheioQuery->fetch(PDO::FETCH_ASSOC);

        array_push($recheioDoBolo, $recheioBolo["tipo"]);

      }

      $bolo["recheio"] = $recheioDoBolo;

      // adicionar o status do pedido
      $bolo["status"] = $pedido["status_id"];

      // Adicionar o array de pizza, ao array das pizzas
      array_push($bolos, $bolo);

    }

    // Resgatando os status
    $statusQuery = $conn->query("SELECT * FROM estatus;");

    $status = $statusQuery->fetchAll();

  } else if($method === "POST") {

    // verificando tipo de POST
    $type = $_POST["type"];

    // deletar pedido
    if($type === "delete") {

      $boloId = $_POST["id"];

      $deleteQuery = $conn->prepare("DELETE FROM pedido WHERE bolo_id = :bolo_id;");

      $deleteQuery->bindParam(":bolo_id", $boloId, PDO::PARAM_INT);

      $deleteQuery->execute();

      $_SESSION["msg"] = "Pedido removido com sucesso!";
      $_SESSION["status"] = "success";

    // Atualizar status do pedido
    } else if($type === "update") {

      $pizzaId = $_POST["id"];
      $statusId = $_POST["status"];

      $updateQuery = $conn->prepare("UPDATE pedido SET status_id = :status_id WHERE bolo_id = :bolo_id");

      $updateQuery->bindParam(":bolo_id", $boloId, PDO::PARAM_INT);
      $updateQuery->bindParam(":status_id", $statusId, PDO::PARAM_INT);

      $updateQuery->execute();

      $_SESSION["msg"] = "Pedido atualizado com sucesso!";
      $_SESSION["status"] = "success";

    }

    // retorna usuário para dashboard
    header("Location: ../dashboard.php");

  }

?>












