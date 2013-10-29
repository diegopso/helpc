<?php

class AdminController extends Controller
{
	public function index()
	{
		return $this->_redirect('~/');
	}

	public function perguntas($i = 0)
	{
		if(Request::isPost())
		{
			$pergunta = new Pergunta();
			$this->_data($pergunta);
			$pergunta->save();
		}

		$perguntas = Pergunta::all($i, 20);
		return $this->_view($perguntas);
	}

	public function respostas($id)
	{
		$pergunta = Pergunta::get($id);
		$respostas = $pergunta->getRespostas();

		if(Request::isPost())
		{
			foreach ($respostas as $r) 
			{
				$r->Resposta = Request::post($r->Id);
				$r->save();

				return $this->_redirect('~/admin/respostas/' . $id);
			}
		}

		$this->_set('respostas', $respostas);
		return $this->_view($pergunta);
	}
}