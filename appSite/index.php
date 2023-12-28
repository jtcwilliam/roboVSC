<?php

 






?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kleber & Ruth Properties || Properties</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/foundation-icons/foundation-icons.css">
    <?php
    include_once 'includes/head.php';
    ?>
</head>

<body style="background-color: #fffdf0;">


    <header class="subnav-hero-section">
        <h1 class="subnav-hero-headline">Kleber & Ruth <small>Properties</small></h1>
        <ul class="subnav-hero-subnav">



            <?php



            ?>




        </ul>
    </header>

    <section>



        <div class="grid-container" style="margin-top: 8vh;   margin-bottom: 10vh;">



            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">


            <div class="grid-container" id="telaLogada" style="display: none;">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <center>
                            <h3 style="color: gray;"> Olá <span style=" color: black ;font-weight: bold;" id="nomeUsuario"></span>. Seu acesso foi permitido!</h3>
                            <h5>Vamos te redirecionar. Aguarde!</h5>
                        </center>
                        <br>
                    </div>
                </div>
            </div>



            <form>

                <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                        <div class="auto cell"></div>
                        <div class="medium-6 cell">
                            <div class="input-group">
                                <div class="input-group-button">
                                    <label class="button  " for="email" style=" width: 7vw;  border-bottom-left-radius: 10px  ;display: grid; align-content: center; justify-content: left;">User </label>
                                </div>
                                <input class="input-group-field" id="email" type="email">
                            </div>
                            <div class="input-group">
                                <div class="input-group-button">
                                    <label class="button  " for="senha" style=" width: 7vw;  border-bottom-left-radius: 10px  ;display: grid; align-content: center; justify-content: left;">Password </label>
                                </div>
                                <input class="input-group-field" id="senha" type="password">
                            </div>
                        </div>
                        <div class="auto cell"></div>
                    </div>


                    <div class="grid-x grid-padding-x">
                        <div class="auto cell"></div>
                        <div class="medium-6 cell">

                            <center> <a onclick="logar()" style="width: 7vw; border-radius: 10px;" class="button">Acessar</a></center>
                        </div>
                        <div class="auto cell"></div>
                    </div>

                </div>
            </form>





        </div>


    </section>
    <footer></footer>



    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>


    <script>
        function logar() {

            var formData = {
                email: $('#email').val(),
                senha: $('#senha').val(),
                logarUsuarios: true
            };
            $.ajax({
                    type: 'POST',
                    url: 'controller/userController.php',
                    data: formData,
                    dataType: 'json',
                    encode: true
                })
                .done(function(data) {

                    console.log(data);
                    
                    
                    if(data.logado == true){
                    let endereco = '';

                    

                    $('#telaLogada').css('display', 'block');

                    $('#nomeUsuario').html(data.nome);
 


                    switch (data.perfil) {
                        case '5':

                            endereco = 'vaAvaliation.php';
                            break;

                        case '6':

                            endereco = 'avaliatedDirector.php';
                            break;



                        default:
                            break;
                    }


                    //avaliatedDirector



                    setTimeout(() => {
                        window.location.replace(endereco);
                    }, 1000);
                }
                else{
                    alert('Usuário ou senha errada');
                }



                });
        }
    </script>
</body>

</html>