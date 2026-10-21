<?php

namespace iEducar\Packages\Library\Support;

use iEducar\Packages\Library\Models\LegacyUserLibrary;

trait UserLibrary
{
    protected function getBibliotecaId($bibliotecaId = null)
    {
        if (!is_null($bibliotecaId) && is_numeric($bibliotecaId)) {
            return $bibliotecaId;
        }

        if (isset($this->viewInstance->ref_cod_biblioteca) && is_numeric($this->viewInstance->ref_cod_biblioteca)) {
            return $this->viewInstance->ref_cod_biblioteca;
        }

        return LegacyUserLibrary::query()
            ->where('ref_cod_usuario', $this->getCurrentUserId())
            ->value('ref_cod_biblioteca');
    }
}
