<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/LEBONCOIN/public/css/register.css">
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
            <form method="POST" action="/LEBONCOIN/register">

                <label for="name">Name:</label><br>
                <input type="text" name="name" id="name"><br><br>

                <label for="">Email</label><br>
                <input type="text" name="email" id="name"><br><br>

                <label for="Password">Password</label><br>
                <input type="password" name="senha" id="senha"><br><br>

                <button type="submit">Cadastrar</button>

            </form>

            </article>
        </section>
    </main>

<script src = '/LEBONCOIN/public/js/register.js'></script>
    
</body>
</html>