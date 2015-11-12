<div class="contain">
    <div class="section-title">
        <h2>Me contacter</h2>
    </div>
    <article class="article">
        <div class="Monicone glyphicon"><span class="glyphicon glyphicon-envelope"></span></div><hr style="width: 90%">
        <form id="FrmContacter" class="form-horizontal" method="post" action="" >

            <div class="form-group">
                <label for="inputNom" class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputNom" name="nom" placeholder="Votre nom">
                    <div class="erreur"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputEmail3" name="email" placeholder="Votre email">
                    <div class="erreur"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="textereaMsg" class="col-sm-2 control-label">Message</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="8" id="textereaMsg" name="message" style="resize: none" placeholder="Votre message"></textarea>
                    <div class="erreur"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-5">
                    <button id="sendEmail" class="button button--tamaya button--border-thick" type="submit"  data-text="Envoyer"><span>Envoyer</span></button>
                </div>
            </div>
            <input type="text" name="subject" style="visibility: hidden" value="Salut">
        </form>
    </article>
    <article class="article" style="margin-bottom: 50px">
        <div class="Monicone glyphicon"><span class="glyphicon glyphicon-earphone"></span></div><hr style="width: 90%">
        <label for="textPhone" class="col-sm-2 control-label">Téléphone</label> <span id="textPhone">(+1) 450-722-0786</span>
    </article>
</div>