<?php
$servidor = "localhost";
$usuario = "root";
$senha = ""; // Se você usa Laragon ou XAMPP, normalmente é vazio
$banco = "barbearia";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar se deu erro
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
