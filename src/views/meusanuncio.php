<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/LEBONCOIN/public/css/home.css">
</head>
<body>

    <header>
        <section>
            <article>

                <p><strong id="logo"><a href="/LEBONCOIN/">Leboncoin</a></strong></p>  

                <div class="logo">

                    <img src="/LEBONCOIN/public/assets/Humburguer.svg" alt="Menu" id="menu-borguer">

                </div>

                <nav id="menu">
                    <p><a href="/LEBONCOIN/login">Conenxion</a></p>
                    <a href="/LEBONCOIN/meus-anuncios">Mes annonces</a>
                    <p><a href="/LEBONCOIN/adicionar">Ajouter</a></p>
                    <p id="disconect"><a href="/LEBONCOIN/Desconect">Desconect</a></p>

                </nav>
              
            </article>
        </section>

    </header>

    <main>

        <section>

            <div id= "categoria">

                <p><a href="">Voiture Elegance</a></p>
                <p><a href="">Voiture Sportive</a></p>

            </div>
                
        </section>

        <section id = "anuncio">
            <?php if (empty($anuncios)): ?>
                <p>Você ainda não criou nenhum anúncio.</p>

                <?php else: ?>

                <?php foreach ($anuncios as $anuncio): ?>
                    <article>

                        <h2><?= htmlspecialchars($anuncio['titulo']) ?></h2>
                        <img src="<?= htmlspecialchars($anuncio['imagem']) ?>" alt="Imagem do anúncio">
                        <p><?= nl2br(htmlspecialchars($anuncio['descricao'])) ?></p>
                        <p><strong>Preço:</strong> €<?= number_format($anuncio['preco'], 2, ',', '.') ?></p>
                        <p><strong>Data de Criação:</strong> <?= date('d/m/Y H:i', strtotime($anuncio['data_criacao'])) ?></p>

                        <div>
                            
                            <p><a href="">Editar</a></p>
                            <p><a href="/LEBONCOIN/eliminar/<?= $anuncio['id'] ?>">Deletar</a></p>

                        </div>
                        

                    </article>
                
                <?php endforeach; ?>

            <?php endif; ?>
        </section>


    </main>  
    
    <script src = '/LEBONCOIN/public/js/anuncio.js'></script>

</body>        