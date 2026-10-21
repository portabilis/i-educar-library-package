<?php

use Illuminate\Support\Facades\Auth;

$campo_lista_biblioteca = !empty($get_biblioteca);
$campo_lista_cliente_tipo = !empty($get_cliente_tipo);
$campo_lista_cabecalho = $get_cabecalho ?? null;
$get_biblioteca = $get_cliente_tipo = false;
unset($get_cabecalho);

foreach (['ref_cod_biblioteca', 'ref_cod_cliente_tipo'] as $campoCodigo) {
    if (isset($this->$campoCodigo) && is_scalar($this->$campoCodigo)) {
        $this->$campoCodigo = inteiroOuNulo($this->$campoCodigo);
    }
}

include 'include/pmieducar/educar_campo_lista.php';

$get_biblioteca = $campo_lista_biblioteca;
$get_cliente_tipo = $campo_lista_cliente_tipo;

if (!empty($obrigatorio)) {
    $biblioteca_obrigatorio = $cliente_tipo_obrigatorio = true;
} else {
    $biblioteca_obrigatorio = isset($biblioteca_obrigatorio) ? $biblioteca_obrigatorio : false;
    $cliente_tipo_obrigatorio = isset($cliente_tipo_obrigatorio) ? $cliente_tipo_obrigatorio : false;
}

if (!empty($desabilitado)) {
    $biblioteca_desabilitado = $cliente_tipo_desabilitado = true;
} else {
    $biblioteca_desabilitado = isset($biblioteca_desabilitado) ? $biblioteca_desabilitado : false;
    $cliente_tipo_desabilitado = isset($cliente_tipo_desabilitado) ? $cliente_tipo_desabilitado : false;
}

$nivel_usuario = Auth::user()?->type?->level;
$ref_cod_biblioteca_ = null;
$qtd_bibliotecas = null;

if ($get_biblioteca && ($nivel_usuario == 4 || $nivel_usuario == 8)) {
    $ref_cod_biblioteca_ = new clsPmieducarBibliotecaUsuario()->lista(null, Auth::id()) ?: 0;
}

if ($get_biblioteca) {
    if ($ref_cod_biblioteca_ == 0 && $nivel_usuario != 1 && $nivel_usuario != 2) {
        $this->campoOculto('ref_cod_biblioteca', $this->ref_cod_biblioteca);
    } else {
        $qtd_bibliotecas = is_array($ref_cod_biblioteca_) ? count($ref_cod_biblioteca_) : null;
        if ($qtd_bibliotecas == 1 && ($nivel_usuario == 4 || $nivel_usuario == 8)) {
            $det_unica_biblioteca = array_shift($ref_cod_biblioteca_);
            $this->ref_cod_biblioteca = $det_unica_biblioteca['ref_cod_biblioteca'];
            $this->campoOculto('ref_cod_biblioteca', $this->ref_cod_biblioteca);
        } elseif ($qtd_bibliotecas > 1) {
            $opcoes_biblioteca = ['' => 'Selecione'];
            if (is_array($ref_cod_biblioteca_) && count($ref_cod_biblioteca_)) {
                foreach ($ref_cod_biblioteca_ as $biblioteca) {
                    $obj_biblioteca = new clsPmieducarBiblioteca($biblioteca['ref_cod_biblioteca']);
                    $det_biblioteca = $obj_biblioteca->detalhe();
                    $opcoes_biblioteca["{$biblioteca['ref_cod_biblioteca']}"] = "{$det_biblioteca['nm_biblioteca']}";
                }
            }
            $getCliente = '';
            if ($get_cliente_tipo) {
                $getCliente = 'getClienteTipo()';
            }
            $this->campoLista('ref_cod_biblioteca', 'Biblioteca', $opcoes_biblioteca, $this->ref_cod_biblioteca, $getCliente, null, null, null, $biblioteca_desabilitado, $biblioteca_obrigatorio);
        } else {
            $opcoes_biblioteca = ['' => 'Selecione'];
            if ($this->ref_cod_escola || $this->ref_cod_instituicao) {
                $objTemp = new clsPmieducarBiblioteca;
                $objTemp->setOrderby('nm_biblioteca ASC');
                $lista = $objTemp->lista(null, $this->ref_cod_instituicao, null, null, null, null, null, null, null, null, null, null, 1);

                if (is_array($lista) && count($lista)) {
                    foreach ($lista as $registro) {
                        $opcoes_biblioteca["{$registro['cod_biblioteca']}"] = "{$registro['nm_biblioteca']}";
                    }
                }
            }
            $getCliente = '';
            if ($get_cliente_tipo) {
                $getCliente = 'getClienteTipo()';
            }
            $this->campoLista('ref_cod_biblioteca', 'Biblioteca', $opcoes_biblioteca, $this->ref_cod_biblioteca, $getCliente, null, null, null, $biblioteca_desabilitado, $biblioteca_obrigatorio);
        }
    }
}

