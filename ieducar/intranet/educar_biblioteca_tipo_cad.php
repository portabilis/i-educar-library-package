<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

return new class extends clsCadastro {
    public $tipo_biblioteca;

    public function Inicializar()
    {
        $retorno = 'Novo';

        if (!Gate::allows('modify', 591)) {
            $this->simpleRedirect('educar_biblioteca_lst.php');
        }

        $this->url_cancelar = 'educar_biblioteca_lst.php';
        $this->nome_url_cancelar = 'Cancelar';

        return $retorno;
    }

    public function Gerar()
    {
        // list
        $opcoes = [ '' => 'Selecione', 2 => 'Institucional', 4 => 'Escolar'];
        $this->campoLista('tipo_biblioteca', 'Tipo Biblioteca', $opcoes, $this->tipo_biblioteca);
    }

    public function Novo()
    {
        if (!Gate::allows('modify', 591)) {
            $this->simpleRedirect('educar_biblioteca_lst.php');
        }

        Session::put('biblioteca.tipo_biblioteca', $this->tipo_biblioteca);

        $this->simpleRedirect('educar_biblioteca_cad.php');
    }

    public function Formular()
    {
        $this->title = 'Biblioteca';
        $this->processoAp = '591';
    }
};
