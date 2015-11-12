<?php
include("model/Controller.php");
$page=htmlentities($_GET['page']);
$pages=scandir('Pages/Backend');
if(!empty($page) && in_array($_GET['page'].".php", $pages))
{
$titreG="Janet Transforme";
$content='Pages/Backend/'.$_GET['page'].".php";
}else{
    header("location:IndexGestion.php?page=Identification");
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8">
    <title></title>
    <?php include("include/Fontend/StyleFontend.php"); ?>
    <?php include("include/Fontend/JsFontend.php"); ?>
</head>

<body>
<?php require("include/Fontend/header.php"); ?>
<div class="container" style="margin-top: 50px">
    <?php include($content) ?>
</div>
<?php include("include/Fontend/JsFontend.php"); ?>

</body>
</html>
