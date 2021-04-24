$(document).ready(function () {

    $("#valideConnexion").click(function(){

        var identifiant = $("#identifiant").val();
        var password = $("#password").val();

        $(this).prop("disabled",true);

        $.ajax({
           url : '../models/connexion.php',
           type : 'POST',
           data : { identifiant : identifiant, password : password}, 
           dataType : "json",
           success : function(statut){ // success est toujours en place, bien sûr !
                $(this).prop("disabled",false);
                document.location.href = '../controllers/accueil.php'
                
                
            },
    
           error : function(resultat, statut, erreur){
            alert(resultat+" "+statut+""+erreur);
           },
           fail : function(jqXHR, textStatus, errorThrown){
            alert(jqXHR+" "+textStatus+""+errorThrown);
           }
    
        });
       
    });
    

});