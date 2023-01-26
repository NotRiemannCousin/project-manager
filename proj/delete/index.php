<?php

require_once '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

if (isset($_GET['id']) && intval($_GET['id']))
    R::trash('projeto', $_GET['id']);
header('Location: ../list/');