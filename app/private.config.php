<?php

/**
 * Tipo do drive do banco de dados, pode assumir os seguintes valores: mysql
 */
Config::set('database', array(
	'default' => array(
		'type' => 'mysql',
		'host' => 'mysql2.000webhost.com',
		'name' => 'a4533051_helpc',
		'user' => 'a4533051_root',
		'pass' => 'djonathasdiegosergio123',
		'validate' => true
	)
));

/**
 * Chave de segurança (deve ser alterada)
 */
Config::set('salt', 'iadsufocbgiodsybgfcsioagxiosudgh');