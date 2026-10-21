<?php

namespace iEducar\Packages\Library\Support;

use clsPmieducarBibliotecaUsuario;

trait CurrentLibrary
{
    protected function getBibliotecaId($bibliotecaId = null)
    {
        if (!is_null($bibliotecaId) && is_numeric($bibliotecaId)) {
            return $bibliotecaId;
        }

        if (isset($this->viewInstance->ref_cod_biblioteca) && is_numeric($this->viewInstance->ref_cod_biblioteca)) {
            return $this->viewInstance->ref_cod_biblioteca;
        }

        $bibliotecas = new clsPmieducarBibliotecaUsuario()->lista(null, $this->getCurrentUserId());

        return $bibliotecas ? $bibliotecas[0]['ref_cod_biblioteca'] : null;
    }
}
