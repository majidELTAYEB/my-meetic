$(document).ready(function (){
    $(".button").on('click',function (e){
        let nom = $("#lastname").val();
        let prenom = $("#firstname").val();
        let birthdate = $("#birthdate").val();
        let genre = $("#genre").val();
        let ville = $("#ville").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let selected = [];
        const isChecked = $("input[type=checkbox]").is(":checked");
        $('input[type=checkbox]:checked').each(function() {
            selected.push($(this).attr('value'));
        });

        if(email === ""||password === "" || nom ==="" || prenom ==="" || ville ===""|| genre ==="" || birthdate ==="" || isChecked === false){
            alert("formulaire incomplet")
            return false;
        }

        else{

            $.ajax({
                url:'../Controller/inscription.php',
                type:'post',
                data:{
                    lastname : nom,
                    firstname : prenom,
                    birthdate : birthdate,
                    genre : genre,
                    ville : ville,
                    email:email,
                    password:password,
                    loisir : selected
                },
                success:function(){
                    alert("merci pour votre inscription "+prenom);
                    $("#formu").trigger('reset');

                }
            });

        }



    })

})
