<?php 
// Inicia a sessão no início do arquivo

include_once("conn.php"); // Inclui a conexão com o banco de dados

$method = $_SERVER["REQUEST_METHOD"];

// Resgate dos dados, montagem do pedido
if ($method === "GET") {
    $coberturasQuery = $conn->query("SELECT * FROM cobertura;");
    $coberturas = $coberturasQuery->fetch_all(MYSQLI_ASSOC);
    
    $massasQuery = $conn->query("SELECT * FROM massa;");
    $massas = $massasQuery->fetch_all(MYSQLI_ASSOC);
  
    $recheiosQuery = $conn->query("SELECT * FROM recheio;");
    $recheios = $recheiosQuery->fetch_all(MYSQLI_ASSOC);
  
    $query = "
        SELECT 
            b.id_bolo,
            c.tipo AS cobertura,
            m.tipo AS massa,
            GROUP_CONCAT(r.tipo SEPARATOR ', ') AS recheios,
            es.id_status,
            es.tipo AS status
        FROM 
            bolo AS b
        JOIN 
            cobertura AS c ON b.cobertura_id = c.id_cobertura
        JOIN 
            massa AS m ON b.massa_id = m.id_massa
        LEFT JOIN 
            sabor_bolo AS sb ON b.id_bolo = sb.bolo_id
        LEFT JOIN 
            recheio AS r ON sb.recheio_id = r.id_recheio
        JOIN 
            pedido AS p ON p.bolo_id = b.id_bolo
        JOIN 
            estatus AS es ON p.status_id = es.id_status
        GROUP BY 
            b.id_bolo
    ";

    $result = $conn->query($query);

    $bolos = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bolos[] = [
                "id_bolo" => $row["id_bolo"],
                "cobertura" => $row["cobertura"],
                "massa" => $row["massa"],
                "recheios" => explode(", ", $row["recheios"]),
                "status" => $row["status"],
                "id_status" => $row["id_status"]
            ];
        }
    }

} else if ($method === "POST") {
    $data = $_POST;

    // Atualização do status
    if (isset($data["type"]) && $data["type"] === "update") {
        $id = $data["id"]; // ID do bolo
        $newStatusId = intval($data["status"]); // ID do status selecionado pelo usuário

        // Atualize o status_id na tabela pedido
        $stmt = $conn->prepare("UPDATE pedido SET status_id = ? WHERE bolo_id = ?");
        $stmt->bind_param("ii", $newStatusId, $id);

        if ($stmt->execute()) {
            $_SESSION["msg"] = "Status atualizado com sucesso!";
            $_SESSION["status"] = "success";
        } else {
            $_SESSION["msg"] = "Erro ao atualizar o status!";
            $_SESSION["status"] = "danger";
        }

        $stmt->close();

        header("Location: ../dashboard.php");
        exit();
    }

    // Exclusão do pedido
    if (isset($data["type"]) && $data["type"] === "delete") {
        $id = $data["id"]; // ID do bolo

        // Exclua o registro da tabela `pedido`
        $deleteQuery = $conn->prepare("DELETE FROM pedido WHERE bolo_id = ?");
        $deleteQuery->bind_param("i", $id);

        if ($deleteQuery->execute()) {
            $_SESSION["msg"] = "Pedido excluído com sucesso!";
            $_SESSION["status"] = "success";
        } else {
            $_SESSION["msg"] = "Erro ao excluir o pedido!";
            $_SESSION["status"] = "danger";
        }

        $deleteQuery->close();

        header("Location: ../dashboard.php");
        exit();
    }

    // Verificação de chaves e inserção de novo pedido
    $cobertura = isset($data["cobertura"]) ? $data["cobertura"] : null;
    $massa = isset($data["massa"]) ? $data["massa"] : null;
    $recheio = isset($data["recheio"]) ? $data["recheio"] : []; 

    if (count($recheio) > 4) {
        $_SESSION["msg"] = "Selecione no máximo 4 recheios!";
        $_SESSION["status"] = "warning";
    } elseif ($cobertura === null || $massa === null) {
        $_SESSION["msg"] = "Cobertura e massa são obrigatórios!";
        $_SESSION["status"] = "warning";
    } else {
        $stmt = $conn->prepare("INSERT INTO bolo (cobertura_id, massa_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $cobertura, $massa);
        $stmt->execute();
        
        $boloId = $conn->insert_id;
        
        $stmt = $conn->prepare("INSERT INTO sabor_bolo (bolo_id, recheio_id) VALUES (?, ?)");
        foreach ($recheio as $item) {
            $stmt->bind_param("ii", $boloId, $item);
            $stmt->execute();
        }
        
        $statusId = 1; // Define o status inicial "Em produção"
        $stmt = $conn->prepare("INSERT INTO pedido (bolo_id, status_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $boloId, $statusId);
        $stmt->execute();

        $_SESSION["msg"] = "Pedido realizado com sucesso!";
        $_SESSION["status"] = "success";
    }

    // Redireciona para personalize.php
    header("Location: ../personalize.php");
    exit();
}
?>
