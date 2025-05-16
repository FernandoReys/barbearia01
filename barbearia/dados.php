<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'barbearia';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$barbeiro = $_POST['barbeiro'];

$sql = "INSERT INTO agendamentos (nome, telefone, dia, hora, barbeiro)
        VALUES ('$nome', '$telefone', '$dia', '$hora', '$barbeiro')";

if ($conn->query($sql) === TRUE) {
  echo "Agendamento realizado com sucesso!";
} else {
  echo "Erro: " . $conn->error;
}

$conn->close();
?>
