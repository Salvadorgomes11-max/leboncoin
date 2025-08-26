<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<main>
    <h2>Editar Anúncio</h2>

<form action="/anuncio/<?= $anuncio['id'] ?>/atualizar" method="POST">

    <input type="text" name="name" value="<?= $anuncio['name'] ?>" required><br>
    <textarea name="descricao"><?= $anuncio['descricao'] ?></textarea><br>
    <input type="number" name="preco" value="<?= $anuncio['preco'] ?>"><br>
    <input type="text" name="categoria" value="<?= $anuncio['categoria'] ?>"><br>
    <button type="submit">Atualizar</button>
    
</form>

</main>


    
</body>
</html>