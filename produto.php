<?php include "./data/produtos.php";
$id = $_GET['id'];

$produtoSelecionado = null;

for ($i = 0; $id < count($produtos); $i++) {
    if ($produtos[$i]->id == $id) {
        $produtoSelecionado = $produtos[$i];
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Lojinha |
        <?= $produtoSelecionado ? $produtoSelecionado->nome : "produto não encontrado" ?>
    </title>
    <link rel="stylesheet" href="./css/produto.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <?php include "./view/header.php" ?>

    <div class="produto">
        <img src="<?= $produtoSelecionado->imagem ?>" alt="" id="imagem-produto">

        <div class="sobre">

            <h1 class="name"><?= $produtoSelecionado->nome ?></h1>
            <p class="descript"><?= $produtoSelecionado->descricao ?></p>
            <p>Estoque: <?= $produtoSelecionado->estoque ?></p>
            <p>Categoria: <?= $produtoSelecionado->categoria ?></p>
            <p>Marca: <?= $produtoSelecionado->marca ?></p>
            <p>Preço: <?= $produtoSelecionado->preco ?></p>
            <div class="botao">
                <button class="menos">-</button>
                <h1>1</h1>
                <button class="mais">+</button>
            </div>
            <button>Comprar</button>
        </div>
    </div>

    <?php include "./view/footer.php" ?>
</body>

</html>