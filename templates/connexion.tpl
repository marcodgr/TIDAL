{extends file="layout.tpl"}
{block name="extra_head"}
    <script>
        function show_password() {
            var x = document.getElementById("mdp");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
{/block}
{block name="alert"}
    {if isset($error)}
        <div class="alert alert-warning">
            Mot de passe ou email incorrecte
        </div>
    {/if}
{/block}

{block name="main"}
    <h2 align="center">Se connecter :</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="dupont@france.fr">
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
            <input type="checkbox" onclick="show_password()" id="display_password"> <label for="display_password">Afficher le mot de passe</label>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-left: 100px">Connexion</button>
    </form>
    <a href="/index.php/signup">Inscription</a>
{/block}