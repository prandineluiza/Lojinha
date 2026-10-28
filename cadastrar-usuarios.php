<?php 
require "./data/conexao.php";
require "./data/auth.php";
$mensagem_erro = "";

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $nome= trim($_POST['nome']);
    $email= trim($_POST['email']);
    $senha= trim($_POST['senha']);
    if($nome == '' || $email == '' || $senha == ''){
        $mensagem_erro = 'Preencha todos os campos';
    }else{
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha);
        try{
            $stmt->execute();
            exit;
        }catch(mysqli_sql_exception $e){
            $mensagem_erro = $e->getCode()===1062
            ? "Email já cadastrado"
            : 'Erro ao cadastrar'
            ;
        }
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cadastrar-usuarios.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>Cadastrar</title>
</head>

<body>
    <?php include "./view/header.php"?>
    <h1>Criar conta</h1>
    <form method="POST">
        <div class="caixa">
            <label for="nome"><strong>Nome:</strong></label>
            <input type="text" name="nome" id="nome" required>
    
            <label for="email"><strong>Email:</strong></strong></label>
            <input type="email" name="email" id="email" required>
    
            <label for="senha"><strong>Senha:</strong></strong></label>
            <input type="password" name="senha" id="senha" required>
            <br>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
    <?php include "./view/footer.php"?>
    <?php if($mensagem_erro) : ?>
        <p><?= $mesagem_erro ?></p>
    <?php endif; ?>
</body>

</html>