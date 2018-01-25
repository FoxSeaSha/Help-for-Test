<?php
if(!defined('INCLUDE_CHECK')) die('У вас нет прав на выполнение данного файла!');

// Конфигурация подключения к базе данных
$db_host		= 'localhost'; // Ip-адрес базы данных
$db_port		=  3306; // Порт базы данных
$db_user		= 'root'; // Пользователь базы данных
$db_pass		= ''; // Пароль базы данных

// Конфигурация базы данных
/*
$db_database - имя базы данных
*/
$db_database	= 'xauth';

/*
$db_table - таблица базы данных
*/
$db_table       = 'accounts';

/*
$db_columnUser - колонка логина
*/
$db_columnUser  = 'playername';

/*
$db_columnPass - колонка пароля
*/
$db_columnPass  = 'password';

$link = @mysql_connect($db_host.':'.$db_port,$db_user,$db_pass) or die('Невозможно установить соединение с базой данных!');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");
?>