<?php

class AdminController extends Controller {

    /** @Auth("admin") */
    public function __construct() {
        
    }

    public function index() {
        return $this->_view(Resultado::findAll());
    }

    public function perguntas($i = 0) {
        if (Request::isPost()) {

            foreach ($_POST as $key => $value) {
                $pergunta = Pergunta::get($key);
                $pergunta->Texto = $value;
                $pergunta->save();
            }
        }

        $perguntas = Pergunta::all($i, 20);
        return $this->_view($perguntas);
    }

    public function respostas($id) {
        $pergunta = Pergunta::get($id);
        $respostas = $pergunta->getRespostas();

        if (Request::isPost()) {
            foreach ($respostas as $r) {
                $r->Resposta = Request::post($r->Id);
                $r->save();

                return $this->_redirect('~/admin/respostas/' . $id);
            }
        }

        $this->_set('respostas', $respostas);
        return $this->_view($pergunta);
    }

    public function adicionarPergunta() {
        $pergunta = new Pergunta();
        $pergunta->Texto = Request::get('pergunta');
        $pergunta->save();

        $pergunta->Texto = htmlentities(Request::get('pergunta'));

        return $this->_json($pergunta);
    }

    public function problema($idResultado = null) {
        if (Request::isPost()) {
            $idResultado = Request::post('idResultado');
            if ($idResultado) {
                $result = Resultado::get($idResultado);
                $result->Problema = Request::post('problema');
                $result->Solucao = Request::post('solucao');
            } else {
                $result = new Resultado(Request::post('problema'), Request::post('solucao'));
            }
            $result->save();

            foreach (Request::post('resposta') as $key => $value) {
                $resposta = new Resposta($result->Id, $key, $value);
                $resposta->save();
            }

            $this->_flash('alert alert-success', '<h3 id="msgSucesso">Solução adicionada com sucesso</h3>');
            return $this->_redirect('~/');
        }
        if ($idResultado) {
            $result = Resultado::get($idResultado);
            $this->_set('resultado', $result);
        }
        $this->_set('idResultado', $idResultado);        
        return $this->_view(Pergunta::findAll());
    }

}
