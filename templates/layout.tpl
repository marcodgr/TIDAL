<!--
    Template de base à extend pour chaque vues
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
    {block name="head"}

        <title>{if isset($titre)}{$titre|cat:" - "}{/if}Acupuncteurs</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="js/script.js"></script>
        {block name="extra_head"}{/block}

    {/block}
    </head>
    <body>
        <header>
        {block name="header"}
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a href="/" class="navbar-brand">
                        {if isset($titre)}{$titre|cat:" - "}{/if}Acupuncteurs
                    </a>
                    {if isset($user_id)}
                    <div class="d-flex">
                        <a href="/?page=logout">{{$user_id}} - Deconnexion</a>
                    </div>
                    {else}
                    <div class="d-flex">
                        <a href="/?page=login">Connexion</a>
                    </div>
                    {/if}
                </div>
            </nav>
        {/block}
        </header>
        <main role="application">
            {block name="alert"}{/block}
            {block name="main"}{/block}
        </main>
        <footer>
            {block name="footer"}
            Les Bg &copy; 2021
            {/block}
        </footer>
    </body>
</html>