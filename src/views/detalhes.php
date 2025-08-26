<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="/LEBONCOIN/public/css/detalhes.css">
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
            <article>
                <div class="image">
                    <img src="<?=  $anuncio['imagem'] ?>" alt="<?= $anuncio['titulo'] ?>">

                </div>

                <div class="discricao">
                    <p><?= htmlspecialchars( $anuncio['descricao'])?></p>

                </div>

                <div class="info">
                    <p><?= htmlspecialchars( $anuncio['preco'])?></p>
                    <p><?= htmlspecialchars( $anuncio['data_criacao'])?></p>

                </div>

            </article>

            <div class="compra">
                <button>Achat</button>
            </div>
            
        </section>


    </main>

    <script src = '/LEBONCOIN/public/js/detalhes.js'></script> 
    
</body>
</html>