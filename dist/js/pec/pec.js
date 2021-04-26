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
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });


    $(".modalValiderPEC").click(function(){

        //$(this).prop("disabled",true);

        $("#modalValidPEC").modal("show");
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