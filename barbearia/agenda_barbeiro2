<?php
$conn = new mysqli("localhost", "root", "", "barbearia");

$result = $conn->query("SELECT * FROM agendamentos WHERE barbeiro = 'Barbeiro 1' ORDER BY dia, hora");

echo "<h2>Agenda - Barbeiro 1</h2><table border='1'><tr><th>Nome</th><th>Telefone</th><th>Dia</th><th>Hora</th></tr>";
while($row = $result->fetch_assoc()) {
  echo "<tr>
          <td>{$row['nome']}</td>
          <td>{$row['telefone']}</td>
          <td>{$row['dia']}</td>
          <td>{$row['hora']}</td>
        </tr>";
}
echo "</table>";
$conn->close();
?>
