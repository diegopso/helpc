<?php

/**
 * @Entity("pergunta")
 */
class Pergunta extends Model
{
	/**
	 * @AutoGenerated()
	 * @Column(Type="int",Key="Primary")
	 */
	public $Id;

	/**
	 * @Column(Type="String")
	 */
	public $Texto;
}