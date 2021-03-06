<?php

/**
 * @Entity("pergunta")
 */
class Pergunta extends Model {

    /**
     * @AutoGenerated()
     * @Column(Type="int",Key="Primary")
     */
    public $Id;

    /**
     * @Column(Type="String")
     */
    public $Texto;

	public function getRespostas()
	{
		return Resposta::encontrarTodas($this->Id);
	}

	public static function getProximaPergunta($logs)
	{
		$db = Database::factory();
		$idUsadas = $logs->getKeys();
		$pergunta = null;

		if($idUsadas)
		{
			$idUsadas = implode(",", $idUsadas);
			$pergunta = $db->Pergunta->whereSQL('Id NOT IN ('. $idUsadas .')')->limit(1)->all();
		}
		else
		{
			$pergunta = $db->Pergunta->limit(1)->all();
		}

		return array_shift($pergunta);
	}
        
        public static function findAll()
        {
            $db = Database::factory();
            return $db->Pergunta->all();
        }
}