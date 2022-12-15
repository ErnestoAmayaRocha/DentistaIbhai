<?php

require('./config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email === "" || $password === "") {
        header('Location: ../login.php?status=error');
    }

    $emailValidate = $db->prepare('SELECT * FROM usuarios WHERE email = :email');
    $emailValidate->bindParam(':email', $email);
    $emailValidate->execute();
    $isEmail = $emailValidate->fetchAll(PDO::FETCH_ASSOC);

    if (count($isEmail) == 0) {
        header('Location: ../login.php?status=error_email');
    }

    $passwordValidation = $db->prepare('SELECT * FROM usuarios WHERE email = :email AND password = :password');
    $passwordValidation->bindParam(':email', $email);
    $passwordValidation->bindParam(':password', $password);
    $passwordValidation->execute();
    $passwordValidation = $passwordValidation->fetchAll(PDO::FETCH_ASSOC);

    if (count($passwordValidation) == 0) {
        header('Location: ../login.php?status=error_password');
    } else {
        session_start();
        $_SESSION['id'] = $passwordValidation[0]['id_usuario'];
        $_SESSION['token'] = md5(date('Y-m-d H:i:s'));
        $_SESSION['username'] = $passwordValidation[0]['nombre'];
        header('Location: ../admin/');
    }
} else {
    header('Location: ../index.php');
}
