/**
 * Created by Ezechiel Gnepa on 2015-05-05.
 */
$(document).ready(function(){
    $(".erreur").each(function(){
        $(this).hide();
    });
   $(".menu .menuitem").hover(function(){
       $('a:first',this).addClass("hover");
        if($('ul:first',this).length!=0)
        {
            $('ul:first',this).hide();
            $('ul:first',this).slideDown(500);
        }
   },function(){
      $('ul:first',this).slideUp(500);
       $('a:first',this).removeClass("hover");

   });

});

