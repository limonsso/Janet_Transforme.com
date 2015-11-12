<?php

if(isset($_POST["BtnaddImg"]))
{

    $avatar=$_FILES['imgportfo']['name'];
    $avatar_tmp=$_FILES['imgportfo']['tmp_name'];

    if(!empty($avatar)) {

        $image = explode('.', $avatar);
        $image_ext = end($image);
        if (in_array(strtolower($image_ext), array('jpg', 'jpeg', 'gif', 'png')) == false) {
            $mesg2[1]  = "<span class='glyphicon glyphicon-exclamation-sign'></span>
                 <strong> Vous n'avez pas selection une image</strong>";
        }else {
            $img = explode('.', $avatar);
            $image_ext = end($img);
            $coutimg=scandir("img/Portfolio/thumb/");
            $coutimg=count($coutimg);
            $avatarfinal = $coutimg."." .$image_ext;
            $portfolio->RedimImg($avatar_tmp,$image_ext,350,300,'img\Portfolio\thumb\img'.$coutimg);
            $portfolio->AddNew("img".$coutimg.".".$image_ext,"");
            move_uploaded_file($avatar_tmp,"img/Portfolio/large/img".$coutimg.".".$image_ext);
        }
    }else{
        $mesg2[1]  = "<span class='glyphicon glyphicon-exclamation-sign'></span>
                 <strong> Vous n'avez pas selection d'image</strong>";
    }
}
if (isset($_GET['Img']))
{
    $portfolio->delete($_GET['Img']);
    unlink("img/Portfolio/large/".$_GET['Img']);
    unlink("img/Portfolio/thumb/".$_GET['Img']);
    header("location:IndexGestion.php?page=Accueil-Gestion&&Back=Portfolio");
}
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bar-chart-o fa-fw"></i> Portfolio
        <div class="pull-right">
            <div class="btn-group">

            </div>
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <?php
        $portfolio->Remplir();
        foreach($portfolio->monportfolio as $item)
        {
            ?>
            <div style="width: 130px; float: left">
                <img src="img/portfolio/thumb/<?php echo $item[1]; ?>" alt="<?php echo $item[0]; ?>" class="img-thumbnail" width="120">
                <a href="IndexGestion.php?page=Accueil-Gestion&&Back=Portfolio&&Img=<?php echo $item[1]; ?>" id="btndeleteImg" class="btn btn-xs btn-danger"  style="width: 120px">supprimer</a>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="panel-footer">
        <form id="Form_bio" role="form" method="post" action="" enctype="multipart/form-data">
            <div class='form-group'>
                <label for="imgbio">Nouvelle image:</label>
                <input type="file" id="imgportfo" name="imgportfo" class="input-group">
            </div>
            <div id="afficheErreur"><?php if (isset( $mesg2[1])){ echo " $mesg2[1]"; } ?></div>
            <button class="btn btn-success btn-xs" type="submit" name="BtnaddImg">Ajouter l'image</button>
        </form>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
