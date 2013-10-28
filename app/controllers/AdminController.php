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
}