<?php

class HelpController extends Controller
{
	public function index($i = 1)
	{
		$set = new ConjuntoRespostaManager();
		$set->responder(1, 'Não');
		$set->responder(2, 'Sim');
		$set->responder(3, 'Não');
		$set->responder(4, 'Não');
		$set->responder(5, 'Não');
		$set->responder(6, 'Não');
		$set->responder(7, 'Não');
		$set->responder(8, 'Não');
		$set->responder(9, 'Não');
		$set->responder(10, 'Não');
		$set->responder(11, 'Não');
		$set->responder(12, 'Não');
		exit(var_dump($set->getProvavel()));
	}

	public function desculpe()
	{
		return $this->_view();
	}
}