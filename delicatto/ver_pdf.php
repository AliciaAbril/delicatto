<?php
// Garante que o nome do arquivo seja "cardapio.pdf"
$file = isset($_GET['file']) ? basename($_GET['file']) : null;

// Verifica se o arquivo é "cardapio.pdf" e se ele existe na mesma pasta
if ($file === 'cardapio.pdf' && file_exists($file)) {
    // Define os cabeçalhos para exibir o PDF no navegador
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($file) . '"');
    header('Content-Length: ' . filesize($file));
    header('Accept-Ranges: bytes');

    // Lê e exibe o arquivo
    readfile($file);
    exit;
} else {
    // Exibe uma mensagem de erro se o arquivo não for encontrado
    echo "Arquivo não encontrado.";
}
?>
