<?php

/**
 * @Entity("user")
 */
class User extends Model
{

	/**
	 * @AutoGenerated()
	 * @Column(Type="Int",Key="Primary")
	 */
	public $Id;

	/**
	 * @Column(Type="String")
	 * @Required()
	 */
	public $Username;

	/**
	 * @Column(Type="String")
	 * @Required()
	 */
	public $Password;
	
}