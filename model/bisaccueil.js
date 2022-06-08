$(document).ready(function()
{

    $(".account").click(function()
    {
        var X=$(this).attr('id');
        if(X===1)
        {
            $(".submenu").hide();
            $(this).attr('id', '0');
        }
        else
        {
            $(".submenu").show();
            $(this).attr('id', '1');
        }

    });


    $(".submenu").mouseup(function()
    {
        return false
    });


    $(".account").mouseup(function()
    {
        return false
    });


    $(document).mouseup(function()
    {
        $(".submenu").hide();
        $(".account").attr('id', '');
    });

    $("#validPass").on('click',function (){

        let password = $("#passModif").val();
        if(password !== ""){
            $.ajax({
                url:'../Controller/ModifPass.php',
                type:'post',
                data:{passModif:password},
                success:function(response){
                    $("#Dashboard1").trigger('reset');
                    if(response){
                        // window.location = "../Controller/info.php"
                        alert(response);


                    }
                    else{
                        alert("erreur")
                    }

                }
            });

        }



    });

    $("#validEmail").on('click',function (){

        let email = $("#emailModif").val();
        if(email !== ""){
            $.ajax({
                url:'../Controller/ModifEmail.php',
                type:'post',
                data:{emailModif:email},
                success:function(response){
                    $("#Dashboard").trigger('reset');
                    if(response){
                        // window.location = "../Controller/info.php"
                        alert(response);


                    }
                    else{
                        console.log("erreur")
                    }

                }
            });

        }



    });

    $("#validSearch").on('click',function (e){
        let age = $("#age").val();
        let genre = $("#genre").val();
        let birthdate = $("#birthdate").val();
        let ville = $("#ville").val();
        let loisir = $("#loisir").val();


        if(age === ""||genre === "" || birthdate ==="" || ville ==="" || loisir ===""){
            alert("recherche incomplete")
            return false;
        }




    })



});

const modal = document.getElementById('myModal');


const btn = document.getElementById("myBtn");


const span = document.getElementsByClassName("close")[0];


btn.onclick = function() {
    modal.style.display = "block";
}


span.onclick = function() {
    modal.style.display = "none";
}


window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}

let slideIndex = 1;
showSlides(slideIndex);


function plusSlides(n) {
    showSlides(slideIndex += n);
}


function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}

function showHideDiv(ele) {
    const srcElement = document.getElementById(ele);
    if (srcElement != null) {
        if (srcElement.style.display === "block") {
            srcElement.style.display = 'none';
        }
        else {
            srcElement.style.display = 'block';
        }
        return false;
    }
}

function showHideDiv1(ele) {
    const srcElement = document.getElementById(ele);
    if (srcElement != null) {
        if (srcElement.style.display === "block") {
            srcElement.style.display = 'none';
        }
        else {
            srcElement.style.display = 'block';
        }
        return false;
    }
}

function showHideDiv2(ele) {
    const srcElement = document.getElementById(ele);
    if (srcElement != null) {
        if (srcElement.style.display === "block") {
            srcElement.style.display = 'none';
        }
        else {
            srcElement.style.display = 'block';
        }
        return false;
    }
}


