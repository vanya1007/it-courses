<?php
    $name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $telephone = filter_var(trim($_POST['telephone']),
    FILTER_SANITIZE_STRING);
    $kurs = filter_var(trim($_POST['kurs']),
    FILTER_SANITIZE_STRING);

    if (mb_strlen($name) < 5 || mb_strlen($name) > 100 ) {
        echo " Халепа, перегляньте правильність написання даних ";
        exit();
    } else if (mb_strlen($telephone) < 10 || mb_strlen($telephone) > 15 ) {
        echo " Халепа, перегляньте правильність написання даних ";
        exit();
    } else if (mb_strlen($kurs) < 10 || mb_strlen($kurs) > 30 ) {
        echo " Халепа, перегляньте правильність написання даних ";
        exit();
    }

    $mysql = new mysqli ('localhost','root','root','kurs_db');
    $mysql->query("INSERT INTO `users` (name, telephone, kurs) 
    VALUES ('$name','$telephone','$kurs')");

    $mysql->close();

    header('Location: /');

?>