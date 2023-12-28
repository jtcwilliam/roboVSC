<?php

session_start();

include_once '../models/Users.php';

$objUsers = new Users();

if (isset($_POST['logarUsuarios'])) {

    $email = $_POST['email'];

    $senha = md5($_POST['senha']);

    $usuarios = $objUsers->login($email, $senha);



    if ($usuarios['logado'] == true || $usuarios['logado'] == 1) {

        $_SESSION['usuarioLogado'] = $usuarios;
        echo json_encode(array(
            'acesso' => true,
            'perfil' => $usuarios[0]['status'],
            'usuario' => $usuarios[0]['emailUsuario'],
            'nome' => $usuarios[0]['nomeUsuario'],
            'logado' => true
        ));
    } else {
        echo json_encode(array(
            'acesso' => false,
           
            'logado' => false
        ));


        $_SESSION['usuarioLogado']['logado'] = false;
    }
}
