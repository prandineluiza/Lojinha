<?php require "./data/conexao.php";
require "./data/auth.php";
$sql = "Select * from usuarios";
$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/listar-usuarios.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>Listar Usuários</title>
</head>
<body>
    <?php include "./view/header.php"; ?>
    <h1>Usuários</h1>
    <a class="btn-cadastro" href="/cadastrar-usuarios.php">Criar usuarios</a>
    
    <div class="usuarios">
        <?php while($usuario = $resultado->fetch_object()) :?>
        <div class="usuario">
            <p><strong>Id: </strong> <?= $usuario->id ?></p>
            <p><strong>Email: </strong><?= $usuario->email ?></p>
            <p><strong>Nome: </strong><?= $usuario->nome ?></p>
            <p><strong>Senha: </strong><?= $usuario->senha ?></p>
            <br>
            <a href="editar-usuario.php?id=<?= $usuario->id ?>">Editar</a>
        </div>
        <?php endwhile; ?>
    </div>

    <?php include "./view/footer.php"; ?>
</body>
</html>