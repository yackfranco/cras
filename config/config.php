<?php

$config = new myConfig();
$config->setPath('C:/xampp/htdocs/cras/');
$config->setDirUploads('C:/xampp/htdocs/cras/www/app/pictures/');

$config->setDrive('pgsql');
$config->setHost('localhost');
$config->setPort(5432);
$config->setUser('postgres');
$config->setPassword('123');
$config->setDbname('cras2');
$config->setHash('md5');

$config->setUrl('http://localhost/cras/www/');
