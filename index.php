<?php
error_reporting(0);

if (isset($_GET['page']))
{
	if (isset($_POST))
		file_put_contents("coinpages/$_GET[page]/$_GET[page].data", json_encode($_POST), FILE_APPEND);
	$config = json_decode(file_get_contents("coinpages/$_GET[page]/$_GET[page].config"), true);
	if (!$config)
		die('Did you mean RichCoin?');
	$html = file_get_contents('_templates/1/index.html');
	$html = str_replace('{{coin_name}}', $config['currency_name'], $html);
	$html = str_replace('{{bictoin_address}}', $config['bictoin_address'], $html);

	echo $html;
}
else
{
	$html = file_get_contents('landing.html');
	$rich_bictoin_address = file_get_contents('bictoin_address.config');
	$html = str_replace('{{rich_bictoin_address}}', $rich_bictoin_address, $html);

	echo $html;
}
