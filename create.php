<?php
error_reporting(0);

$folder_name = preg_replace('/[^\w]/', '', $_POST['currency_name']);
if (!mkdir("coinpages/$folder_name")) die();
file_put_contents("coinpages/$folder_name/$folder_name.config", json_encode($_POST));

die($folder_name);
