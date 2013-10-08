<?php

class UserController extends Controller
{
	public function index()
	{
		$a = 'Diego';
		$this->_set('nome', $a);
		return $this->_view(array('nome' => 'Diego'));
	}
}