<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $conn->real_escape_string($_POST['nome']);
    $telefone = $conn->real_escape_string($_POST['telefone']);
    $dia = $conn->real_escape_string($_POST['dia']);
    $hora = $conn->real_escape_string($_POST['hora']);
    $barbeiro_id = intval($_POST['barbeiro']);

    // Verificar se os dados são válidos (exemplo simples)
    if (!$nome || !$telefone || !$dia || !$hora || !$barbeiro_id) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    $sql = "INSERT INTO agendamentos (nome, telefone, dia, hora, barbeiro_id)
            VALUES ('$nome', '$telefone', '$dia', '$hora', $barbeiro_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Agendamento realizado com sucesso!";
        echo '<br><a href="agendamento.html">Voltar</a>';
    } else {
        echo "Erro ao salvar agendamento: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: agendamento.html");
    exit;
}
