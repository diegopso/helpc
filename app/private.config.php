<?php

/**
 * Tipo do drive do banco de dados, pode assumir os seguintes valores: mysql
 */
Config::set('database', array(
	'default' => array(
		'type' => 'mysql',
		'host' => 'mysql2.000webhost.com',
		'name' => '',
		'user' => '',
		'pass' => '',
		'validate' => true
	)
));

/**
 * Chave de segurança (deve ser alterada)
 */
Config::set('salt', '');