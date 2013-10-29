<?php

/**
 * @Entity("view_resultados")
 */
class ViewResultados extends Model
{
	/**
	 * @Column(Type="Int")
	 */
	public $Id;

	/**
	 * @Column(Type="String")
	 */
	public $Solucao;

	/**
	 * @Column(Type="String")
	 */
	public $Problema;

	/**
	 * @Column(Type="String")
	 */
	public $IdsRespostas;

	/**
	 * @Column(Type="String")
	 */
	public $Respostas;

	/**
	 * @Column(Type="String")
	 */
	public $Perguntas;

	/**
	 * @Column(Type="String")
	 */
	public $IdsPerguntas;
}