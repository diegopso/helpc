<?php

class ConjuntoRespostaManager 
{
	public $Resultados;

	public function __construct()
	{
		$db = Database::factory();
		$resultados = $db->ViewResultados->all();

		//exit(var_dump($resultados));/

		$countResultados = count($resultados);

		$this->Resultados = array();

		for ($i=0; $i < $countResultados; $i++) 
		{
			$this->Resultados[] = new ResultadoManager($resultados[$i]);
		}
	}

	public function responder($idPergunta, $resposta)
	{
		foreach ($this->Resultados as $k => $v) 
		{
			if(!$v->verificarResposta($idPergunta, $resposta))
			{
				unset($this->Resultados[$k]);
			}
		}
	}
}