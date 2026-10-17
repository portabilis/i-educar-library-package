<?php

namespace iEducar\Packages\Library\Support;

use DateTime;

class Data
{
    /**
     * Devolve a data quando ela está em dd/mm/aaaa e existe; senão, null.
     */
    public static function brOuNulo($valor): ?string
    {
        if (!is_string($valor)) {
            return null;
        }

        $data = DateTime::createFromFormat('!d/m/Y', $valor);

        return $data && $data->format('d/m/Y') === $valor ? $valor : null;
    }
}
