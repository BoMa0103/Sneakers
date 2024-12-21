<?php
    require_once('mvc/model/users.php');

    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {

        header('WWW-Authenticate: Basic realm="CMS Admin"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Треба ввести правильне ім\'я користувача та пароль для доступу до цієї сторінки.';
        exit;
    }

    $login = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];

    $user = getUserByLogin([
        'login' => $login,
    ]);

    if (!$user || !password_verify($password, $user['password'])) {
        header('WWW-Authenticate: Basic realm="CMS Admin"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Треба ввести правильне ім\'я користувача та пароль для доступу до цієї сторінки.';
        exit;
    }
?>
