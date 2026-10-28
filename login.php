<?php
session_start();
require "./data/conexao.php";
$mensagem_erro = "";

if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);

    $sql = "SELECT * FROM usuarios WHERE email = ? and senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_object();
    if ($usuario){
        $_SESSION["usuario_id"] = $usuario->id;
        $_SESSION["usuario_nome"] = $usuario->nome;
        header("Location: /produtos.php");
        exit;
    }else{
        $mensagem_erro = "Credenciais invalidas";
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
    <?php include "./view/header.php"?>
    <h1>Login</h1>
    <form method="POST">
        <div class="caixa">
            <label for="email"><strong>Email:</strong></label>
            <input placeholder="Digite seu email" type="email" name="email" id="email" required>
    
            <label for="senha"><strong>Senha:</strong></strong></label>
            <input placeholder="Digite sua senha" type="password" name="senha" id="senha" required>
            <br>
            <div class="botoes">
                <button type="submit">Entrar</button>
            </div>
        </div>
    </form>
    <?php if ($mensagem_erro) :?>
        <p><?= $mensagem_erro?></p>
    <?php endif; ?>
    
    <?php include "./view/footer.php"?>
    
</body>
</html>