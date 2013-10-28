<?php

class ResultadoManager
{
	public $Id;

	public $Solucao;

	public $Problema;

	public $Perguntas;

	const SEPARATOR = '-$-';

	public function __construct($resultados = null)
	{
		if($resultados)
			$this->init($resultados);
	}

	protected function init($resultados)
	{
		$this->Id = $resultados->Id;
		$this->Problema = $resultados->Problema;
		$this->Solucao = $resultados->Solucao;
		$this->Respostas = array();
		$this->Perguntas = array();

		$perguntas = explode(self::SEPARATOR, $resultados->Perguntas);
		$idsPerguntas = explode(self::SEPARATOR, $resultados->IdsPerguntas);
		$respostas = explode(self::SEPARATOR, $resultados->Respostas);
		$idsRespostas = explode(self::SEPARATOR, $resultados->IdsRespostas);

		$count = count($idsPerguntas);

		for ($j=0; $j < $count; $j++) 
		{
			$this->Perguntas[] = (object) array(
				'IdResposta' => $idsRespostas[$j],
				'IdPergunta' => $idsPerguntas[$j],
				'Resposta' => $respostas[$j],
				'Pergunta' => $perguntas[$j],
			);
		}
	}

	public function verificarResposta($idPergunta, $resposta)
	{
		foreach ($this->Perguntas as $k => $v) 
		{
			if($v->IdPergunta == $idPergunta)
			{
				return $v->Resposta == $resposta;
			}
		}

		return false;
	}

	public function similaridade($vetorLog)
	{
		$vetorResultado = $this->getVetor();
		return $vetorLog->compararCom($vetorResultado);
	}

	public function getVetor()
	{
		$vetor = new Vetor();

		foreach ($this->Perguntas as $r) 
		{
			$vetor->add($r->IdPergunta, $r->Resposta);
		}

		return $vetor;
	}
}