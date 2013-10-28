<?php

class ConjuntoRespostaManager 
{
	public $Resultados;

	public $Log;

	public function __construct()
	{
		$db = Database::factory();
		$resultados = $db->ViewResultados->all();

		$countResultados = count($resultados);

		$this->Resultados = array();
		$this->Log = new Vetor();

		for ($i=0; $i < $countResultados; $i++) 
		{
			$this->Resultados[] = new ResultadoManager($resultados[$i]);
		}
	}

	public function responder($idPergunta, $resposta)
	{
		$this->log($idPergunta, $resposta);
		foreach ($this->Resultados as $k => $v) 
		{
			if(!$v->verificarResposta($idPergunta, $resposta))
			{
				unset($this->Resultados[$k]);
			}
		}
	}

	public function log($idPergunta, $resposta)
	{
		$this->Log->add($idPergunta, $resposta);
	}

	public function getProvavel()
	{
		foreach ($this->Resultados as $r) 
		{
			if($r->similaridade($this->Log) > .8)
			{
				return $r;
			}
		}

		return null;
	}
}