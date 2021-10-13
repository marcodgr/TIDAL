{extends file="layout.tpl"}
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
            <input type="checkbox" onclick="myFunction()"> Afficher le mot de passe
            <script>
                function myFunction() {
                    var x = document.getElementById("mdp");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-left: 100px">Inscription</button>
    </form>
    <a href="/page=login">Connexion</a>
{/block}