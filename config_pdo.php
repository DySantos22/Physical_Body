<?php

/*CONEXÃO USADA PARA O AGENDAMENTO */

define('HOST', '');
define('USER', '');
define('PASS', '');
define('DBNAME', '');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
