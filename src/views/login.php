<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="/LEBONCOIN/public/css/login.css">
</head>
<body>

    <header>
        <section>
            <article>

                <p><strong id="logo"><a href="/LEBONCOIN/">Leboncoin</a></strong></p> 
                
                <div class="logo">

                    <img src="/LEBONCOIN/public/assets/Humburguer.svg" alt="Menu" id="menu-borguer">

                </div>

                <nav id ='menu'>
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
                <form action="/LEBONCOIN/login" method="POST">

                   <label for="email">Email:</label><br>
                   <input type="email" id="email" name="email" required><br><br>

                   <label for="senha">Senha:</label><br>
                   <input type="password" id="senha" name="senha" required><br><br>

                   <button type="submit">Cadastrar</button>
                   <p><a href="/LEBONCOIN/register">Registrar</a></p>

                </form>


            </article>
        </section>
    </main>


<script src = '/LEBONCOIN/public/js/login.js'></script>

</body>        

        