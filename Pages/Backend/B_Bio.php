<?php

if(isset($_POST["BtnMaJBio"]))
{
    if(trim($_POST["contenueInter"])!="")
    {
        $Bio->contenuInsert=$_POST["contenueInter"];
        $avatar=$_FILES['imgbio']['name'];
        $avatar_tmp=$_FILES['imgbio']['tmp_name'];
        if(!empty($avatar)) {

            $image = explode('.', $avatar);
            $image_ext = end($image);
            if (in_array(strtolower($image_ext), array('jpg', 'jpeg', 'gif', 'png')) == false) {
                $mesg2[0] = "<span class='glyphicon glyphicon-exclamation-sign'></span>
                 <strong> Vous n'avez pas selection une image</strong>";
            }else{
                $img=explode('.',$avatar);
                $image_ext=end($img);
                $avatarfinal="PortraitBio.".$image_ext;
                move_uploaded_file($avatar_tmp,'img/'.$avatarfinal);
                $Bio->imgBio=$avatarfinal;
                $Bio->MaJ();
            }
        }else{
            $Bio->affichage();
            $Bio->imgBio=$Bio->imgBioRead;
            $Bio->MaJ();
        }

    }else{
        $mesg2[0] = "<span class='glyphicon glyphicon-exclamation-sign'></span>
                 <strong> Vous n'avez pas entrer le texte de la Biographie</strong>";
    }
}
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bar-chart-o fa-fw"></i> Biographie
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <?php
        $Bio->affichage();
        ?>
        <?php
        $img=" <img class='picture' src='img/$Bio->imgBioRead' align='left' style='display: block; width: 25%; margin-right:10px;'>";
        echo substr_replace($Bio->contenuRead,$img,0,0);
        ?>
        <?php echo  $Bio->date_MaJ; ?>
        <form id="Form_bio" role="form" method="post" action="" enctype="multipart/form-data">
            <div class='form-group'>
                <label for="imgbio">Portrait   de biographie:</label>
                <input type="file" id="imgbio" name="imgbio" class="input-group">
            </div>
            <div class='form-group'>
                <textarea id='content' name='contenueInter'></textarea>
            </div>
            <div id="afficheErreur"><?php if (isset($mesg2[0])){ echo "$mesg2[0]"; } ?></div>
            <button class="btn btn-success" type="submit" name="BtnMaJBio">Mettre à jour</button>
        </form>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
