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
{block name="main"}
    <h2 align="center">S'inscrire :</h2>
    <form method="POST" action="index.php?page=signin">
        <div class="form-group">
            <label for="email">Mail</label>
            <input class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Mail">
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="password" placeholder="Mot de passe">
            <input type="checkbox" onclick="show_password()" id="display_password"> <label for="display_password">Afficher le mot de passe</label>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-left: 100px">Inscription</button>
    </form>
    <a href="/index.php/login">Connexion</a>
{/block}