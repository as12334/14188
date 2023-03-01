<?php

$config = require"../../system/config/database.inc.php";

$db_host = $config['default']['hostname']; //数据库服务器

$db_name = $config['default']['database']; //数据库名

$db_user = $config['default']['username']; //数据库用户名

$db_pass = $config['default']['password']; //数据库密码

$tablepre=""; //表前缀

$iipp    = $_SERVER["REMOTE_ADDR"];

$kimiurl = 'http://'.$_SERVER['SERVER_NAME']."/"; //网址

$url     = 'http://'.$_SERVER['SERVER_NAME']."/"; //网址

$yumin   = $_SERVER['SERVER_NAME']; //域名


?>