<?php

namespace iEducar\Packages\Library\Providers;

use App\Http\Controllers\LegacyController;
use iEducar\Packages\Library\Commands\LibraryInstallCommand;
use Illuminate\Support\ServiceProvider;

class LibraryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        LegacyController::resolver(function ($uri) {
            if (in_array($uri, static::intranet())) {
                return __DIR__ . '/../../ieducar/' . $uri;
            }

            return null;
        });

        LegacyController::resolver(function ($uri) {
            if (in_array($uri, static::module())) {
                return __DIR__ . '/../../ieducar/modules';
            }

            return null;
        });
    }

    public static function module(): array
    {
        return [
            'Api/Views/AcervoController',
            'Api/Views/AssuntoController',
            'Api/Views/AutorController',
            'Api/Views/CategoriaController',
            'Api/Views/ClienteController',
            'Biblioteca/Views/EmprestimoApiController',
            'Biblioteca/Views/EmprestimoController',
            'Biblioteca/Views/ReservaApiController',
            'Biblioteca/Views/ReservaController',
            'DynamicInput/Views/BibliotecaController',
            'DynamicInput/Views/TipoExemplarController',
            'OrdenacaoAlunos/Views/OrdenacaoAlunosApiController',
        ];
    }

    public static function intranet(): array
    {
        return [
            'intranet/educar_acervo_assunto_cad.php',
            'intranet/educar_acervo_assunto_det.php',
            'intranet/educar_acervo_assunto_lst.php',
            'intranet/educar_acervo_autor_cad.php',
            'intranet/educar_acervo_autor_cad_pop.php',
            'intranet/educar_acervo_autor_det.php',
            'intranet/educar_acervo_autor_lst.php',
            'intranet/educar_acervo_cad.php',
            'intranet/educar_acervo_colecao_cad.php',
            'intranet/educar_acervo_colecao_cad_pop.php',
            'intranet/educar_acervo_colecao_det.php',
            'intranet/educar_acervo_colecao_lst.php',
            'intranet/educar_acervo_colecao_xml.php',
            'intranet/educar_acervo_det.php',
            'intranet/educar_acervo_editora_cad.php',
            'intranet/educar_acervo_editora_cad_pop.php',
            'intranet/educar_acervo_editora_det.php',
            'intranet/educar_acervo_editora_lst.php',
            'intranet/educar_acervo_editora_xml.php',
            'intranet/educar_acervo_idioma_cad.php',
            'intranet/educar_acervo_idioma_cad_pop.php',
            'intranet/educar_acervo_idioma_det.php',
            'intranet/educar_acervo_idioma_lst.php',
            'intranet/educar_acervo_lst.php',
            'intranet/educar_biblioteca_cad.php',
            'intranet/educar_biblioteca_dados_cad.php',
            'intranet/educar_biblioteca_dados_cad_.php',
            'intranet/educar_biblioteca_dados_det.php',
            'intranet/educar_biblioteca_dados_lst.php',
            'intranet/educar_biblioteca_det.php',
            'intranet/educar_biblioteca_index.php',
            'intranet/educar_biblioteca_lst.php',
            'intranet/educar_biblioteca_tipo_cad.php',
            'intranet/educar_biblioteca_xml.php',
            'intranet/educar_categoria_cad.php',
            'intranet/educar_categoria_lst.php',
            'intranet/educar_categoria_obra_det.php',
            'intranet/educar_cliente_cad.php',
            'intranet/educar_cliente_det.php',
            'intranet/educar_cliente_lst.php',
            'intranet/educar_cliente_tipo_cad.php',
            'intranet/educar_cliente_tipo_det.php',
            'intranet/educar_cliente_tipo_lst.php',
            'intranet/educar_cliente_tipo_xml.php',
            'intranet/educar_colecao_xml.php',
            'intranet/educar_define_status_cliente_cad.php',
            'intranet/educar_definir_cliente_tipo_cad.php',
            'intranet/educar_definir_cliente_tipo_det.php',
            'intranet/educar_definir_cliente_tipo_lst.php',
            'intranet/educar_editora_xml.php',
            'intranet/educar_exemplar_baixa.php',
            'intranet/educar_exemplar_cad.php',
            'intranet/educar_exemplar_det.php',
            'intranet/educar_exemplar_devolucao_cad.php',
            'intranet/educar_exemplar_devolucao_det.php',
            'intranet/educar_exemplar_devolucao_lst.php',
            'intranet/educar_exemplar_emprestimo_cad.php',
            'intranet/educar_exemplar_emprestimo_det.php',
            'intranet/educar_exemplar_emprestimo_login_cad.php',
            'intranet/educar_exemplar_emprestimo_lst.php',
            'intranet/educar_exemplar_lst.php',
            'intranet/educar_exemplar_renovacao_cad.php',
            'intranet/educar_exemplar_tipo_cad.php',
            'intranet/educar_exemplar_tipo_det.php',
            'intranet/educar_exemplar_tipo_lst.php',
            'intranet/educar_exemplar_tipo_xml.php',
            'intranet/educar_fonte_cad.php',
            'intranet/educar_fonte_det.php',
            'intranet/educar_fonte_lst.php',
            'intranet/educar_fonte_xml.php',
            'intranet/educar_idioma_xml.php',
            'intranet/educar_motivo_baixa_cad.php',
            'intranet/educar_motivo_baixa_det.php',
            'intranet/educar_motivo_baixa_lst.php',
            'intranet/educar_motivo_suspensao_cad.php',
            'intranet/educar_motivo_suspensao_det.php',
            'intranet/educar_motivo_suspensao_lst.php',
            'intranet/educar_pagamento_multa_cad.php',
            'intranet/educar_pagamento_multa_det.php',
            'intranet/educar_pagamento_multa_lst.php',
            'intranet/educar_pesquisa_acervo_lst.php',
            'intranet/educar_pesquisa_cliente_lst.php',
            'intranet/educar_pesquisa_obra_lst.php',
            'intranet/educar_reservas_cad.php',
            'intranet/educar_reservas_det.php',
            'intranet/educar_reservas_login_cad.php',
            'intranet/educar_reservas_lst.php',
            'intranet/educar_situacao_cad.php',
            'intranet/educar_situacao_det.php',
            'intranet/educar_situacao_lst.php',
            'intranet/educar_situacao_xml.php',
            'intranet/educar_tombo_automatico.ajax.php',
        ];
    }
}
