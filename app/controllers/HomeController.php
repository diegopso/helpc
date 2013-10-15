<?php
class HomeController extends Controller
{
	public function index()
	{
		return $this->_view();
	}

//	public function index2()
//	{
//            $this->_flash('alert-success', 'ola');
//		return $this->_view();
//	}
}