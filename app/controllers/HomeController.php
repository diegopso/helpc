<?php
class HomeController extends Controller
{
	public function index()
	{
		$this->_flash('alert alert-success', 'ola');
		return $this->_view();
	}

	public function index2()
	{
		return $this->_view();
	}
}