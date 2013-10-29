<?php

class Vetor
{
	public $Dimensoes = array();

	public function add($index, $value)
	{
		$this->Dimensoes[$index] = $value;
	}

	public function compararCom($vetor)
	{
		$vetorA = clone $this;
		if(count($vetorA->Dimensoes) != count($vetor->Dimensoes))
		{
			$vetorA->normalizar($vetor);
		}

		return $vetorA->cosseno($vetor);
	}

	protected function cosseno($vetor)
	{
		$count = count($vetor);

		$sum = $sqSumA = $sqSumB = 0;

		foreach ($this->Dimensoes as $k => $v)
		{ 
			$a = $this->str_to_bin($this->Dimensoes[$k]);
			$b = $this->str_to_bin($vetor->Dimensoes[$k]);

			$sum += $a * $b;
			$sqSumA += $a * $a;
			$sqSumB += $b * $b;
		}

		if($sqSumA && $sqSumB)
			return $sum / (sqrt($sqSumA) * sqrt($sqSumB));

		return 0;
	}

	public function normalizar($vetor)
	{
		$keys = array_merge(array_keys($this->Dimensoes), array_keys($vetor->Dimensoes));
		foreach ($keys as $k) 
		{
			if(!isset($this->Dimensoes[$k]))
			{
				$this->Dimensoes[$k] = null;
			}

			if(!isset($vetor->Dimensoes[$k]))
			{
				$vetor->Dimensoes[$k] = null;
			}
		}
	}

	protected function str_to_bin($str, $mode=0) {
	    $out = false;
	    for($a=0; $a < strlen($str); $a++) {
	        $dec = ord(substr($str,$a,1));
	        $bin = '';
	        for($i=7; $i>=0; $i--) {
	            if ( $dec >= pow(2, $i) ) {
	                $bin .= "1";
	                $dec -= pow(2, $i);
	            } else {
	                $bin .= "0";
	            }
	        }
	        /* Default-mode */
	        if ( $mode == 0 ) $out .= $bin;
	        /* Human-mode (easy to read) */
	        if ( $mode == 1 ) $out .= $bin . " ";
	        /* Array-mode (easy to use) */
	        if ( $mode == 2 ) $out[$a] = $bin;
	    }
	    return $out;
	}

	public function getKeys()
	{
		return array_keys($this->Dimensoes);
	}
}