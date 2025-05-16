<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $senha = md5($_POST['senha']); // senha criptografada com MD5 no banco

    $sql = "SELECT id, nome FROM barbeiros WHERE email='$email' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['barbeiro_id'] = $user['id'];
        $_SESSION['barbeiro_nome'] = $user['nome'];
        header("Location: painel.php");
        exit;
    } else {
        $erro = "Email ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Login Barbeiros</title>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>
  <h2>Login Barbeiros</h2>
  <?php if (!empty($erro)): ?>
    <p style="color:red;"><?= $erro ?></p>
  <?php endif; ?>
  <form method="POST" action="">
    <label>Email:</label><br />
    <input type="email" name="email" required /><br />

    <label>Senha:</label><br />
    <input type="password" name="senha" required /><br /><br />

    <button type="submit">Entrar</button>
  </form>
</body>
</html>
