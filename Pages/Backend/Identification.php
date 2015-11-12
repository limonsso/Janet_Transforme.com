<?php
session_start();
session_destroy();
$msg = null;
if (isset($_POST['signin'])) {
    if ($_POST['pseudo'] != "" || $_POST['password'] != "") {
        $identite->login = $_POST['pseudo'];
        $identite->passwd = $_POST['password'];
        $ok = $identite->Authentifier($identite->login, $identite->passwd);
        if ($ok == 0) {
            $msg = "<span class='glyphicon glyphicon-exclamation-sign'></span>
             <strong> Login ou mot de passe incorrect</strong>";
        } else {
            session_start();
            $_SESSION['user'] = $identite->user;
            $session = $_SESSION['user'];
            $statu = 'connecte';
            $Nom=explode(" ",$session);
            $connecter = $user_cnx->statu($Nom[0], $statu);
            header("location:IndexGestion.php?page=Accueil-Gestion&&Back=Bio");
        }
    }
}
?>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Contectez-vous </h3>
            </div>
            <div class="panel-body">
                <form method="post" action="" id="FrmConnexion">
                    <div id="afficheErreur"><?php if (isset($msg)) {
                            echo "$msg";
                        } ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Login" name="pseudo" type="text" autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Mot de passe" name="password" type="password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me">Se souvenir de moi
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <button type="submit" name="signin" class="btn btn-lg btn-success btn-block">Valider
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
