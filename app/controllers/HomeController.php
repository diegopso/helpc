<?php

class HomeController extends Controller {

    public function index() {
        return $this->_view();
    }

    public function sobre() {
        return $this->_view();
    }

    public function contato() {
        return $this->_view();
    }

    public function login() {
        if (Auth::isLogged()) {
            $this->_redirect('~/admin/problema');
        }
        if (is_post) {
            $user = Usuario::login($_POST['login'], $_POST['password']);
            if ($user) {
                Auth::set('admin');
                Session::set('user', $user);
                $this->_redirect('~/admin/problema');
            } else
                $this->_flash('error', 'Login ou senha incorretos!');
        }
        return $this->_view();
    }

    public function logout() {
        Auth::clear();
        Session::clear();
        $this->_redirect('~/');
    }

}
