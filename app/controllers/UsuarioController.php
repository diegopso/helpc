<?php

class UsuarioController extends Controller {

    public function index() {
        $db = Database::factory();
        $entity = $db->Pergunta
                ->orderBy('Texto', 'ASC')
                ->paginate(null, null);
        return $this->_view($entity);
    }

    public function adicionarPergunta() {        
        $t = Pergunta::save($_POST["pergunta"]);
        return "ok";
    }

}
