<?php

use App\Menu;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up(): void
    {
        $biblioteca = Menu::query()->updateOrCreate(['old' => 57], ['parent_id' => null, 'title' => 'Biblioteca', 'description' => null, 'link' => '/intranet/educar_biblioteca_index.php', 'icon' => 'fa-book', 'order' => 8, 'type' => 1, 'parent_old' => 57, 'process' => null, 'active' => true]);

        $cadastro = Menu::query()->updateOrCreate(['old' => 15858], ['parent_id' => $biblioteca->getKey(), 'title' => 'Cadastros', 'description' => null, 'link' => null, 'icon' => null, 'order' => 1, 'type' => 2, 'parent_old' => null, 'process' => 57, 'active' => true]);
        $movimentacoes = Menu::query()->updateOrCreate(['old' => 15859], ['parent_id' => $biblioteca->getKey(), 'title' => 'Movimentações', 'description' => null, 'link' => null, 'icon' => null, 'order' => 2, 'type' => 2, 'parent_old' => null, 'process' => 57, 'active' => true]);
        $relatorios = Menu::query()->updateOrCreate(['old' => 999614], ['parent_id' => $biblioteca->getKey(), 'title' => 'Relatórios', 'description' => null, 'link' => null, 'icon' => null, 'order' => 3, 'type' => 2, 'parent_old' => null, 'process' => 57, 'active' => true]);
        $documentos = Menu::query()->updateOrCreate(['old' => 999831], ['parent_id' => $biblioteca->getKey(), 'title' => 'Documentos', 'description' => null, 'link' => null, 'icon' => null, 'order' => 4, 'type' => 2, 'parent_old' => null, 'process' => 57, 'active' => true]);

        $tipos = Menu::query()->updateOrCreate(['old' => 999900], ['parent_id' => $cadastro->getKey(), 'title' => 'Tipos', 'description' => 'Autores de obras', 'link' => null, 'icon' => null, 'order' => 1, 'type' => 3, 'parent_old' => 15858, 'process' => null, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15880], ['parent_id' => $cadastro->getKey(), 'title' => 'Bibliotecas', 'description' => 'Bibliotecas', 'link' => '/intranet/educar_biblioteca_lst.php', 'icon' => null, 'order' => 2, 'type' => 3, 'parent_old' => 591, 'process' => 15858, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15890], ['parent_id' => $cadastro->getKey(), 'title' => 'Configurações', 'description' => 'Configurações de bibliotecas', 'link' => '/intranet/educar_biblioteca_dados_lst.php', 'icon' => null, 'order' => 2, 'type' => 3, 'parent_old' => 629, 'process' => 15858, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15878], ['parent_id' => $cadastro->getKey(), 'title' => 'Obras', 'description' => 'Obras', 'link' => '/intranet/educar_acervo_lst.php', 'icon' => null, 'order' => 3, 'type' => 3, 'parent_old' => 598, 'process' => 15858, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15879], ['parent_id' => $cadastro->getKey(), 'title' => 'Exemplares', 'description' => 'Exemplares', 'link' => '/intranet/educar_exemplar_lst.php', 'icon' => null, 'order' => 4, 'type' => 3, 'parent_old' => 606, 'process' => 15858, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15892], ['parent_id' => $cadastro->getKey(), 'title' => 'Clientes', 'description' => 'Clientes', 'link' => '/intranet/educar_cliente_lst.php', 'icon' => null, 'order' => 5, 'type' => 3, 'parent_old' => 603, 'process' => 15858, 'active' => true]);

        $obras = Menu::query()->updateOrCreate(['old' => 999901], ['parent_id' => $tipos->getKey(), 'title' => 'Obras', 'description' => 'Autores de obras', 'link' => null, 'icon' => null, 'order' => 1, 'type' => 4, 'parent_old' => null, 'process' => 999900, 'active' => true]);
        $exemplares = Menu::query()->updateOrCreate(['old' => 999903], ['parent_id' => $tipos->getKey(), 'title' => 'Exemplares', 'description' => 'Autores de obras', 'link' => null, 'icon' => null, 'order' => 3, 'type' => 4, 'parent_old' => null, 'process' => 999900, 'active' => true]);
        $clientes = Menu::query()->updateOrCreate(['old' => 999904], ['parent_id' => $tipos->getKey(), 'title' => 'Clientes', 'description' => 'Autores de obras', 'link' => null, 'icon' => null, 'order' => 4, 'type' => 4, 'parent_old' => null, 'process' => 999900, 'active' => true]);

        Menu::query()->updateOrCreate(['old' => 15869], ['parent_id' => $movimentacoes->getKey(), 'title' => 'Reservas', 'description' => 'Reservas de exemplares', 'link' => '/intranet/educar_reservas_lst.php', 'icon' => null, 'order' => 1, 'type' => 3, 'parent_old' => 609, 'process' => 15859, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15894], ['parent_id' => $movimentacoes->getKey(), 'title' => 'Empréstimos', 'description' => 'Empréstimos de exemplares', 'link' => '/module/Biblioteca/emprestimo', 'icon' => null, 'order' => 2, 'type' => 3, 'parent_old' => 610, 'process' => 15859, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15895], ['parent_id' => $movimentacoes->getKey(), 'title' => 'Devoluções', 'description' => 'Devoluções de exemplares', 'link' => '/intranet/educar_exemplar_devolucao_lst.php', 'icon' => null, 'order' => 3, 'type' => 3, 'parent_old' => 628, 'process' => 15859, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15893], ['parent_id' => $movimentacoes->getKey(), 'title' => 'Dívidas', 'description' => 'Dívidas de exemplares', 'link' => '/intranet/educar_pagamento_multa_lst.php', 'icon' => null, 'order' => 4, 'type' => 3, 'parent_old' => 622, 'process' => 15859, 'active' => true]);

        Menu::query()->updateOrCreate(['old' => 15877], ['parent_id' => $obras->getKey(), 'title' => 'Assuntos', 'description' => 'Assuntos de obras', 'link' => '/intranet/educar_acervo_assunto_lst.php', 'icon' => null, 'order' => 0, 'type' => 5, 'parent_old' => 592, 'process' => 999901, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15881], ['parent_id' => $obras->getKey(), 'title' => 'Autores', 'description' => 'Autores de obras', 'link' => '/intranet/educar_acervo_autor_lst.php', 'icon' => null, 'order' => 0, 'type' => 5, 'parent_old' => 594, 'process' => 999901, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 999866], ['parent_id' => $obras->getKey(), 'title' => 'Categorias', 'description' => 'Categorias de obras', 'link' => '/intranet/educar_categoria_lst.php', 'icon' => null, 'order' => 0, 'type' => 5, 'parent_old' => 599, 'process' => 999901, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15882], ['parent_id' => $obras->getKey(), 'title' => 'Coleções', 'description' => 'Coleções de obras', 'link' => '/intranet/educar_acervo_colecao_lst.php', 'icon' => null, 'order' => 0, 'type' => 5, 'parent_old' => 593, 'process' => 999901, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15883], ['parent_id' => $obras->getKey(), 'title' => 'Editoras', 'description' => 'Editoras de obras', 'link' => '/intranet/educar_acervo_editora_lst.php', 'icon' => null, 'order' => 0, 'type' => 5, 'parent_old' => 595, 'process' => 999901, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15889], ['parent_id' => $obras->getKey(), 'title' => 'Fontes', 'description' => 'Fontes de obras', 'link' => '/intranet/educar_fonte_lst.php', 'icon' => null, 'order' => 0, 'type' => 5, 'parent_old' => 608, 'process' => 999901, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15884], ['parent_id' => $obras->getKey(), 'title' => 'Idiomas', 'description' => 'Idiomas de obras', 'link' => '/intranet/educar_acervo_idioma_lst.php', 'icon' => null, 'order' => 0, 'type' => 5, 'parent_old' => 590, 'process' => 999901, 'active' => true]);

        Menu::query()->updateOrCreate(['old' => 15885], ['parent_id' => $exemplares->getKey(), 'title' => 'Tipos de exemplar', 'description' => 'Tipos de exemplar', 'link' => '/intranet/educar_exemplar_tipo_lst.php', 'icon' => null, 'order' => 1, 'type' => 5, 'parent_old' => 597, 'process' => 999903, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15891], ['parent_id' => $exemplares->getKey(), 'title' => 'Tipos de situação de exemplar', 'description' => 'Situação', 'link' => '/intranet/educar_situacao_lst.php', 'icon' => null, 'order' => 2, 'type' => 5, 'parent_old' => 602, 'process' => 999903, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15887], ['parent_id' => $exemplares->getKey(), 'title' => 'Motivos de baixa', 'description' => 'Motivos de baixa do exemplar', 'link' => '/intranet/educar_motivo_baixa_lst.php', 'icon' => null, 'order' => 3, 'type' => 5, 'parent_old' => 600, 'process' => 999903, 'active' => true]);

        Menu::query()->updateOrCreate(['old' => 15886], ['parent_id' => $clientes->getKey(), 'title' => 'Tipos de cliente', 'description' => 'Tipos de cliente', 'link' => '/intranet/educar_cliente_tipo_lst.php', 'icon' => null, 'order' => 1, 'type' => 5, 'parent_old' => 596, 'process' => 999904, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 15888], ['parent_id' => $clientes->getKey(), 'title' => 'Motivos de suspensão', 'description' => 'Motivos de suspensão do cliente', 'link' => '/intranet/educar_motivo_suspensao_lst.php', 'icon' => null, 'order' => 2, 'type' => 5, 'parent_old' => 607, 'process' => 999904, 'active' => true]);

        Menu::query()->updateOrCreate(['old' => 999905], ['parent_id' => $relatorios->getKey(), 'title' => 'Cadastrais', 'order' => 1, 'parent_old' => 999614]);
        Menu::query()->updateOrCreate(['old' => 999906], ['parent_id' => $relatorios->getKey(), 'title' => 'Movimentações', 'order' => 2, 'parent_old' => 999614]);

        Menu::query()->updateOrCreate(['old' => 999907], ['parent_id' => $documentos->getKey(), 'title' => 'Comprovantes', 'order' => 3, 'parent_old' => 999831]);
    }

    public function down(): void
    {
        Menu::query()->where('old', 999907)->delete();
        Menu::query()->where('old', 999906)->delete();
        Menu::query()->where('old', 999905)->delete();
        Menu::query()->where('old', 15888)->delete();
        Menu::query()->where('old', 15886)->delete();
        Menu::query()->where('old', 15887)->delete();
        Menu::query()->where('old', 15891)->delete();
        Menu::query()->where('old', 15885)->delete();
        Menu::query()->where('old', 15884)->delete();
        Menu::query()->where('old', 15889)->delete();
        Menu::query()->where('old', 15883)->delete();
        Menu::query()->where('old', 15882)->delete();
        Menu::query()->where('old', 999866)->delete();
        Menu::query()->where('old', 15881)->delete();
        Menu::query()->where('old', 15877)->delete();
        Menu::query()->where('old', 15893)->delete();
        Menu::query()->where('old', 15895)->delete();
        Menu::query()->where('old', 15894)->delete();
        Menu::query()->where('old', 15869)->delete();
        Menu::query()->where('old', 999904)->delete();
        Menu::query()->where('old', 999903)->delete();
        Menu::query()->where('old', 999901)->delete();
        Menu::query()->where('old', 15892)->delete();
        Menu::query()->where('old', 15879)->delete();
        Menu::query()->where('old', 15878)->delete();
        Menu::query()->where('old', 15890)->delete();
        Menu::query()->where('old', 15880)->delete();
        Menu::query()->where('old', 999900)->delete();
        Menu::query()->where('old', 999831)->delete();
        Menu::query()->where('old', 999614)->delete();
        Menu::query()->where('old', 15859)->delete();
        Menu::query()->where('old', 15858)->delete();
        Menu::query()->where('old', 57)->delete();
    }
};
