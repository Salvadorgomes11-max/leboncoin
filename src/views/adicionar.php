<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/LEBONCOIN/public/css/adicionar.css">

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
                <form method="POST" action="/LEBONCOIN/adicionar" enctype="multipart/form-data">

                    <label for="titulo">Título</label><br>
                    <input type="text" name="titulo" id="titulo" required><br><br>

                    <label for="descricao">Descrição</label><br>
                    <textarea name="descricao" id="descricao" required></textarea><br><br>

                    <label for="preco">Preço</label><br>
                    <input type="number" step="0.01" name="preco" id="preco" required><br><br>

                    <label for="categoria_id">Categoria</label><br>
                    <select name="categoria_id" id="categoria_id" required>
                        <option value="1">Carros Elegantes</option>
                        <option value="2">Carros Esportivos</option>
                    </select><br><br>

                    <label for="imagem">Imagem</label><br>
                    <input type="url" name="imagem" id="imagem" required><br><br>

                    <button type="submit">Publique annonce</button>

                </form>
                
            </article>
        </section>
    </main>

  <script src = '/LEBONCOIN/public/js/adicionar.js'></script>  
    
</body>
</html>