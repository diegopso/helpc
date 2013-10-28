<?php

class HelpController extends Controller
{
	public function index($i = 1)
	{
		$set = new ConjuntoRespostaManager();
		//$set->responder(1, 'Não');
		exit(var_dump($set));
	}

	public function desculpe()
	{
		return $this->_view();
	}
}