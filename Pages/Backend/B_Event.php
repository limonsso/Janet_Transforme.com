<?php
?>
<style>
    .img-uplaod{
        border: 3px dashed #555555;
        width: 100px;
        height: 120px;
        background-color: #dddddd;
        border-radius: 5px;
        font-size:40px ;
        color: #b0b0b0;
    }
    .img-uplaod input
    {
        display: block !important;
        width: 100%;
        height: 100% !important;
        opacity: 0 !important;
        overflow: hidden !important;
    }
    #gallery .thumbnail{
        width:120px;
        height: 150px;
        float:left;
        margin:2px;
    }
    #gallery .thumbnail img{
        width:100%;
        height: 140px;
    }
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-clock-o fa-fw"></i> évènements
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Nouvel évènement</h3>
            </div>
            <div class="panel-body">
                <button id="btn-addEvent" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Créer
                    un nouvel évènement
                </button>
                <form id="frmEvent" class="form-horizontal well hidden">
                    <fieldset>
                        <legend>Nouvel évènement</legend>
                        <div class="form-group">
                            <label for="inputTitre" class="col-lg-2 control-label"><sup>*</sup>Titre</label>

                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputTitre"
                                       placeholder="Titre de l'évènement">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSTitre" class="col-lg-2 control-label">Sous-titre</label>

                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputSTitre"
                                       placeholder="Sous-titre de l'évènement">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-2">
                                <div class="img-uplaod">
                                    <input type="file" name="upload" id="btnImgUplaod" accept="image/*" />
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div id="gallery"></div>
                            </div>
                        </div>
                        <br>

                        <div class='form-group'>
                            <div class="col-lg-3 ">
                                <button class="btn btn-success" type="submit">Créer l'évènement</button>
                            </div>
                            <div class="col-lg-2 ">
                                <button id="btn-resetEvent" class="btn btn-danger" type="reset">Annuler la création</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
<script>
    $(document).ready(function () {
        $("#btn-addEvent").click(function () {
            $("#frmEvent").removeClass("hidden");
            $("#frmEvent").hide();
            $("#frmEvent").slideDown(500);
            this.disabled = true;
        });
        $("#btn-resetEvent").click(function () {
            $("#frmEvent").slideUp(500);
            $("#btn-addEvent").removeAttr('disabled');
        });
    });


    /**
     * Created by remi on 18/01/15.
     */
    (function(){

        function previewImage(file) {
            var galleryId = "gallery";

            var gallery = document.getElementById(galleryId);
            var imageType = /image.*/;

            if (!file.type.match(imageType)) {
                throw "File Type must be an image";
            }

            var thumb = document.createElement("div");
            thumb.classList.add('thumbnail');

            var img = document.createElement("img");
            img.file = file;

            thumb.appendChild(img);
            gallery.appendChild(thumb);

            // Using FileReader to display the image content
            var reader = new FileReader();
            reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
            reader.readAsDataURL(file);
        }

        var uploadfiles = document.querySelector('#btnImgUplaod');
        uploadfiles.addEventListener('change', function () {
            var files = this.files;
            for(var i=0; i<files.length; i++){
                previewImage(this.files[i]);
            }

        }, false);
    })();
</script>