<?php

class ConjuntoRespostaManager 
{
	public $Resultados;

	public $Log;

	public function __construct($init = true)
	{
		if($init)
			$this->init();
	}

	private function init()
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
			if($r->similaridade($this->Log) > 0.5)
			{
				return $r;
			}
		}

		return null;
	}

	public static function converter($obj)
	{
		if($obj)
		{
			$set = new ConjuntoRespostaManager(false);
			
			$set->Resultados = array();
			foreach ($obj->Resultados as $r) 
			{
				$result = new ResultadoManager();
				$result->Id = $r->Id;
				$result->Solucao = $r->Solucao;
				$result->Perguntas = $r->Perguntas;
				$result->Problema = $r->Problema;

				$set->Resultados[] = $result;
			}

			$set->Log = new Vetor();
			foreach ($obj->Log->Dimensoes as $key => $value) 
			{
				$set->Log->add($key, $value);
			}

			return $set;
		}

		return null;
	}

	public function eliminar($idProvavel)
	{
		foreach ($this->Resultados as $k => $r) 
		{
			if($r->Id == $idProvavel)
			{
				unset($this->Resultados[$k]);
				return;
			}
		}
	}
}