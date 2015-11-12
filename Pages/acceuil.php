<div class="contain">
    <div class="section-title">
        <h2>Biographie</h2>
    </div>
    <article class="">
         <?php
            $img=" <img class='picture' src='img/$Bio->imgBioRead' align='left' style='display: block; width: 45%; margin-right:10px;'>";
            echo substr_replace($Bio->contenuRead,$img,0,0);
         ?>
    </article>
</div>