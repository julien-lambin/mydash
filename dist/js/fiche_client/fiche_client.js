$(document).ready(function () {

    $('[data-mask]').unbind().inputmask();
    
    $("#valideAddClient").click(function(){

        if($("#nom").val() == ""){
            $("#nom").css("border-color", "red");
        }else{
            $("#nom").css("border-color", "lightgrey");
        }

        if($("#prenom").val() == ""){
            $("#prenom").css("border-color", "red");
        }else{
            $("#prenom").css("border-color", "lightgrey");
        }

        if($("#mail").val() == ""){
            $("#mail").css("border-color", "red");
        }else{
            $("#mail").css("border-color", "lightgrey");
        }

        if($("#telephone").val() == ""){
            $("#telephone").css("border-color", "red");
        }else{
            $("#telephone").css("border-color", "lightgrey");
        }

        if($("#adresse").val() == ""){
            $("#adresse").css("border-color", "red");
        }else{
            $("#adresse").css("border-color", "lightgrey");
        }

        if($("#code_postal").val() == ""){
            $("#code_postal").css("border-color", "red");
        }else{
            $("#code_postal").css("border-color", "lightgrey");
        }

        if($("#nom").val() != "" && $("#prenom").val() != "" && $("#mail").val() != "" && $("#telephone").val() != "" && $("#adresse").val() != "" && $("#code_postal").val() != ""){

            $(this).prop("disabled",true);

            $.ajax({
            url : '../controllers/addClient.php',
            type : 'POST',
            data : $("#formAddClient").serialize(), 
            dataType : "json",
            success : function(resultat, statut){
                $("#valideAddClient").prop("disabled",false);                 
                    
                $("#modalChercherClient").modal("hide");
                $("#modalPEC").modal("show");
                toastr.success('Client créé avec succès !');

                $.get( "../controllers/modalPec.php?id="+resultat, function( code_html ) { 
                    $( ".modal-body.pec" ).html( code_html );
            
                    $('.select2').select2({
                            
                    });    
            
                });

                document.getElementById("formAddClient").reset();
            },
        
            error : function(resultat, statut, erreur){
                $("#valideAddClient").prop("disabled",false);
                alert("Erreur");
            }
        
            });
        }
    });


    $("#chercherClient").unbind().click(function(){

        $(this).prop("disabled",true);

        $("#modalChercherClient").modal("show");

        nom = $("#client_nom").val();
        prenom = $("#client_prenom").val();

        $.get( "../controllers/chercherClient.php?nom="+nom+"&prenom="+prenom, function( code_html ) {
            $( ".modal-body.chercher-client" ).html( code_html );
            $("#chercherClient").prop("disabled",false);
          });
       
    });


    $(".client").unbind().click(function(){
       
        var idClient = $(this).attr("id");

        $("#modalChercherClient").modal("hide");
        $("#modalPEC").modal("show");

        $.get( "../controllers/modalPec.php?id="+idClient, function( code_html ) { 
            $( ".modal-body.pec" ).html( code_html );

            $('.select2').select2({
                theme: "bootstrap4"
            });    

          });
        
    });    
    

    $("#elements_fournis").change(function(e){
        var liste_elements = $(this).val()+"";
        liste_elements = liste_elements.split(',');
        
        var autre = 0;
        liste_elements.forEach((element) =>{
            if(element == "999999"){
                $("#autre_elements").prop("readonly",false);
                autre = 1;
            }
        });
        if(autre == 0){
            $("#autre_elements").val("");
            $("#autre_elements").prop("readonly",true);
        }
    });
    

    $("#reparation").change(function(e){
        if($(this).val() == "999999"){
            $("#autre_reparation").prop("readonly",false);
            $("#prix").prop("readonly",false);
            $("#prix").val("");
        }else{
            $("#autre_reparation").prop("readonly",true);
            $("#prix").prop("readonly",true);
            var prix = $("option:selected", this).attr("data-prix");
            $("#prix").val(prix);
        }
    });


    $("#valideFacture").click(function(){

        //$(this).prop("disabled",true);


        $.ajax({
            url : '../controllers/creationPec.php',
            type : 'POST',
            data : $("#formPec").serialize(),
            success : function(statut){ 
                $( "#formPec" ).submit();

            },
    
            error : function(resultat, statut, erreur){
                $(this).prop("disabled",false);
                alert("Erreur");
           }
    
        });

    });

});