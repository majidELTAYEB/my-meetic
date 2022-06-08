$(document).ready(function (){
    $(".button1").on('click',function (){
        let email = $("#emailLog").val();
        let password = $("#passwordLog").val();
       if(email !== ""||password !== ""){
           $.ajax({
               url:'../model/modelConnexion.php',
               type:'post',
               data:{emailLog:email,passwordLog:password},
               success:function(response){
                   let msg = ""
                   console.log(response)
                   if(response){
                      // window.location = "../Controller/info.php"
                       alert(response);

                   }else{
                       window.location = "../Controller/info.php"
                   }

               }
           });
       }



    })
})