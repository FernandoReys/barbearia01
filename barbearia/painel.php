<?php
session_start();
require 'conexao.php';

// Se não estiver logado, redireciona para login
if (!isset($_SESSION['barbeiro_id'])) {
    header("Location: login.php");
    exit;
}

$id_barbeiro = $_SESSION['barbeiro_id'];
$nome_barbeiro = $_SESSION['barbeiro_nome'];

// Buscar agendamentos do barbeiro logado
$sql = "SELECT * FROM agendamentos WHERE barbeiro_id = $id_barbeiro ORDER BY dia, hora";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Painel do Barbeiro</title>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>
  <h2>Bem-vindo, <?= htmlspecialchars($nome_barbeiro) ?></h2>
  <a href="logout.php">Sair</a>

  <h3>Seus Agendamentos</h3>

  <?php if ($result->num_rows > 0): ?>
    <table border="1" cellpadding="8" cellspacing="0">
      <thead>
        <tr>
          <th>Nome Cliente</th>
          <th>Telefone</th>
          <th>Data</th>
          <th>Hora</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['nome']) ?></td>
            <td><?= htmlspecialchars($row['telefone']) ?></td>
            <td><?= htmlspecialchars($row['dia']) ?></td>
            <td><?= htmlspecialchars(substr($row['hora'], 0, 5)) ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>Você não tem agendamentos.</p>
  <?php endif; ?>

</body>
</html>
