$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();

    $("#pecEnCours").DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        },
        stateSave: false,
        stateDuration: 0,
        fixedHeader: true,
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });


    $("#pecTermine").DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        },
        stateSave: false,
        stateDuration: 0,
        fixedHeader: true,
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });   


    $("#pieces").change(function(e){
        var liste_pieces = $(this).val()+"";
        liste_pieces = liste_pieces.split(',');
        
        var autre = 0;
        liste_pieces.forEach((piece) =>{
            if(piece == "999999"){
                $("#autre_piece").prop("readonly",false);
                autre = 1;
            }
        });
        if(autre == 0){
            $("#autre_piece").val("");
            $("#autre_piece").prop("readonly",true);
        }
    });


    $(".modalValiderPEC").click(function(){

        //$(this).prop("disabled",true);

        $("#modalValidPEC").modal("show");

        $('.select2').select2(); 

        $("#id_pec").val($(this).attr("data-idPEC"));

    });


    $(".modalDetailsPEC").click(function(){

        //$(this).prop("disabled",true);

        $("#modalDetails").modal("show");
        $("#id_pec").val($(this).attr("data-idPEC"));

        $.get( "../controllers/modalDetailsPEC.php?id="+$(this).attr("data-idPEC"), function( code_html ) { 
            $( ".modal-body.modalDetails" ).html( code_html );   
    
        });

    });


    $("#validerPEC").click(function(){

        $(this).prop("disabled",true);

        $.ajax({
            url : '../controllers/validerPEC.php',
            type : 'POST',
            data : $("#formValiderPEC").serialize(),
            success : function(statut){ 
                $(this).prop("disabled",false);
                location.reload();
            },
            error : function(resultat, statut, erreur){
                $(this).prop("disabled",false);
                alert("Erreur");
           }
    
        });

    });

});