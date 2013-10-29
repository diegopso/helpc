<?php

class HelpController extends Controller
{
	public function index($i = 1)
	{
		Session::start();

		$set = ConjuntoRespostaManager::converter(Session::get('conjunto_resposta'));
		if(!$set)
			$set = new ConjuntoRespostaManager();

		$pergunta = Session::get('ultima_pergunta');
		$provavel = Session::get('provavel');

		if(Request::isPost())
		{
			if($provavel)
			{
				$set->eliminar($provavel->Id);
			}

			$set->responder($pergunta->Id, Request::post('resposta'));
		}

		$pergunta = Pergunta::getProximaPergunta($set->Log);
		$provavel = $set->getProvavel();

		Session::set('conjunto_resposta', $set);
		Session::set('provavel', $provavel);
		Session::set('ultima_pergunta', $pergunta);

		if(!$pergunta)
			return $this->_redirect('~/help/desculpe');

		$this->_set('provavel', $provavel);
		return $this->_view($pergunta);
	}

	public function desculpe()
	{
		return $this->_view();
	}

	public function sucesso()
	{
		Session::del('conjunto_resposta');
		Session::del('provavel');
		Session::del('ultima_pergunta');
		$this->_flash('alert alert-success', 'Parabéns o/');
		return $this->_redirect('~/');
	}
}