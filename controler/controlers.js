
$(function () {
    console.log('we are here');
    /** init **/
    $('.menu .item').tab();
    $('.dropdown').dropdown();
    $('.ui.modal').modal()

    handler();

});


function handler() {

    /*Listener button */
    $('.button_enregistrer').off("click").on("click", function (event) {
        event.preventDefault();
        /** recupération des données sur le formulaire **/
        var donnee = $('.formulaire_Client').serialize();
        donnee += '&Save_customer=true';
        console.log("donne collecté : ", donnee);

        //permet de prendre les donnees du formulaire pour les envoyer dans le recepteur avec la methode post
        $.ajax({
            type: "POST",
            url: "./model/recepteur.php",
            //data: {id: true, nom: nom, post_nom: postnom}, /**  !!!!!!!!!!  **/
            data: donnee,
            //callback(retour qui me revient(les donnees))
            success: function (Data) {
                console.log(Data);
            },

            
        });

        $('.ui.modal')
            .modal('show')
            ;


    });


}



function getZombie() {
    $('.zombie').on('click', function (event) {
        alert('zamba');
    });
}