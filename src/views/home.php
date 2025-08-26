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

                <p><a href="/LEBONCOIN/categoria/1">Voiture Elegance</a></p>
                <p><a href="/LEBONCOIN/categoria/2">Voiture Sportive</a></p>

            </div>
                
        </section>

        <!-- daqui para Cima copi e paste  -->

        <section id = "anuncio">

            <?php if(!empty($anuncios)) : ?>
              <?php foreach($anuncios as $anuncio) : ?>

                <article>
                    <div class="h1">
                        <h1><strong><?=$anuncio['titulo'] ?></strong></h1>

                    </div>
                    
                    <div class="img">

                        <img src="<?= $anuncio['imagem'] ?>" alt="<?= $anuncio['titulo'] ?>">

                        <p>Prix: <?=$anuncio['preco']?></p> 
                        <p><?=$anuncio['data_criacao']?></p>

                    </div>

                   <button><a href="/LEBONCOIN/detalhes/<?= $anuncio['id'] ?>">Savoir plus</a></button>

                </article>

              <?php endforeach; ?> 
            <?php else : ?> 
                <p> Não há anúncios para exibir por favor inserir anuncio</p>

            <?php endif; ?> 

        </section>
    </main>

    <script src = '/LEBONCOIN/public/js/home.js'></script>
    
</body>
</html>