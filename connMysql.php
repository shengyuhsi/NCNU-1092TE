<?php 
    //��Ʈw�D���]�w
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name="1092as";
    //�s�u���A��
    $db_link = mysqli_connect($db_host, $db_username, $db_password, $db_name);
    if (!$db_link) die("��Ƴs�����ѡI");
    //�]�w�r�����P�s�u�չ�
    mysqli_query($db_link, "SET NAMES 'utf8mb4'");
?>