<?php
    session_start();
    if ($_SESSION['user'])
    {
        $USER=$_SESSION['user'];
    } else {
        header("location:IndexGestion.php?page=Identification");
    }


if (isset($_GET['deco']))
{
    $session = $_SESSION['user'];
    $statu = 'connecte';
    $Nom=explode(" ",$session);
    $connecter = $user_cnx->statu($Nom[0], $statu);
    session_destroy();
    header("location:IndexGestion.php?page=Identification");
}
    $Pages= array(
        "Bio"=>"B_Bio.php",
        "Portfolio"=>"B_Portfolio.php",
        "Event"=>"B_Event.php"
    );
    $index=$_GET['Back'];
?>

<div class="row">
    <div class="col-lg-8">
        <?php
            require_once("Pages/Backend/".$Pages[$index]);
        ?>
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="btn-group">
                    <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-user"></span><?php echo $USER ?></a>
                    <a href="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="">Mon profil</a></li>
                        <li class="divider"></li>
                        <li><a href="IndexGestion.php?page=Accueil-Gestion&&deco=ok"> Se deconnecter</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    <div class="list-group">
                        <a href="IndexGestion.php?page=Accueil-Gestion&&Back=Bio" class="list-group-item <?php if($index=="Bio") echo "active" ?>">
                            Biographie
                        </a>
                        <a href="IndexGestion.php?page=Accueil-Gestion&&Back=Portfolio" class="list-group-item <?php if($index=="Portfolio") echo "active" ?>">
                            Portfolio
                        </a>
                        <a href="IndexGestion.php?page=Accueil-Gestion&&Back=Event" class="list-group-item <?php if($index=="Event") echo "active" ?>">
                            Évènement
                        </a>
                    </div>
                </div>
                <!-- /.list-group -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>