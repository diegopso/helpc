<?php

class HelpController extends Controller
{
	public function index($i = 1)
	{
		Session::start();

		$set = ConjuntoRespostaManager::converter(Session::get('conjunto_resposta'));
		$pergunta = Session::get('ultima_pergunta');
		$provavel = Session::get('provavel');

		if(!$set)
			$set = new ConjuntoRespostaManager();

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

		if(!$pergunta || !count($set->Resultados))
			return $this->_redirect('~/help/desculpe');

		//echo '<h1 style="position: fixed; bottom: 0; left: 0;">', var_dump(count($set->Resultados)), '</h1>'; //acompanhamento...

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
		$this->_flash('alert alert-success', '<h3 id="msgSucesso">Processo realizado com sucesso!</h3>');
		return $this->_redirect('~/');
	}
}