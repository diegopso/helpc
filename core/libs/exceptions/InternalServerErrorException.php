<?php/* * Copyright (c) 2013, Valdirene da Cruz Neves Júnior <vaneves@vaneves.com> * All rights reserved. *//** * Exceção para erro interno no servidor *  * @author	Valdirene da Cruz Neves Júnior <vaneves@vaneves.com> * @version	1 * */class InternalServerErrorException extends HTTPException{	/**	 * Construtor da classe	 * @param	string	$msg	mensagem do erro	 */	public function __construct($msg)	{		parent::__construct($msg, 500);	}}