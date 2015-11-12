/**
 * Created by Ezechiel Gnepa on 2015-05-07.
 */
$(document).ready(function(){

    $("#FrmConnexion").submit(function (event){

        if($("input[name=pseudo]").val()=='' || $("input[name=password]").val()==''){
            $("#afficheErreur").empty()
            if($("#afficheErreur").text()==""){
                $("#afficheErreur").append("<span class='glyphicon glyphicon-exclamation-sign'>" +
                "</span><strong> Veuillez saisir tout les champs avant svp !!!</strong>");
                $("#afficheErreur").fadeIn(500);
                event.preventDefault();
            }
        }

    });

    $("#FrmContacter").submit(function(event){
        $(".erreur").each(function(){
            $(this).empty();
        });

        if($.trim($("#inputNom").val()).length==0){

            if($("#inputNom").next().text()==""){
                $("#inputNom").next(".erreur").append("<span class='glyphicon glyphicon-exclamation-sign'>" +
                "</span><strong> Veuillez saisir votre nom</strong>");
                $("#inputNom").next(".erreur").fadeIn(500);
            }

        }
        if($.trim($("#inputEmail3").val()).length==0){

            if($("#inputEmail3").next(".erreur").text()==""){
                $("#inputEmail3").next(".erreur").css('color','rgba(232, 0, 0, 0.65)');
                $("#inputEmail3").next(".erreur").append("<span class='glyphicon glyphicon-exclamation-sign'>" +
                "</span><strong> Veuillez saisir votre email</strong>");
                $("#inputEmail3").next(".erreur").fadeIn(500);
            }

        }else{
            if (validateEmail($("#inputEmail3").val())==false) {
                $("#inputEmail3").next(".erreur").css('color','rgba(234, 189, 56, 0.87)');
                $("#inputEmail3").next(".erreur").append("<span class='glyphicon glyphicon-warning-sign'>" +
                "</span><strong> Cet email n'est pas valide</strong>");
                $("#inputEmail3").next(".erreur").fadeIn(500);
            }
        }
        if($.trim($("#textereaMsg").val()).length==0){

            if($("#textereaMsg").next(".erreur").text()==""){
                $("#textereaMsg").next(".erreur").append("<span class='glyphicon glyphicon-exclamation-sign'>" +
                "</span><strong> Veuillez saisir votre Message svp</strong>");
                $("#textereaMsg").next(".erreur").fadeIn(500);
            }

        }
        var ok=false;
        $(".erreur").each(function(){
            if($(this).text()!=""){
                ok=true;
            }
        });
        if(ok==true){
            event.preventDefault();
        }
    });

});
function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }

}
function validerFormCnx(){


}