if ($get_cliente_tipo) {
    $opcoes_cli_tpo = ['' => 'Selecione'];
    if ($this->ref_cod_biblioteca) {
        $obj_cli_tpo = new clsPmieducarClienteTipo;
        $obj_cli_tpo->setOrderby('nm_tipo ASC');
        $lst_cli_tpo = $obj_cli_tpo->lista(null, $this->ref_cod_biblioteca, null, null, null, null, null, null, null, null, 1);
        if (is_array($lst_cli_tpo) && count($lst_cli_tpo)) {
            foreach ($lst_cli_tpo as $cli_tpo) {
                $opcoes_cli_tpo["{$cli_tpo['cod_cliente_tipo']}"] = "{$cli_tpo['nm_tipo']}";
            }
        }
    }
    $this->campoLista('ref_cod_cliente_tipo', 'Tipo do Cliente', $opcoes_cli_tpo, $this->ref_cod_cliente_tipo, null, null, null, null, $cliente_tipo_desabilitado, $cliente_tipo_obrigatorio);
}

if (isset($campo_lista_cabecalho)) {
    $get_cabecalho = $campo_lista_cabecalho;
    if ($qtd_bibliotecas > 1 && ($nivel_usuario == 4 || $nivel_usuario == 8)) {
        ${$get_cabecalho}[] = 'Biblioteca';
    } elseif ($nivel_usuario == 1 || $nivel_usuario == 2 || $nivel_usuario == 4) {
        ${$get_cabecalho}[] = 'Biblioteca';
    }
    if ($nivel_usuario == 1 || $nivel_usuario == 2) {
        ${$get_cabecalho}[] = 'Escola';
    }
    if ($nivel_usuario == 1) {
        ${$get_cabecalho}[] = 'Instituição';
    }
}
?>
<script type='text/javascript'>
<?php
if ($get_biblioteca && ($nivel_usuario == 1 || !empty($cad_usuario))) {
    ?>
$j(function () {
    var campoInstituicao = document.getElementById('ref_cod_instituicao');

    if (!campoInstituicao || String(campoInstituicao.onchange).indexOf('getBiblioteca') !== -1) {
        return;
    }

    var trocaInstituicao = campoInstituicao.onchange;

    campoInstituicao.onchange = function (event) {
        if (typeof trocaInstituicao == 'function') {
            trocaInstituicao.call(this, event);
        }

        getBiblioteca(1);
    };
});
<?php
}
if ($get_biblioteca) {
    ?>
function getBiblioteca(flag) {
    var campoBiblioteca = document.getElementById('ref_cod_biblioteca');
    campoBiblioteca.length = 1;

    campoBiblioteca.disabled = true;
    campoBiblioteca.options[0].text = 'Carregando bibliotecas';

    var xml = new ajax(atualizaLstBiblioteca);
    if (flag == 1) {
        xml.envia('educar_biblioteca_xml.php?ins=' + document.getElementById('ref_cod_instituicao').value);
    } else if (flag == 2) {
        xml.envia('educar_biblioteca_xml.php?esc=' + document.getElementById('ref_cod_escola').value);
    }
}

function atualizaLstBiblioteca(xml) {
    var campoBiblioteca = document.getElementById('ref_cod_biblioteca');
    campoBiblioteca.length = 1;
    campoBiblioteca.options[0].text = 'Selecione uma biblioteca';
    campoBiblioteca.disabled = false;

    bibliotecas = xml.getElementsByTagName('biblioteca');
    if (bibliotecas.length) {
        for (var i = 0; i < bibliotecas.length; i++) {
            campoBiblioteca.options[campoBiblioteca.options.length] = new Option(bibliotecas[i].firstChild.data, bibliotecas[i].getAttribute('cod_biblioteca'), false, false);
        }
    } else {
        campoBiblioteca.options[0].text = 'Nenhuma biblioteca';
    }
}
<?php
}
if ($get_cliente_tipo) {
    ?>
function getClienteTipo() {
    var campoBiblioteca = document.getElementById('ref_cod_biblioteca').value;
    var campoClienteTipo = document.getElementById('ref_cod_cliente_tipo');
    campoClienteTipo.length = 1;

    if (campoClienteTipo) {
        campoClienteTipo.disabled = true;
        campoClienteTipo.options[0].text = 'Carregando tipos de cliente';

        var xml = new ajax(atualizaLstClienteTipo);
        xml.envia('educar_cliente_tipo_xml.php?bib=' + campoBiblioteca);
    } else {
        campoClienteTipo.options[0].text = 'Selecione';
    }
}

function atualizaLstClienteTipo(xml) {
    var campoClienteTipo = document.getElementById('ref_cod_cliente_tipo');
    campoClienteTipo.length = 1;
    campoClienteTipo.options[0].text = 'Selecione um tipo de cliente';
    campoClienteTipo.disabled = false;

    var tipos = xml.getElementsByTagName('cliente_tipo');
    if (tipos.length) {
        for (var i = 0; i < tipos.length; i++) {
            campoClienteTipo.options[campoClienteTipo.options.length] = new Option(tipos[i].firstChild.data, tipos[i].getAttribute('cod_cliente_tipo'), false, false);
        }
    } else {
        campoClienteTipo.options[0].text = 'A biblioteca não possui nenhum tipo de cliente';
    }
}
<?php
}
?>
</script>
