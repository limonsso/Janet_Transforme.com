<?php
    include('model/Controller.php');

    $page=htmlentities($_GET['page']);

    $pages=scandir('pages');

    if(!empty($page) && in_array($_GET['page'].".php", $pages))
    {

        $titreG="Janet Transforme";


        $content='Pages/'.$_GET['page'].".php";



        switch($_GET['page']){
            case "acceuil":
                $titre=$titreG." - Présentation";
                break;
            case "portfolio":
                $titre=$titreG." - Portfofio";
                break;
            case "mecontacter":
                $titre=$titreG." - Me contacter";
                break;
            case "evenements":
                $titre=$titreG." - Évènements";
                break;
        }

        if(substr($_GET['page'],0,8)=='services'){
            $titre=$titreG." -Services";
        }

    }else{
        header("location:index.php?page=acceuil");
    }
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo $titre ?></title>
    <!-- Include des feuilles css et js -->
    <?php include("include/Fontend/StyleFontend.php"); ?>
    <?php include("include/Fontend/JsFontend.php");
    ?>

    <!-- ********************************************************* -->
</head>
<body>
<?php require("include/Fontend/header.php"); ?>
<div class="content">
    <?php require("include/Fontend/menu.php"); ?>
    <nav class="content-g">
        <?php include($content) ?>
    </nav>
    <nav class="content-d">
        <?php require("include/Fontend/content_droite.php"); ?>
    </nav>
    <br clear="Both">
</div>
<?php require("include/Fontend/footer.php"); ?>
</body>
<?php include("include/Fontend/JsFontend.php"); ?>
</html>
